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
		
			<h1><span>DR <?= User::getUserById($post->idUser)->nom ?> </span> needs your Knowledge,</h1>
			<h2><?= $post->titre ?></h2>
			<p><?= $post->message ?></p> 
		
			<div class="button">
				<p>Comment</p>
			</div>
		
		</div>
	</div>
	<?php } ?>
	
</div>