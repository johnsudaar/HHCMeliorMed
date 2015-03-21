<html>
<head>
	<title> Chat </title>
	<script src="http://localhost/assets/js/jquery.js"></script>
</head>
<body>
	<h1> Chat avec <?= $data['him']->nom ?> <?= $data['him']->prenom ?></h1>
	<section id="messages"> 
		<?php
		foreach($data['posts'] as $post){ ?>
			<div id="<?= $post->id ?>">
				<?= User::getUserById($post->sender)->nom .' '. User::getUserById($post->sender)->prenom ?> :
				<?= $post->message ?>
			</div>
		<?php } ?>
	</section>
	<input id="text" type="text" name="input"/>
	<button id="send"> Envoyer </button>
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
				if(!$('#'+data[i].id).length)
					$('#messages').append('<div id='+data[i].id+'>'+data[i].from+' : '+data[i].message+'</div>');
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