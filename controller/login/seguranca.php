<?php
/**
 * Sistema de segurança com acesso restrito
 *
 * Usado para restringir o acesso de certas páginas do seu site
 *
 * @author Thiago Belem <contato@thiagobelem.net>
 * @link http://thiagobelem.net/
 *
 * @version 1.0
 * @package SistemaSeguranca
 */
// Configurações do Script
// ==============================
$_SG ['conectaServidor'] = true; // Abre uma conexão com o servidor MySQL?
$_SG ['abreSessao'] = true; // Inicia a sessão com um session_start()?
$_SG ['caseSensitive'] = false; // Usar case-sensitive? Onde 'thiago' é diferente de 'THIAGO'
$_SG ['validaSempre'] = true; // Deseja validar o usuário e a senha a cada carregamento de página?
                             // Evita que, ao mudar os dados do usuário no banco de dado o mesmo contiue logado.
$_SG ['paginaLogin'] = '../../index.php'; // Página de login
$_SG ['tabela'] = 'USUARIO'; // Nome da tabela onde os usuários são salvos
                            // ==============================
                            // ======================================
                            // ~ Não edite a partir deste ponto ~
                            // ======================================
                            // Verifica se precisa fazer a conexão com o MySQL
                            // if ($_SG['conectaServidor'] == true) {
                            // $_SG['link'] = mysqli_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha']) or die("MySQL: Não foi possível conectar-se ao servidor [".$_SG['servidor']."].");
                            // mysqli_select_db($_SG['banco'], $_SG['link']) or die("MySQL: Não foi possível conectar-se ao banco de dados [".$_SG['banco']."].");
                            // }
                            
// Incluir conex�o com o banco



// Verifica se precisa iniciar a sessão
// if ($_SG['abreSessao'] == true)
session_start ();
/**
 * Função que valida um usuário e senha
 *
 * @param string $usuario
 *        	- O usuário a ser validado
 * @param string $senha
 *        	- A senha a ser validada
 *        	
 * @return bool - Se o usuário foi validado ou não (true/false)
 *        
 */



function validaUsuario($usuario, $senha) {
	global $_SG;
	// global $conexao;
	$mysqli = new Conexao();
	
	$cS = ($_SG ['caseSensitive']) ? 'BINARY' : '';
	// Usa a função addslashes para escapar as aspas
	$nusuario = addslashes ( $usuario );
	$nsenha = addslashes ( $senha );
	// Monta uma consulta SQL (query) para procurar um usuário
	$sql = "SELECT `CODIGO_USUARIO`,`NOME`, `SENHA` FROM `" . $_SG ['tabela'] . "` WHERE  `CODIGO_USUARIO` = '" . $nusuario . "' AND  `senha` = '" . $nsenha . "' LIMIT 1";
	
	//echo $sql;
	
	//$query = $mysqli_query($conexao,$sql);	
	//$resultado = mysqli_fetch_assoc ($query );
	$result = $mysqli->query($sql);
	// Verifica se encontrou algum registro
	if (empty ( $resultado )) {
		// Nenhum registro foi encontrado => o usuário é inválido
		return false;
	} else {
		// Definimos dois valores na sessão com os dados do usuário
		$_SESSION ['usuarioID'] = $resultado ['id']; // Pega o valor da coluna 'id do registro encontrado no MySQL
		$_SESSION ['usuarioNome'] = $resultado ['nome']; // Pega o valor da coluna 'nome' do registro encontrado no MySQL
		$_SESSION ['logado'] = true;
		// Verifica a opção se sempre validar o login
		if ($_SG ['validaSempre'] == true) {
			// Definimos dois valores na sessão com os dados do login
			$_SESSION ['usuarioLogin'] = $usuario;
			$_SESSION ['usuarioSenha'] = $senha;
		}
		return true;
	}
}
/**
 * Função que protege uma página
 */
function protegePagina() {
	global $_SG;
	if (! isset ( $_SESSION ['usuarioID'] ) or ! isset ( $_SESSION ['usuarioNome'] )) {
		// Não há usuário logado, manda pra página de login
		expulsaVisitante ();
	} else if (! isset ( $_SESSION ['usuarioID'] ) or ! isset ( $_SESSION ['usuarioNome'] )) {
		// Há usuário logado, verifica se precisa validar o login novamente
		if ($_SG ['validaSempre'] == true) {
			// Verifica se os dados salvos na sessão batem com os dados do banco de dados
			if (! validaUsuario ( $_SESSION ['usuarioLogin'], $_SESSION ['usuarioSenha'] )) {
				// Os dados não batem, manda pra tela de login
				expulsaVisitante ();
			}
		}
	}
}
/**
 * Função para expulsar um visitante
 */
function expulsaVisitante() {
	global $_SG;
	// Remove as variáveis da sessão (caso elas existam)
	unset ( $_SESSION ['usuarioID'], $_SESSION ['usuarioNome'], $_SESSION ['usuarioLogin'], $_SESSION ['usuarioSenha'] );
	// Manda pra tela de login
	header ( "Location: " . $_SG ['paginaLogin'] );
}