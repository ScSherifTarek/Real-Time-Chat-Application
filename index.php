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
			<form method="POST">
				<textarea id="textarea" name="message" rows="7"></textarea>
			</form>  		
		</div>
	</div>

	<script type="text/javascript">
		$('#textarea').keydown(function(e){
			if(e.which == 13 || e.which == 10 )
			{
				e.preventDefault();
				$('form').submit();
			}
		});

		$('form').submit(function(){
			alert('form submitted using AJAX');
			return false
		});
	</script>
</body>
</html>