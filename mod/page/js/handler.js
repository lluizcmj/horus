/**
 * Handler.
 * 
 * @author  Mario Sakamoto <mskamot@gmail.com>
 * @license MIT http://www.opensource.org/licenses/MIT
 * @see     https://wtag.com.br/getz
 * @version 1.0.0, 26 Jul 2014
 */
 
window.onload = handler;

function handler() {
	mask();
	eval(gz_screen + "HDL();");
	if (!navigator.cookieEnabled) {
		alert("Atenção! É necessário ativar o cookie do navegador para que o website funcione corretamente!");
	} else {	
		if (getCookie("cookie") == "") {
			sD(gI("dv-cookie"), "block");
		}	
	}
}

/*
 * Insert your code here.
 */
function alterar_a_minha_senhaHDL() { }

function ativar_a_minha_contaHDL() { }

function criar_uma_contaHDL() { }

function esqueci_a_minha_senhaHDL() { }

function homeHDL() { }

function inicioHDL() { }

function politica_de_privacidadeHDL() { }

function termos_de_usoHDL() { }