<div id="timeline">
	<?php
	foreach($data['posts'] as $post){
	?>
	
	<div class="panneaux">
		
		<div class="time"><p>few minute ago</p></div>	
		
		<div class="avatar">
		<p><?= Reply::countResolutionsByIdUser($post->idUser) ?> cases resolved</p>
		</div>
		
		<div class="actu">
		
			<h1><span><?= User::getUserById($post->idUser)->fonction ?> <?= User::getUserById($post->idUser)->nom ?> </span> needs your Knowledge,</h1>
			<h2><?= $post->titre ?></h2>
			<p><?= $post->message ?></p> 
		
			<div class="button">
				<p>Comment</p>
			</div>
		
		</div>
	</div>
	<?php } ?>

</div>

<script>
var userId = <?php echo getUser()->id; ?>;
var lastId = <?php echo ChatMessage::last(getUser()->id)['lmess']; ?>;
var dejaOuvert = false;
var urlLast = "http://localhost/index.php/Chat/lastMe/";
function checkLast() {
	$.getJSON(urlLast, function(data) {
		if(data[0].lmess != lastId && !dejaOuvert){
			lastId = data[0].uid;
			dejaOuvert = true;
			window.open("http://localhost/index.php/Chat/with/"+data[0].uid,"", "width=500, height=500");
		}
	});
}

$(document).ready(function() {
	setInterval(checkLast, 500);
})

</script>