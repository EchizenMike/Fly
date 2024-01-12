	/**

* @description js原生获取cookie方法1

* @param {String} name 你要获取的cookie名

*/

function getCookie(name) {

　　if (document.cookie.length > 0) {

　　　　var start = document.cookie.indexOf(name + '=');

　　　　if (start !== -1) {

　　　　　　start = start + name.length + 1;

　　　　　　var end = document.cookie.indexOf(';', start);

　　　　　　if (end === -1) {

　　　　　　　　end = document.cookie.length;

　　　　　　　　return unescape(document.cookie.substring(start, end));

　　　　　　}
　　　}

　　}

　　return '';
}

function setCookie(name, value, expiredays) {

var exdate=new Date();

exdate.setDate(exdate.getDate() + expiredays);

document.cookie = name + '=' + escape(value)+ ((expiredays == null) ? '' : ';expires=' +exdate.toGMTString());
}
function clearCookie(name) {     
    setCookie(name, "", -1); 
}