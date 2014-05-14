<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Description" content="Sample program for every language available on Compileone - You can compile and run, execute your source code in more than 15 programming languages like Java, C, C++, Pascal,PHP, Perl, Ruby and Python,Haskell,Pike programs online using your browser." />
<meta name="Keywords" content="Samples,Examples,codes,Unix, Web, Compile, Run, Java, C, C++, PHP, Perl, Ruby,Haskell,Pike and Python Programs" />
<base href="http://www.compileone.com/" />

<title>Samples</title>
<link href="assets/css/bootstrap-with-responsive-1200-only.css" rel="stylesheet" type="text/css" />
<link href="assets/css/compileone.css" rel="stylesheet" type="text/css" />
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
<link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="logo/favicon.ico"/>
<style type="text/css">
         .navbar-inner{
			 background:#F4F4F4;
				font-size:14px;
				height:40px;
			 }
			 .navbar-inner > a:hover{color:#666;}

		#ul_langs{
	list-style: none;
	padding-left: 0px;
	margin: 0px;
	margin-bottom: 15px;
}
#ul_langs li{
	float: left;
	line-height: 25px;
	margin-right: 10px;
	text-transform: lowercase;
}
.source-view{
	margin-bottom: 20px;
}




.source-view .content pre > ol{
	margin-left: 30px;
	margin-bottom: 0px;
}

.source-view .header{
	/*border-bottom: 1px solid #ddd;*/
}
.source-view .header .lang{
	padding-top: 10px;
}
.source-view .header.private{
	border: 2px solid red;
}
.source-view .header.private span.private{
	color: red;
}

.source-view .footer{
	
}

</style>

</head>

<body>

<?php
   if(file_exists("functions.php")) include("functions.php"); else exit;
   session_start();

if(isset($_GET['operation'])) {
	try {
		$rslt = null;
		switch($_GET['operation']) {
			case 'logout':
				logout();
				break;
			default:
				throw new Exception('Unsupported operation: ' . $_GET['operation']);
				break;
		}
		header('Content-Type: application/json; charset=utf8');
		echo json_encode($rslt);
	}
	catch (Exception $e) {
		header($_SERVER["SERVER_PROTOCOL"] . ' 500 Server Error');
		header('Status:  500 Server Error');
		echo $e->getMessage();
	}
	die();
}



   	if(isset($_SESSION['username']))
	{	
		include('header-logout.php'); 
	}
	else
	{
		include('header.php'); 
	}
 ?>
<script>
	$('#signout').click(function(){
		 	$.get('?operation=logout',function(dt){window.location = "index.php";});

		});

	$("#drop-sign").click(function(){
				$('#response').text(""); 
				var username = $('#username').val();
				var password = $('#password').val();
				var remember = $('#remember').is(':checked')
				$.post('login.php', {'todo':'login','username':username,'password':password,'remember':remember},function(dt){  
									if(dt == "true")
									{
										window.location = "home.php"; 
									}
									else
									{
										window.location = "login.php"; 
									} 
									 });
					return false;
	
				});
</script>

<div class="container">
<div class="row">
<div class ="span9">
<p>Below you will find a sample program for every language available on Compileone.</p>
<ul id="ul_langs">
	<li>go to: </li>
	<li><a class="sample_langs_link" href="#sample_lang_104">AWK (gawk)</a></li>
	<li><a class="sample_langs_link" href="#sample_lang_105">AWK (mawk)</a></li>
	<li><a class="sample_langs_link" href="#sample_lang_28">Bash</a></li>
	<li><a class="sample_langs_link" href="#sample_lang_12">Brainf**k</a></li>
	<li><a class="sample_langs_link" href="#sample_lang_11">C</a></li>
	<li><a class="sample_langs_link" href="#sample_lang_27">C#</a></li>
	<li><a class="sample_langs_link" href="#sample_lang_41">C++ 4.3.2</a></li>
	<li><a class="sample_langs_link" href="#sample_lang_1">C++ 4.8.1</a></li>
	<li><a class="sample_langs_link" href="#sample_lang_21">Haskell</a></li>
	<li><a class="sample_langs_link" href="#sample_lang_10">Java</a></li>
	<li><a class="sample_langs_link" href="#sample_lang_35">JavaScript (rhino)</a></li>
	<li><a class="sample_langs_link" href="#sample_lang_22">Pascal (fpc)</a></li>
	<li><a class="sample_langs_link" href="#sample_lang_2">Pascal (gpc)</a></li>
	<li><a class="sample_langs_link" href="#sample_lang_3">Perl</a></li>
	<li><a class="sample_langs_link" href="#sample_lang_29">PHP</a></li>
	<li><a class="sample_langs_link" href="#sample_lang_19">Pike</a></li>
	<li><a class="sample_langs_link" href="#sample_lang_4">Python</a></li>
	<li><a class="sample_langs_link" href="#sample_lang_116">Python 3</a></li>
	<li><a class="sample_langs_link" href="#sample_lang_17">Ruby</a></li>
	<li style="float: none;" class="clear"></li>
