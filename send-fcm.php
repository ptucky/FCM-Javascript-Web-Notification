<?php
class startSendNotification
{
	
	function sendNoti($titleNoti, $bodyNoti, $actionNoti){
		// API access key from Google FCM App Console (Server Key)
		define( 'API_ACCESS_KEY', '');

		$registrationIDs = [
			"xxxxxxxxxx"
		];

		$fcmMsg = array(
			'title' => $titleNoti,
			'body' => $bodyNoti,
			'icon' => 'image/look24-logo-s.png',
			'click_action' => $actionNoti
		);
		
		$fcmFields = array(
			//'to' => $singleID,
			'registration_ids' => $registrationIDs,
			'priority' => 'high',
			'notification' => $fcmMsg
		);

		$headers = array(
			'Authorization: key=' . API_ACCESS_KEY,
			'Content-Type: application/json'
		);
		
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
		echo $result . "\n\n";
	}

}
?>

<?php 
// How to use
$titleNoti = "Hello test";
$bodyNoti = "Morning test";
$actionNoti = "https://medium.com/@ptuckyeagle";

$callNoti = new startSendNotification();
$callNoti->sendNoti($titleNoti, $bodyNoti, $actionNoti);
?>