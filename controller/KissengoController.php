<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of KissengoController
 *
 * @author Ngola
 */
include_once '../model/PublicacaoService.php';
include_once '../model/DestaquesService.php';
include_once 'ComentarioController.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';

class KissengoController {

    private $servico = NULL;
    private $destaques = NULL;
    private $comentario = NULL;
    function __construct() {
        $this->servico = new PublicacaoService();
        $this->destaques = new DestaquesService();
        $this->comentario = new ComentarioController();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = filter_input(INPUT_POST, 'email');
            $senha = filter_input(INPUT_POST, 'password');
            $this->validarLogin($email, $senha);
        }
    }

    public function validarLogin($email, $senha) {
        if ($email === 'geral.lfsport@gmail.com') {
            if ($senha === 'lf@12342023') {
                $_SESSION['logado'] = 'sim';
                if(!headers_sent()){
                    header("location: homepage.php");
                }else{
                    echo '<script type="text/javascript"> window.location.href="homepage.php"; </script>';
                }
            } else {
                echo "<script> alert('SENHA INVÁLIDA'); </script>";
            }
        } else {
            echo "<script> alert('EMAIL INVÁLIDO'); </script>";
        }
    }

    public function fazerPublicacao() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $titulo = filter_input(INPUT_POST, 'titulo');
            $descricao = filter_input(INPUT_POST, 'descricao');
            $imagem = filter_input(INPUT_POST, 'imagem');

            $file = $_FILES['imagem'];
            $file_name = $file['name'];
            $tmp_name = $file['tmp_name'];
            $path = $_SERVER['DOCUMENT_ROOT'] . '/ficheiros/imagens/';
            move_uploaded_file($tmp_name, $path . $file_name); //aqui meti a imagem da publicação numa pasta.

            $this->servico->criarPublicacao($titulo, $descricao, $file_name);
            echo "<script> alert('PUBLICAÇÃO ADICIONADA COM SUCESSO AO SITE'); </script>";
        }
    }

    public function editarPublicacao($id) {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $titulo = filter_input(INPUT_POST, 'titulo');
            $descricao = filter_input(INPUT_POST, 'descricao');
            $imagem = filter_input(INPUT_POST, 'imagem');
            $this->validacaoEditarPublicacao($id, $titulo, $descricao, $imagem);
        }
    }

    public function validacaoEditarPublicacao($id, $titulo, $descricao, $imagem) {
        $file = $_FILES['imagem'];
        $file_name = $file['name'];
        $tmp_name = $file['tmp_name'];
        $path = $_SERVER['DOCUMENT_ROOT'] . '/ficheiros/imagens/';
        $imagemAntiga = $this->selecionarPublicacaoPeloId($id)->getImagem();
        if (file_exists($path.$imagemAntiga)) {
            if ($file_name === "" || !isset($imagem) || $imagem === NULL) {
                $this->servico->editarPublicacao($id, $titulo, $descricao, $imagemAntiga);
                echo "<script> alert('PUBLICAÇÃO EDITADA COM SUCESSO, NENHUMA IMAGEM NOVA FOI ADICIONADA!'); </script>";
            }else if ($file_name !== $imagemAntiga) {
                unlink($path . $imagemAntiga);
                move_uploaded_file($tmp_name, $path . $file_name);
                $this->servico->editarPublicacao($id, $titulo, $descricao, $file_name);
                echo "<script> alert('PUBLICAÇÃO EDITADA COM SUCESSO, NOVA IMAGEM ADICIONADA!'); </script>";
            }
        }else{
            $this->servico->editarPublicacao($id, $titulo, $descricao, $file_name);
            echo "<script> alert('PUBLICAÇÃO EDITADA COM SUCESSO, NENHUMA IMAGEM NOVA FOI ADICIONADA!'); </script>";
        }
    }

    public function buscarPublicacoes($titulo){
        return $this->servico->buscarPublicacoes($titulo);
    }
    
    public function novoDestaque() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = filter_input(INPUT_POST, 'destaque');
            $this->destaques->inserirDestaque($id);
            echo "<script> alert('DESTAQUE ADICIONADO COM SUCESSO AO SITE!'); </script>";
        }
    }

    public function todosDestaques() {
        return $this->destaques->selecionarTodosDestaques();
    }

    public function apagarDestaque($id) {
        $this->destaques->apagarDestaque($id);
    }

    public function criarFicheiro($titulo, $html) {
        $pagina = str_replace(" ", "-", $titulo); //aqui estou a criar um arquivo pra nova publicação
        $fileLocation = $_SERVER['DOCUMENT_ROOT'] . '/view/' . $pagina . '.php';
        file_put_contents($fileLocation, $html);
    }

    public function substituirFicheiro($fileLocation, $titulo) {
        $conteudo = file_get_contents($fileLocation);
        unlink($fileLocation);
        $pagina = str_replace(" ", "-", $titulo); //aqui estou a criar um arquivo pra nova publicação
        $fileLocation = $_SERVER['DOCUMENT_ROOT'] . '/view/' . $pagina . '.php';
        file_put_contents($fileLocation, $conteudo);
    }

    public function apagarPublicacao($id) {
        $path = $_SERVER['DOCUMENT_ROOT'] . '/ficheiros/imagens/';
        $imagemAntiga = $this->selecionarPublicacaoPeloId($id)->getImagem();
        unlink($path . $imagemAntiga);
        
        if($this->comentario->quantidadeDeComentarios($id) > 0){
            $this->comentario->apagarTodosComentariosDaPublicacao($id);    
        }
        
        $this->servico->apagarPublicacao($id);
        echo "<script> alert('Publicacão apagada com sucesso!'); </script>";
    }

    public function contacte() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = filter_input(INPUT_POST, 'email');
            $name = filter_input(INPUT_POST, 'nome');
            $message = filter_input(INPUT_POST, 'message');
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '20200446@isptec.co.ao';
            $mail->Password = 'Fatima1$';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('20200446@isptec.co.ao');
            //geral.lfsport@gmail.com
            $mail->addAddress("geral.lfsport@gmail.com");
            $mail->isHTML(true);
            $mail->Subject = "Nome:" . $name . "; Email: $email. Feedback vindo do site desportivo!";
            $mail->Body = $message;
            $mail->send();
            echo "<script> alert('Email enviado com sucesso'); </script>";
        }
    }

    public function tituloDaPaginaDinamica($id) {
        $pub = $this->servico->selecionarPublicacaoPeloId($id);
        return $pub->getTitulo();
    }

    public function selecionarPublicacaoPeloId($id) {
        return $this->servico->selecionarPublicacaoPeloId($id);
    }

    public function selecionarTodasPublicacoes() {
        return $this->servico->selecionarTodasPublicacoes();
    }

}
