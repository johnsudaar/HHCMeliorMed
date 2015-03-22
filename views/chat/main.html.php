<!DOCTYPE html>
<html>
<head>
<title> Chat </title>
<script src="http://localhost/assets/js/jquery.js"></script>
<link rel="stylesheet" href="http://localhost/assets/css/style.css">
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
</head>
<body>
	<!--<div id="title"> <?= $data['him']->nom ?> <?= $data['him']->prenom ?></div> -->
	<section id="messages"> 
		<?php
		foreach($data['posts'] as $post){
			if($post->sender == getUser()->id)
				$class = "me";
			else
				$class = "you";
			?>
			<div id="<?= $post->id ?>" class="<?= $class ?>">
				<?= User::getUserById($post->sender)->nom .' '. User::getUserById($post->sender)->prenom ?> :
				<?= $post->message ?>
			</div>
		<?php } ?>
	</section>
	<section id="messages"></section>
<div class="fig">
<input id="text" class="chatext" type="text" name="input"/>
<button id="send"> Envoyer </button>
</div>
</body>
	<script type="text/javascript">
	var lastId = "<?php echo $data['last_id']; ?>";
	var idUser = "<?php echo $data['him']->id; ?>";
	var urlFrom = "http://localhost/index.php/Chat/from/";
	var urlSend = "http://localhost/index.php/Chat/send/"

	function getMessages() {
		$.getJSON(urlFrom + idUser + "/" + lastId, function( data ) {
			if(!data) return;
			for(var i = 0 ; i < data.length ; i ++) {
				if(parseInt(data[i].id) > parseInt(lastId))
					lastId = data[i].id;
				if(!$('#'+data[i].id).length) {
					if(data[i].me)
						$('#messages').append('<div class="you" id='+data[i].id+'>'+data[i].from+' : '+data[i].message+'</div>');
					else
						$('#messages').append('<div class="me" id='+data[i].id+'>'+data[i].from+' : '+data[i].message+'</div>');
				}
			}
		});
	}

	function postMessage(e) {
	    if (e.keyCode == 13) {
			postMessageClick();
	    }
	}

	function postMessageClick() {
		var message = $('#text').val();
		if(message) {
			$('#text').val('');
			var data = {
				to: idUser,
				message: message
			}
			$.post(urlSend, data, function(){});
		}
	}

	function scrollToBot(){
		$('html, body').animate({scrollTop:$(document).height()});
	}

	$(document).ready(function() {
		$('#send').click(postMessageClick);
		$('#text').keyup(postMessage)
		setInterval(getMessages, 500);
	});

	</script>
</html>