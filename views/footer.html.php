
</section>
<section id="sidebar">	
	<div id="logo"><h2><span>Melior</span>Med</h2></div>	
	<div class="contact" id="contact_group">
		<div class="picture"></div>
		<div class="info">Pauline</div>
	</div>
	
	<div id="message">
		<form action="http://localhost/index.php/Message/postRequest" method="POST">
			<textarea id="text" name="message"></textarea>
			<textarea placeholder="#" id="texttag"></textarea>
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
						$("<div/>").addClass("picture")
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
	});
</script>
</html>