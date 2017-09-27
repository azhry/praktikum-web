<!DOCTYPE html>
<html>
<head>
	<title>jquery ajax</title>
	<meta charset="utf-8">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<div id="container">
		<input type="text" name="text" id="text">
		<button type="button" onclick="send();">Send</button>
		<div id="loader">
			
		</div>
		<div id="paragraphs">
			
		</div>
	</div>

	<script type="text/javascript">
		function send() {
			var json = {
				url: 'post.php',
				type: 'POST',
				data: {
					data: $('#text').val()
				},
				beforeSend: function() {
					$('#loader').html('<img src="19-0.gif">');
				},
				success: function(response) {
					$('#paragraphs').append('<p>' + response + '</p>');
					$('#loader').html('');
				}
			};

			$.ajax(json);
		}
	</script>
</body>
</html>