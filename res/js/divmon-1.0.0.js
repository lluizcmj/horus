/**
 * Divmon JS.
 * 
 * @author  Mario Sakamoto <mskamot@gmail.com>
 * @license MIT http://www.opensource.org/licenses/MIT
 * @see     https://wtag.com.br/divmon
 * @version 1.0.0, 26 Jul 2014
 */

/**
 * Set attribute
 *
 * @param {Element} e Element
 * @param {String} a Attribute
 * @param {String} f Function
 */
function sA(e, a, f) {
	try {
		e.setAttribute(a, f);
	} catch(e) { }
}

/**
 * Get attribute
 *
 * @param {Element} e Element
 * @param {String} a Attribute
 * @return {String} Function
 */
function gA(e, a) {
	try {
		return e.getAttribute(a);
	} catch(e) { }
}

/**
 * Set border
 *
 * @param {Element} e Element
 * @param {String} b Border
 */
function sB(e, b) {
	try {
		e.style.border = b;
	} catch(e) { }
}

/**
 * Get border
 *
 * @param {Element} e Element
 * @return {String} Border
 */
function gB(e) {
	try {
		return e.style.border;
	} catch(e) { }
}

/**
 * Set border top
 *
 * @param {Element} e Element
 * @param {String} b Border top
 */
function sBt(e, b) {
	try {
		e.style.borderTop = b;
	} catch(e) { }	
}

/**
 * Get border top
 *
 * @param {Element} e Element
 * @return {String} Border top
 */
function gBt(e) {
	try {
		return e.style.borderTop;
	} catch(e) { }
}

/**
 * Set border right
 *
 * @param {Element} e Element
 * @param {String} b Border right
 */
function sBr(e, b) {
	try {
		e.style.borderRight = b;
	} catch(e) { }	
}

/**
 * Get border right
 *
 * @param {Element} e Element
 * @return {String} Border right
 */
function gBr(e) {
	try {
		return e.style.borderRight;
	} catch(e) { }
}

/**
 * Set border bottom
 *
 * @param {Element} e Element
 * @param {String} b Border bottom
 */
function sBb(e, b) {
	try {
		e.style.borderBottom = b;
	} catch(e) { }
}

/**
 * Get border bottom
 *
 * @param {Element} e Element
 * @return {String} Border bottom
 */
function gBb(e) {
	try {
		return e.style.borderBottom;
	} catch(e) { }
}

/**
 * Set border left
 *
 * @param {Element} e Element
 * @param {String} b Border left
 */
function sBl(e, b) {
	try {
		e.style.borderLeft = b;
	} catch(e) { }
}

/**
 * Get border left
 *
 * @param {Element} e Element
 * @return {String} Border left
 */
function gBl(e) {
	try {
		return e.style.borderLeft;
	} catch(e) { }
}

/**
 * Set class
 *
 * @param {Element} e Element
 * @param {String} c Class
 */
function sC(e, c) {
	try {
		e.className = c;
	} catch(e) { }
}

/**
 * Get class
 *
 * @param {Element} e Element
 * @return {String} Class
 */
function gC(e) {
	try {
		return e.className;
	} catch(e) { }
}

/**
 * Set display
 *
 * @param {Element} e Element
 * @param {String} d Display
 */
function sD(e, d) {
	try {
		e.style.display = d;
	} catch(e) { }	
}

/**
 * Get display
 *
 * @param {Element} e Element
 * @return {String} Display
 */
function gD(e) {
	try {
		return e.style.display;
	} catch(e) { }
}

/**
 * Set height
 *
 * @param {Element} e Element
 * @param {String} h Height
 */
function sE(e, h) {
	try {
		e.style.height = h;
	} catch(e) { }	
}

/**
 * Get height
 *
 * @param {Element} e Element
 */
function gE(e) {
	try {
		return e.style.height;
	} catch(e) { }	
}

/**
 * Get display
 *
 * @param {Element} e Element
 * @return {String} Display
 */
function gD(e) {
	try {
		return e.style.display;
	} catch(e) { }
}

/**
 * Set focus
 *
 * @param {Element} e Element
 */
function sF(e) {
	try {
		e.focus();
	} catch(e) { }
}

/**
 * Set background
 *
 * @param {Element} e Element
 * @param {String} g Background
 */
function sG(e, g) {
	try {
		e.style.background = g;
	} catch(e) { }
}

/**
 * Get background
 *
 * @param {Element} e Element
 * @return {String} Background
 */
function gG(e) {
	try {
		return e.style.background;
	} catch(e) { }
}

/**
 * Set HTML
 *
 * @param {Element} e Element
 * @param {String} h HTML
 */
function sH(e, h) {
	try {
		e.innerHTML = h;
	} catch(e) { }
}

/**
 * Get HTML
 *
 * @param {Element} e Element
 * @return {String} HTML
 */
function gH(e) {
	try {
		return e.innerHTML;
	} catch(e) { }
}

/**
 * Get id
 *
 * @param {String} i Id
 * @return {Element} Element
 */
function gI(i) {
	try {
		return document.getElementById(i);
	} catch(e) { }
}

/**
 * Get length
 *
 * @param {Element} e Element
 * @return {Integer} Length
 */
function gL(e) {
	try {
		return e.length;
	} catch(e) { }
}

