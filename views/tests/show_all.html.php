<ul>
	<?php
	foreach($data['data'] as $line){ ?>
		<li> <?= $line->titre ?> 
		<ul>
		<?php
		foreach($line->getReply() as $reply){ ?>
			<li> <?= $reply->message ?> </li>
		<?php } ?>
		</ul>
		</li>
	 <?php } ?>
</ul>