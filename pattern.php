<!doctype HTML>
<html>
	<head>
		<style>
			.input{
				background: navy;
				color: white;
				margin: 20px auto;
				width: 50%;
			}
			.input form{
				padding: 10px;
			}
			.pattern {
				background: maroon;
				color: white;
				margin: 20px auto;
				width: 50%;
			}
			
		</style>
	</head>
<body>
<section class="pattern">
	<?php
	if(isset($_POST['submitted'])){
		$pattern = $_POST['pattern'];
		$input = $_POST['input'];
		if(preg_match($pattern, $input)){
			echo "Valid";
		}else{
			echo "Invalid";
		}
	}
	?>
</section>
	<section class="input">
		<form method="post" action="pattern.php">
			<p>
				Pattern: <input type="text" name="pattern" id="pattern" size="100"
				<?php if(isset($pattern)) echo "value='$pattern'"; ?>
				>
			</p>
			<p>
				Input: <input type="text" name="input" id="input" size="100"
				<?php if(isset($input)) echo "value='$input'"; ?>
				>
			</p>
			<p>
				<input type="hidden" name="submitted" value="submitted">
				<input type="submit" value="check">
			</p>
		</form>
	</section>
	</body>
</html>