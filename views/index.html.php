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
			<p><?= $post->message ?></p> 
		
			<a href="#commentaire">
				<input type="submit" value="Comment">
			</a>
		</div>
	</div>
	<?php } ?>

</div>
<div  class="modal" id="commentaire">
  	<div id="pop">	
		<div class="popHead">
  			<div class="asker">
					<h2>DR Suzanna Scott<h2>
					<p>SURGEON</p>
					<i>USA</i>
			</div>
			
  			<a href="#_"><input type="submit" class="close"  value="Close"/></a>
  		</div>
  		
  		<div class="popHead">
  			<img src="http://localhost/assets/img/meningioma.jpg" style="width: 350px">
	  			<h2>Boy, 4 years old, partial right brachial motor seizures,</h2><p> with progressive evolution in the last 3 months</b>,<br/>  and headache.
	  			The neurological exam revealed a right<br/>hemiparesis</b>, right  centralfacial palsy</b> and gait disturbance.</b></p><br/> 
	  			<p>The development was normal</b> and he had no history</b> of trauma<br/> or medical problems.
	  			The brain MRI revealed a well-enhanced<br/> tumor</b> with maximal dimensions 71</b>x78</b>x74 cm</b>, 
	  			noninfiltrative <br/>located in the left lateral ventricle</b> with secondary left<br/>ventriculomegaly</b> and  midline shift of approximately 1, 5 cm.<p><br/>
	  			<p>Laboratory analyses were normal and the ophthalmological<br/>exam revealed papillary edema.<br/><br/>
				<h3>All treatments failed. What would be your solution ?</h3> 
		</div>
	</div>
	
	<div id="discussion">
	
		<div class="comments">
			<img src="http://localhost/assets/img/profiles/avatar.png"/>
			<div class="nomprénom">Data</div>
			<div class="msgnotif">Test Commentaire</div>
		</div>
		
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
	$.post(urlRemoveNotif,{id:lastId}, function() {
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