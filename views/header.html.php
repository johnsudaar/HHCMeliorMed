<!DOCTYPE html>
<html>
	<head>
	
		<meta charset="UTF-8">
		<title>MeliorMed</title>
		
		<link rel="stylesheet" href="http://localhost/assets/css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
		<script src="http://localhost/assets/js/jquery.js"></script>
	</head>

	<body>

	<section id="menu">
		<div id="id" >
			<?php if(getUser()->connect) { ?>
				<img id="main_photo" src="http://localhost/assets/img/<?= getUser()->photo ?>" class="green">
			<?php } else { ?>
				<img id="main_photo" src="http://localhost/assets/img/<?= getUser()->photo ?>" class="red">
			<?php } ?>
		</div>
		<nav>
			<ul>
				<li class="tag"><h3>#Diabetes</h3>
					<p>Subjects : <span>3</span></p>
					<p>Membres : <span>10</span></p>
					<p>Messages : <span>50</span></p>
				</li>
				
				<li class="tag"><h3>#Tumer</h3>
					<p>Subjects : <span>3</span></p>
					<p>Membres : <span>10</span></p>
					<p>Messages : <span>50</span></p>
				</li>
				
				<li class="tag"><h3>#Neurosurgery</h3>
					<p>Subjects : <span>3</span></p>
					<p>Membres : <span>10</span></p>
					<p>Messages : <span>50</span></p>
				</li>
				
				<li class="tag"><h3>#Innovation</h3>
					<p>Subjects : <span>3</span></p>
					<p>Membres : <span>10</span></p>
					<p>Messages : <span>50</span></p>
				</li>
			</ul>			
		</nav>
	</section>
	`
	<section id="main">	
		<div id="top">		
			<div class="filtre" id="home">All</div>
 			<div class="filtre" id="case">Second Opinion</div>
			<div class="filtre" id="conf">Articles</div>
			<div class="filtre" id="event">Events</div>
			<div class="filtre" id="home">Technology</div>		
		</div>
		
		<form id="recherche">
			<input class="search" placeholder="&#124;" required>
			<input type="submit" value="Search">
		</form>	
		