<br/><br/>
							
	</ul>
							
				
							
								<div class="source-view ">
					<div class="header">
						<span class="lang" id="sample_lang_104">AWK (gawk) (gawk-3.1.6)</span>
						<span class="pull-right"><a href="sample/compileone_4P5dPw.awk"><i class="icon-download-alt"></i> download</a>&nbsp;&nbsp;&nbsp;</span>
					</div>
					<div class="content">
						<style type="text/css"></style><pre class="c"><ol><li class="li1"><div class="de1">BEGIN <span class="br0">{</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1"><span class="br0">}</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1"><span class="br0">{</span></div></li><li class="li1"><div class="de1">	num <span class="sy0">=</span> $<span class="nu19">1</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1">	<span class="kw1">if</span><span class="br0">(</span>num <span class="sy0">==</span> <span class="nu0">42</span><span class="br0">)</span></div></li><li class="li1"><div class="de1">		<a href="http://www.opengroup.org/onlinepubs/009695399/functions/exit.html"><span class="kw3">exit</span></a><span class="sy0">;</span></div></li><li class="li1"><div class="de1">	<span class="kw1">else</span></div></li><li class="li1"><div class="de1">		<a href="http://www.opengroup.org/onlinepubs/009695399/functions/printf.html"><span class="kw3">printf</span></a><span class="br0">(</span><span class="st0">"%d<span class="es1">\n</span>"</span><span class="sy0">,</span> num<span class="br0">)</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1"><span class="br0">}</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1">END <span class="br0">{</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1"><span class="br0">}</span></div></li></ol></pre>
					</div>
				</div>
								<div class="source-view ">
					<div class="header">
						<span class="lang" id="sample_lang_105">AWK (mawk) (mawk-1.3.3)</span>
						<span class="pull-right"><a href="sample/compileone_eqs3E2.awk"><i class="icon-download-alt"></i> download</a>&nbsp;&nbsp;&nbsp;</span>
					</div>
					<div class="content">
						<style type="text/css"><!--/**
 * GeSHi (C) 2004 - 2007 Nigel McNie, 2007 - 2008 Benny Baumann
 * (http://qbnz.com/highlighter/ and http://geshi.org/)
 */
.c  {font-family:monospace;color: #000066;}
.c a:link {color: #000060;}
.c a:hover {background-color: #f0f000;}
.c .head {font-family: Verdana, Arial, sans-serif; color: #808080; font-size: 70%; font-weight: bold;  padding: 2px;}
.c .imp {font-weight: bold; color: red;}
.c .kw1 {color: #b1b100;}
.c .kw2 {color: #000000; font-weight: bold;}
.c .kw3 {color: #000066;}
.c .kw4 {color: #993333;}
.c .co1 {color: #666666; font-style: italic;}
.c .co2 {color: #339933;}
.c .coMULTI {color: #808080; font-style: italic;}
.c .es0 {color: #000099; font-weight: bold;}
.c .es1 {color: #000099; font-weight: bold;}
.c .es2 {color: #660099; font-weight: bold;}
.c .es3 {color: #660099; font-weight: bold;}
.c .es4 {color: #660099; font-weight: bold;}
.c .es5 {color: #006699; font-weight: bold;}
.c .br0 {color: #009900;}
.c .sy0 {color: #339933;}
.c .st0 {color: #ff0000;}
.c .nu0 {color: #0000dd;}
.c .nu6 {color: #208080;}
.c .nu8 {color: #208080;}
.c .nu12 {color: #208080;}
.c .nu16 {color:#800080;}
.c .nu17 {color:#800080;}
.c .nu18 {color:#800080;}
.c .nu19 {color:#800080;}
.c .me1 {color: #202020;}
.c .me2 {color: #202020;}
.c span.xtra { display:block; }
.ln, .ln{ vertical-align: top; }
.coMULTI, .c span{ line-height:13px !important;}
--></style><pre class="c"><ol><li class="li1"><div class="de1">BEGIN <span class="br0">{</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1"><span class="br0">}</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1"><span class="br0">{</span></div></li><li class="li1"><div class="de1">	num <span class="sy0">=</span> $<span class="nu19">1</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1">	<span class="kw1">if</span><span class="br0">(</span>num <span class="sy0">==</span> <span class="nu0">42</span><span class="br0">)</span></div></li><li class="li1"><div class="de1">		<a href="http://www.opengroup.org/onlinepubs/009695399/functions/exit.html"><span class="kw3">exit</span></a><span class="sy0">;</span></div></li><li class="li1"><div class="de1">	<span class="kw1">else</span></div></li><li class="li1"><div class="de1">		<a href="http://www.opengroup.org/onlinepubs/009695399/functions/printf.html"><span class="kw3">printf</span></a><span class="br0">(</span><span class="st0">"%d<span class="es1">\n</span>"</span><span class="sy0">,</span> num<span class="br0">)</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1"><span class="br0">}</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1">END <span class="br0">{</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1"><span class="br0">}</span></div></li></ol></pre>
					</div>
				</div>
								<div class="source-view ">
					<div class="header">
						<span class="lang" id="sample_lang_28">Bash (bash 4.0.35)</span>
						<span class="pull-right"><a href="sample/compileone_VRsRx.sh"><i class="icon-download-alt"></i> download</a>&nbsp;&nbsp;&nbsp;</span>
					</div>
					<div class="content">
						<style type="text/css"><!--/**
 * GeSHi (C) 2004 - 2007 Nigel McNie, 2007 - 2008 Benny Baumann
 * (http://qbnz.com/highlighter/ and http://geshi.org/)
 */
.bash  {font-family:monospace;color: #000066;}
.bash a:link {color: #000060;}
.bash a:hover {background-color: #f0f000;}
.bash .head {font-family: Verdana, Arial, sans-serif; color: #808080; font-size: 70%; font-weight: bold;  padding: 2px;}
.bash .imp {font-weight: bold; color: red;}
.bash .kw1 {color: #000000; font-weight: bold;}
.bash .kw2 {color: #c20cb9; font-weight: bold;}
.bash .kw3 {color: #7a0874; font-weight: bold;}
.bash .co0 {color: #666666; font-style: italic;}
.bash .co1 {color: #800000;}
.bash .co2 {color: #cc0000; font-style: italic;}
.bash .co3 {color: #000000; font-weight: bold;}
.bash .co4 {color: #666666;}
.bash .es1 {color: #000099; font-weight: bold;}
.bash .es2 {color: #007800;}
.bash .es3 {color: #007800;}
.bash .es4 {color: #007800;}
.bash .es5 {color: #780078;}
.bash .es_h {color: #000099; font-weight: bold;}
.bash .br0 {color: #7a0874; font-weight: bold;}
.bash .sy0 {color: #000000; font-weight: bold;}
.bash .st0 {color: #ff0000;}
.bash .st_h {color: #ff0000;}
.bash .nu0 {color: #000000;}
.bash .re0 {color: #007800;}
.bash .re1 {color: #007800;}
.bash .re2 {color: #007800;}
.bash .re4 {color: #007800;}
.bash .re5 {color: #660033;}
.bash span.xtra { display:block; }
.ln, .ln{ vertical-align: top; }
.coMULTI, .bash span{ line-height:13px !important;}
--></style><pre class="bash"><ol><li class="li1"><div class="de1"><span class="co0">#!/bin/bash</span></div></li><li class="li1"><div class="de1"><span class="kw1">while</span> <span class="kw2">true</span></div></li><li class="li1"><div class="de1"><span class="kw1">do</span></div></li><li class="li1"><div class="de1">	<span class="kw2">read</span> line</div></li><li class="li1"><div class="de1">	<span class="kw1">if</span> <span class="br0">[</span> <span class="re1">$line</span> <span class="re5">-eq</span> <span class="nu0">42</span> <span class="br0">]</span></div></li><li class="li1"><div class="de1">	<span class="kw1">then</span> </div></li><li class="li1"><div class="de1">		<span class="kw3">exit</span> <span class="nu0">0</span></div></li><li class="li1"><div class="de1">	<span class="kw1">fi</span></div></li><li class="li1"><div class="de1">	<span class="kw3">echo</span> <span class="re1">$line</span></div></li><li class="li1"><div class="de1"><span class="kw1">done</span></div></li></ol></pre>
					</div>
				</div>
								<div class="source-view ">
					<div class="header">
						<span class="lang" id="sample_lang_12">Brainf**k (bff-1.0.3.1)</span>
						<span class="pull-right"><a href="sample/compileone_VC8ztYqJ.bf"><i class="icon-download-alt"></i> download</a>&nbsp;&nbsp;&nbsp;</span>
					</div>
					<div class="content">
						<style type="text/css"><!--/**
 * GeSHi (C) 2004 - 2007 Nigel McNie, 2007 - 2008 Benny Baumann
 * (http://qbnz.com/highlighter/ and http://geshi.org/)
 */
.bf  {font-family:monospace;color: #000066;}
.bf a:link {color: #000060;}
.bf a:hover {background-color: #f0f000;}
.bf .head {font-family: Verdana, Arial, sans-serif; color: #808080; font-size: 70%; font-weight: bold;  padding: 2px;}
.bf .imp {font-weight: bold; color: red;}
.bf .co1 {color: #666666; font-style: italic;}
.bf .sy0 {color: #006600;}
.bf .sy1 {color: #660000;}
.bf .sy2 {color: #000066;}
.bf .sy3 {color: #666600;}
.bf .sy4 {color: #660066;}
.bf span.xtra { display:block; }
.ln, .ln{ vertical-align: top; }
.coMULTI, .bf span{ line-height:13px !important;}
--></style><pre class="bf"><ol><li class="li1"><div class="de1"><span class="sy2">&gt;</span><span class="sy0">+</span><span class="sy1">[</span><span class="sy2">&gt;&gt;</span><span class="sy3">,</span><span class="sy0">----------</span><span class="sy1">[</span><span class="sy2">&gt;</span><span class="sy3">,</span><span class="sy0">----------</span><span class="sy1">]</span><span class="sy0">+++++</span><span class="sy1">[</span><span class="sy2">&lt;</span><span class="sy0">--------</span><span class="sy2">&gt;</span><span class="sy0">-</span><span class="sy1">]</span><span class="sy2">&lt;</span><span class="sy1">[</span><span class="sy2">&gt;&gt;</span><span class="sy0">-</span><span class="sy2">&lt;</span><span class="sy1">]</span><span class="sy2">&gt;</span><span class="sy0">+</span><span class="sy1">[</span></div></li><li class="li1"><div class="de1"><span class="sy0">-</span><span class="sy2">&lt;</span><span class="sy0">+++++++</span><span class="sy1">[</span><span class="sy2">&lt;</span><span class="sy0">------</span><span class="sy2">&gt;</span><span class="sy0">-</span><span class="sy1">]</span><span class="sy2">&lt;</span><span class="sy1">[</span><span class="sy2">&gt;&gt;</span><span class="sy0">-</span><span class="sy2">&lt;</span><span class="sy1">]</span><span class="sy2">&gt;</span><span class="sy0">+</span><span class="sy1">[</span></div></li><li class="li1"><div class="de1"><span class="sy0">-</span><span class="sy2">&lt;&lt;</span><span class="sy1">[</span><span class="sy2">&gt;&gt;</span><span class="sy0">-</span><span class="sy2">&lt;</span><span class="sy1">]</span><span class="sy2">&gt;</span><span class="sy0">+</span><span class="sy1">[</span><span class="sy2">&lt;&lt;</span><span class="sy0">-</span><span class="sy2">&gt;&gt;</span><span class="sy0">-</span><span class="sy2">&gt;</span><span class="sy1">]</span><span class="sy2">&gt;</span></div></li><li class="li1"><div class="de1"><span class="sy1">]</span><span class="sy2">&lt;</span><span class="sy0">+++++++</span><span class="sy1">[</span><span class="sy2">&lt;</span><span class="sy0">++++++</span><span class="sy2">&gt;</span><span class="sy0">-</span><span class="sy1">]</span><span class="sy2">&gt;&gt;</span></div></li><li class="li1"><div class="de1"><span class="sy1">]</span><span class="sy2">&lt;</span><span class="sy0">++++++++</span><span class="sy1">[</span><span class="sy2">&lt;</span><span class="sy0">+++++</span><span class="sy2">&gt;</span><span class="sy0">-</span><span class="sy1">]</span><span class="sy2">&lt;</span></div></li><li class="li1"><div class="de1"><span class="sy1">[</span><span class="sy2">&lt;</span><span class="sy1">]</span><span class="sy2">&lt;</span><span class="sy1">[</span><span class="sy2">&gt;&gt;</span><span class="sy1">[</span><span class="sy0">++++++++++</span><span class="sy3">.</span><span class="sy2">&gt;</span><span class="sy1">]</span><span class="sy0">++++++++++</span><span class="sy3">.</span><span class="sy1">[[</span><span class="sy0">-</span><span class="sy1">]</span><span class="sy2">&lt;</span><span class="sy1">]]</span><span class="sy2">&lt;</span><span class="sy1">]</span></div></li></ol></pre>
					</div>
				</div>
								<div class="source-view ">
					<div class="header">
						<span class="lang" id="sample_lang_11">C (gcc-4.8.1)</span>
						<span class="pull-right"><a href="sample/compileone_48Y02N.c"><i class="icon-download-alt"></i> download</a>&nbsp;&nbsp;&nbsp;</span>
					</div>
					<div class="content">
						<style type="text/css"><!--/**
 * GeSHi (C) 2004 - 2007 Nigel McNie, 2007 - 2008 Benny Baumann
 * (http://qbnz.com/highlighter/ and http://geshi.org/)
 */
.c  {font-family:monospace;color: #000066;}
.c a:link {color: #000060;}
.c a:hover {background-color: #f0f000;}
.c .head {font-family: Verdana, Arial, sans-serif; color: #808080; font-size: 70%; font-weight: bold;  padding: 2px;}
.c .imp {font-weight: bold; color: red;}
.c .kw1 {color: #b1b100;}
.c .kw2 {color: #000000; font-weight: bold;}
.c .kw3 {color: #000066;}
.c .kw4 {color: #993333;}
.c .co1 {color: #666666; font-style: italic;}
.c .co2 {color: #339933;}
.c .coMULTI {color: #808080; font-style: italic;}
.c .es0 {color: #000099; font-weight: bold;}
.c .es1 {color: #000099; font-weight: bold;}
.c .es2 {color: #660099; font-weight: bold;}
.c .es3 {color: #660099; font-weight: bold;}
.c .es4 {color: #660099; font-weight: bold;}
.c .es5 {color: #006699; font-weight: bold;}
.c .br0 {color: #009900;}
.c .sy0 {color: #339933;}
.c .st0 {color: #ff0000;}
.c .nu0 {color: #0000dd;}
.c .nu6 {color: #208080;}
.c .nu8 {color: #208080;}
.c .nu12 {color: #208080;}
.c .nu16 {color:#800080;}
.c .nu17 {color:#800080;}
.c .nu18 {color:#800080;}
.c .nu19 {color:#800080;}
.c .me1 {color: #202020;}
.c .me2 {color: #202020;}
.c span.xtra { display:block; }
.ln, .ln{ vertical-align: top; }
.coMULTI, .c span{ line-height:13px !important;}
--></style><pre class="c"><ol><li class="li1"><div class="de1"><span class="co2">#include &lt;stdio.h&gt;</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1"><span class="kw4">int</span> main<span class="br0">(</span><span class="kw4">void</span><span class="br0">)</span> <span class="br0">{</span> </div></li><li class="li1"><div class="de1">	<span class="kw4">int</span> x<span class="sy0">;</span></div></li><li class="li1"><div class="de1">	<span class="kw1">for</span><span class="br0">(</span><span class="sy0">;</span> <a href="http://www.opengroup.org/onlinepubs/009695399/functions/scanf.html"><span class="kw3">scanf</span></a><span class="br0">(</span><span class="st0">"%d"</span><span class="sy0">,&amp;</span>x<span class="br0">)</span> <span class="sy0">&gt;</span> <span class="nu0">0</span> <span class="sy0">&amp;&amp;</span> x <span class="sy0">!=</span> <span class="nu0">42</span><span class="sy0">;</span> <a href="http://www.opengroup.org/onlinepubs/009695399/functions/printf.html"><span class="kw3">printf</span></a><span class="br0">(</span><span class="st0">"%d<span class="es1">\n</span>"</span><span class="sy0">,</span> x<span class="br0">)</span><span class="br0">)</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1">	<span class="kw1">return</span> <span class="nu0">0</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1"><span class="br0">}</span></div></li></ol></pre>
					</div>
				</div>
								<div class="source-view ">
					<div class="header">
						<span class="lang" id="sample_lang_27">C# (mono-2.8)</span>
						<span class="pull-right"><a href="sample/compileone_y3GIhc.cs"><i class="icon-download-alt"></i> download</a>&nbsp;&nbsp;&nbsp;</span>
					</div>
					<div class="content">
						<style type="text/css"><!--/**
 * GeSHi (C) 2004 - 2007 Nigel McNie, 2007 - 2008 Benny Baumann
 * (http://qbnz.com/highlighter/ and http://geshi.org/)
 */
.c  {font-family:monospace;color: #000066;}
.c a:link {color: #000060;}
.c a:hover {background-color: #f0f000;}
.c .head {font-family: Verdana, Arial, sans-serif; color: #808080; font-size: 70%; font-weight: bold;  padding: 2px;}
.c .imp {font-weight: bold; color: red;}
.c .kw1 {color: #b1b100;}
.c .kw2 {color: #000000; font-weight: bold;}
.c .kw3 {color: #000066;}
.c .kw4 {color: #993333;}
.c .co1 {color: #666666; font-style: italic;}
.c .co2 {color: #339933;}
.c .coMULTI {color: #808080; font-style: italic;}
.c .es0 {color: #000099; font-weight: bold;}
.c .es1 {color: #000099; font-weight: bold;}
.c .es2 {color: #660099; font-weight: bold;}
.c .es3 {color: #660099; font-weight: bold;}
.c .es4 {color: #660099; font-weight: bold;}
.c .es5 {color: #006699; font-weight: bold;}
.c .br0 {color: #009900;}
.c .sy0 {color: #339933;}
.c .st0 {color: #ff0000;}
.c .nu0 {color: #0000dd;}
.c .nu6 {color: #208080;}
.c .nu8 {color: #208080;}
.c .nu12 {color: #208080;}
.c .nu16 {color:#800080;}
.c .nu17 {color:#800080;}
.c .nu18 {color:#800080;}
.c .nu19 {color:#800080;}
.c .me1 {color: #202020;}
.c .me2 {color: #202020;}
.c span.xtra { display:block; }
.ln, .ln{ vertical-align: top; }
.coMULTI, .c# span{ line-height:13px !important;}
--></style><pre class="c"><ol><li class="li1"><div class="de1">using System<span class="sy0">;</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1">public class Test</div></li><li class="li1"><div class="de1"><span class="br0">{</span></div></li><li class="li1"><div class="de1">	public <span class="kw4">static</span> <span class="kw4">void</span> Main<span class="br0">(</span><span class="br0">)</span></div></li><li class="li1"><div class="de1">	<span class="br0">{</span></div></li><li class="li1"><div class="de1">		<span class="kw4">int</span> n<span class="sy0">;</span></div></li><li class="li1"><div class="de1">		<span class="kw1">while</span> <span class="br0">(</span><span class="br0">(</span>n <span class="sy0">=</span> <span class="kw4">int</span>.<span class="me1">Parse</span><span class="br0">(</span>Console.<span class="me1">ReadLine</span><span class="br0">(</span><span class="br0">)</span><span class="br0">)</span><span class="br0">)</span><span class="sy0">!=</span><span class="nu0">42</span><span class="br0">)</span></div></li><li class="li1"><div class="de1">			Console.<span class="me1">WriteLine</span><span class="br0">(</span>n<span class="br0">)</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1">	<span class="br0">}</span></div></li><li class="li1"><div class="de1"><span class="br0">}</span></div></li></ol></pre>
					</div>
				</div>
								<div class="source-view ">
					<div class="header">
						<span class="lang" id="sample_lang_41">C++ 4.3.2 (gcc-4.3.2)</span>
						<span class="pull-right"><a href="sample/compileone_93ddLQ.cpp"><i class="icon-download-alt"></i> download</a>&nbsp;&nbsp;&nbsp;</span>
					</div>
					<div class="content">
						<style type="text/css"><!--/**
 * GeSHi (C) 2004 - 2007 Nigel McNie, 2007 - 2008 Benny Baumann
 * (http://qbnz.com/highlighter/ and http://geshi.org/)
 */
.cpp  {font-family:monospace;color: #000066;}
.cpp a:link {color: #000060;}
.cpp a:hover {background-color: #f0f000;}
.cpp .head {font-family: Verdana, Arial, sans-serif; color: #808080; font-size: 70%; font-weight: bold;  padding: 2px;}
.cpp .imp {font-weight: bold; color: red;}
.cpp .kw1 {color: #0000ff;}
.cpp .kw2 {color: #0000ff;}
.cpp .kw3 {color: #0000dd;}
.cpp .kw4 {color: #0000ff;}
.cpp .co1 {color: #666666;}
.cpp .co2 {color: #339900;}
.cpp .coMULTI {color: #ff0000; font-style: italic;}
.cpp .es0 {color: #000099; font-weight: bold;}
.cpp .es1 {color: #000099; font-weight: bold;}
.cpp .es2 {color: #660099; font-weight: bold;}
.cpp .es3 {color: #660099; font-weight: bold;}
.cpp .es4 {color: #660099; font-weight: bold;}
.cpp .es5 {color: #006699; font-weight: bold;}
.cpp .br0 {color: #008000;}
.cpp .sy0 {color: #008000;}
.cpp .sy1 {color: #000080;}
.cpp .sy2 {color: #000040;}
.cpp .sy3 {color: #000040;}
.cpp .sy4 {color: #008080;}
.cpp .st0 {color: #FF0000;}
.cpp .nu0 {color: #0000dd;}
.cpp .nu6 {color: #208080;}
.cpp .nu8 {color: #208080;}
.cpp .nu12 {color: #208080;}
.cpp .nu16 {color:#800080;}
.cpp .nu17 {color:#800080;}
.cpp .nu18 {color:#800080;}
.cpp .nu19 {color:#800080;}
.cpp .me1 {color: #007788;}
.cpp .me2 {color: #007788;}
.cpp span.xtra { display:block; }
.ln, .ln{ vertical-align: top; }
.coMULTI, .cpp span{ line-height:13px !important;}
--></style><pre class="cpp"><ol><li class="li1"><div class="de1"><span class="co2">#include &lt;iostream&gt;</span></div></li><li class="li1"><div class="de1"><span class="kw2">using</span> <span class="kw2">namespace</span> std<span class="sy4">;</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1"><span class="kw4">int</span> main<span class="br0">(</span><span class="br0">)</span> <span class="br0">{</span></div></li><li class="li1"><div class="de1">	<span class="kw4">int</span> intNum <span class="sy1">=</span> <span class="nu0">0</span><span class="sy4">;</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1">	<span class="kw3">cin</span> <span class="sy1">&gt;&gt;</span> intNum<span class="sy4">;</span></div></li><li class="li1"><div class="de1">	<span class="kw1">while</span> <span class="br0">(</span>intNum <span class="sy3">!</span><span class="sy1">=</span> <span class="nu0">42</span><span class="br0">)</span> <span class="br0">{</span></div></li><li class="li1"><div class="de1">		<span class="kw3">cout</span> <span class="sy1">&lt;&lt;</span> intNum <span class="sy1">&lt;&lt;</span> <span class="st0">"<span class="es1">\n</span>"</span><span class="sy4">;</span></div></li><li class="li1"><div class="de1">		<span class="kw3">cin</span> <span class="sy1">&gt;&gt;</span> intNum<span class="sy4">;</span></div></li><li class="li1"><div class="de1">	<span class="br0">}</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1">	<span class="kw1">return</span> <span class="nu0">0</span><span class="sy4">;</span></div></li><li class="li1"><div class="de1"><span class="br0">}</span></div></li></ol></pre>
					</div>
				</div>
								<div class="source-view ">
					<div class="header">
						<span class="lang" id="sample_lang_1">C++ 4.8.1 (gcc-4.8.1)</span>
						<span class="pull-right"><a href="sample/compileone_CxXGcd.cpp"><i class="icon-download-alt"></i> download</a>&nbsp;&nbsp;&nbsp;</span>
					</div>
					<div class="content">
						<style type="text/css"><!--/**
 * GeSHi (C) 2004 - 2007 Nigel McNie, 2007 - 2008 Benny Baumann
 * (http://qbnz.com/highlighter/ and http://geshi.org/)
 */
.cpp  {font-family:monospace;color: #000066;}
.cpp a:link {color: #000060;}
.cpp a:hover {background-color: #f0f000;}
.cpp .head {font-family: Verdana, Arial, sans-serif; color: #808080; font-size: 70%; font-weight: bold;  padding: 2px;}
.cpp .imp {font-weight: bold; color: red;}
.cpp .kw1 {color: #0000ff;}
.cpp .kw2 {color: #0000ff;}
.cpp .kw3 {color: #0000dd;}
.cpp .kw4 {color: #0000ff;}
.cpp .co1 {color: #666666;}
.cpp .co2 {color: #339900;}
.cpp .coMULTI {color: #ff0000; font-style: italic;}
.cpp .es0 {color: #000099; font-weight: bold;}
.cpp .es1 {color: #000099; font-weight: bold;}
.cpp .es2 {color: #660099; font-weight: bold;}
.cpp .es3 {color: #660099; font-weight: bold;}
.cpp .es4 {color: #660099; font-weight: bold;}
.cpp .es5 {color: #006699; font-weight: bold;}
.cpp .br0 {color: #008000;}
.cpp .sy0 {color: #008000;}
.cpp .sy1 {color: #000080;}
.cpp .sy2 {color: #000040;}
.cpp .sy3 {color: #000040;}
.cpp .sy4 {color: #008080;}
.cpp .st0 {color: #FF0000;}
.cpp .nu0 {color: #0000dd;}
.cpp .nu6 {color: #208080;}
.cpp .nu8 {color: #208080;}
.cpp .nu12 {color: #208080;}
.cpp .nu16 {color:#800080;}
.cpp .nu17 {color:#800080;}
.cpp .nu18 {color:#800080;}
.cpp .nu19 {color:#800080;}
.cpp .me1 {color: #007788;}
.cpp .me2 {color: #007788;}
.cpp span.xtra { display:block; }
.ln, .ln{ vertical-align: top; }
.coMULTI, .cpp span{ line-height:13px !important;}
--></style><pre class="cpp"><ol><li class="li1"><div class="de1"><span class="co2">#include &lt;iostream&gt;</span></div></li><li class="li1"><div class="de1"><span class="kw2">using</span> <span class="kw2">namespace</span> std<span class="sy4">;</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1"><span class="kw4">int</span> main<span class="br0">(</span><span class="br0">)</span> <span class="br0">{</span></div></li><li class="li1"><div class="de1">	<span class="kw4">int</span> intNum <span class="sy1">=</span> <span class="nu0">0</span><span class="sy4">;</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1">	<span class="kw3">cin</span> <span class="sy1">&gt;&gt;</span> intNum<span class="sy4">;</span></div></li><li class="li1"><div class="de1">	<span class="kw1">while</span> <span class="br0">(</span>intNum <span class="sy3">!</span><span class="sy1">=</span> <span class="nu0">42</span><span class="br0">)</span> <span class="br0">{</span></div></li><li class="li1"><div class="de1">		<span class="kw3">cout</span> <span class="sy1">&lt;&lt;</span> intNum <span class="sy1">&lt;&lt;</span> <span class="st0">"<span class="es1">\n</span>"</span><span class="sy4">;</span></div></li><li class="li1"><div class="de1">		<span class="kw3">cin</span> <span class="sy1">&gt;&gt;</span> intNum<span class="sy4">;</span></div></li><li class="li1"><div class="de1">	<span class="br0">}</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1">	<span class="kw1">return</span> <span class="nu0">0</span><span class="sy4">;</span></div></li><li class="li1"><div class="de1"><span class="br0">}</span></div></li></ol></pre>
					</div>
				</div>
								<div class="source-view ">
					<div class="header">
						<span class="lang" id="sample_lang_44">C++11 (gcc-4.8.1)</span>
						<span class="pull-right"><a href="sample/compileone_xGFwae.cpp"><i class="icon-download-alt"></i> download</a>&nbsp;&nbsp;&nbsp;</span>
					</div>
					<div class="content">
						<style type="text/css"><!--/**
 * GeSHi (C) 2004 - 2007 Nigel McNie, 2007 - 2008 Benny Baumann
 * (http://qbnz.com/highlighter/ and http://geshi.org/)
 */
.cpp  {font-family:monospace;color: #000066;}
.cpp a:link {color: #000060;}
.cpp a:hover {background-color: #f0f000;}
.cpp .head {font-family: Verdana, Arial, sans-serif; color: #808080; font-size: 70%; font-weight: bold;  padding: 2px;}
.cpp .imp {font-weight: bold; color: red;}
.cpp .kw1 {color: #0000ff;}
.cpp .kw2 {color: #0000ff;}
.cpp .kw3 {color: #0000dd;}
.cpp .kw4 {color: #0000ff;}
.cpp .co1 {color: #666666;}
.cpp .co2 {color: #339900;}
.cpp .coMULTI {color: #ff0000; font-style: italic;}
.cpp .es0 {color: #000099; font-weight: bold;}
.cpp .es1 {color: #000099; font-weight: bold;}
.cpp .es2 {color: #660099; font-weight: bold;}
.cpp .es3 {color: #660099; font-weight: bold;}
.cpp .es4 {color: #660099; font-weight: bold;}
.cpp .es5 {color: #006699; font-weight: bold;}
.cpp .br0 {color: #008000;}
.cpp .sy0 {color: #008000;}
.cpp .sy1 {color: #000080;}
.cpp .sy2 {color: #000040;}
.cpp .sy3 {color: #000040;}
.cpp .sy4 {color: #008080;}
.cpp .st0 {color: #FF0000;}
.cpp .nu0 {color: #0000dd;}
.cpp .nu6 {color: #208080;}
.cpp .nu8 {color: #208080;}
.cpp .nu12 {color: #208080;}
.cpp .nu16 {color:#800080;}
.cpp .nu17 {color:#800080;}
.cpp .nu18 {color:#800080;}
.cpp .nu19 {color:#800080;}
.cpp .me1 {color: #007788;}
.cpp .me2 {color: #007788;}
.cpp span.xtra { display:block; }
.ln, .ln{ vertical-align: top; }
.coMULTI, .cpp span{ line-height:13px !important;}
--></style><pre class="cpp"><ol><li class="li1"><div class="de1"><span class="co2">#include &lt;iostream&gt;</span></div></li><li class="li1"><div class="de1"><span class="kw2">using</span> <span class="kw2">namespace</span> std<span class="sy4">;</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1"><span class="kw4">int</span> main<span class="br0">(</span><span class="br0">)</span> <span class="br0">{</span></div></li><li class="li1"><div class="de1">	<span class="kw4">auto</span> func <span class="sy1">=</span> <span class="br0">[</span><span class="br0">]</span> <span class="br0">(</span><span class="br0">)</span> <span class="br0">{</span></div></li><li class="li1"><div class="de1">		<span class="kw4">int</span> intNum <span class="sy1">=</span> <span class="nu0">0</span><span class="sy4">;</span></div></li><li class="li1"><div class="de1">		<span class="kw3">cin</span> <span class="sy1">&gt;&gt;</span> intNum<span class="sy4">;</span></div></li><li class="li1"><div class="de1">		<span class="kw1">while</span> <span class="br0">(</span>intNum <span class="sy3">!</span><span class="sy1">=</span> <span class="nu0">42</span><span class="br0">)</span> <span class="br0">{</span></div></li><li class="li1"><div class="de1">			<span class="kw3">cout</span> <span class="sy1">&lt;&lt;</span> intNum <span class="sy1">&lt;&lt;</span> <span class="st0">"<span class="es1">\n</span>"</span><span class="sy4">;</span></div></li><li class="li1"><div class="de1">			<span class="kw3">cin</span> <span class="sy1">&gt;&gt;</span> intNum<span class="sy4">;</span></div></li><li class="li1"><div class="de1">		<span class="br0">}</span></div></li><li class="li1"><div class="de1">	<span class="br0">}</span><span class="sy4">;</span></div></li><li class="li1"><div class="de1">	func<span class="br0">(</span><span class="br0">)</span><span class="sy4">;</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1">	<span class="kw1">return</span> <span class="nu0">0</span><span class="sy4">;</span></div></li><li class="li1"><div class="de1"><span class="br0">}</span></div></li></ol></pre>
					</div>
				</div>
								<div class="source-view ">
					<div class="header">
						<span class="lang" id="sample_lang_34">C99 strict (gcc-4.8.1)</span>
						<span class="pull-right"><a href="sample/compileone_LL6rIs.c"><i class="icon-download-alt"></i> download</a>&nbsp;&nbsp;&nbsp;</span>
					</div>
					<div class="content">
						<style type="text/css"><!--/**
 * GeSHi (C) 2004 - 2007 Nigel McNie, 2007 - 2008 Benny Baumann
 * (http://qbnz.com/highlighter/ and http://geshi.org/)
 */
.c  {font-family:monospace;color: #000066;}
.c a:link {color: #000060;}
.c a:hover {background-color: #f0f000;}
.c .head {font-family: Verdana, Arial, sans-serif; color: #808080; font-size: 70%; font-weight: bold;  padding: 2px;}
.c .imp {font-weight: bold; color: red;}
.c .kw1 {color: #b1b100;}
.c .kw2 {color: #000000; font-weight: bold;}
.c .kw3 {color: #000066;}
.c .kw4 {color: #993333;}
.c .co1 {color: #666666; font-style: italic;}
.c .co2 {color: #339933;}
.c .coMULTI {color: #808080; font-style: italic;}
.c .es0 {color: #000099; font-weight: bold;}
.c .es1 {color: #000099; font-weight: bold;}
.c .es2 {color: #660099; font-weight: bold;}
.c .es3 {color: #660099; font-weight: bold;}
.c .es4 {color: #660099; font-weight: bold;}
.c .es5 {color: #006699; font-weight: bold;}
.c .br0 {color: #009900;}
.c .sy0 {color: #339933;}
.c .st0 {color: #ff0000;}
.c .nu0 {color: #0000dd;}
.c .nu6 {color: #208080;}
.c .nu8 {color: #208080;}
.c .nu12 {color: #208080;}
.c .nu16 {color:#800080;}
.c .nu17 {color:#800080;}
.c .nu18 {color:#800080;}
.c .nu19 {color:#800080;}
.c .me1 {color: #202020;}
.c .me2 {color: #202020;}
.c span.xtra { display:block; }
.ln, .ln{ vertical-align: top; }
.coMULTI, .c span{ line-height:13px !important;}
--></style><pre class="c"><ol><li class="li1"><div class="de1"><span class="co2">#include &lt;stdio.h&gt;</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1"><span class="kw4">int</span> main<span class="br0">(</span><span class="kw4">void</span><span class="br0">)</span> <span class="br0">{</span> </div></li><li class="li1"><div class="de1">	<span class="kw4">int</span> x<span class="sy0">;</span></div></li><li class="li1"><div class="de1">	<span class="kw1">for</span><span class="br0">(</span><span class="sy0">;</span> <a href="http://www.opengroup.org/onlinepubs/009695399/functions/scanf.html"><span class="kw3">scanf</span></a><span class="br0">(</span><span class="st0">"%d"</span><span class="sy0">,&amp;</span>x<span class="br0">)</span> <span class="sy0">&gt;</span> <span class="nu0">0</span> <span class="sy0">&amp;&amp;</span> x <span class="sy0">!=</span> <span class="nu0">42</span><span class="sy0">;</span> <a href="http://www.opengroup.org/onlinepubs/009695399/functions/printf.html"><span class="kw3">printf</span></a><span class="br0">(</span><span class="st0">"%d<span class="es1">\n</span>"</span><span class="sy0">,</span> x<span class="br0">)</span><span class="br0">)</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1">	<span class="kw1">return</span> <span class="nu0">0</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1"><span class="br0">}</span></div></li></ol></pre>
					</div>
				</div>

								<div class="source-view ">
					<div class="header">
						<span class="lang" id="sample_lang_21">Haskell (ghc-7.6.3)</span>
						<span class="pull-right"><a href="sample/compileone_zwS0qx.hs"><i class="icon-download-alt"></i> download</a>&nbsp;&nbsp;&nbsp;</span>
					</div>
					<div class="content">
						<style type="text/css"><!--/**
 * GeSHi (C) 2004 - 2007 Nigel McNie, 2007 - 2008 Benny Baumann
 * (http://qbnz.com/highlighter/ and http://geshi.org/)
 */
.haskell  {font-family:monospace;color: #000066;}
.haskell a:link {color: #000060;}
.haskell a:hover {background-color: #f0f000;}
.haskell .head {font-family: Verdana, Arial, sans-serif; color: #808080; font-size: 70%; font-weight: bold;  padding: 2px;}
.haskell .imp {font-weight: bold; color: red;}
.haskell .kw1 {color: #06c; font-weight: bold;}
.haskell .kw2 {color: #06c; font-weight: bold;}
.haskell .kw3 {font-weight: bold;}
.haskell .kw4 {color: #cccc00; font-weight: bold;}
.haskell .kw5 {color: maroon;}
.haskell .co1 {color: #5d478b; font-style: italic;}
.haskell .co2 {color: #339933; font-weight: bold;}
.haskell .co3 {color: #5d478b; font-style: italic;}
.haskell .coMULTI {color: #5d478b; font-style: italic;}
.haskell .es0 {background-color: #3cb371; font-weight: bold;}
.haskell .br0 {color: green;}
.haskell .sy0 {color: #339933; font-weight: bold;}
.haskell .st0 {background-color: #3cb371;}
.haskell .nu0 {color: red;}
.haskell .me1 {color: #060;}
.haskell span.xtra { display:block; }
.ln, .ln{ vertical-align: top; }
.coMULTI, .haskell span{ line-height:13px !important;}
--></style><pre class="haskell"><ol><li class="li1"><div class="de1">main <span class="sy0">=</span> <a href="http://haskell.org/ghc/docs/latest/html/libraries/base/Prelude.html#v:interact"><span class="kw3">interact</span></a> fun</div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1">fun <span class="sy0">=</span> <a href="http://haskell.org/ghc/docs/latest/html/libraries/base/Prelude.html#v:unlines"><span class="kw3">unlines</span></a> <span class="sy0">.</span> <a href="http://haskell.org/ghc/docs/latest/html/libraries/base/Prelude.html#v:takeWhile"><span class="kw3">takeWhile</span></a> <span class="br0">(</span><span class="sy0">/=</span><span class="st0">"42"</span><span class="br0">)</span> <span class="sy0">.</span> <a href="http://haskell.org/ghc/docs/latest/html/libraries/base/Prelude.html#v:words"><span class="kw3">words</span></a></div></li></ol></pre>
					</div>
				</div>
				
								<div class="source-view ">
					<div class="header">
						<span class="lang" id="sample_lang_10">Java (sun-jdk-1.7.0_25)</span>
						<span class="pull-right"><a href="sample/compileone_wKNLAI.java"><i class="icon-download-alt"></i> download</a>&nbsp;&nbsp;&nbsp;</span>
					</div>
					<div class="content">
						<style type="text/css"><!--/**
 * GeSHi (C) 2004 - 2007 Nigel McNie, 2007 - 2008 Benny Baumann
 * (http://qbnz.com/highlighter/ and http://geshi.org/)
 */
.java  {font-family:monospace;color: #000066;}
.java a:link {color: #000060;}
.java a:hover {background-color: #f0f000;}
.java .head {font-family: Verdana, Arial, sans-serif; color: #808080; font-size: 70%; font-weight: bold;  padding: 2px;}
.java .imp {font-weight: bold; color: red;}
.java .kw1 {color: #000000; font-weight: bold;}
.java .kw2 {color: #000066; font-weight: bold;}
.java .kw3 {color: #003399;}
.java .kw4 {color: #000066; font-weight: bold;}
.java .co1 {color: #666666; font-style: italic;}
.java .co2 {color: #006699;}
.java .co3 {color: #008000; font-style: italic; font-weight: bold;}
.java .coMULTI {color: #666666; font-style: italic;}
.java .es0 {color: #000099; font-weight: bold;}
.java .br0 {color: #009900;}
.java .sy0 {color: #339933;}
.java .st0 {color: #0000ff;}
.java .nu0 {color: #cc66cc;}
.java .me1 {color: #006633;}
.java .me2 {color: #006633;}
.java span.xtra { display:block; }
.ln, .ln{ vertical-align: top; }
.coMULTI, .java span{ line-height:13px !important;}
--></style><pre class="java"><ol><li class="li1"><div class="de1"><span class="coMULTI">/* package whatever; // don't place package name! */</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1"><span class="kw1">import</span> <span class="co2">java.io.*</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1"><span class="coMULTI">/* Name of the class has to be "Main" only if the class is public. */</span></div></li><li class="li1"><div class="de1"><span class="kw1">class</span> Main</div></li><li class="li1"><div class="de1"><span class="br0">{</span></div></li><li class="li1"><div class="de1">	<span class="kw1">public</span> <span class="kw1">static</span> <span class="kw4">void</span> main <span class="br0">(</span><a href="http://www.google.com/search?hl=en&amp;q=allinurl%3Adocs.oracle.com+javase+docs+api+string"><span class="kw3">String</span></a><span class="br0">[</span><span class="br0">]</span> args<span class="br0">)</span> <span class="kw1">throws</span> java.<span class="me1">lang</span>.<a href="http://www.google.com/search?hl=en&amp;q=allinurl%3Adocs.oracle.com+javase+docs+api+exception"><span class="kw3">Exception</span></a></div></li><li class="li1"><div class="de1">	<span class="br0">{</span></div></li><li class="li1"><div class="de1">		<a href="http://www.google.com/search?hl=en&amp;q=allinurl%3Adocs.oracle.com+javase+docs+api+bufferedreader"><span class="kw3">BufferedReader</span></a> r <span class="sy0">=</span> <span class="kw1">new</span> <a href="http://www.google.com/search?hl=en&amp;q=allinurl%3Adocs.oracle.com+javase+docs+api+bufferedreader"><span class="kw3">BufferedReader</span></a> <span class="br0">(</span><span class="kw1">new</span> <a href="http://www.google.com/search?hl=en&amp;q=allinurl%3Adocs.oracle.com+javase+docs+api+inputstreamreader"><span class="kw3">InputStreamReader</span></a> <span class="br0">(</span><a href="http://www.google.com/search?hl=en&amp;q=allinurl%3Adocs.oracle.com+javase+docs+api+system"><span class="kw3">System</span></a>.<span class="me1">in</span><span class="br0">)</span><span class="br0">)</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1">		<a href="http://www.google.com/search?hl=en&amp;q=allinurl%3Adocs.oracle.com+javase+docs+api+string"><span class="kw3">String</span></a> s<span class="sy0">;</span></div></li><li class="li1"><div class="de1">		<span class="kw1">while</span> <span class="br0">(</span><span class="sy0">!</span><span class="br0">(</span>s<span class="sy0">=</span>r.<span class="me1">readLine</span><span class="br0">(</span><span class="br0">)</span><span class="br0">)</span>.<span class="me1">startsWith</span><span class="br0">(</span><span class="st0">"42"</span><span class="br0">)</span><span class="br0">)</span> <a href="http://www.google.com/search?hl=en&amp;q=allinurl%3Adocs.oracle.com+javase+docs+api+system"><span class="kw3">System</span></a>.<span class="me1">out</span>.<span class="me1">println</span><span class="br0">(</span>s<span class="br0">)</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1">	<span class="br0">}</span></div></li><li class="li1"><div class="de1"><span class="br0">}</span></div></li></ol></pre>
					</div>
				</div>
								
								<div class="source-view ">
					<div class="header">
						<span class="lang" id="sample_lang_35">JavaScript (rhino) (rhino-1.7R4)</span>
						<span class="pull-right"><a href="sample/compileone_Txknmi.js"><i class="icon-download-alt"></i> download</a>&nbsp;&nbsp;&nbsp;</span>
					</div>
					<div class="content">
						<style type="text/css"><!--/**
 * GeSHi (C) 2004 - 2007 Nigel McNie, 2007 - 2008 Benny Baumann
 * (http://qbnz.com/highlighter/ and http://geshi.org/)
 */
.javascript  {font-family:monospace;color: #000066;}
.javascript a:link {color: #000060;}
.javascript a:hover {background-color: #f0f000;}
.javascript .head {font-family: Verdana, Arial, sans-serif; color: #808080; font-size: 70%; font-weight: bold;  padding: 2px;}
.javascript .imp {font-weight: bold; color: red;}
.javascript .kw1 {color: #000066; font-weight: bold;}
.javascript .kw2 {color: #003366; font-weight: bold;}
.javascript .kw3 {color: #000066;}
.javascript .kw5 {color: #FF0000;}
.javascript .co1 {color: #006600; font-style: italic;}
.javascript .co2 {color: #009966; font-style: italic;}
.javascript .coMULTI {color: #006600; font-style: italic;}
.javascript .es0 {color: #000099; font-weight: bold;}
.javascript .br0 {color: #009900;}
.javascript .sy0 {color: #339933;}
.javascript .st0 {color: #3366CC;}
.javascript .nu0 {color: #CC0000;}
.javascript .me1 {color: #660066;}
.javascript span.xtra { display:block; }
.ln, .ln{ vertical-align: top; }
.coMULTI, .javascript span{ line-height:13px !important;}
--></style><pre class="javascript"><ol><li class="li1"><div class="de1">importPackage<span class="br0">(</span>java.<span class="me1">io</span><span class="br0">)</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1">importPackage<span class="br0">(</span>java.<span class="me1">lang</span><span class="br0">)</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1"><span class="kw1">var</span> reader <span class="sy0">=</span> <span class="kw1">new</span> BufferedReader<span class="br0">(</span> <span class="kw1">new</span> InputStreamReader<span class="br0">(</span>System<span class="br0">[</span><span class="st0">'in'</span><span class="br0">]</span><span class="br0">)</span> <span class="br0">)</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1">while<span class="br0">(</span><span class="kw2">true</span><span class="br0">)</span> <span class="br0">{</span></div></li><li class="li1"><div class="de1">	<span class="kw1">var</span> line <span class="sy0">=</span> reader.<span class="me1">readLine</span><span class="br0">(</span><span class="br0">)</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1">	<span class="kw1">if</span><span class="br0">(</span>line <span class="sy0">==</span> <span class="kw2">null</span> <span class="sy0">||</span> line <span class="sy0">==</span> <span class="st0">"42"</span><span class="br0">)</span> <span class="br0">{</span></div></li><li class="li1"><div class="de1">		<span class="kw1">break</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1">	<span class="br0">}</span> <span class="kw1">else</span> <span class="br0">{</span></div></li><li class="li1"><div class="de1">		System.<span class="me1">out</span>.<span class="me1">println</span><span class="br0">(</span>line<span class="br0">)</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1">	<span class="br0">}</span></div></li><li class="li1"><div class="de1"><span class="br0">}</span></div></li></ol></pre>
					</div>
				</div>
								<div class="source-view ">
					<div class="header">
						<span class="lang" id="sample_lang_22">Pascal (fpc) (fpc 2.6.2)</span>
						<span class="pull-right"><a href="sample/compileone_xoot5Q.pas"><i class="icon-download-alt"></i> download</a>&nbsp;&nbsp;&nbsp;</span>
					</div>
					<div class="content">
						<style type="text/css"><!--/**
 * GeSHi (C) 2004 - 2007 Nigel McNie, 2007 - 2008 Benny Baumann
 * (http://qbnz.com/highlighter/ and http://geshi.org/)
 */
.pascal  {font-family:monospace;color: #000066;}
.pascal a:link {color: #000060;}
.pascal a:hover {background-color: #f0f000;}
.pascal .head {font-family: Verdana, Arial, sans-serif; color: #808080; font-size: 70%; font-weight: bold;  padding: 2px;}
.pascal .imp {font-weight: bold; color: red;}
.pascal .kw1 {color: #000000; font-weight: bold;}
.pascal .kw2 {color: #000000; font-weight: bold;}
.pascal .kw3 {color: #000066;}
.pascal .kw4 {color: #000066; font-weight: bold;}
.pascal .co1 {color: #808080; font-style: italic;}
.pascal .co2 {color: #008000; font-style: italic;}
.pascal .coMULTI {color: #808080; font-style: italic;}
.pascal .es0 {color: #ff0000; font-weight: bold;}
.pascal .br0 {color: #009900;}
.pascal .sy0 {color: #000066;}
.pascal .sy1 {color: #000066;}
.pascal .sy2 {color: #000066;}
.pascal .sy3 {color: #000066;}
.pascal .st0 {color: #ff0000;}
.pascal .nu0 {color: #cc66cc;}
.pascal .me1 {color: #006600;}
.pascal .re0 {color: #0000cc;}
.pascal .re1 {color: #ff0000;}
.pascal span.xtra { display:block; }
.ln, .ln{ vertical-align: top; }
.coMULTI, .pascal span{ line-height:13px !important;}
--></style><pre class="pascal"><ol><li class="li1"><div class="de1"><span class="kw1">program</span> compileone<span class="sy1">;</span></div></li><li class="li1"><div class="de1"><span class="kw1">var</span> x<span class="sy1">:</span><span class="kw4">byte</span><span class="sy1">;</span></div></li><li class="li1"><div class="de1"><span class="kw1">begin</span></div></li><li class="li1"><div class="de1">	<span class="kw3">readln</span><span class="br0">(</span>x<span class="br0">)</span><span class="sy1">;</span></div></li><li class="li1"><div class="de1">	<span class="kw1">while</span> x&lt;&gt;<span class="nu0">42</span> <span class="kw1">do</span></div></li><li class="li1"><div class="de1">	<span class="kw1">begin</span></div></li><li class="li1"><div class="de1">		<span class="kw3">writeln</span><span class="br0">(</span>x<span class="br0">)</span><span class="sy1">;</span></div></li><li class="li1"><div class="de1">		<span class="kw3">readln</span><span class="br0">(</span>x<span class="br0">)</span></div></li><li class="li1"><div class="de1">	<span class="kw1">end</span></div></li><li class="li1"><div class="de1"><span class="kw1">end</span><span class="sy1">.</span></div></li></ol></pre>
					</div>
				</div>
								<div class="source-view ">
					<div class="header">
						<span class="lang" id="sample_lang_2">Pascal (gpc) (gpc 20070904)</span>
						<span class="pull-right"><a href="sample/compileone_E2jrPp.pas"><i class="icon-download-alt"></i> download</a>&nbsp;&nbsp;&nbsp;</span>
					</div>
					<div class="content">
						<style type="text/css"><!--/**
 * GeSHi (C) 2004 - 2007 Nigel McNie, 2007 - 2008 Benny Baumann
 * (http://qbnz.com/highlighter/ and http://geshi.org/)
 */
.pascal  {font-family:monospace;color: #000066;}
.pascal a:link {color: #000060;}
.pascal a:hover {background-color: #f0f000;}
.pascal .head {font-family: Verdana, Arial, sans-serif; color: #808080; font-size: 70%; font-weight: bold;  padding: 2px;}
.pascal .imp {font-weight: bold; color: red;}
.pascal .kw1 {color: #000000; font-weight: bold;}
.pascal .kw2 {color: #000000; font-weight: bold;}
.pascal .kw3 {color: #000066;}
.pascal .kw4 {color: #000066; font-weight: bold;}
.pascal .co1 {color: #808080; font-style: italic;}
.pascal .co2 {color: #008000; font-style: italic;}
.pascal .coMULTI {color: #808080; font-style: italic;}
.pascal .es0 {color: #ff0000; font-weight: bold;}
.pascal .br0 {color: #009900;}
.pascal .sy0 {color: #000066;}
.pascal .sy1 {color: #000066;}
.pascal .sy2 {color: #000066;}
.pascal .sy3 {color: #000066;}
.pascal .st0 {color: #ff0000;}
.pascal .nu0 {color: #cc66cc;}
.pascal .me1 {color: #006600;}
.pascal .re0 {color: #0000cc;}
.pascal .re1 {color: #ff0000;}
.pascal span.xtra { display:block; }
.ln, .ln{ vertical-align: top; }
.coMULTI, .pascal span{ line-height:13px !important;}
--></style><pre class="pascal"><ol><li class="li1"><div class="de1"><span class="kw1">program</span> CompileOne<span class="sy1">;</span></div></li><li class="li1"><div class="de1"><span class="kw1">var</span> x<span class="sy1">:</span> <span class="kw4">integer</span><span class="sy1">;</span></div></li><li class="li1"><div class="de1"><span class="kw1">begin</span></div></li><li class="li1"><div class="de1">	<span class="kw1">repeat</span></div></li><li class="li1"><div class="de1">		<span class="kw3">readln</span><span class="br0">(</span>x<span class="br0">)</span><span class="sy1">;</span></div></li><li class="li1"><div class="de1">		<span class="kw1">if</span> x&lt;&gt;<span class="nu0">42</span> <span class="kw1">then</span> <span class="kw3">writeln</span><span class="br0">(</span>x<span class="br0">)</span><span class="sy1">;</span></div></li><li class="li1"><div class="de1">	<span class="kw1">until</span> x<span class="sy3">=</span><span class="nu0">42</span></div></li><li class="li1"><div class="de1"><span class="kw1">end</span><span class="sy1">.</span></div></li></ol></pre>
					</div>
				</div>
								<div class="source-view ">
					<div class="header">
						<span class="lang" id="sample_lang_3">Perl (perl 5.16.2)</span>
						<span class="pull-right"><a href="sample/compileone_GDgs3.pl"><i class="icon-download-alt"></i> download</a>&nbsp;&nbsp;&nbsp;</span>
					</div>
					<div class="content">
						<style type="text/css"><!--/**
 * GeSHi (C) 2004 - 2007 Nigel McNie, 2007 - 2008 Benny Baumann
 * (http://qbnz.com/highlighter/ and http://geshi.org/)
 */
.perl  {font-family:monospace;color: #000066;}
.perl a:link {color: #000060;}
.perl a:hover {background-color: #f0f000;}
.perl .head {font-family: Verdana, Arial, sans-serif; color: #808080; font-size: 70%; font-weight: bold;  padding: 2px;}
.perl .imp {font-weight: bold; color: red;}
.perl .kw1 {color: #b1b100;}
.perl .kw2 {color: #000000; font-weight: bold;}
.perl .kw3 {color: #000066;}
.perl .co1 {color: #666666; font-style: italic;}
.perl .co2 {color: #009966; font-style: italic;}
.perl .co3 {color: #0000ff;}
.perl .co4 {color: #cc0000; font-style: italic;}
.perl .co5 {color: #0000ff;}
.perl .coMULTI {color: #666666; font-style: italic;}
.perl .es0 {color: #000099; font-weight: bold;}
.perl .es_h {color: #000099; font-weight: bold;}
.perl .br0 {color: #009900;}
.perl .sy0 {color: #339933;}
.perl .st0 {color: #ff0000;}
.perl .st_h {color: #ff0000;}
.perl .nu0 {color: #cc66cc;}
.perl .me1 {color: #006600;}
.perl .me2 {color: #006600;}
.perl .re0 {color: #0000ff;}
.perl .re4 {color: #009999;}
.perl span.xtra { display:block; }
.ln, .ln{ vertical-align: top; }
.coMULTI, .perl span{ line-height:13px !important;}
--></style><pre class="perl"><ol><li class="li1"><div class="de1"><span class="co1">#!/usr/bin/perl</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1"><span class="kw1">while</span> <span class="br0">(</span><span class="br0">(</span><span class="co5">$_</span><span class="sy0">=&lt;&gt;</span><span class="br0">)</span><span class="sy0">!=</span><span class="nu0">42</span><span class="br0">)</span> <span class="br0">{</span><a href="http://perldoc.perl.org/functions/print.html"><span class="kw3">print</span></a> <span class="co5">$_</span><span class="sy0">;</span><span class="br0">}</span></div></li></ol></pre>
					</div>
				</div>
								<div class="source-view ">
					<div class="header">
						<span class="lang" id="sample_lang_54">Perl 6 (rakudo-2010.08)</span>
						<span class="pull-right"><a href="sample/compileone_80Ww0.p6"><i class="icon-download-alt"></i> download</a>&nbsp;&nbsp;&nbsp;</span>
					</div>
					<div class="content">
						<style type="text/css"><!--/**
 * GeSHi (C) 2004 - 2007 Nigel McNie, 2007 - 2008 Benny Baumann
 * (http://qbnz.com/highlighter/ and http://geshi.org/)
 */
.c  {font-family:monospace;color: #000066;}
.c a:link {color: #000060;}
.c a:hover {background-color: #f0f000;}
.c .head {font-family: Verdana, Arial, sans-serif; color: #808080; font-size: 70%; font-weight: bold;  padding: 2px;}
.c .imp {font-weight: bold; color: red;}
.c .kw1 {color: #b1b100;}
.c .kw2 {color: #000000; font-weight: bold;}
.c .kw3 {color: #000066;}
.c .kw4 {color: #993333;}
.c .co1 {color: #666666; font-style: italic;}
.c .co2 {color: #339933;}
.c .coMULTI {color: #808080; font-style: italic;}
.c .es0 {color: #000099; font-weight: bold;}
.c .es1 {color: #000099; font-weight: bold;}
.c .es2 {color: #660099; font-weight: bold;}
.c .es3 {color: #660099; font-weight: bold;}
.c .es4 {color: #660099; font-weight: bold;}
.c .es5 {color: #006699; font-weight: bold;}
.c .br0 {color: #009900;}
.c .sy0 {color: #339933;}
.c .st0 {color: #ff0000;}
.c .nu0 {color: #0000dd;}
.c .nu6 {color: #208080;}
.c .nu8 {color: #208080;}
.c .nu12 {color: #208080;}
.c .nu16 {color:#800080;}
.c .nu17 {color:#800080;}
.c .nu18 {color:#800080;}
.c .nu19 {color:#800080;}
.c .me1 {color: #202020;}
.c .me2 {color: #202020;}
.c span.xtra { display:block; }
.ln, .ln{ vertical-align: top; }
.coMULTI, .c span{ line-height:13px !important;}
--></style><pre class="c"><ol><li class="li1"><div class="de1"><span class="kw1">while</span> <span class="br0">(</span><span class="br0">(</span>$_ <span class="sy0">=</span> $<span class="sy0">*</span>IN.<span class="me1">get</span><span class="br0">)</span> <span class="sy0">!=</span> <span class="nu0">42</span><span class="br0">)</span> <span class="br0">{</span> say $_ <span class="br0">}</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li></ol></pre>
					</div>
				</div>
								<div class="source-view ">
					<div class="header">
						<span class="lang" id="sample_lang_29">PHP (php 5.4.4)</span>
						<span class="pull-right"><a href="sample/compileone_1ae8DO.php"><i class="icon-download-alt"></i> download</a>&nbsp;&nbsp;&nbsp;</span>
					</div>
					<div class="content">
						<style type="text/css"><!--/**
 * GeSHi (C) 2004 - 2007 Nigel McNie, 2007 - 2008 Benny Baumann
 * (http://qbnz.com/highlighter/ and http://geshi.org/)
 */
.php  {font-family:monospace;color: #000066;}
.php a:link {color: #000060;}
.php a:hover {background-color: #f0f000;}
.php .head {font-family: Verdana, Arial, sans-serif; color: #808080; font-size: 70%; font-weight: bold;  padding: 2px;}
.php .imp {font-weight: bold; color: red;}
.php .kw1 {color: #b1b100;}
.php .kw2 {color: #000000; font-weight: bold;}
.php .kw3 {color: #990000;}
.php .kw4 {color: #009900; font-weight: bold;}
.php .co1 {color: #666666; font-style: italic;}
.php .co2 {color: #666666; font-style: italic;}
.php .co3 {color: #0000cc; font-style: italic;}
.php .co4 {color: #009933; font-style: italic;}
.php .coMULTI {color: #666666; font-style: italic;}
.php .es0 {color: #000099; font-weight: bold;}
.php .es1 {color: #000099; font-weight: bold;}
.php .es2 {color: #660099; font-weight: bold;}
.php .es3 {color: #660099; font-weight: bold;}
.php .es4 {color: #006699; font-weight: bold;}
.php .es5 {color: #006699; font-weight: bold; font-style: italic;}
.php .es6 {color: #009933; font-weight: bold;}
.php .es_h {color: #000099; font-weight: bold;}
.php .br0 {color: #009900;}
.php .sy0 {color: #339933;}
.php .sy1 {color: #000000; font-weight: bold;}
.php .st0 {color: #0000ff;}
.php .st_h {color: #0000ff;}
.php .nu0 {color: #cc66cc;}
.php .nu8 {color: #208080;}
.php .nu12 {color: #208080;}
.php .nu19 {color:#800080;}
.php .me1 {color: #004000;}
.php .me2 {color: #004000;}
.php .re0 {color: #000088;}
.php span.xtra { display:block; }
.ln, .ln{ vertical-align: top; }
.coMULTI, .php span{ line-height:13px !important;}
--></style><pre class="php"><ol><li class="li1"><div class="de1"><span class="kw2">&lt;?php</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1"><span class="re0">$hi</span> <span class="sy0">=</span> <a href="http://www.php.net/fopen"><span class="kw3">fopen</span></a><span class="br0">(</span><span class="st_h">'php://stdin'</span><span class="sy0">,</span> <span class="st0">"r"</span><span class="br0">)</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1"><span class="re0">$ho</span> <span class="sy0">=</span> <a href="http://www.php.net/fopen"><span class="kw3">fopen</span></a><span class="br0">(</span><span class="st_h">'php://stdout'</span><span class="sy0">,</span> <span class="st0">"w"</span><span class="br0">)</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1"><span class="kw1">while</span> <span class="br0">(</span><span class="kw4">true</span><span class="br0">)</span> <span class="br0">{</span></div></li><li class="li1"><div class="de1">	<a href="http://www.php.net/fscanf"><span class="kw3">fscanf</span></a><span class="br0">(</span><span class="re0">$hi</span><span class="sy0">,</span> <span class="st0">"<span class="es6">%d</span>"</span><span class="sy0">,</span> <span class="re0">$n</span><span class="br0">)</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1">	<span class="kw1">if</span> <span class="br0">(</span><span class="re0">$n</span> <span class="sy0">==</span> <span class="nu0">42</span><span class="br0">)</span> <span class="kw1">break</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1">	<a href="http://www.php.net/fwrite"><span class="kw3">fwrite</span></a><span class="br0">(</span><span class="re0">$ho</span><span class="sy0">,</span> <a href="http://www.php.net/sprintf"><span class="kw3">sprintf</span></a><span class="br0">(</span><span class="st0">"<span class="es6">%d</span><span class="es1">\n</span>"</span><span class="sy0">,</span> <span class="re0">$n</span><span class="br0">)</span><span class="br0">)</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1"><span class="br0">}</span></div></li><li class="li1"><div class="de1">&nbsp;</div></li><li class="li1"><div class="de1"><a href="http://www.php.net/fclose"><span class="kw3">fclose</span></a><span class="br0">(</span><span class="re0">$ho</span><span class="br0">)</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1"><a href="http://www.php.net/fclose"><span class="kw3">fclose</span></a><span class="br0">(</span><span class="re0">$hi</span><span class="br0">)</span><span class="sy0">;</span></div></li></ol></pre>
					</div>
				</div>
								<div class="source-view ">
					<div class="header">
						<span class="lang" id="sample_lang_19">Pike (pike 7.6.86)</span>
						<span class="pull-right"><a href="sample/compileone_sQUFXF.pike"><i class="icon-download-alt"></i> download</a>&nbsp;&nbsp;&nbsp;</span>
					</div>
					<div class="content">
						<style type="text/css"><!--/**
 * GeSHi (C) 2004 - 2007 Nigel McNie, 2007 - 2008 Benny Baumann
 * (http://qbnz.com/highlighter/ and http://geshi.org/)
 */
.c  {font-family:monospace;color: #000066;}
.c a:link {color: #000060;}
.c a:hover {background-color: #f0f000;}
.c .head {font-family: Verdana, Arial, sans-serif; color: #808080; font-size: 70%; font-weight: bold;  padding: 2px;}
.c .imp {font-weight: bold; color: red;}
.c .kw1 {color: #b1b100;}
.c .kw2 {color: #000000; font-weight: bold;}
.c .kw3 {color: #000066;}
.c .kw4 {color: #993333;}
.c .co1 {color: #666666; font-style: italic;}
.c .co2 {color: #339933;}
.c .coMULTI {color: #808080; font-style: italic;}
.c .es0 {color: #000099; font-weight: bold;}
.c .es1 {color: #000099; font-weight: bold;}
.c .es2 {color: #660099; font-weight: bold;}
.c .es3 {color: #660099; font-weight: bold;}
.c .es4 {color: #660099; font-weight: bold;}
.c .es5 {color: #006699; font-weight: bold;}
.c .br0 {color: #009900;}
.c .sy0 {color: #339933;}
.c .st0 {color: #ff0000;}
.c .nu0 {color: #0000dd;}
.c .nu6 {color: #208080;}
.c .nu8 {color: #208080;}
.c .nu12 {color: #208080;}
.c .nu16 {color:#800080;}
.c .nu17 {color:#800080;}
.c .nu18 {color:#800080;}
.c .nu19 {color:#800080;}
.c .me1 {color: #202020;}
.c .me2 {color: #202020;}
.c span.xtra { display:block; }
.ln, .ln{ vertical-align: top; }
.coMULTI, .c# span{ line-height:13px !important;}
--></style><pre class="c"><ol><li class="li1"><div class="de1"><span class="kw4">int</span> main<span class="br0">(</span><span class="br0">)</span> <span class="br0">{</span></div></li><li class="li1"><div class="de1">	string s<span class="sy0">=</span>Stdio.<span class="me1">stdin</span><span class="sy0">-&gt;</span><a href="http://www.opengroup.org/onlinepubs/009695399/functions/gets.html"><span class="kw3">gets</span></a><span class="br0">(</span><span class="br0">)</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1">	<span class="kw1">while</span> <span class="br0">(</span>s<span class="sy0">!=</span><span class="st0">"42"</span><span class="br0">)</span> <span class="br0">{</span></div></li><li class="li1"><div class="de1">		write<span class="br0">(</span>s<span class="sy0">+</span><span class="st0">"<span class="es1">\n</span>"</span><span class="br0">)</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1">		s<span class="sy0">=</span>Stdio.<span class="me1">stdin</span><span class="sy0">-&gt;</span><a href="http://www.opengroup.org/onlinepubs/009695399/functions/gets.html"><span class="kw3">gets</span></a><span class="br0">(</span><span class="br0">)</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1">	<span class="br0">}</span></div></li><li class="li1"><div class="de1">	<span class="kw1">return</span> <span class="nu0">0</span><span class="sy0">;</span></div></li><li class="li1"><div class="de1"><span class="br0">}</span></div></li></ol></pre>
					</div>
				</div>
							
								<div class="source-view ">
					<div class="header">
						<span class="lang" id="sample_lang_4">Python (python 2.7.3)</span>
						<span class="pull-right"><a href="sample/compileone_KsabRZ.py"><i class="icon-download-alt"></i> download</a>&nbsp;&nbsp;&nbsp;</span>
					</div>
					<div class="content">
						<style type="text/css"><!--/**
 * GeSHi (C) 2004 - 2007 Nigel McNie, 2007 - 2008 Benny Baumann
 * (http://qbnz.com/highlighter/ and http://geshi.org/)
 */
.python  {font-family:monospace;color: #000066;}
.python a:link {color: #000060;}
.python a:hover {background-color: #f0f000;}
.python .head {font-family: Verdana, Arial, sans-serif; color: #808080; font-size: 70%; font-weight: bold;  padding: 2px;}
.python .imp {font-weight: bold; color: red;}
.python .kw1 {color: #ff7700;font-weight:bold;}
.python .kw2 {color: #008000;}
.python .kw3 {color: #dc143c;}
.python .kw4 {color: #0000cd;}
.python .co1 {color: #808080; font-style: italic;}
.python .coMULTI {color: #808080; font-style: italic;}
.python .es0 {color: #000099; font-weight: bold;}
.python .br0 {color: black;}
.python .sy0 {color: #66cc66;}
.python .st0 {color: #483d8b;}
.python .nu0 {color: #ff4500;}
.python .me1 {color: black;}
.python span.xtra { display:block; }
.ln, .ln{ vertical-align: top; }
.coMULTI, .python span{ line-height:13px !important;}
--></style><pre class="python"><ol><li class="li1"><div class="de1">n <span class="sy0">=</span> <span class="kw2">int</span><span class="br0">(</span><span class="kw2">raw_input</span><span class="br0">(</span><span class="br0">)</span><span class="br0">)</span></div></li><li class="li1"><div class="de1"><span class="kw1">while</span> n <span class="sy0">!=</span> <span class="nu0">42</span>:</div></li><li class="li1"><div class="de1">	<span class="kw1">print</span> n</div></li><li class="li1"><div class="de1">	n <span class="sy0">=</span> <span class="kw2">int</span><span class="br0">(</span><span class="kw2">raw_input</span><span class="br0">(</span><span class="br0">)</span><span class="br0">)</span></div></li></ol></pre>
					</div>
				</div>
								<div class="source-view ">
					<div class="header">
						<span class="lang" id="sample_lang_116">Python 3 (python-3.2.3)</span>
						<span class="pull-right"><a href="sample/compileone_WZRBGW.py"><i class="icon-download-alt"></i> download</a>&nbsp;&nbsp;&nbsp;</span>
					</div>
					<div class="content">
						<style type="text/css"><!--/**
 * GeSHi (C) 2004 - 2007 Nigel McNie, 2007 - 2008 Benny Baumann
 * (http://qbnz.com/highlighter/ and http://geshi.org/)
 */
.python  {font-family:monospace;color: #000066;}
.python a:link {color: #000060;}
.python a:hover {background-color: #f0f000;}
.python .head {font-family: Verdana, Arial, sans-serif; color: #808080; font-size: 70%; font-weight: bold;  padding: 2px;}
.python .imp {font-weight: bold; color: red;}
.python .kw1 {color: #ff7700;font-weight:bold;}
.python .kw2 {color: #008000;}
.python .kw3 {color: #dc143c;}
.python .kw4 {color: #0000cd;}
.python .co1 {color: #808080; font-style: italic;}
.python .coMULTI {color: #808080; font-style: italic;}
.python .es0 {color: #000099; font-weight: bold;}
.python .br0 {color: black;}
.python .sy0 {color: #66cc66;}
.python .st0 {color: #483d8b;}
.python .nu0 {color: #ff4500;}
.python .me1 {color: black;}
.python span.xtra { display:block; }
.ln, .ln{ vertical-align: top; }
.coMULTI, .python span{ line-height:13px !important;}
--></style><pre class="python"><ol><li class="li1"><div class="de1">n <span class="sy0">=</span> <span class="kw2">int</span><span class="br0">(</span><span class="kw2">input</span><span class="br0">(</span><span class="br0">)</span><span class="br0">)</span></div></li><li class="li1"><div class="de1"><span class="kw1">while</span> n <span class="sy0">!=</span> <span class="nu0">42</span>:</div></li><li class="li1"><div class="de1">	<span class="kw1">print</span><span class="br0">(</span>n<span class="br0">)</span></div></li><li class="li1"><div class="de1">	n <span class="sy0">=</span> <span class="kw2">int</span><span class="br0">(</span><span class="kw2">input</span><span class="br0">(</span><span class="br0">)</span><span class="br0">)</span></div></li></ol></pre>
					</div>
				</div>
								
								<div class="source-view ">
					<div class="header">
						<span class="lang" id="sample_lang_17">Ruby (ruby-1.9.3)</span>
						<span class="pull-right"><a href="sample/compileone_UvDciSqb.ruby"><i class="icon-download-alt"></i> download</a>&nbsp;&nbsp;&nbsp;</span>
					</div>
					<div class="content">
						<style type="text/css"><!--/**
 * GeSHi (C) 2004 - 2007 Nigel McNie, 2007 - 2008 Benny Baumann
 * (http://qbnz.com/highlighter/ and http://geshi.org/)
 */
.ruby  {font-family:monospace;color: #000066;}
.ruby a:link {color: #000060;}
.ruby a:hover {background-color: #f0f000;}
.ruby .head {font-family: Verdana, Arial, sans-serif; color: #808080; font-size: 70%; font-weight: bold;  padding: 2px;}
.ruby .imp {font-weight: bold; color: red;}
.ruby .kw1 {color:#9966CC; font-weight:bold;}
.ruby .kw2 {color:#0000FF; font-weight:bold;}
.ruby .kw3 {color:#CC0066; font-weight:bold;}
.ruby .kw4 {color:#CC00FF; font-weight:bold;}
.ruby .co1 {color:#008000; font-style:italic;}
.ruby .co4 {color: #cc0000; font-style: italic;}
.ruby .coMULTI {color:#000080; font-style:italic;}
.ruby .es0 {color:#000099;}
.ruby .br0 {color:#006600; font-weight:bold;}
.ruby .sy0 {color:#006600; font-weight:bold;}
.ruby .st0 {color:#996600;}
.ruby .nu0 {color:#006666;}
.ruby .me1 {color:#9900CC;}
.ruby .re0 {color:#ff6633; font-weight:bold;}
.ruby .re1 {color:#0066ff; font-weight:bold;}
.ruby .re2 {color:#6666ff; font-weight:bold;}
.ruby .re3 {color:#ff3333; font-weight:bold;}
.ruby span.xtra { display:block; }
.ln, .ln{ vertical-align: top; }
.coMULTI, .ruby span{ line-height:13px !important;}
--></style><pre class="ruby"><ol><li class="li1"><div class="de1"><span class="kw1">while</span> <span class="br0">(</span>s=<span class="kw3">gets</span>.<span class="kw3">chomp</span><span class="br0">(</span><span class="br0">)</span><span class="br0">)</span> != <span class="st0">"42"</span> <span class="kw1">do</span> <span class="kw3">puts</span> s <span class="kw1">end</span></div></li></ol></pre>
					</div>
				</div>
								
								
		

	</div>
</div>

</div></div>


</div>
<br/><br/><br/>

<script>
	$("#drop-sign").click(function(){
					$('#response').text(""); 
					var username = $('#username').val();
					var password = $('#password').val();
					var remember = $('#remember').is(':checked')
					$.post('login.php', {'todo':'login','username':username,'password':password,'remember':remember},function(dt){  
										if(dt == "true")
										{
											window.location = "home.php"; 
										}
										else
										{
											window.location = "login.php"; 
										} 
										 });
						return false;
		
					});
</script>
<script type="text/javascript" src="assets/js/bootstrap-dropdown.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<?php include 'footer.php' ?>
</body>

</html>
