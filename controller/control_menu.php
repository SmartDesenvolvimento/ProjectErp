<?php
if (isset ( $_GET ['menu'] )) {
	
	$menu = $_GET ['menu'];
} else {
	
	$menu = "Comando Não Encontrado";
}
/*
 * if (isset ( $_GET ['acao'] )) {
 *
 * $acao = $_GET ['acao'];
 * } else {
 *
 * $acao = "Comando N�o Encontrado";
 * }
 */
switch ($menu) {
	case 'home':
	{
		include_once ('view/body/home.php');
		break;
	}

	case 'clientelistar' :
	{
		include ('view/cliente/cliente_lista.php');
		break;
	}
	case 'clientecadastro' :
	{
		include_once ('view/cliente/cliente_cadastro.php');
		break;
	}
	case 'cliente_editar' :
	{
		include ('../cliente/cliente_editar.php');
		break;
	}
	case 'fornecedor' :
		{
			include ('../fornecedor/fornecedor_lista.php');
			break;
		}
	case 'fornecedorcadastro':
			{
				include('../fornecedor/fornecedor_cadastro.php');
				break;
			}
	case 'estoque' :
		{
			include ('../estoque/estoque_lista.php');
			break;
		}
	case 'venda' :
		{
			include ('../venda/venda_lista.php');
			break;
		}

	case 'usuario_cadastro' :
	{
		include ('view/usuario/usuario_cadastro.php');
		break;
	} 
	case 'usuario_lista' :
	{
		include ('view/usuario/usuario_lista.php');
		break;
	}
	case 'usuario_editar' :
		{
			include ('../funcionario/funcionario_editar.php');
			break;
		}
		case 'produto_lista' :
			{
				include ('../produto/produto_lista.php');
				break;
			}
	case 'produto_editar' :
			{
				include ('../produto/produto_editar.php');
				break;
			}			
	case 'fornecedor_editar' : {
		include ('../fornecedor/fornecedor_editar.php');
		break;
	}

	case 'fornecedor_excluir' : {
		include ('../model/fornecedor/fornecedor_excluir.php');
		break;
	}

	case 'create_sale' : {
		include ('../venda/create_sale.php');
		break;
	}

	case 'add_product_sale' : {
		include ('../venda/add_product_sale.php');
		break;
	}

	case 'produto_cadastro' : {
		include ('../produto/produto_cadastro.php');
		break;
	}

	case 'criar_recebimento' : {
		include ('../recebimento/criar_recebimento.php');
		break;
	}
	
	case 'add_item_recebimento' : {
		include ('../recebimento/recebimento_item.php');
		break;
	}

	case 'termoCompromisso' : {
		include ('view/termo/termoCompromisso.php');
		break;
	}
	
}


if (isset ( $_GET ['acao'] )) {
	
	$acao = $_GET ['acao'];
} else {
	
	$acao = "Comando Não Encontrado";
}

switch ($acao) {
	case 'home' :
		{
			include ('../../model/fornecedor.php');
			break;
		}
}
?>