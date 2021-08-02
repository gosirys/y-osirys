function init() {
    var pg_toload;
    var str = window.location.search;//alert("str "+str);
	var path = window.location.pathname;//alert("path "+path);
	var current_hash = window.location.hash;//alert("hash "+current_hash);
	var pg;
	//path = path.replace(/\/y\//, "");//alert("path2 "+path);
	if ((str.length < 1)&&(path.length <= 1)) {
		pg = "nullz";

	}
	else if ((str.length < 1)&&(path.length > 0)) {
		//alert("url rewrite, path: "+path);
		pg = path.replace(/\/*([^/]+)\/$/, "$1");
	}
	else if ((path.length <= 1)&&(str.length > 0)) {
		//alert("url rewrite no, str: "+str);
		pg = str.replace(/(index\.php)*\?page=(.+)/, "$2");
	}
	else {
		//alert("pg fail");

	}


	//alert("pg "+pg);


    //var pg = str.replace(/\?page=(.+)/, "$1");
    if ((pg == 'nullz')||(pg == 'home')) {//alert("roba di home");
          //document.getElementById("container_l_menu").style.display = "none";
          //document.getElementById("container_l_statiscs").style.display = "none";
          marq();
    }

//(path.match(/\/web_services|security_services\/$/))
     if (path.match(/web_services|security_services|about_me/)) {//alert("jjj");
          if (document.getElementById("insert_pm")) {
               document.getElementById("insert_pm").style.display = "none";
          }
     }//alert(path);

     if (path.match(/id[0-9]+/)) {//alert("jjj");
          if (document.getElementById("insert_comment")) {
               document.getElementById("insert_comment").style.display = "none";
          }
          if (document.getElementById("comments_show")) {
               document.getElementById("comments_show").style.display = "none";
          }
     }


     /*
     if (!path.match(/id[0-9]+/)) {//alert("jjj");


     if (document.getElementById("opt_bar")) {
          document.getElementById("opt_bar").style.display = "none";
     }

     if (document.getElementById("jwplayer")) {
          document.getElementById("jwplayer").style.display = "none";
     }
     if (document.getElementById("comments_show")) {
          document.getElementById("comments_show").style.display = "none";
     }

     if (document.getElementById("insert_comment")) {
          document.getElementById("insert_comment").style.display = "none";
     }
	}*/
	/*
     if (document.getElementById("insert_pm")) {
          document.getElementById("insert_pm").style.display = "none";
     }*/

     //if (pg.length > 1) {//alert("mm");}
     //alert(current_hash);
     //var regex = /#subsec=([^&]+)&id=([^&]+)&pg=([^&]+)(.*)/i;
     var regex = /#subsec=([^&]+)(&id=)*([^&]*)(&pg=)*([^&]*)(.*)/i;
     var tpage,id,pag;//alert("pj "+pg);
     if ((tpage = regex.exec(current_hash))&&(pg.length > 1)) {//alert("uuu");
          var pr;
          //if (tpage[4] != null) {
		if (tpage[6] != null) {
               pr = tpage[6];
               pr = pr.replace(/^&/, ",");
          }
          //pg_toload = "page="+pg+",subsec="+tpage[1]+",id="+tpage[2]+",pg="+tpage[3]+pr;//alert(pg_toload);
          if (tpage[2] != null) {//alert(tpage[2]+" non null");
			if (tpage[3] != null) {//alert(tpage[3]+" non null");
				id = ",id="+tpage[3];
			}
			else {
				id = "";
			}
		}
		else {
			id = "";
		}
		if (tpage[4] != null) {//alert(tpage[4]+" non null");
			if (tpage[5] != null) {//alert(tpage[5]+" non null");
				pag = ",pg="+tpage[5];
			}
			else {
				pag = "";
			}
		}
		else {
			pag = "";
		}
          pg_toload = "page="+pg+",subsec="+tpage[1]+id+pag+pr;//alert(pg_toload);exit;
          loadPage(pg_toload,"get",1);
     }else {//alert("n");
     }

     //else {
     //     pg_toload = "page=home,subsec=null,id=null,pg=null,title=homepage";
     //}
     //loadPage(pg_toload,"get",1);

}



function loader(meth) {
	var stat;
	if (meth == 0) {
		stat = "none";
	}
	else if (meth == 1) {
		stat = "block";
	}

	if (document.getElementById("loading")) {
		document.getElementById("loading").style.display = stat;
		lo = document.getElementById("loading").style.display;
		//alert("lo: "+lo);
	}
	if (document.getElementById("loading_pan")) {
		document.getElementById("loading_pan").style.display = stat;
				lo = document.getElementById("loading").style.display;
		//alert("lo "+lo);
	}
}


function marq(parz) {
     delayb4scroll = 1000;
     marqueespeed  = 1;
     pauseit       = 1;
     pausespeed = (pauseit == 0) ? copyspeed: 0;
     if (parz == 'marqueespeed') {
          copyspeed = marqueespeed;
     }
     else if (parz == 'pausespeed') {
          copyspeed = pausespeed;
     }
     else {
          copyspeed = marqueespeed;
     }
     actualheight='';
     initializemarquee();
}

function scrollmarquee(){
     if (parseInt(cross_marquee.style.top) > (actualheight*(-1)+8)) {
          //alert(parseInt(cross_marquee.style.top));
          cross_marquee.style.top = parseInt(cross_marquee.style.top)-copyspeed+"px";
     }
     else {//alert("bnn "+parseInt(marqueeheight)+8);
          cross_marquee.style.top = parseInt(marqueeheight)+8+"px";
          //cross_marquee.style.top = "25px";
     }
}

function initializemarquee(){//alert("hhh");
     cross_marquee = document.getElementById("home_middle_r_cont2");
     cross_marquee.style.top= 0;
     marqueeheight = document.getElementById("home_middle_r_cont").offsetHeight;//alert(marqueeheight);
     actualheight = cross_marquee.offsetHeight;
     //if (window.opera || navigator.userAgent.indexOf("Netscape/7")!=-1){ //if Opera or Netscape 7x, add scrollbars to scroll and exit
     //     cross_marquee.style.height = marqueeheight+"px";
     //     cross_marquee.style.overflow = "scroll";
     //     return;
     //}//setInterval("scrollmarquee()",1000);
     setTimeout('lefttime=setInterval("scrollmarquee()",30)', delayb4scroll)
}

function sendComment(par,spage,id,z) {
     var author  = par.author.value;
     var email   = par.email.value;
     var content = par.content.value;
     var string  = "(author)"+author+"(/a)(email)"+email+"(/e)(content)"+content+"(/c)(z)"+z+"(/z)";
     par.sendcomment.disabled = true;
     par.reset();
     showElement('comments_show','insert_comment');
     loadPage("subsec="+spage+",id="+id+",com="+string,"post");
     showElement('comments_show','insert_comment');
     return false;
}

function sendPm(par) {
     var author  = par.author.value;
     var email   = par.email.value;
     var subject   = par.subject.value;
     var content = par.content.value;
     var string  = "(author)"+author+"(/a)(email)"+email+"(/e)(subject)"+subject+"(/s)(content)"+content+"(/c)";
     par.sendcomment.disabled = true;
     par.reset();
     showElement('insert_pm');
     loadPage("subsec=zzz,id=zzz,com="+string,"post");
     showElement('insert_pm');
     return false;
}


function validateForm(par,what) {
     var stat = 1;
     par.sendcomment.disabled = true;
     var author,email,subject,content;
     if (what == "pm") {
          author = par.elements[0].value;
          email = par.elements[1].value;
          subject = par.elements[2].value;
          content = par.elements[3].value;
     }
     else {
          author = par.elements[0].value;
          email = par.elements[1].value;
          content = par.elements[2].value;
     }

     if ((author == "")||(author == "undefined")) {
          stat = 0;
     }
     else if ((email == "")||(email == "undefined")||(email.search(/^\w+((-\w+)|(\.\w+))*\@\w+((\.|-)\w+)*\.\w+$/) == -1)) {
          stat = 0;
     }

     else if (((subject == "")||(subject == "undefined"))&&(what == "pm")) {
          stat = 0;
     }

     else if ((content == "")||(content == "undefined")) {
          stat = 0;
     }
     if (stat == 1) {
          par.sendcomment.disabled = false;
     }

}



function loadPage(vars,req,ah) {//alert(vars);
	//loadingPanel.show("Processing...");
	//ajaxloadingpanel.init();
	//ajaxloadingpanel.show();
	loader(1);

	//var pg = str.replace(/\?page=(.+)/, "$1");


	var str = window.location.search;//alert("str "+str);
	var path = window.location.pathname;//alert("path "+path);
	var current_hash = window.location.hash;//alert("hash "+current_hash);
	var pg;
	//path = path.replace(/\/y\//, "");


	if ((str.length < 1)&&(path.length <= 1)) {
		pg = "nullz";

	}
	else if ((str.length < 1)&&(path.length > 0)) {
		//alert("url rewrite, path: "+path);
		pg = path.replace(/\/*([^/]+)\/$/, "$1");
	}
	else if ((path.length <= 1)&&(str.length > 0)) {
		//alert("url rewrite no, str: "+str);
		pg = str.replace(/(index\.php)*\?page=(.+)/, "$2");
	}
	else {
		//alert("pg fail");

	}

     //alert(ah);
     waiter(1);
     if (ah == 1) {
          //alert(vars+"  req "+req);
     }
//document.location.href = "adminFoto.php?lg=lg&ripristino=" + pic2;

     if (document.getElementById("container_l_aboutA")) {
          //document.getElementById("container_l_aboutA").style.display = "none";
     }
     if (document.getElementById("container_l_aboutB")) {
          //document.getElementById("container_l_aboutB").style.display = "none";
     }
     if (document.getElementById("opt_bar")) {
          //document.getElementById("opt_bar").style.display = "none";
     }
     if (document.getElementById("opt_bar_i")) {
          //document.getElementById("opt_bar_i").style.display = "none";
     }
     if (document.getElementById("jwplayer")) {
          document.getElementById("jwplayer").style.display = "none";
     }
     if (document.getElementById("comments_show")) {
          document.getElementById("comments_show").style.display = "none";
     }

     if (document.getElementById("insert_comment")) {
          document.getElementById("insert_comment").style.display = "none";
     }
     if (document.getElementById("insert_pm")) {
          document.getElementById("insert_pm").style.display = "none";
     }
     var tpage,regex,id,idd,pag,pagg;

     if (req == "get") {
          if (ah == null) {
               //regex = /page=([^,]+),subsec=([^,]+),id=([^,]+),pg=([^,]+),meta=(.+)/i;
               regex = /page=([^,]+),subsec=([^,]+)(,id=)*([^,]*)(,pg=)*([^,]*),meta=(.+)/i;
          }
          else {
               //regex = /page=([^,]+),subsec=([^,]+),id=([^,]+),pg=([^,]+)(.*)/i;
               regex = /page=([^,]+),subsec=([^,]+)(,id=)*([^,]*)(,pg=)*([^,]*)(.*)/i;
          }
     }
     else if (req == "post") {
          regex = /subsec=([^,]+),id=([^,]+),com=(.+)/i;
     }
     tpage = regex.exec(vars);
	//alert("tpage 1 "+tpage[1]+" tpage 2 "+tpage[2]+" tpage 3 "+tpage[3]+" tpage 4 "+tpage[4]+" tpage 5 "+tpage[5]+" tpage 6 "+tpage[6]+" tpage 7 "+tpage[7]);
     if (req == "get") {//alert("merda");
          var meta;
          var t = 0;
          if (document.getElementsByTagName) {
               var ptitle;
               if (ah == null) {//alert("meta "+tpage[7]);
                    if (tpage[7] != "off") {//alert(vars);
                         var regex = /\(1\)(.*)\(\/1\)\(2\)(.*)\(\/2\)\(3\)(.*)\(\/3\)/;
                         var tags = regex.exec(tpage[7]);
                         var pdescription = tags[1];
                         var pkeywords    = tags[2];
                         ptitle       = tags[3];
                         // parte per modificare i meta tag .. forse è inutile in quanto nessun crawler mai li leggerà :D
                         /*
                         metad = document.getElementsByTagName('meta')[1].content;alert(metad);
                         metak = document.getElementsByTagName('meta')[2].content;

                         if (metad) {
                              metad.content = pdescription;
                         }
                         if (metak) {
                              metak.content = pkeywords;
                         }
                         */
                    }
                    else {
                         t = 1;
                    }
               }
               else {
                    if (tpage[7].length > 0) {//alert("a");
                         pr = tpage[7];//alert(pr);
                         pr = pr.replace(/^,title=/, "");
                         ptitle = pr;
                    }
                    else {
                         t = 1;
                    }
                    //ptitle = tpage[5];
               }
          }
          if (t == 1) {
               var page1 = tpage[1].replace(/_/g, " ");
               var page2 = tpage[2].replace(/_/g, " ");
               document.title = "y-Osirys > "+page1+" > "+page2;
          }
          else {
               var page1 = tpage[1].replace(/_/g, " ");
               var page2 = tpage[2].replace(/_/g, " ");
               ptitle = ptitle.replace(/_/g, " ");
               document.title = "y-Osirys > "+page1+" > "+page2+" > "+ptitle;
          }

          if (tpage[3] != null) {
			if (tpage[4] != null) {
				id = ",id="+tpage[4];
				idd = id;
			}
			else {
				id = ",id=null";
				idd = "";
			}
		}
		else {
			id = ",id=null";
			idd = "";
		}
		if (tpage[5] != null) {
			if (tpage[6] != null) {
				pag = ",pg="+tpage[6];
				pagg = pag;
			}
			else {
				pag = ",pg=null";
				pagg = "";
			}
		}
		else {
			pag = ",pg=null";
			pagg = "";
		}//alert("!subsec="+tpage[2]+idd+pagg+pz);
		var pz;
          if (ah == null) {

               if (t == 1) {
                    pz = "";
               }
               else {
                    pz = ",title="+ptitle;
               }
               //window.location.hash = "!subsec="+tpage[2]+idd+pagg+pz;
          }

	if ((pg == 'nullz')||(pg == 'home')) {//alert("ok");
		var regex = /subsec=([^,]+)(,id=)*([^,]*)(,pg=)*([^,]*)(.*)/i;
		var tm;
//web_apps|softwares|s-softwares
//articles|videos|s-articles|s-videos
//live_auditing|exploits|softwares|articles|videos
		if (tm = regex.exec(vars)) {
			if (/web_apps|softwares|s-softwares/.test(tm[1])) {
				document.location.href = "/softwares/#subsec="+tm[1]+idd+pagg+pz;
			}
			else if (/articles|videos|s-articles|s-videos/.test(tm[1])) {
				document.location.href = "/documents/#subsec="+tm[1]+idd+pagg+pz;
			}
			else if (/live_auditing|exploits|softwares|articles|videos/.test(tm[1])) {
				document.location.href = "/security/#subsec="+tm[1]+idd+pagg+pz;
			}
		}
	}
          if (ah == null) {
			window.location.hash = "subsec="+tpage[2]+idd+pagg+pz;
		}
     }
     var page;
     var string;
     if (req == "get") {
          var pars = escape("page="+tpage[1]+",subsec="+tpage[2]+id+pag);//alert(pars);
          page = "http://localhost:8888/y-osirys-local/show_content.php?params="+pars;//alert(page);
          string = "null";
     }
     else if (req == "post") {
          page = "http://localhost:8888/y-osirys-local/show_content.php";
          var par1 = encodeURIComponent(tpage[1]);
          var par2 = encodeURIComponent(tpage[2]);
          var par3 = encodeURIComponent(tpage[3]);
          string = "post=1&subsec="+par1+"&id="+par2+"&com="+par3;
     }

     var xhr_ok = 0;

     if (window.XMLHttpRequest) {
          var xhr_ok = 1;
          var xhr = new XMLHttpRequest();
     }
     else if (window.ActiveXObject){ // if IE
          try {
               var xhr_ok = 1;
               var xhr = new ActiveXObject("Msxml2.XMLHTTP");
          }
          catch (e){
               try {
                    var xhr_ok = 1;
                    var xhr = new ActiveXObject("Microsoft.XMLHTTP");
               }
               catch (e){}
          }
     }

     if (xhr_ok == 1) {
          var c = 0;
	  var b = 0;
          xhr.open(req, page, false);
          if (req == "post") {
               xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
          }
     /*
     xhr.onreadystatechange = function() {

          if(xhr.readyState == 4 && xhr.status == 200){//alert("a");
			c++;alert("aumentato c :"+c);
               var response = xhr.responseText;
               if(response) {
                    elaborate(response);
               }
          }else {
			b++;alert("aumentato b :"+b);
		}
		//loader(0);
     }
     */
          xhr.send(string);
	  var response = xhr.responseText;
	  if(response) {
		elaborate(response);
	  }//alert(response);
	  //alert("fine");
	  loader(0);
	  //ajaxloadingpanel.hide();
	  //alert("c "+c+"   b: "+b);
     }
     else {
          loader(0);
     }


}


