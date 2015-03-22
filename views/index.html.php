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
  			<img src="img/meningioma.jpg" style="width: 350px">
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
			<img src="img/avatar.png"/>
			<div class="nomprénom"></div>
			<div class="msgnotif"></div>
		</div>
		
	</div>
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