/**
 * Getz JS.
 * 
 * @author  Mario Sakamoto <mskamot@gmail.com>
 * @license MIT http://www.opensource.org/licenses/MIT
 * @see     https://wtag.com.br/getz
 * @version 1.0.0, 26 Jul 2014
 */

/**
 * Go to back page.
 */
function goBack() {
	var page = (gz_position * 1) - 1;
	if (page < 1) {
		page = 1;
	}
	toPage(page);
}

/**
 * Go to next page.
 *
 * @param {Integer} size
 */
function goNext(size) {
	var page = (gz_position * 1) + 1;
	if (page >= Math.ceil(size / gz_itensPerPage)) {
		goLast(size);
	} else {
		toPage(page);
	}
}

/**
 * Go to last page.
 *
 * @param {Integer} size
 */
function goLast(size) {
	if (size > gz_itensPerPage) {
		var zero = "";
		var page = 0;
		for (var i = gL("" + size); i <= gL("" + size); i++) {
			zero += "0"; 
		}
		var end = (Math.ceil(size / gz_itensPerPage)) + zero;
		page = end - 10; /* !important 10 */
		page = (page / 10) + 1;
		toPage(page);
	}
}

/**
 * To page.
 *
 * @param {Integer} page
 */
function toPage(page) {	
	if (gz_base != "") {
		if (gz_search != "") {
			if (gz_order != "") {
				goTo("/" + gz_screen + "/called/" + 
						gz_base + "/search/" + gz_search + "/" + page + "/" + gz_order + "/historyBack/" + gz_historyBack);
			} else {
				goTo("/" + gz_screen + "/called/" +
						gz_base + "/search/" + gz_search + "/" + page + "/historyBack/" + gz_historyBack);
			}
		} else {
			if (gz_order != "") {
				goTo("/" + gz_screen + "/called/" +  
						gz_base + "/" + page + "/" + gz_order + "/historyBack/" + gz_historyBack);	
			} else {
				goTo("/" + gz_screen + "/called/" +  
						gz_base + "/" + page + "/historyBack/" + gz_historyBack);	
			}
		}	
	} else if (gz_friendly != "") { 
		if (gz_order != "") {
			goTo("/" + gz_screen + "/" + gz_friendly + "/order/" + gz_order + "/" + page);		
		} else {
			goTo("/" + gz_screen + "/" + gz_friendly + "/" + page);	
		}
	} else {
		if (gz_search != "") {
			if (gz_order != "") {
				goTo("/" + gz_screen + "/search/" + gz_search + "/order/" + gz_order + "/" + page);	
			} else {
				goTo("/" + gz_screen + "/search/" + gz_search + "/" + page);
			}
		} else {
			if (gz_order != "") {
				goTo("/" + gz_screen + "/order/" + gz_order + "/" + page);		
			} else {
				goTo("/" + gz_screen + "/" + page);
			}
		}
	}
}

/**
 * Pagination controller.
 */
function paginationController() {
	var position = parseInt(gz_position);
	var pages = parseInt(gz_pages);
	if (position == 1) {
		sD(gI("gz-first"), "none");
	} else {
		sD(gI("gz-first"), "inline-block");
	}
	if (position == pages) {
		sD(gI("gz-last"), "none");
	} else {
		sD(gI("gz-last"), "inline-block");
	}
	if (position > 2) {
		sD(gI("gz-back"), "inline-block");
		sH(gI("gz-back"), parseInt(position) - 1);
	}
	if (position < pages - 1) {
		sD(gI("gz-next"), "inline-block");
		sH(gI("gz-next"), position + 1);
	}
	sD(gI("gz-pagination"), "block");
}