function waiter(s) {
     if (document.getElementById("waiter")) {
          if (s == 1) { // mostra loading
               document.getElementById("waiter").style.display = "block";
          }
          else if (s == 0) { // nasconde loading
               document.getElementById("waiter").style.display = "none";
          }
     }
     //else { alert("sass");}
}


function elaborate(response) {//alert(response);
     var regex = /\[([a-z_]+)\]([^\[\]]*)/g;
     var piece;
     var q;
     while (piece = regex.exec(response)) {
          var div_name    = piece[1];
          var div_content = piece[2];
          var div_content = div_content.replace(/_!_!!_!/g, "\[");
          var div_content = div_content.replace(/!_!!_!_/g, "\]");
          if (document.getElementById(div_name)) {//alert (div_name+"  trovato e ci piazzo "+div_content);
               if ((document.getElementById(div_name).style.display == "none")&&((div_name.match(/opt_bar/))||(div_name.match(/container_l_menu/))||(div_name.match(/container_l_statiscs/)))){//alert (div_name+"  t0rovato");
                    document.getElementById(div_name).style.display = "block";
               }
               if (div_content.length < 1) {
				document.getElementById(div_name).style.display = "none";
			}

               //alert("jj");
               document.getElementById(div_name).innerHTML = div_content;//alert("nn");
          }
          else {
               /*
               if ((div_name == 'container_l_menu')||(div_name == 'container_l_statistics')) {
                    if (div_name == 'container_l_menu') {
                         if (document.getElementById('container_l_aboutA')) {
                              document.getElementById('container_l_aboutA').innerHTML = div_content;
                         }
                    }



               }*/
               //alert(div_name+" non trovato");
          }
     }
}


function showElement(unk) {
     var displ_butt = 0;
     for(var i = 0; i < arguments.length; i++) {
          if ((arguments[i] == "insert_comment")||(arguments[i] == "insert_comment_")||(arguments[i] == "insert_pm")) {
               displ_butt = 1;
          }
          if (document.getElementById(arguments[i]).style.display == "none"){
               document.getElementById(arguments[i]).style.display = "block";
          }
          else {
               document.getElementById(arguments[i]).style.display = "none";
          }
     }
     if (displ_butt == 1) {
          if (document.getElementById("insert_comment")) {
               document.insert_comment.sendcomment.disabled = true;
          }
          else if (document.getElementById("insert_pm")) {
               document.insert_pm.sendcomment.disabled = true;
          }
     }
}
