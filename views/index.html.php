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
			<p><?= $post->titre ?></p>
			<?php if(strlen($post->message)>90) {?>
			<p><?= substr($post->message,0,90) ?>...</p> 
			<?php } else { ?>
			<p><?= $post->message ?> </p>
			<?php } ?>
		
			<a href="#commentaire">
				<input type="submit" value="Comment">
			</a>
		</div>
	</div>
	<?php } ?>

</div>
<div  class="modal" id="commentaire">
	<?php
	$post = $data['posts'][0];
	$user = User::getUserById($post->idUser);
	$replys = Reply::getAllByPost($post->id);
	?>
  	<div id="pop">
		<div class="popHead">
  			<div class="asker">
					<h2><?= $user->nom?> <?= $user->prenom ?><h2>
					<!-- <p>SURGEON</p>-->
					<i><?= $user->pays?></i>
			</div>
			
  			<a href="#_"><input type="submit" class="close"  value="Close"/></a>
  		</div>
  		
  		<div class="popHead">
  			<img src="http://localhost/assets/img/meningioma.jpg" style="width: 350px">
	  			<h2><?= $post->titre ?></h2>
	  			<p> <?= $post->message ?></p>
		</div>
	</div>
	
	<div id="discussion">
		<?php foreach($replys as $reply) { 
			$cur_usr = User::getUserById($reply->idUser);?>
		<div class="comments">
			<img src="http://localhost/assets/img/<?=$cur_usr->photo?>"/>
			<div class="nomprénom"><?=$cur_usr->nom?> <?=$cur_usr->prenom?></div>
			<div class="msgnotif"><?= $reply->message ?></div>
		</div>

		<?php } ?>
		
	</div>
</div>

<script>
var userId = <?php echo getUser()->id; ?>;
var lastId = <?php echo ChatMessage::last(getUser()->id)['lmess']; ?>;
var dejaOuvert = false;
var lastNotifId;
var urlNotif = "http://localhost/index.php/Notification/getInfos/";
var urlLast = "http://localhost/index.php/Chat/lastMe/";
var urlRemoveNotif = "http://localhost/index.php/Notification/removeNotif/";

function checkLast() {
	$.getJSON(urlLast, function(data) {
		if(data[0].lmess != lastId && !dejaOuvert){
			lastId = data[0].uid;
			dejaOuvert = true;
			window.open("http://localhost/index.php/Chat/with/"+data[0].uid,"", "width=500, height=500");
		}
	});
}

function checkNotif() {
	$.getJSON(urlNotif, function(data) {
		if(!data) return;
		if($('#notificationnom').html().length < 1) {
			lastNotifId = data[0].id;
			$('#notification').addClass('afficher-notification');
			$('#notificationnom').append(data[0].nom + ' ' + data[0].prenom);
			$('#notificationmessage').append(data[0].libelle);
		}
	});
}

function removeNotif() {
	$.post(urlRemoveNotif,{id:lastNotifId}, function() {
	window.location.href= 'http://localhost/';
	});
}

$(document).ready(function() {
	setInterval(checkLast, 500);
	setInterval(checkNotif, 500);
	$('#notification').click(function() {
		$('#notification').removeClass('afficher-notification');
		$('#notificationnom').html('');
		$('#notificationmessage').html('');
		$('#notification').attr('display', 'none');
		removeNotif();
	});
})

</script>