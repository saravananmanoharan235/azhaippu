<?php

	function send_notification($sendData,$device_token){
		$push = new \PushNotification('fcm');
		$response = $push->setMessage($sendData)
		            //->setConfig(['dry_run' => false])
		            ->setDevicesToken($device_token)
		            ->send()
		            ->getFeedback();
		return $response;
	}

	function dbsavedate($unaligneddate){
		if($unaligneddate !=''){
	        $date = str_replace('/', '-',$unaligneddate);
	        return date('Y-m-d', strtotime($date));
    	}
    }
    function dbsavedatetime($unaligneddate){
		if($unaligneddate !=''){
	        $date = str_replace('/', '-',$unaligneddate);
	        return date('Y-m-d H:i:s', strtotime($date));
    	}
    }
    function dbsavetime($unaligneddate){
		if($unaligneddate !=''){
	        $date = str_replace('/', '-',$unaligneddate);
	        return date('H:i:s', strtotime($date));
    	}
    }

?>