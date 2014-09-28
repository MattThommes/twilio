<?php

	require "vendor/autoload.php";
	use MattThommes\Debug;
	$debug = new Debug;
	require_once("config.php");

	$send_sms = 0;
	$send_mms = 0;

	// set up the Twilio client.
	$twilio = new Services_Twilio(              
		$account_sid,
		$auth_token
	);

	$message_text = "testing here";

	if ($send_sms) {
		// send SMS.
		$sms = $twilio->account->sms_messages->create(
			$phone_number, // the number to send FROM.
			$to, // the number to send TO.
			$message_text
		);
	}

	$media_url = "http://media.thomm.es/images/Screen%20Shot%202014-07-18%20at%209.20.27%20AM.jpg";

	if ($send_mms) {
		// send MMS.
		$mms = $twilio->account->messages->sendMessage(
			$phone_number, // the number to send FROM.
			$to, // the number to send TO.
			$message_text,
			$media_url
		);
	}

?>