/**
 * Get childs
 *
 * @param {Element} e Element
 * @param {String} c Child
 * @return {Array} Elements
 */
function gN(e, c) {
	try {
		return e.getElementsByTagName(c);
	} catch(e) { }
}

/**
 * Set color
 *
 * @param {Element} e Element
 * @param {String} o Color
 */
function sO(e, o) {
	try {
		e.style.color = o;
	} catch(e) { }	
}

/**
 * Get parent node
 *
 * @param {Element} e Element
 * @return {Element} Element
 */
function gP(e) {
	try {
		return e.parentNode;
	} catch(e) { }
}

/**
 * Set placeholder
 *
 * @param {String} e Element
 * @param {String} p Placeholder
 */
function sPh(e, p) {
	try {
		e.placeholder = p;
	} catch(e) { }	
}

/**
 * Get placeholder
 *
 * @param {String} e Element
 * @return {String} Placeholder
 */
function gPh(e) {
	try {
		return e.placeholder;
	} catch(e) { }
}

/**
 * Get classes
 *
 * @param {String} c Classes
 * @return {Array} Elements
 */
function gS(c) {
	try {
		return document.getElementsByClassName(c);
	} catch(e) { }
}

/**
 * Get tag name
 *
 * @param {String} n
 * @return {Array} Elements
 */
function gT(n) {
	try {
		return document.getElementsByTagName(n);
	} catch(e) { }
}

/**
 * Set value
 *
 * @param {Element} e Element
 * @param {String} v Value
 */
function sV(e, v) {
	try {
		e.value = v;
	} catch(e) { }
}

/**
 * Get value
 *
 * @param {Element} e Element
 * @return {String} Value
 */
function gV(e) {
	try {
		return e.value;
	} catch(e) { }
}

/**
 * Set width
 *
 * @param {Element} e Element
 * @param {String} w Width
 */
function sW(e, w) {
	try {
		e.style.width = w;
	} catch(e) { }	
}

/**
 * Get width
 *
 * @param {Element} e Element
 */
function gW(e) {
	try {
		return e.style.width;
	} catch(e) { }	
}

/**
 * Get type
 *
 * @param {Element} e Element
 * @return {String} Type
 */
function gY(e) {
	try {
		return e.type;
	} catch(e) { }
}

/**
 * Is empty.
 * 
 * @param  {Object} object 
 * @return {Boolean}
 */
function isEmpty(object) {
	return Object.keys(object).length === 0;
    /* for (var property in object) {
        if (object.hasOwnProperty(property)) {
			return false;
		}
    }
    return true; */
} 

/**
 * Initialize request.
 */
function initializeRequest() {
    if (window.XMLHttpRequest) {
        if (navigator.userAgent.indexOf("MSIE") != -1) {
            isIE = true;
		}
        return new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        isIE = true;
        try {   	
            return new ActiveXObject("Microsoft.XMLHTTP");	
        } catch(e) {
    	    try {
    	        return new ActiveXObject("Msxml2.XMLHTTP");
    	    } catch(e) { }
        }
    }
}

/**
 * Request for a service.
 *
 * @param {String} url
 * @param {Object} data JSON object
 * @param {String} callback Function name
 * @param {Boolean} convertion Convert the data to JSON string format 
 */
function simpleRequest(url, data, callback, convertion) {
	sD(gI("dv-loading"), "block");
	var request = initializeRequest();
	request.open("POST", url, true);
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
	request.onreadystatechange = function() {
		if (request.readyState == 4 && request.status == 200) {
			sD(gI("dv-loading"), "none");
			if (callback != null) {
				eval(callback + "(" + JSON.stringify(request.responseText) + ")");
			}
		} else if (request.readyState == 4 && request.status == 0) {
			sD(gI("dv-loading"), "none");
			eval(callback + "(\"CONNECTION\")");
		} else if (request.readyState == 4 && request.status == 500) {
			sD(gI("dv-loading"), "none");
			eval(callback + "(\"BAD_REQUEST\")");
		} else if (request.readyState == 4 && request.status == 404) {
			sD(gI("dv-loading"), "none");
			eval(callback + "(\"NOT_FOUND\")");
		}
	};
	request.send("data=" + (convertion ? JSON.stringify(data) : data));
}

/**
 * Request.
 *
 * @param {String} method The HTTP method
 * @param {String} uri The URI
 * @param {String} parameters The URI parameters
 * @param {String || Object} object The attributes with a JSON or Object 
 * @param {String} callback The name of function to call after response
 * @param {Boolean} convertion Convert the object to JSON string format 
 * @param {String} authorization Authorization token
 */
