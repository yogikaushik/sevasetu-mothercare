<?php
	$template = array();
	
	function template1($phone_number, $auth_token, $name){
		$ret = '<MESSAGE>
		<AUTHKEY>'.$_ENV['SMS_KEY'].'</AUTHKEY>
		<SENDER>'.$_ENV['SMS_NAME'].'</SENDER>
		<ROUTE>'.$_ENV['SMS_ROUTE'].'</ROUTE>
		<CAMPAIGN>XML API</CAMPAIGN>
		<COUNTRY>91</COUNTRY>
		<SMS TEXT="Hi '.$name.'! '. $auth_token.' is your passkey. For assistance, write to help@sevasetu.org" >
		<ADDRESS TO="'.$phone_number.'"></ADDRESS>
		</SMS>
		</MESSAGE>';
		return $ret;
	}
	
	function template2($cc_name, $cc_phonenumber, $count){
		$ret = '<MESSAGE>
		<AUTHKEY>'.$_ENV['SMS_KEY'].'</AUTHKEY>
		<SENDER>'.$_ENV['SMS_NAME'].'</SENDER>
		<ROUTE>'.$_ENV['SMS_ROUTE'].'</ROUTE>
		<CAMPAIGN>XML API</CAMPAIGN>
		<COUNTRY>91</COUNTRY>
		<SMS TEXT="Hi '.$cc_name.'! You have '.$count.' phone calls scheduled this week. Login to sevasetu.org/mother_care with your details for more info." >
		<ADDRESS TO="'.$cc_phonenumber.'"></ADDRESS>
		</SMS>
		</MESSAGE>';
		return $ret;
	}
	
	function template3($cc_name, $cc_phonenumber, $mother_name, $mother_number){
		$ret = '<MESSAGE>
		<AUTHKEY>'.$_ENV['SMS_KEY'].'</AUTHKEY>
		<SENDER>'.$_ENV['SMS_NAME'].'</SENDER>
		<ROUTE>'.$_ENV['SMS_ROUTE'].'</ROUTE>
		<CAMPAIGN>XML API</CAMPAIGN>
		<COUNTRY>91</COUNTRY>
		<SMS TEXT="Hi '.$cc_name.'! Your call with '.$mother_name.' is due this week. Please call her on '.$mother_number.'. Login to sevasetu.org/mother_care with your details for more info." >
		<ADDRESS TO="'.$cc_phonenumber.'"></ADDRESS>
		</SMS>
		</MESSAGE>';
		return $ret;
	}
	
	
	function template4($cc_name, $cc_phonenumber, $count){
		$ret = '<MESSAGE>
		<AUTHKEY>'.$_ENV['SMS_KEY'].'</AUTHKEY>
		<SENDER>'.$_ENV['SMS_NAME'].'</SENDER>
		<ROUTE>'.$_ENV['SMS_ROUTE'].'</ROUTE>
		<CAMPAIGN>XML API</CAMPAIGN>
		<COUNTRY>91</COUNTRY>
		<SMS TEXT="Hi '.$cc_name.'! This is to remind you that you have  '.$count.'. phone calls scheduled. Login to sevasetu.org/mother_care with your details for more info." >
		<ADDRESS TO="'.$cc_phonenumber.'"></ADDRESS>
		</SMS>
		</MESSAGE>';
		return $ret;
	}
	
	function template5($cc_name, $cc_phonenumber, $mother_name, $mother_number){
		$ret = '<MESSAGE>
		<AUTHKEY>'.$_ENV['SMS_KEY'].'</AUTHKEY>
		<SENDER>'.$_ENV['SMS_NAME'].'</SENDER>
		<ROUTE>'.$_ENV['SMS_ROUTE'].'</ROUTE>
		<CAMPAIGN>XML API</CAMPAIGN>
		<COUNTRY>91</COUNTRY>
		<SMS TEXT="Hi '.$cc_name.'! This is a reminder for your call with '.$mother_name.'. Please call her on '.$mother_number.'. Login to sevasetu.org/mother_care with your details for more info." >
		<ADDRESS TO="'.$cc_phonenumber.'"></ADDRESS>
		</SMS>
		</MESSAGE>';
		return $ret;
	}
	
	function template6($phonenumber){
		$ret = '<MESSAGE>
		<AUTHKEY>'.$_ENV['SMS_KEY'].'</AUTHKEY>
		<SENDER>'.$_ENV['SMS_NAME'].'</SENDER>
		<ROUTE>'.$_ENV['SMS_ROUTE'].'</ROUTE>
		<CAMPAIGN>XML API</CAMPAIGN>
		<COUNTRY>91</COUNTRY>
		<UNICODE>1</UNICODE>
		<SMS TEXT="सेवा सेतु के मदर केयर प्रोग्राम मे आपका स्वागत है| इस हफ्ते आपके कॉल चैंपियन इस नंबर पर संपर्क करेंगे|">
		<ADDRESS TO="'.$phonenumber.'"></ADDRESS>
		</SMS>
		</MESSAGE>';
		return $ret;
	}
	
	function template7($cc_name, $cc_phonenumber, $mentor_name, $mentor_number){
		$ret = '<MESSAGE>
		<AUTHKEY>'.$_ENV['SMS_KEY'].'</AUTHKEY>
		<SENDER>'.$_ENV['SMS_NAME'].'</SENDER>
		<ROUTE>'.$_ENV['SMS_ROUTE'].'</ROUTE>
		<CAMPAIGN>XML API</CAMPAIGN>
		<COUNTRY>91</COUNTRY>
		<SMS TEXT="Hi '.$cc_name.'! '.$mentor_name.' has been assigned to you as a mentor. You can contact her on '.$mentor_number.'. You can shadow her on live calls. Schedules of all such calls will be notified to you." >
		<ADDRESS TO="'.$cc_phonenumber.'"></ADDRESS>
		</SMS>
		</MESSAGE>';
		return $ret;
	}

	function template8($cc_name, $cc_phonenumber, $mentee_name, $mentee_number){
		$ret = '<MESSAGE>
		<AUTHKEY>'.$_ENV['SMS_KEY'].'</AUTHKEY>
		<SENDER>'.$_ENV['SMS_NAME'].'</SENDER>
		<ROUTE>'.$_ENV['SMS_ROUTE'].'</ROUTE>
		<CAMPAIGN>XML API</CAMPAIGN>
		<COUNTRY>91</COUNTRY>
		<SMS TEXT="Hi '.$cc_name.'! '.$mentee_name.' has been assigned to you as a new mentee. You can contact her on '.$mentee_number.'. Login to sevasetu.org/mother_care with your details for more info." >
		<ADDRESS TO="'.$cc_phonenumber.'"></ADDRESS>
		</SMS>
		</MESSAGE>';
		return $ret;
	}

	function send_sms($template_id, $data_arr){
		$url = $_ENV['SMS_URL'];
		
		$data = array('data'=>call_user_func_array('template'.$template_id, $data_arr));
		
		// use key 'http' even if you send the request to https://...
		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($data)
			)
		);
		
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		
		if ($result === FALSE) { /* Handle error */ }
		return $result;
	}


?>
