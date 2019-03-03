var email = 'taroeclipse@gmail.com';
function renderButton() {
	var n = document.getElementById("partner").options.selectedIndex;
	email = document.getElementById("partner").options[n].text;
	gapi.hangout.render('placeholder', {
		'render' : 'createhangout',
		'invites' : [ {
			id : email,
			invite_type : 'EMAIL'
		} ]
	});
}
function startAjax() {
	var n = document.getElementById("lesson").options.selectedIndex;
	var lesson = document.getElementById("lesson").options[n].text;
	var request;

	if (window.XMLHttpRequest)
		request = new XMLHttpRequest();
	else if (window.ActiveXObject)
		request = new ActiveXObject("Microsoft.XMLHTTP");
	else
		return;

	request.onreadystatechange = function() {
		//print_console(request.status+"="+request.readyState+"<br/>")
		if (request.status == 200 && request.readyState == 4) {
			document.getElementById("result").innerHTML = request.responseText;
		}
	};

	var file = "lessons/" + lesson + ".html";
	//file = 'http://ru.html.net/tutorials/html/lesson6.php';
	//print_console(file+"<br/>");
	request.open('GET', file, true);
	request.send('');
}
function print_console(text) {
	document.getElementById("result").innerHTML += text;
}