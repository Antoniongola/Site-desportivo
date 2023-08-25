<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ComentarioController
 *
 * @author Ngola
 */
include_once '/xampp/htdocs/kissengonews/model/comentarioservice.php';
include_once '/xampp/htdocs/kissengonews/model/publicacaoservice.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '/xampp/htdocs/kissengonews/PHPMailer/src/Exception.php';
require_once '/xampp/htdocs/kissengonews/PHPMailer/src/PHPMailer.php';
require_once '/xampp/htdocs/kissengonews/PHPMailer/src/SMTP.php';

class ComentarioController {
    //put your code here
    
    private $comentarioS = NULL;
    private $publicacaoS = NULL;
    function __construct() {
        $this->comentarioS = new ComentarioService();
        $this->PublicacaoS = new PublicacaoService();
    }
    
    public function fazerComentario($fk_publicacao){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $comentario = filter_input(INPUT_POST, 'comentario');
            $name = filter_input(INPUT_POST, 'nome');
            $this->comentarioS->comentar($fk_publicacao, $comentario, $name);
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '20200446@isptec.co.ao';
            $mail->Password = 'Fatima1$';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('20200446@isptec.co.ao');
            $mail->addAddress("kissengonews@gmail.com");
            $mail->isHTML(true);
            $mail->Subject ='Comentário do(a) '. $name. 'na publicação: ';
            $mail->Body = $comentario;
            $mail->send();
            echo "<script> alert('Comentário adicionado com sucesso!'); </script>";
        }
    }
    
    public function verTodosComentariosDaPublicacao($id){
        return $this->comentarioS->selecionarTodosComentariosDeUmaPublicacao($id);
    }
    
    public function quantidadeDeComentarios($id){
        return count($this->verTodosComentariosDaPublicacao($id));
    }
}
