<?php 
	
	define('ALPHA_CHAR', 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
	define('SMALL_ALPHA_CHAR', "abcdefghijklmnopqrstuvwxyz");
	define('LARGE_ALPHA_CHAR', "ABCDEFGHIJKLMNOPQRSTUVWXYZ");
	define('NUMBER_CHAR', '1234567890');
	define('SYMBOLS_CHAR', '!@#$%^&*()-={};<>?,./');
	define('SPECIAL_CHARS', '1234567890!@#$%^&*()-={};<>?,./');

	$generate_option = "";
	$length_generate_option = $_POST['length'];

	

	if(!empty($_POST) && count($_POST)){
		switch ($_POST['alpha_char']) {
			case 'password_generate_alpha_mix':{
				$generate_option .= ALPHA_CHAR;
				break;
			}
			case 'password_generate_alpha_lowercase':{
				$generate_option .= SMALL_ALPHA_CHAR;
				break;
			}
			case 'password_generate_alpha_uppercase':{
				$generate_option .= LARGE_ALPHA_CHAR;
				break;
			}
		}

		switch ($_POST['non_alpha_char']) {
			case 'password_generate_nonalpha_mix':{
				$generate_option .= SPECIAL_CHARS;
				break;
			}
			case 'password_generate_nonalpha_num':{
				$generate_option .= NUMBER_CHAR;
				break;
			}
			case 'password_generate_nonalpha_symbols':{
				$generate_option .= SYMBOLS_CHAR;
				break;
			}
		}


		$str = '';
		$max = mb_strlen($generate_option,'8bit') - 1;

		for($i = 0;$i < $length_generate_option; ++$i){
			$str .= $generate_option[random_int(0, $max)];
		}

		echo $str;

	}

?>