function request(method, uri, parameters, object, callback, convertion, authorization) {
	sD(gI("dv-loading"), "block");
	var request = initializeRequest();
	request.open(method, (parameters != "" ? (uri + "?" + parameters) : uri), true);			
	request.setRequestHeader("Authorization", authorization);
	request.setRequestHeader("Accept-Language", "pt-BR");
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
	request.onreadystatechange = function() {
		if (request.readyState == 4 && (request.status == 200 || request.status == 300 || request.status == 400)) {
			sD(gI("dv-loading"), "none");
			eval(callback + "(" + JSON.stringify(request.responseText) + ")");
		} else if (request.readyState == 4 && request.status == 500) {
			sD(gI("dv-loading"), "none");
			showMessage("Erro!", 
					"Houve um erro interno no sistema. Tente novamente mais tarde.", 
					"close-circle-line.svg", "showMessage();");					
		} else if (request.readyState == 4 && (request.status == 404 || request.status == 501 || 
				request.status == 502 || request.status == 503 || request.status == 504 || request.status == 505)) {
			sD(gI("dv-loading"), "none");
			showMessage("Erro!", 
					"Houve um erro interno no sistema. Essa funcionalidade não foi encontrada. Tente novamente mais tarde.", 
					"close-circle-line.svg", "showMessage();");				
		}
	};
	var data = "";
	if (method == "POST" || method == "PUT") {
		data = "request=" + (convertion ? JSON.stringify(object) : object);
	}
	request.send(data);
}

/**
 * Set cookie.
 * 
 * @param {String} cookieName 
 * @param {String} cookieValue 
 * @param {Integer} cookieExpirationDays 
 */
function setCookie(cookieName, cookieValue, cookieExpirationDays) {
	var date = new Date();
	date.setTime(date.getTime() + (cookieExpirationDays * 8 * 60 * 60 * 1000));
	var expires = "expires=" + date.toUTCString();
	document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";path=/";
}

/**
 * Get cookie.
 * 
 * @param {String} cookieName 
 */
function getCookie(cookieName) {
	var name = cookieName + "=";
	var cookie = "";
	var cookiesList = document.cookie.split(";");
	for (var x = 0; x < cookiesList.length; x++) {
		cookie = cookiesList[x];
		while (cookie.charAt(0) == " ") {
			cookie = cookie.substring(1);
		}
		if (cookie.indexOf(name) == 0) {
			return cookie.substring(name.length, cookie.length);
		}
	}
	return "";
}

/**
 * Remove cookie.
 * 
 * @param {String} cookieName 
 */
function removeCookie(cookieName) {
	document.cookie = cookieName + "=;expires=Thu, 01 Jan 1970;path=/";
}

/**
 * Get parameter.
 * 
 * @param  {String} uri
 * @return {Object}
 */
function getParameter(uri) {
	var parameter = uri ? uri.split("?")[1] : window.location.search.slice(1);
	var object = {};
	if (parameter) {
		parameter = parameter.split("#")[0];
		var parameterList = parameter.split("&");
		var parameterItem = [];
		var paramName = "";
		var paramValue = "";
		var key = ""
		var index = "";
		for (var x = 0; x < parameterList.length; x++) {
			parameterItem = parameterList[x].split("=");
			paramName = parameterItem[0].toLowerCase();
			paramValue = typeof (parameterItem[1]) === "undefined" ? true : parameterItem[1];
			if (paramName.match(/\[(\d+)?\]$/)) {
				key = paramName.replace(/\[(\d+)?\]/, "");
				if (!object[key]) object[key] = [];
				if (paramName.match(/\[\d+\]$/)) {
					index = /\[(\d+)\]/.exec(paramName)[1];
					object[key][index] = paramValue;
				} else {
					object[key].push(paramValue);
				}
			} else {
				if (!object[paramName]) {
					object[paramName] = paramValue;
				} else if (object[paramName] && typeof object[paramName] === "string"){
					object[paramName] = [object[paramName]];
					object[paramName].push(paramValue);
				} else {
					object[paramName].push(paramValue);
				}
			}
		}
	}
	return object;
}

/**
 * Mask Preparation.
 */
function mask() {
	var pattern = "";
	var inputs = gT("input");
	for (var x = 0; x < gL(inputs); x++) {
		if (gC(inputs[x]).indexOf("dv-datetime") > 0) {
			pattern = "__/__/____ __:__";
		} else if (gC(inputs[x]).indexOf("dv-date") > 0) {
			pattern = "__/__/____";
		} else if (gC(inputs[x]).indexOf("dv-time") > 0) {
			pattern = "__:__:__";
		} else if (gC(inputs[x]).indexOf("dv-integer") > 0) {
			sA(inputs[x], "oninput", "integer(this, event);");
		} else if (gC(inputs[x]).indexOf("dv-double") > 0) {
			sA(inputs[x], "oninput", "decimal(this, event);");
		} else if (gC(inputs[x]).indexOf("dv-cpf") > 0) {
			pattern = "___.___.___-__";
		} else if (gC(inputs[x]).indexOf("dv-phone") > 0) {
			pattern = "__ ____-____";
		} else if (gC(inputs[x]).indexOf("dv-cellphone") > 0) {
			pattern = "__ _____-____";
		} else if (gC(inputs[x]).indexOf("dv-cep") > 0) {
			pattern = "_____-___";
		}
		if (pattern != "") {
			sPh(inputs[x], pattern);
			sA(inputs[x], "oninput", "maskMe(this, event, \"" + pattern + "\");");
			sA(inputs[x], "onblur", "isMask(this, \"" + pattern + "\"); " + (gA(inputs[x], "onblur") != null ? gA(inputs[x], 
					"onblur") : ""));
		} else if (gC(inputs[x]).indexOf("dv-required") > 0) {
			sA(inputs[x], "onblur", "isNull(this); " + (gA(inputs[x], "onblur") != null ? gA(inputs[x], "onblur") : ""));
		} else if (gC(inputs[x]).indexOf("dv-datalist-") > 0 && gC(inputs[x]).indexOf("dv-non-datalist") < 0) {
			sA(inputs[x], "onblur", "isDatalist(this); " + (gA(inputs[x], "onblur") != null ? gA(inputs[x], "onblur") : ""));
		} else if (gC(inputs[x]).indexOf("gz-email") > 0) {
			sA(inputs[x], "onblur", "isEmail(this); " + (gA(inputs[x], "onblur") != null ? gA(inputs[x], "onblur") : ""));
		}
		pattern = "";
	}
	var textareas = gT("textarea");
	for (var x = 0; x < gL(textareas); x++) {
		if (gC(textareas[x]).indexOf("dv-required") > 0) {
			sA(textareas[x], "onblur", "isNull(this); " + (gA(textareas[x], "onblur") != null ? gA(textareas[x], "onblur") : ""));
		}
	}
}

