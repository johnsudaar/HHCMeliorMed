<html>
<head>
	<title> Chat </title>
	<script src="http://localhost/assets/js/jquery.js"></script>
	<script src="http://localhost/assets/js/chat.js"></script>
</head>
<body>
	<h1> Chat avec <?= $data['him']->nom ?> <?= $data['him']->prenom ?></h1>
	<input type="text" name="input"/>
	<button id="send"> Envoyer </button>
	<section> 
		<?php
		foreach($data['posts'] as $post){ ?>
			<div id="<?= $post->id ?>">
				<?= User::getUserById($post->id)->prenom ?> :
				<?= $post->message ?>
			</div>
		<?php } ?>
	</section>
	Last : <?= $data['last_id'] ?>
</body>
</html>