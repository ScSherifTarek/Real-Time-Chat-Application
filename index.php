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

		setInterval(function(){
			loadChat();
		},1000);

		function loadChat()
		{
			$.post('handlers/messages.php?action=getMessages',function(response){
				$('#chat').html(response);

				var scrollPos = parseInt($('#chat').scrollTop()) + 549;
				var scrollHeight = $('#chat').prop('scrollHeight');

				if(scrollPos >= scrollHeight)
					$('#chat').scrollTop( $('#chat').prop('scrollHeight') );
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
					loadChat();
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