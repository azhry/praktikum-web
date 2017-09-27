<!DOCTYPE html>
<html>
<head>
	<title>jQuery Ajax</title>
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
			var text = document.getElementById('text').value;

			var xhr = new XMLHttpRequest();
			
			var url = 'post.php'; // data dikirim kemana
			xhr.open('POST', url, true);
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

			document.getElementById('loader').innerHTML = '<img src="19-0.gif">';
			
			// anonymous function
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4) {
					if (xhr.status == 200) {
						append(xhr.responseText);
					}
				}
				document.getElementById('loader').innerHTML = '';
			};

			setTimeout(function() {
				xhr.send('data=' + text);
			}, 2000);
		}

		function append(text) {
			var node = document.createElement('p');
			var textNode = document.createTextNode(text);
			node.appendChild(textNode);
			document.getElementById('paragraphs').appendChild(node);
		}
	</script>
</body>
</html>