/**
 * Mask effect.
 *
 * @param {Element} element
 * @param {Event} event
 * @param {String} pattern
 */
function maskMe(element, event, pattern) {
	if (parseInt(event.data) != event.data) {
		sV(element, "");
	}
	var position = [];
	var mask = [];
	for (var x = 0; x < gL(pattern); x++) {
		if (pattern.charAt(x) != "_") {
			position.push(x);
			mask.push(pattern.charAt(x));
		}
	}
	for (var x = 0; x < gL(position); x++) {
		if (gL(gV(element)) == position[x]) {
			sV(element, gV(element) + mask[x]);
		} 
		if (gL(gV(element)) > gL(pattern)) {
			sV(element, gV(element).slice(0, -1));
		}	 
	}		
}

/**
 * Mask check.
 *
 * @param {Element} element
 * @param {String} pattern
 */
function isMask(element, pattern) {
	if (element.value == "" && gC(element).indexOf("dv-required") > 0) {
		sB(element, "solid 1px #cc2b2b"); // sG(element, "#fffafa");
		sPh(element, pattern + " Campo obrigatório");
	} else {
		mask = true;
		if (gL(gV(element)) == gL(pattern)) {
			for (var x = 0; x < gL(pattern); x++) {
				if (pattern.charAt(x) == "_") {
					if (isNaN(gV(element).charAt(x))) {
						mask = false;
						break;
					}
				} else {
					if (pattern.charAt(x) != gV(element).charAt(x)) {
						mask = false;
						break;
					}
				}
			}
			if (mask) {
				if (gC(element).indexOf("dv-datetime") > 0) {
					isDatetime(element);
				} else if (gC(element).indexOf("dv-date") > 0) {
					isDate(element);
				} else {
					sB(element, ""); // sG(element, "");
					sPh(element, pattern);
				}
			} else {
				if (gC(element).indexOf("dv-required") > 0) {
					sB(element, "solid 1px #cc2b2b"); // sG(element, "#fffafa");
					sV(element, "");
					sPh(element, pattern + " Campo obrigatório");
				} else {
					sB(element, "");
					// sG(element, "");
					sV(element, "");
					sPh(element, pattern);
				}
			}
		} else {
			if (gC(element).indexOf("dv-required") > 0) {
				sB(element, "solid 1px #cc2b2b"); // sG(element, "#fffafa");
				sV(element, "");
				sPh(element, pattern + " Campo obrigatório");
			} else {
				sB(element, ""); // sG(element, "");
				sV(element, "");
				sPh(element, pattern);
			}
		}
	}
}

/**
 * Null check.
 *
 * @param {Element} element
 */
function isNull(element) {
	if (gL(gV(element)) == 0) {
		sB(element, "solid 1px #cc2b2b"); // sG(element, "#fffafa");
		sPh(element, "Campo obrigatório");
	} else {
		if (gC(element).includes("dv-datalist-") && !gC(element).includes("dv-non-datalist")) {
			isDatalist(element);
		} else if (gC(element).indexOf("dv-datetime") > 0) {
			isDatetime(element);
		} else if (gC(element).indexOf("dv-date") > 0) {
			isDate(element);
		} else if (gC(element).indexOf("dv-email") > 0) {
			isEmail(element);
		} else {
			sB(element, ""); // sG(element, "");
			sPh(element, "");
		}
	}
}

/**
 * Id datalist
 *
 * @param {Element} element
 */
function isDatalist(element) {
	if (gC(element).includes("dv-datalist-") && !gC(element).includes("dv-non-datalist")) {
		var datalist = gC(element).split("dv-datalist-")[1];
		var datalistIsValid = false;
		for (var x = 0; x < gI(datalist.split("-to-")[0]).options.length; x++) {
			if (gI(datalist.split("-to-")[0]).options[x].value == 
					document.getElementsByName(datalist.split("-to-")[1])[0].value) {
				datalistIsValid = true;
				break;
			}
		}
		if (!datalistIsValid) {
			if (gC(element).indexOf("dv-required") > 0) {
				sV(element, "");
				sB(element, "solid 1px #cc2b2b"); // sG(element, "#fffafa");
				sPh(element, "Valor inválido");
			} else {
				sV(element, "");
				sB(element, ""); // sG(element, "");
				sPh(element, "Valor inválido");
			}
		} else {
			sB(element, ""); // sG(element, "");
			sPh(element, "");
		}
	}
}

