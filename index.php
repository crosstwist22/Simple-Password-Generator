<?php


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="icon"  href="assets/img/ikigami-logo.ico" />
	<link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/grid-style.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<style type="text/css">
		html{
			font-family: 'Raleway', sans-serif;
			font-weight: 300;
		}
		h1{
			font-weight: 300;
		}
		.app-container{
			background-color:#4db6ac;
			border: 1px solid transparent;
			margin-top: 50px;
		}
		.app-form{
			width: 80%;
			margin: 2.5% auto;
		}
		.form-input{
			position: relative;
			margin-top: 1rem;
		}
		.form-input > .generate-slot{
			background-color: white;
			border-radius: 0;
			outline: none;
			height: 2.5rem;
			width: 90%;
			transition: 0.25s all;
			font-size: 1.75rem;
		}
		.form-input > button{
			border: 0;
			outline: 0;
			padding: 18px 18px;
			color: white;
			text-align: center;
			background-color: #00897b;
			transition: 0.25s all;
		}
		.form-input > button:hover{
			opacity: 0.8;
		}
		.label-options{
			background-color: white;
			margin-top: 50px;
		}
		.form-input-app{
			width: 85%;
			margin: 2.5% auto;
		}
		.form-input > label{
			display: inline-block;
			font-size: 20px;
		}
		.form-input > p{
			display: none;
			color: red;
		}
	</style>
</head>
<body>
	<div class="main-container">
		<div class="app-container">
			<div class="app-form">
					<h1>Password Generator</h1>
					<div class="form-input">
						<input type="text" name="rand" class="generate-slot" id="generate_output">
						<button type="button" id="generate_password">Generate</button>
					</div>
					<div class="label-options grid-row">
						<div class="form-input-app">		
							<div class="form-input">
								<label for="generate_password_length">Length: </label>
								<input type="text" id="generate_password_length" name="generate_length_password" class="length-form" size="2" maxlength="2"> (10-20)
								<p>Invalid Length</p>
							</div>
							<div class="grid-col grid-phone-a-12 grid-phone-b-12 grid-tablet-a-12 grid-tablet-b-6 grid-desktop-a-6 grid-desktop-b-6">
								<p>Alpha Characters:</p>
								<div class="form-input">
									<input type="radio" name="generate_password_alpha" id="generate_password_mixed_alpha" value="password_generate_alpha_mix" checked="1">
									<label for="generate_password_mixed_alpha"> Both (aBcD)</label>
								</div>
								<div class="form-input">
									<input type="radio" name="generate_password_alpha" id="generate_password_lowercase" value="password_generate_alpha_lowercase">
									<label for="generate_password_lowercase">Lowercase (abc)</label>
								</div>
								<div class="form-input">
									<input type="radio" name="generate_password_alpha" id="generate_password_uppercase"  value="password_generate_alpha_uppercase" >
									<label for="generate_password_uppercase">Uppercase (ABC)</label>
								</div>
							</div>
							<div class="grid-col grid-phone-a-12 grid-phone-b-12 grid-tablet-a-12 grid-tablet-b-6 grid-desktop-a-6 grid-desktop-b-6">
								<p>Non Alpha Characters:</p>

								<div class="form-input">
									<input type="radio" name="generate_password_nonalpha" id="generate_password_mixed_nonalpha" value="password_generate_nonalpha_mix" checked="1">
									<label for="generate_password_mixed_nonalpha">Both (1@3$)</label>
								</div>
								<div class="form-input">
									<input type="radio" name="generate_password_nonalpha" id="generate_password_numbers" value="password_generate_nonalpha_num">
									<label for="generate_password_numbers">Numbers (123)</label>
								</div>
								<div class="form-input">
									<input type="radio" name="generate_password_nonalpha" id="generate_password_symbols" value="password_generate_nonalpha_symbols">
									<label for="generate_password_symbols">Symbols (@#$)</label>
								</div>
							</div>
						</div>
					</div>
			</div>
			
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#generate_password').click(function(){
				var generate_options  = {
					length:function(){
						if($('#generate_password_length').val() === "" || $('#generate_password_length').val() === null){
							return 0;
						}
						else{
							return $('#generate_password_length').val();
						}
					},
					alpha_char:$('input:radio[name=generate_password_alpha]:checked').val(),
					non_alpha_char:$('input:radio[name=generate_password_nonalpha]:checked').val()
				}

				var length_value = parseInt($('#generate_password_length').val());

				if(length_value >= 10 && length_value <= 30){
					$.ajax({
						url:'generate.php',
						type:'POST',
						dataType:'text',
						data:generate_options,
						success:function(data){
							$('#generate_output').val(data);
							$('#generate_password_length').css({'border':'1px solid black'});
							$('.form-input > p').css({'display':'none'});
						}
					})
				}
				else{
					$('#generate_password_length').css({'border':'1px solid red'});
					$('.form-input > p').css({'display':'block'});
				}

				
			})
		});
	</script>
</body>
</html>
