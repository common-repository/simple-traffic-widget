var xmlhttp;
if (window.XMLHttpRequest)
  xmlhttp=new XMLHttpRequest();
else
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

function stw_show (stat, plugin_url, blog_url) {

  document.getElementById("stw_stats_title").innerHTML = '<img src="'+plugin_url+'" title="Loading Stats" alt="Loading Stats" border="0">';
  xmlhttp.onreadystatechange=stw_change_stat;
  xmlhttp.open("GET",blog_url+"/wp-admin/admin-ajax.php?action=stwstats&reqstats="+stat,true);
  xmlhttp.send(); 
}

function stw_change_stat () {

  if (xmlhttp.readyState==4 && xmlhttp.status==200) {

     var rt = xmlhttp.responseText;
     var stwdata = rt.split('~');
     document.getElementById("stw_stats_title").innerHTML = stwdata[0];
     document.getElementById("stw_lds").innerHTML = stwdata[1];
     document.getElementById("stw_lws").innerHTML = stwdata[2];
     document.getElementById("stw_lms").innerHTML = stwdata[3];

  }
}