/**
 * Clear datalist.
 *
 * @param {String} id
 */
function clearDatalist(id) {
	sV(gI(id), "");
	sF(gI(id));
}

/**
 * Is datetime
 *
 * @param {Element} element
 */
function isDatetime(element) {
	if (gV(element) != "") {
		var datePattern = /^(((0[1-9]|[12][0-9]|3[01])([-.\/])(0[13578]|10|12)([-.\/])(\d{4}))|(([0][1-9]|[12][0-9]|30)([-.\/])(0[469]|11)([-.\/])(\d{4}))|((0[1-9]|1[0-9]|2[0-8])([-.\/])(02)([-.\/])(\d{4}))|((29)(\.|-|\/)(02)([-.\/])([02468][048]00))|((29)([-.\/])(02)([-.\/])([13579][26]00))|((29)([-.\/])(02)([-.\/])([0-9][0-9][0][48]))|((29)([-.\/])(02)([-.\/])([0-9][0-9][2468][048]))|((29)([-.\/])(02)([-.\/])([0-9][0-9][13579][26]))) (2[0-3]|[0-1]?[\d]):[0-5][\d]$/;
        if (datePattern.test(gV(element))) {
			sB(element, ""); // sG(element, "");
			sPh(element, "");
		} else {
			if (gC(element).indexOf("dv-required") > 0) {
				sV(element, "");
				sB(element, "solid 1px #cc2b2b"); // sG(element, "#fffafa");
				sPh(element, "Valor inválido");
			} else {
				sV(element, "");
				sB(element, ""); // sG(element, "");
				sPh(element, "Valor inválido");
			}
		}
	} else {
		sB(element, ""); // sG(element, "");
		sPh(element, "");
	}
}

/**
 * Is date
 *
 * @param {Element} element
 */
function isDate(element) {
	if (gV(element) != "") {
		var datePattern = /^(((0[1-9]|[12][0-9]|3[01])([-.\/])(0[13578]|10|12)([-.\/])(\d{4}))|(([0][1-9]|[12][0-9]|30)([-.\/])(0[469]|11)([-.\/])(\d{4}))|((0[1-9]|1[0-9]|2[0-8])([-.\/])(02)([-.\/])(\d{4}))|((29)(\.|-|\/)(02)([-.\/])([02468][048]00))|((29)([-.\/])(02)([-.\/])([13579][26]00))|((29)([-.\/])(02)([-.\/])([0-9][0-9][0][48]))|((29)([-.\/])(02)([-.\/])([0-9][0-9][2468][048]))|((29)([-.\/])(02)([-.\/])([0-9][0-9][13579][26])))$/;
        if (datePattern.test(gV(element))) {
			sB(element, ""); // sG(element, "");
			sPh(element, "");
		} else {
			if (gC(element).indexOf("dv-required") > 0) {
				sV(element, "");
				sB(element, "solid 1px #cc2b2b"); // sG(element, "#fffafa");
				sPh(element, "Valor inválido");
			} else {
				sV(element, "");
				sB(element, ""); // sG(element, "");
				sPh(element, "Valor inválido");
			}
		}
	} else {
		sB(element, ""); // sG(element, "");
		sPh(element, "");
	}
}

/**
 * Is email
 *
 * @param {Element} element
 */
function isEmail(element) {
	if (gV(element) != "") {
		var emailPattern = /\S+@\S+\.\S+/;
        if (emailPattern.test(gV(element))) {
			sB(element, ""); // sG(element, "");
			sPh(element, "");
		} else {
			if (gC(element).indexOf("dv-required") > 0) {
				sV(element, "");
				sB(element, "solid 1px #cc2b2b"); // sG(element, "#fffafa");
				sPh(element, "Valor inválido");
			} else {
				sV(element, "");
				sB(element, ""); // sG(element, "");
				sPh(element, "Valor inválido");
			}
		}
	} else {
		sB(element, ""); // sG(element, "");
		sPh(element, "");
	}
}

/**
 * Integer check.
 *
 * @param {Element} element
 * @param {Event} event
 */
function integer(element, event) {
	if (parseInt(event.data) != event.data) {
		sV(element, "");
	}	
}

/**
 * Decimal effect.
 *
 * @param {Element} element
 * @param {Event} event
 */
function decimal(element, event) {
	if (parseInt(event.data) != event.data) {
		sV(element, "");
	} else {	
		var mask = "";
		var metadata = gV(element).replace(/\,/g, "").replace(/\./g, "");	
		if (metadata.charAt(0) == "0" && metadata.charAt(1) == "0") {
			metadata = metadata.replace("00", "");
		} else if (metadata.charAt(0) == "0") {
			metadata = metadata.replace("0", "");
		}
		if (gL(metadata) == 1) {
			mask = "0,0" + metadata;
		} else if (gL(metadata) == 2) {
			mask = "0," + metadata;
		} else if (gL(metadata) == 3) {
			mask = metadata.charAt(0) + "," + metadata.charAt(1) + metadata.charAt(2);
		}			
		else if (gL(metadata) > 3) {
			var number = metadata.substring(0, (gL(metadata) - 2));
			var decimal = metadata.substring((gL(metadata) - 2), gL(metadata));
			var position = 0;
			for (var i = (gL(number) - 1); i >= 0; i--) {
				if (position == 3) {
					position = 0;
					mask = number.charAt(i) + "." + mask;
				} else {
					mask = number.charAt(i) + mask
				}
				position++;
			}
			mask = mask + "," + decimal;
		}
		sV(element, mask);
	}
}

