<ul>
	<?php
	foreach($data['data'] as $line){ ?>
		<li> <?= $line->titre ?> 
		<ul>
		<?php
		foreach($line->getReply() as $reply){ ?>
			<li> <?= $reply->message ?> <a href="http://localhost/index.php/Message/setResolu/<?= $reply->id ?>">Clique ici </a> </li>
		<?php } ?>
		</ul>
		</li>
	 <?php } ?>
</ul>