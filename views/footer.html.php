	<div id="sidebar">
		<div id="logo"><h3><span>Melior</span>Med<h3></div>
		<div id="message">
			
			<form action="http://localhost/index.php/Message/postRequest" method="POST">
				<textarea id="text" name="message"></textarea>
				
				<div id="figcaption">
					<div id="upload">
						<i>+ add files</i>
					</div>
					<button type="submit" class="button">
						<p>Send</p>
					</button>
				</div>

			</form>
		</div>
		<div class="contact" id="contact_group">
			<div class="individuel">
				<div class="picture"></div>
				<div class="info">Pauline<div>
			</div>
			<div class="individuel">
				<div class="picture"></div>
				<div class="info">Pauline<div>
			</div>
		</div>
	</div>
</section>
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
					.click(function(e){console.log(e);window.open("http://localhost/index.php/Chat/with/"+e.currentTarget.id,"", "width=500, height=500");})
				);
			}
		});
	}

	$(document).ready(function() {
		$("#id").click(function(){
			$.get( "http://localhost/index.php/User/connect", function( data ) {
				console.log("OK");
			});
		});
		setInterval(updateUserList,500);
	});
</script>
</html>