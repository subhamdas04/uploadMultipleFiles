<!DOCTYPE html>
<html>
<head>
	<title>Upload Multiple Files</title>
	<style type="text/css">
		.btn{
			cursor: pointer;
			padding: 5px 20px 5px 20px;
			background: orange;
			border-radius: 10px;
			color: #fff;
		}
		.btn:active{
			background: black;
		}
	</style>

	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

</head>
<body>
	<center>
		<div class="main" style="margin-bottom: 20px;">
			<span id="info" style="display: none;">Please wait...</span>
		</div>
		<form method="POST">
			<input type="file" name="file" id="file" style="display: none;" multiple>
			<label for="file" class="btn">Upload File(s)</label>
		</form>
	</center>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#file').change(function(){
				var total = document.getElementById("file").files.length;

				for(var i=0; i<total; i++){
					var form_data = new FormData();
					form_data.append("file", document.getElementById("file").files[i]);
					$.ajax({
						type: "POST",
						url: "upload.php",
						data: form_data,
						contentType: false,
						cache: false,
						processData: false,
						beforeSend: function(){
							document.getElementById("info").style.display = "block";
						},
						success: function(data){
							document.getElementById("info").style.display = "none";
							document.getElementsByClassName("main")[0].innerHTML += data + "<br>";
						}
					});
				}
			});
		});
	</script>

</body>
</html>