/**
 * Decimal back space.
 *
 * @param {Element} element
 * @param {Event} event
 */
function decimalClean(element, event) {
	if (event.keyCode == 8) {
		event.returnValue = false;
		var mask = "";
		var metadata = gV(element).replace(/\,/g, "").replace(/\./g, "") + String.fromCharCode(event.keyCode);			
		var data = metadata.substring(0, (gL(metadata) - 2));
		if (data.charAt(0) == "0" && data.charAt(1) == "0") {
			data = data.replace("00", "");
		} else if (data.charAt(0) == "0") {
			data = data.replace("0", "");
		}
		if (gL(data) == 1) {
			mask = "0,0" + data;
		} else if (gL(data) == 2) {
			mask = "0," + data;
		} else if (gL(data) == 3) {
			mask = data.charAt(0) + "," + data.charAt(1) + data.charAt(2);
		}
		else if (gL(data) > 3) {
			var number = data.substring(0, (gL(data) - 2));
			var decimal = data.substring((gL(data) - 2), gL(data));
			var position = 0;
			for (var x = (gL(number) - 1); x >= 0; x--) {
				if (position == 3) {
					position = 0;
					mask = number.charAt(x) + "." + mask;
				} else {
					mask = number.charAt(x) + mask
				}
				position++;
			}
			mask = mask + "," + decimal;
		}
		sV(element, mask);
	}
}

/**
 * Check form.
 *
 * @return {Element} element
 * @return {Boolean} The Validation
 */
function validate(element) {
	var ret = true;
	if (element != undefined) {
		for (var x = 0; x < gL(element); x++) {
			if (gY(element.elements[x]) != "submit") {
				if (gB(element.elements[x]).includes("#cc2b2b") || 
						gB(element.elements[x]).includes("rgb(204, 43, 43)")) {
					if (ret) {
						sF(element.elements[x]);
					}
					ret = false;
				}
				if (gC(element.elements[x]).indexOf("dv-required") > 0) {
					if (gV(element.elements[x]) == "") {
						sB(element.elements[x], "solid 1px #cc2b2b"); // sG(element.elements[x], "#fffafa");
						if (gC(element.elements[x]).indexOf("dv-datetime") > 0) {
							sPh(element.elements[x], "__/__/____ __:__ Campo obrigatório");
						} else if (gC(element.elements[x]).indexOf("dv-date") > 0) {
							sPh(element.elements[x], "__/__/____ Campo obrigatório");
						} else if (gC(element.elements[x]).indexOf("dv-time") > 0) {
							sPh(element.elements[x], "__:__:__ Campo obrigatório");
						} else if (gC(element.elements[x]).indexOf("dv-cpf") > 0) {
							sPh(element.elements[x], "___.___.___-__ Campo obrigatório");
						} else if (gC(element.elements[x]).indexOf("dv-phone") > 0) {
							sPh(element.elements[x], "(__) _-____-____ Campo obrigatório");
						} else if (gC(element.elements[x]).indexOf("dv-cellphone") > 0) {
							sPh(element.elements[x], "(__) _-____-____ Campo obrigatório");
						} else if (gC(element.elements[x]).indexOf("dv-cep") > 0) {
							sPh(element.elements[x], "_____-___ Campo obrigatório");
						} else {
							sPh(element.elements[x], "Campo obrigatório");
						}
						if (ret) {
							sF(element.elements[x]);
						}
						ret = false;
					}
				}
			}
		}
	} else {
		ret = false;
	}
	return ret;
}

/* 
 * File controller.
 *
 * @param {Element} file
 * @param {Boolean} isImage
 */
function fileController(file, isImage = false) {
	if (file.files.length > 0) { // To-do isEmpty.
		if (file.files[0].size <= 10000000) { // To-do var maxUploadSize = 10 * 1000000;.
			selectionFileController(file, isImage);
		} else {
			alert("Atenção! Só é permitido arquivo com até 10MB de tamanho."); // To-do showMessage();.
			sV(gI(file.id + "-base64"), "");
			clearSelectedFile(file.id);
		}
	}
}

/**
 * Selection file controller.
 *
 * @param {Element} file
 * @param {Boolean} isImage
 */
function selectionFileController(file, isImage) {
	if (isImage) {
		var fileExtension = file.files[0].name.split(".").pop();
		if (fileExtension.toLowerCase() == "jpg" || fileExtension.toLowerCase() == "jpeg" || 
				fileExtension.toLowerCase() == "png") {	
			var fileReader = new FileReader();
			fileReader.readAsDataURL(file.files[0]);
			fileReader.onloadend = function(fileReaderEvent) {
				gI("dv-preview-image-" + file.id).src = fileReaderEvent.target.result;
				sD(gI("dv-preview-" + file.id), "block");
				convertFileToBase64(file);
				setSelectedFile(file.id);
			}
		} else {
			alert("Atenção! Só são aceitos os formatos de imagem: jpg, jpeg ou png.");	
			sV(gI(file.id + "-base64"), "");
			clearSelectedFile(file.id);
		}
	} else {
		convertFileToBase64(file);
		setSelectedFile(file.id);
	}
}

