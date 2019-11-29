<!DOCTYPE html>
<html>
<head>
	<title>DropDown Menu Demos</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type="text/javascript" >
$(document).ready(function()
{
$(".account").click(function()
{
var X=$(this).attr('id');

if(X==1)
{
$(".submenu").hide();
$(this).attr('id', '0');	
}
else
{

$(".submenu").show();
$(this).attr('id', '1');
}
	
});

//Mouseup textarea false
$(".submenu").mouseup(function()
{
return false
});
$(".account").mouseup(function()
{
return false
});


//Textarea without editing.
$(document).mouseup(function()
{
$(".submenu").hide();
$(".account").attr('id', '');
});
	
});
	
	</script>
	<style type="text/css">
	div.dropdown {
color: #555;
margin: 3px -22px 0 0;
width: 143px;
position: relative;
height: 17px;
text-align:left;
}
div.submenu
{
background: #fff;
position: absolute;
top: -12px;
left: -20px;
z-index: 100;
width: 135px;
display: none;
margin-left: 10px;
padding: 40px 0 5px;
border-radius: 6px;
box-shadow: 0 2px 8px rgba(0, 0, 0, 0.45);
}

.dropdown  li a {
   
    color: #555555;
    display: block;
    font-family: arial;
    font-weight: bold;
    padding: 6px 15px;
  cursor: pointer;
text-decoration:none;
}

.dropdown li a:hover{
    background:#155FB0;
    color: #FFFFFF;
    text-decoration: none;
    
}
a.account {
font-size: 11px;
line-height: 16px;
color: #555;
position: absolute;
z-index: 110;
display: block;
padding: 11px 0 0 20px;
height: 28px;
width: 121px;
margin: -11px 0 0 -10px;
text-decoration: none;
background: url(icons/arrow.png) 116px 17px no-repeat;
cursor:pointer;
}
.root
{
list-style:none;
margin:0px;
padding:0px;
font-size: 11px;
padding: 11px 0 0 0px;
border-top:1px solid #dedede;
	
	
}

	</style>
</head>
<body>
<div class="wrapper">
	<div class="header">
		<center>
			<b>CodersPage Demo</b>
		</center>
	</div>
	<?php
	include "ads.php";
	?>
	<div class="center">
		<div style='margin:50px'>
	
	<div class="dropdown">
	<a class="account" >
	<span>My Account</span>
	</a>
	<div class="submenu" style="display: none; ">

	  <ul class="root">
<li >
	      <a href="#Dashboard" >Dashboard</a>
	    </li>

	    
	    <li >
	      <a href="#Profile" >Profile</a>
	    </li>
	   <li >

	      <a href="#settings">Settings</a>
	    </li>
	   

	    <li>
	      <a href="#feedback">Send Feedback</a>
	    </li>



	    <li>
	      <a href="#signout">Sign Out</a>
	    </li>
	  </ul>
	</div>
	</div>
	
	</div>
	</div>
	<?php include "footer.php" ?>
</div>
	
</body>
</html>