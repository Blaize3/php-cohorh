<?php
	require('config.php');


	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		//print_r($_POST);

		$initiator = $_POST['initiator'];
		$initiatorEntityType = $_POST['initiator_entity_type'];
		$recipient = $_POST['recipient'];
		$recipientEntityType = $_POST['recipient_entity_type'];
		$message = $_POST['message'];
		$status = "sent";
		$messageid;

		$sqlInitiator = "SELECT entity_id FROM entity WHERE entitytype_id = '$initiatorEntityType' AND codenumber = '$initiator'";

		$initiator_id;
		$recipient_id;

		if (!mysqli_query($con, $sqlInitiator)){
			
			echo "Error:" . mysqli_error($con);
			
		} else {
			
			$resultInitiator = mysqli_query($con, $sqlInitiator);

			$rowInitiator = mysqli_fetch_assoc($resultInitiator);

			$initiator_id = $rowInitiator['entity_id'];
		}


		$sqlRecipient = "SELECT entity_id FROM entity WHERE entitytype_id = '$recipientEntityType' AND codenumber = '$recipient'";

		if (!mysqli_query($con, $sqlRecipient)){
			
			echo "Error:" . mysqli_error($con);
			
		} else {
			
			$resultRecipient = mysqli_query($con, $sqlRecipient);

			$rowRecipient = mysqli_fetch_assoc($resultRecipient);

			$recipient_id = $rowRecipient['entity_id'];
		}

		//echo "initiator: $initiator_id, recipient: $recipient_id";


		$messagesql = "INSERT INTO message (messageBody, status) VALUES ('$message', '$status')";

		if (!mysqli_query($con, $messagesql)){
			
			echo "Error:" . mysqli_error($con);
			
		} else {
			
			$messageid = mysqli_insert_id($con);

		}

		$coversationsql = "INSERT INTO conversation (initiator, recipient, message_id) VALUES ('$initiator_id', '$recipient_id', '$messageid')";

		if (!mysqli_query($con, $coversationsql)){
			
			echo "Error:" . mysqli_error($con);
			
		} else {
			
			echo "wah woh";
		}


	}

	mysqli_close($con);
?>