/**
 * Set selected file.
 *
 * @param {String} fileId
 */
function setSelectedFile(fileId) {
	sD(gI("dv-clear-selected-file-" + fileId), "");
	sG(gI(fileId + ".label"), "#00695c");
	sB(gI(fileId + ".label"), "solid 1px #00695c");
	sO(gI(fileId+ ".label"), "#ffffff");
	sC(gI(fileId + ".label.span"), "dv-input-file-label-fill");
}

/**
 * Clear selected file.
 *
 * @param {String} fileId
 */
function clearSelectedFile(fileId) {
	let dvPreviewImageFileId = gI("dv-preview-image-" + fileId);
	if (dvPreviewImageFileId) {
		dvPreviewImageFileId.src = "";
	}
	let dvPreviewFileId = gI("dv-preview-" + fileId);
	if (dvPreviewFileId) {
		sD(dvPreviewFileId, "none");		
	}
	sD(gI("dv-clear-selected-file-" + fileId), "none");
	gI(fileId + ".label").style = "";
	sC(gI(fileId + ".label.span"), "dv-input-file-label-empty");
	gI(fileId).value = "";
}

/* 
 * Convert file to base64.
 *
 * @param {Element} file
 * @return {String}
 */
function convertFileToBase64(file) {
	if (file.files.length > 0) {
		var fileReader = new FileReader();
		fileReader.readAsDataURL(file.files[0]);
		fileReader.onload = function() {
			sV(gI(file.id + "-base64"), fileReader.result);
		}
	}
}

/**
 * Convert image to base64.
 *
 * @param {Element} file
 * @return {String}
 */
function convertImageToBase64(file) {
	if (file.files.length > 0) {	
		var fileReader = new FileReader();
		fileReader.readAsDataURL(file.files[0]);
		fileReader.onloadend = function(fileReaderEvent) {
			var tempImage = new Image();
			tempImage.src = fileReaderEvent.target.result;
			setTimeout(function() {
				var height = tempImage.height;
				var width = tempImage.width;
				if (height > 640) {
					width = width / (height / 640);
					height = 640;
				}
				if (width > 640) {
					height = height / (width / 640);
					width = 640;
				}
				var canvas = document.createElement("canvas");
				canvas.width = width;
				canvas.height = height;
				var ctx = canvas.getContext("2d");
				ctx.drawImage(tempImage, 0, 0, width, height);
				sV(gI(file.id + "-base64"), canvas.toDataURL("image/jpeg"));
			}, 200);
		}
	}
}

/**
 * Get data list id.
 *
 * @param  {String} listName
 * @param  {String} objectName
 * @return {Integer} id
 */
function getDataListId(listName, objectName) {
	var id;
	for (var x = 0; x < gI(listName).options.length; x++) {
		if (gI(listName).options[x].value == document.getElementsByName(objectName)[0].value) {
			id = gI(listName).options[x].getAttribute("data-id");
			break;
		}
	}
	return id;
}

/**
 * Get location.
 *
 * @param  {Element} element
 * @return {Integer} location
 */
function getLocation(element){
	var location = 0;
	if (element.offsetParent) {
		do {
			location += element.offsetTop;
		} while (element = element.offsetParent);
	}
	return location;
}

/**
 * Move to.
 *
 * @param {String} id
 */
function moveTo(id) {
	window.scrollTo(0, getLocation(gI(id)));
}

/**
 * Move to down.
 *
 * @param {String} id
 */
function moveToDown(id) {
	var location = getLocation(gI(id)) - window.pageYOffset;
	var until = 0;
	var forever = window.setInterval(
		function() {
			window.scrollBy(0, 10);
			until += 10;
			if (until > location) {
				clearInterval(forever);
				window.scrollBy(0, (until - location) * -1);
			}
		}, 1
	);
}

/**
 * Move to home.
 */
function moveToTop() {
	var location = window.pageYOffset;
	var until = 0;
	var forever = window.setInterval(
		function() {
			if (until > location) {
				clearInterval(forever);
			}
			window.scrollBy(0, -10);
			until += 10;
		}, 1
	);
}

/**
 * Show menu.
 */
function showMenu() {
	if (gD(gI("dv-menu")) == "none") {
		sD(gI("dv-menu"), "block");
	} else {
		sD(gI("dv-menu"), "none");
	}
}

/**
 * Show search.
 */
function showSearch() {
	if (gD(gI("dv-search")) == "none") {
		sD(gI("dv-search"), "block");
		sF(gI("search"));
	} else {
		sD(gI("dv-search"), "none");
	}
}

/**
 * Password controller.
 *
 * @param {Object} element
 */
function passwordController(element) {
	var type = gI(element).type;
	if (type == "password") {
		gI(element).type = "text";
		gI(element + ".image").src = dv_root + "/res/img/icon/gray-hide.svg";
		sC(gI(element + ".text"), "dv-underline dv-blue");
		sH(gI(element + ".text"), "Esconder");
	} else {
		gI(element).type = "password";
		gI(element + ".image").src = dv_root + "/res/img/icon/gray-see.svg";
		sC(gI(element + ".text"), "dv-underline dv-blue");
		sH(gI(element + ".text"), "Mostrar");
	}
}

