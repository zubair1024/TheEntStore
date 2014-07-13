<?php
$objBusiness = new Business();
$business=$objBusiness->getBusiness();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>The Entertainment Store</title>
<meta name="description" content="The Entertainment Store" />
<meta name="keywords" content="The Entertainment Store" />
<meta http-equiv="imagetoolbar" content="no" />
<link href="../css/core.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
	<div id="header_in">
            <h5><a href="#"><?php echo $business['name']; ?></a></h5>
	</div>
</div>
<div id="outer">
	<div id="wrapper">
		<div id="left">
			<h2>Categories</h2>
			<ul id="navigation">
				<li><a href="#">link</a></li>
			</ul>		
		</div>
		<div id="right">