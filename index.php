<!DOCTYPE html>
<html>
<head>
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script
	src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script>
</head>
<body>

	<?php 
		session_start();
		$_SESSION['user'] = 'Sherif Tarek';
	?>
	<div id="wrapper">
		<h1> Welcome to my chat </h1>

		<div class="chat-wrapper">
			<div id="chat">
				
			</div>
			<form method="POST" id="myForm">
				<textarea id="textarea" name="message" rows="7"></textarea>
			</form>  		
		</div>
	</div>

	<script type="text/javascript">
		loadChat();
		function loadChat()
		{
			$.post('handlers/messages.php?action=getMessages',function(response){
				$('#chat').html(response);
			});
		}
		$('#textarea').keydown(function(e){
			if(e.which == 13 || e.which == 10 )
			{
				e.preventDefault();
				$('form').submit();
			}
		});

		$('#myForm').submit(function(){
			var message = $('#textarea').val();
			$.post('handlers/messages.php?action=sendMessage&message='+message, function(response){
				if(response == 1)
				{
					$('#myForm').trigger("reset");
				}
				else
				{
					alert('Something went wrong');
				}
			});
			return false
		});
	</script>
</body>
</html>