/**
 * Show message.
 */
function showMessage(title, text, icon, handler) {
	if (gD(gI("dv-message")) == "none") {
		sH(gI("dv-message-title"), title);
		sH(gI("dv-message-text"), text);
		gI("dv-message-icon").src = dv_root + "/res/img/icon/" + icon;
		if (handler != null) {
			gI("dv-message-handler").onclick = function() { 
				eval(handler);
			}
		}
		sD(gI("dv-message"), "block");
		if (title == "Confirmação!") {
			sF(gI("dv-no"));
		} else {
			sF(gI("dv-close-message"));
		}
	} else {
		sD(gI("dv-message"), "none");
	}
}

/**
 * Go to link.
 *
 * @param {String} link
 */
function goTo(link) {
	location.href = dv_root + link;
}

/**
 * Go To Link With Target Blank
 *
 * @param {String} link
 */
function goToBlank(link) {
	window.open(link);
}

/**
 * Set slide.
 *
 * @param {Integer} id
 */
function setSlide(id) {
	slidePosition = id;
	for (var x = 0; x < total; x++) {
		if (x == id) {
			sD(gI("dv-slide-" + id), "block");
			gI("dv-selected-" + x).src = dv_root + "/res/img/icon/fill-circle.svg";
		} else {
			sD(gI("dv-slide-" + x), "none");
			gI("dv-selected-" + x).src = dv_root + "/res/img/icon/circle.svg";
		}
	}	
}

/**
 * Set back slide.
 */
function setBackSlide() {
	slidePosition--;
	if (slidePosition < 0) {
		slidePosition = total - 1;
	}
	for (var x = 0; x < total; x++) {
		if (x == slidePosition) {
			sD(gI("dv-slide-" + slidePosition), "block");
			gI("dv-selected-" + x).src = dv_root + "/res/img/icon/fill-circle.svg";
		} else {
			sD(gI("dv-slide-" + x), "none");
			gI("dv-selected-" + x).src = dv_root + "/res/img/icon/circle.svg";
		}
	}	
}

/**
 * Set next slide.
 */
function setNextSlide() {
	slidePosition++;
	if (slidePosition > (total - 1)) {
		slidePosition = 0;
	}
	for (var x = 0; x < total; x++) {
		if (x == slidePosition) {
			sD(gI("dv-slide-" + slidePosition), "block");
			gI("dv-selected-" + x).src = dv_root + "/res/img/icon/fill-circle.svg";
		} else {
			sD(gI("dv-slide-" + x), "none");
			gI("dv-selected-" + x).src = dv_root + "/res/img/icon/circle.svg";
		}
	}	
}

/*
 * Show form.
 */
function showForm() {
	sD(gI("dv-form-controller-title"), "block");
	sD(gI("dv-form-controller"), "block");
	sD(gI("dv-form-controller-cancel"), "block");
}

/*
 * Controller response.
 *
 * @param {String} json 
 */
function controllerResponse(json) {
	var response = JSON.parse(json);
	if (response.length > 0) {
		if (response[0]["message"] == "success") {
			sD(gI("dv-message"), "none");
			showMessage("Sucesso!", "A operação foi concluída com sucesso.<br><button type=\"button\" id=\"dv-close-message\" class=\"dv-auto-width dv-margin-top-mdpi dv-padding-mdpi dv-white-bg dv-border dv-radius dv-blue dv-underline dv-cursor\" onclick=\"location.reload();\"><img class=\"dv-vertical-align-middle dv-margin-right-ldpi\" src=\"" + 
					dv_root + "/res/img/icon/gray-close-circle-line.svg\" width=16>Fechar a mensagem</button>", "green-check-circle-line.svg", "location.reload();");
		} else {
			sD(gI("dv-message"), "none");
			showMessage("Erro!", "Houve algum erro interno no sistema.<br><button type=\"button\" id=\"dv-close-message\" class=\"dv-auto-width dv-margin-top-mdpi dv-padding-mdpi dv-white-bg dv-border dv-radius dv-blue dv-underline dv-cursor\" onclick=\"showMessage();\"><img class=\"dv-vertical-align-middle dv-margin-right-ldpi\" src=\"" + 
					dv_root + "/res/img/icon/gray-close-circle-line.svg\" width=16>Fechar a mensagem</button>", "red-close-circle-line.svg", "showMessage();");		
		}
	} else {
		sD(gI("dv-message"), "none");
		showMessage("Erro!", "Atenção! Houve algum erro interno no sistema.<br><button type=\"button\" id=\"dv-close-message\" class=\"dv-auto-width dv-margin-top-mdpi dv-padding-mdpi dv-white-bg dv-border dv-radius dv-blue dv-underline dv-cursor\" onclick=\"showMessage();\"><img class=\"dv-vertical-align-middle dv-margin-right-ldpi\" src=\"" + 
					dv_root + "/res/img/icon/gray-close-circle-line.svg\" width=16>Fechar a mensagem</button>", "red-close-circle-line.svg", "showMessage();");		
	}
}