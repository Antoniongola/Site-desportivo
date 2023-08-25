-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Ago-2023 às 21:02
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `kissengonews`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `fk_publicacao` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `autor` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`id`, `fk_publicacao`, `comentario`, `autor`) VALUES
(1, 7, 'neymar estragou a sua carreira.                                    \r\n                                ', 'Antonio Ngola'),
(2, 7, 'Que tudo corra bem quando ele recuperar da lesão                                    \r\n                                ', 'Edson Wena');

-- --------------------------------------------------------

--
-- Estrutura da tabela `destaques`
--

CREATE TABLE `destaques` (
  `id` int(11) NOT NULL,
  `fk_publicacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `destaques`
--

INSERT INTO `destaques` (`id`, `fk_publicacao`) VALUES
(1, 3),
(4, 5),
(2, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacao`
--

CREATE TABLE `publicacao` (
  `titulo` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(200) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `publicacao`
--

INSERT INTO `publicacao` (`titulo`, `descricao`, `imagem`, `id`) VALUES
('Clube anuncia decisão no ‘caso’ Mason Greenwood', 'Está concluído o processo de investigação interno aberto pelo Manchester United a Mason Greenwood, suspenso há mais de um ano depois de ter acusado de tentativa de violação, agressão e conduta controladora sobre uma antiga companheira, acusações que foram, em fevereiro, retiradas pela justiça. A decisão foi anunciada esta segunda-feira, em comunicado.\r\n\r\n\r\n«Todos os envolvidos, incluindo Mason, reconhecem as dificuldades para recomeçar a carreira no Manchester United. Deste modo, foi mutuamente acordado que o mais apropriado seria fazê-lo longe de Old Trafford. Agora estamos a trabalhar com Mason para obter esse resultado», pode ler-se na nota divulgada pelo clube.\r\n\r\n\r\nO Manchester United sustenta que, ao longo do processo, tentou obter o «máximo de informação possível» e que «teve em consideração os desejos, direitos e perspetiva da suposta vítima, bem como os padrões e valores do clube».\r\n\r\n\r\n«Com base nas evidências disponíveis, concluímos que os conteúdos publicados online não deram uma imagem correta da realidade e que Mason não cometeu os crimes de que foi inicialmente acusado. Dito isto, como Mason reconhece agora publicamente, cometeu erros pelos quais está a assumir a responsabilidade», acrescentam os red devils.\r\n\r\n\r\nEstão, assim, abertas as portas de saída de Old Trafford para Mason Greenwood, avançado de 21 anos que fez todo o percurso de formação no clube.', 'masongreenwood.jpg', 3),
('A mensagem de Greenwood', 'Depois do Manchester United ter anunciado a decisão de rescindir contrato por mútuo acordo com o avançado Mason Greenwood, que no ano passado foi acusado de tentativa de violação e agressão pelo ministério público britânico, sendo absolvido de todas as acusações em fevereiro deste ano, o avançado de 21 anos emitiu uma declaração pública a justificar a saída do Manchester, assumindo erros no relacionamento que manteve apesar de ter sido ilibado.\r\n\r\n\r\nGreenwood entende que a sua continuidade em Manchester seria uma distração por todo o contexto que o envolveu nos últimos meses, pelo que a saída é a melhor decisão para todas as partes.\r\n\r\n\r\nLeia o comunicado de Mason Greenwood na íntegra:\r\n\r\n\r\n«Quero começar por dizer que compreendo que as pessoas me julguem pelo que viram e ouviram nas redes sociais e sei que vão pensar o pior. Fui criado a aprender que a violência ou o abuso em qualquer relacionamento é errado, não fiz as coisas de que me acusaram e, em fevereiro, fui absolvido de todas as acusações. No entanto, aceito plenamente que cometi erros no meu relacionamento e assumo a minha quota de responsabilidade pelas situações que levaram ao post nas redes sociais. Estou a aprender a entender as minha responsabilidade de dar um bom exemplo como jogador de futebol profissional e estou focado na grande responsabilidade de ser pai, além de um bom companheiro. A decisão de hoje faz parte de um processo de colaboração entre o Manchester United, a minha família e eu. A melhor decisão para todos nós é continuar a minha carreira no futebol longe de Old Trafford, onde a minha presença não será uma distração para o clube. Agradeço ao clube pelo apoio desde que cheguei aos sete anos. Haverá sempre uma parte de mim que será do United. Estou imensamente grato à minha família e a todos os meus entes queridos pelo apoio, e agora cabe-me retribuir a confiança que as pessoas ao meu redor demonstraram. Pretendo ser um jogador de futebol melhor, mas, mais importante, um bom pai, uma pessoa melhor, e usar meus talentos de uma forma positiva dentro e fora do campo.»', 'MasonGreenwood1.jpg', 4),
('Leão tenta dar passo definitivo', 'O Sporting continua a jogar em dois tabuleiros na procura por um reforço para a lateral direita e centra atenções em Iván Fresneda sem perder de vista o italiano Alessandro Zanoli.\r\n\r\n\r\nSegundo apurou a A BOLA, o  espanhol é mesmo o alvo principal dos leões e os responsáveis verde e brancos vão continuar a insistir nas negociações com os homólogos do Valladolid na tentativa de encontrar uma base de entendimento que permita o acelerar das negociações e a vinda do lateral espanhol, de apenas 18 anos, para Alvalade.\r\n\r\n\r\nEste é agora um dossiê prioritário para os responsáveis leoninos, mesmo sabendo que, à semelhança do que sucedeu com Viktor Gyokeres ou com Morten Hjulmand, também Iván Fresneda será alvo de longas e duras negociações.\r\n\r\n\r\nMas o Sporting acredita que até quarta-feira as negociações podem evoluir positivamente e Fresneda ficar definitivamente mais perto  de ser reforço para Rúben Amorim.\r\n\r\n\r\nOs responsáveis leoninos têm consciência que vão ter de abrir os cordões à bolsa - a cláusula de rescisão do jogador é de 20 milhões de euros - e já sabem também que os responsáveis do clube espanhol vão tentar o melhor negócio possível por necessitarem de dinheiro fresco para investir no plantel na tentativa de regressar rapidamente à La Liga. Mas jogam com outros trunfos para acelerar esse entendimento, como os milhões a receber por Gonzalo Plata ou a possibilidade de incluir jogadores nas negociações.\r\n\r\n\r\nDepois de não ter sido opção para o técnico Paulo Pezzolano nos dois primeiros compromissos, nomeadamente frente ao Saragoça e Sp. Gijón para tratar do seu futuro, Iván Fresneda regressou ontem aos treinos com o plantel, continuando expectante em relação ao seu futuro profissional que não passará pelos pucelas.\r\n\r\n\r\nA imprensa espanhola avançava esta segunda-feira que o Barcelona tinha saído da corrida pelo jovem lateral por estar a fechar a contratação do internacional português João Cancelo, mas ao mesmo tempo dava conta de que o milionário Chelsea, que mantém interesse em entrar o capital social da SAD leonina, tinha entrado no corrida,  com o intuito de contratar o jogador para o emprestar a outro clube.\r\n\r\n\r\nA verdade é que os leões continuam muito bem posicionados na corrida por Fresneda. E acreditam que nas próximas 24 horas as negociações podem conhecer... luz verde.                \r\n            ', 'fresneda.jpg', 5),
('Otávio vai ganhar €42 M em três épocas!', 'Otávio conclui esta terça-feira exames médicos no Al Nassr e deverá ser apresentado pelos sauditas em breve. O FC Porto encaixa 60 milhões de euros, pagos pelo Al Nassr em três parcelas, de 20 milhões de euros cada, sendo que os azuis e brancos recebem a primeira tranche de imediato.\r\nDe referir que as versões desencontradas em relação ao ordenado líquido que Otávio vai auferir se devem ao caráter crescente do salário.\r\n\r\n\r\nNo primeiro ano, o internacional português vai receber 13 milhões de euros limpos, no segundo 14 e no último 15, perfazendo o total de 42 milhões de euros.\r\n\r\n\r\nUma proposta irrecusável tanto para o FC Porto como para o médio de 28 anos. \r\n            ', 'otavioporto2.jpg', 6),
('Lesão adia estreia de Neymar', 'Foi a contratação mais cara (€90 milhões) e a que maior expetativa gerou no futebol árabe neste defeso, porém, os adeptos do Al Hilal vão ter de esperar para ver Neymar em campo. O internacional brasileiro chegou a Riade com problemas físicos e deverá ficar afastado da competição durante, pelo menos, um mês.\r\n\r\nSegundo um relatório médico do clube, Neymar encontra-se a cumprir trabalho de ginásio para debelar duas lesões no quadricípite direito, ambas no músculo reto femoral. Uma das lesões poderá ser tratada num curto espaço de tempo, porém, a outra deverá demorar um mês a tratar, já que afeta o tendão e causou um edema.\r\n\r\nO departamento médico do Al Hilal vai continuar a acompanhar a evolução do avançado, de 31 anos, e marcou mais exames para quinta-feira. Certo é que, a confirmar-se o tempo de paragem, Neymar só estará disponível para o jogo com o Damac FC, a 20 de setembro, para a 7.ª jornada da Premier League saudita.', 'neymardr1.jpg', 7);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_publicacao` (`fk_publicacao`);

--
-- Índices para tabela `destaques`
--
ALTER TABLE `destaques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_publicacao` (`fk_publicacao`);

--
-- Índices para tabela `publicacao`
--
ALTER TABLE `publicacao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `destaques`
--
ALTER TABLE `destaques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `publicacao`
--
ALTER TABLE `publicacao`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`fk_publicacao`) REFERENCES `publicacao` (`id`);

--
-- Limitadores para a tabela `destaques`
--
ALTER TABLE `destaques`
  ADD CONSTRAINT `destaques_ibfk_1` FOREIGN KEY (`fk_publicacao`) REFERENCES `publicacao` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
