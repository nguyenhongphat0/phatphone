<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<!--<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="/index.php">
            <span class="label label-warning">P</span> 
            <span class="label label-info">H</span> 
            <span class="label label-success">A</span>
            <span class="label label-primary">T</span>
            <span class="label" id="logo-phone-part">P H O N E</span>
	       </a>
	       <button class="btn btn-sm btn-primary" id="cart-icon" style="display: none">🛒<span class="badge" id="cart-no">0</span></button>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
		    <li id="nav-home"><a href="/index.php">Trang chủ</a></li>
		    <li id="nav-phone"><a href="/maker.php?m=all">Điện thoại</a></li>
	        <li id="nav-maker" class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Chọn hãng<span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
		        <li><a href="/maker.php?m=samsung">Samsung</a></li>
		        <li><a href="/maker.php?m=apple">Apple</a></li>
		        <li><a href="/maker.php?m=nokia">Nokia</a></li>
		        <li><a href="/maker.php?m=oppo">Oppo</a></li>
		        <li><a href="/maker.php?m=htc">HTC</a></li>
		        <li><a href="/maker.php?m=sony">Sony</a></li>
		        <li id="nav-other"><a href="/maker.php?m=other">Khác</a></li>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Liên hệ<span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="tel:0903670437">Phone</a></li>
	            <li><a target="_blank" href="https://www.facebook.com/profile.php?id=100004240774642">Facebook</a></li>
	            <li><a target="_blank" href="https://www.instagram.com/nguyenhongphat0">Instagram</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>