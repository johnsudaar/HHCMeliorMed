
</section>
<section id="sidebar">	
	<div id="logo"><h2><span>Melior</span>Med</h2></div>	
	<div class="contact" id="contact_group">
	</div>
	
	<div id="message">
		<form action="http://localhost/index.php/Message/postRequest" method="POST">
			<textarea id="text" name="message"></textarea>
			<textarea placeholder="#" id="texttag"></textarea>
			<input type="hidden" name="request" value="<?=$post->id?>"/>
			<div id="figcaption">
			<input type="submit" value="Send">
				<div id="upload">
					<i>+ add files</i>
				</div>
			</div>
		</form>
	</div>
</section>

<div id="notification" class="notification">
	<img src="http://localhost/assets/img/profiles/avatar.png"/>
	<div id="notificationnom" class="nomprénom"></div>
	<div id="notificationmessage" class="msgnotif"></div>
</div>
</body>
<script>

	function updateUserList(){
		$.getJSON( "http://localhost/index.php/User/connected", function( data ) {
			$('#contact_group').empty();
			for(var i = 0; i<data.length; i++){
				console.log(data[i].id);
				$('#contact_group').append(
				$('<div/>')
					.attr("id",data[i].id)
					.addClass("individuel")
					.append(
						$("<div/>").addClass("picture").append(
							$("<img/>").attr("src","http://localhost/assets/img/"+data[i].photo)
						)
					).append( $("<div/>").addClass("info").text(data[i].fonct+" "+data[i].nom+" "+data[i].prenom))
					.click(function(e){dejaOuvert = true; window.open("http://localhost/index.php/Chat/with/"+e.currentTarget.id,"", "width=500, height=500");})
				);
			}
		});
	}

	$(document).ready(function() {
		$("#id").click(function(){
			$.get( "http://localhost/index.php/User/connect", function( data ) {
				console.log("OK");
				$("#main_photo").toggleClass("green");
				$("#main_photo").toggleClass("red");

			});
		});
		setInterval(updateUserList,500);
		console.log($('input'));
		$('input').each(function() {
			if($(this).val() == 'Comment' || $(this).val() == 'Close') {
				$(this).click(changeUrl);
			}
		});
	});

	urlRequest = "http://localhost/index.php/Message/postRequest";
	urlReply = "http://localhost/index.php/Message/reply";
	function changeUrl() {
		$('form').each(function() {
			if($(this).attr('id') != 'recherche')
				console.log($(this).attr('action'));
				if($(this).attr('action') == urlRequest)
					$(this).get(0).setAttribute('action', urlReply);
				else
					$(this).get(0).setAttribute('action', urlRequest);
		});
	}
</script>
</html>