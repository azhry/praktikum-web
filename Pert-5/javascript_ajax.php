<!DOCTYPE html>
<html>
<head>
	<title>JavaScript Ajax</title>
	<meta charset="utf-8">
</head>
<body>
	<div class="container">
		<input type="text" name="data" id="data">
		<button type="button" onclick="send();">Send</button>
		<div id="loader"></div>
		<div id="paragraphs">
			
		</div>
	</div>

	<script type="text/javascript">
		var xhr = null;

		function send() {
            try
            {
                xhr = new XMLHttpRequest();
            }
            catch (e)
            {
                xhr = new ActiveXObject('Microsoft.XMLHTTP');
            }

            if (xhr == null)
            {
                alert('Ajax not supported by your browser!');
                return;
            }

            var url = 'process.php';

            xhr.onreadystatechange = handler;
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            document.getElementById('loader').innerHTML = '<img src="19-0.gif">';
            setTimeout(function() {
            	xhr.send('data=' + document.getElementById('data').value);
            }, 5000);
		}

		function handler() {
            if (xhr.readyState == 4)
            {
                if (xhr.status == 200)
                {
                    append(xhr.responseText);
                	document.getElementById('data').value = '';
                }
                else
                {
                    alert("Error with Ajax call!");
                }
            }
            document.getElementById('loader').innerHTML = '';
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