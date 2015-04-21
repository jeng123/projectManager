<html>
<head>
<title>Online project management tool</title>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
<style>
body {
 margin:0;
 padding:0;
 font-family:'Open Sans', sans-serif;
 color:#1d1d1d;
}
input,select,textarea {
 font-family:'Open Sans', sans-serif;
 border:1px solid #033E76;
 color:#033E76;
 width:100%;
 max-width:200px;
 padding:4px;
}
textarea {
 height:50px;
}
input[type=submit] {
 cursor:pointer;
}
.container {
 max-width:1200px;
 width:100%;
 margin:auto;
}
.clear {
 clear:both;
 display:block;
}

#header {
 padding:8px;
 background:#033E76;
 border-bottom:4px solid #1d1d1d;
 text-align:right;
}
#header,#header a {
 color:#fff;
 font-family:"Courier New", Courier, monospace;
 text-decoration:none;
}
.loginForm {
 padding-top:20px;
}
.loginForm input {
 margin:10px;
 font-size:20px;
}

.myProjects {
 width:200px;
 height:200px;
 float:left;
 border:1px solid #033E76;
 margin:10px;
 padding:5px;
}
.myProjects {
 color:#1d1d1d;
 background:#eeeff0;
 position:relative;
}
.myProjects:hover {
 background:#dfdfef;
}
.myProjects div {
 text-align:right;
 font-size:12px;
 background:#dfdfef;
 position:absolute;
 top:0px;
 left:0px;
 padding:5px;
 width:inherit;
}
.myProjects select {
 width:110px;
 font-size:14px;
 float:left;
}
.myProjects div input {
 width:30px;
 font-size:14px;
}
.myProjects span.title {
 display:block;
 padding:30px 0px 10px 0px;
 font-size:20px;
 font-weight:bold;
 color:#033E76;
}
.myProjects span.description {
 font-size:14px;
}
.myProjects span.creator {
 font-size:12px;
 text-align:right; 
 display:block;
 position:absolute;
 bottom:0px;
 left:0px;
 padding:5px;
 background:#dfdfef;
 width:inherit;
}
.myProjects span.creator b {
 color:#033E76;
}
.myTasks span.title input {
 margin-top:10px;
}
</style>
<script>
function openClose(id) {
 var el=document.getElementById(id);
 if(el.style.display=='block') {
  el.style.display='none'
 } else {
  el.style.display='block'
 }
}
</script>
</head>
<body>
 <center>
  <div id='header'>
   <div class='container'>
	<div style='float:left'><a href='/about'>ABOUT</a> | v1.0</div>
<?php if(isset($_SESSION['user'])) { ?>
	<a href='/dashboard'>My Projects</a> | 
	<a href='/?logout'>LOGOUT</a>
<?php } else { ?>
	<a href='/create-Account'>Create Account</a> | 
	<a href='/'>Login</a>
<?php } ?>
	<br class='clear'>
   </div>
  </div>
