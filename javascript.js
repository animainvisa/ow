var request;

function ajax_request()
{
	if (window.XMLHttpRequest)
		{ return new XMLHttpRequest(); }

	if (window.ActiveXObject)
		{ return new ActiveXObject("Microsoft.XMLHTTP"); }

	return false;
}

function rcal(mntime, id)
{
	if (request = ajax_request())
	{
		var url = "ajax/rcalendar.php?tm=" + mntime + "&i=" + id.match(/[\d]+/);

		request.open("GET", url, true);

		request.onreadystatechange = function()
		{
			if (request.readyState == 4 && request.status == 200)
				{ document.getElementById(id).innerHTML = request.responseText; }
		}

		request.send(null);
	}
}

function ecal(mntime)
{
	if (request = ajax_request())
	{
		var url = "ajax/ecalendar.php?tm=" + mntime;

		request.open("GET", url, true);

		request.onreadystatechange = function()
		{
			if (request.readyState == 4 && request.status == 200)
				{ document.getElementById("e_calendar").innerHTML = request.responseText; }
		}

		request.send(null);
	}
}

function fcal(mntime, id)
{
	if (request = ajax_request())
	{
		var url = "ajax/fcalendar.php?tm=" + mntime;

		if (id == "calfrom")
			{ url += "&c=0"; }
		else if (id == "calto")
			{ url += "&c=1"; }

		request.open("GET", url, true);

		request.onreadystatechange = function()
		{
			if (request.readyState == 4 && request.status == 200)
				{ document.getElementById(id).innerHTML = request.responseText; }
		}

		request.send(null);
	}
}

/**/

function bookmoredives()
{
	var reservations, i, lchild, nchild, ref, tmp, cvalue, nvalue;

	reservations = document.getElementById("reservations");

	for (i = reservations.childNodes.length; i > 0 ; i--)
	{
		if (reservations.childNodes[i-1].nodeType == 1)
		{
			lchild = reservations.childNodes[i-1];
			break;
		}
	}

	nchild = lchild.cloneNode(true);

	ref = nchild.getElementsByTagName("input");

	for (i = 0; i < ref.length; i++)
	{
		tmp = ref[i].getAttribute("name");

		cvalue = tmp.match(/[\d]+/);

		nvalue = parseInt(cvalue) + 1;

		ref[i].setAttribute("name", tmp.replace(/[\d]+/, nvalue.toString()));
	}

	nchild.innerHTML = nchild.innerHTML.replace(/date_[\d]+/g, "date_" + nvalue.toString());
	nchild.innerHTML = nchild.innerHTML.replace(/unavailability_[\d]+/g, "unavailability_" + nvalue.toString());

	reservations.appendChild(nchild);
}

function dblock(id) { document.getElementById(id).style.display = "block"; }

function dnone(id) { document.getElementById(id).style.display = "none"; }

/**/

function setlanguage(value)
{
	var date = new Date();

	// setting one year after
	date.setTime(date.getTime() + 31536000000);

	window.document.cookie = "lang=" +value+ ";expires=" +date.toUTCString()+ ";path=/";

	window.location.reload();
}

/**/

var _0xe577=["\x73\x70\x61\x6D\x66\x72\x65\x65","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x69\x6E\x70\x75\x74","\x63\x72\x65\x61\x74\x65\x45\x6C\x65\x6D\x65\x6E\x74","\x74\x79\x70\x65","\x68\x69\x64\x64\x65\x6E","\x73\x65\x74\x41\x74\x74\x72\x69\x62\x75\x74\x65","\x6E\x61\x6D\x65","\x69\x64","\x61\x70\x70\x65\x6E\x64\x43\x68\x69\x6C\x64"];var _0x82ac=[_0xe577[0],_0xe577[1],_0xe577[2],_0xe577[3],_0xe577[4],_0xe577[5],_0xe577[6],_0xe577[7],_0xe577[8],_0xe577[9]];function f(_0xbdbcx3){if(document[_0x82ac[1]](_0x82ac[0])===null){var _0xbdbcx4=document[_0x82ac[3]](_0x82ac[2]);_0xbdbcx4[_0x82ac[6]](_0x82ac[4],_0x82ac[5]);_0xbdbcx4[_0x82ac[6]](_0x82ac[7],_0x82ac[0]);_0xbdbcx4[_0x82ac[6]](_0x82ac[8],_0x82ac[0]);_0xbdbcx3[_0x82ac[9]](_0xbdbcx4);} ;} ;

