<?php
	require('config.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$initiator = $_POST['initiator'];
		$initiator_entity_type = $_POST['initiator_entity_type'];
		$recipient = $_POST['recipient'];
		$recipient_entity_type = $_POST['recipient_entity_type'];
		$hasConversation = 0;

		// variables to hold initiator and recipient id
		$initiator_id;
		$recipient_id;

		// Generate entity id and user id
		$sqlInitiator = "SELECT entity.entity_id, users.user_id FROM entity LEFT JOIN users ON entity.codenumber = users.user_id WHERE entitytype_id = '$initiator_entity_type' AND codenumber = '$initiator'";

		if (!mysqli_query($con, $sqlInitiator)){
			
			echo "Error:" . mysqli_error($con);
			
		} else {
			
			$resultInitiator = mysqli_query($con, $sqlInitiator);

			$rowInitiator = mysqli_fetch_assoc($resultInitiator);

			$initiator_id = $rowInitiator['entity_id'];
			$user_id = $rowInitiator['user_id'];
		}

		// variables to hold recipient query based on entity type and entity name
		$sqlRecipient;
		$entityType;

		if ($recipient_entity_type == 1){
			$sqlRecipient = "SELECT entity.entity_id, projects.project_id FROM entity LEFT JOIN projects ON entity.codenumber = projects.project_id WHERE entitytype_id = '$recipient_entity_type' AND codenumber = '$recipient'";
			$entityType = "project";
		} else {
			$sqlRecipient = "SELECT entity.entity_id, users.user_id FROM entity LEFT JOIN users ON entity.codenumber = users.user_id WHERE entitytype_id = '$recipient_entity_type' AND codenumber = '$recipient'";
			$entityType = "user";
		}


		if (!mysqli_query($con, $sqlRecipient)){
			
			echo "Error:" . mysqli_error($con);
			
		} else {
			
			$resultRecipient = mysqli_query($con, $sqlRecipient);

			$rowRecipient = mysqli_fetch_assoc($resultRecipient);

			$recipient_id = $rowRecipient['entity_id'];

			if ($recipient_entity_type == 1){
				$codenumber = $rowRecipient['project_id'];
			} else {
				$codenumber = $rowRecipient['user_id'];
			}
		}

		//get users info
		$initiatorDetailsQuery = "SELECT * FROM users WHERE user_id = '$user_id'";

		// data to be retrieved
		$initiatorFullname;
		$initiatorImage_url;

		if (!mysqli_query($con, $initiatorDetailsQuery)){
			
			echo "Error:" . mysqli_error($con);
			
		} else {
			
			$resultUserDetails = mysqli_query($con, $initiatorDetailsQuery);
			$rowUserDetails = mysqli_fetch_assoc($resultUserDetails);

			$initiatorFullname = $rowUserDetails['lastname'] . " " . $rowUserDetails['firstname'];
			$initiatorImage_url = $rowUserDetails['image_url'];
		}

		$recipientDetailsQuery;

		if ($entityType = "user"){
			$recipientDetailsQuery = "SELECT * FROM users WHERE user_id = '$codenumber'";
		} else {
			$recipientDetailsQuery = "SELECT projects.project_id, projectdetails.projectname, projectdetails.image_url FROM projects LEFT JOIN projectdetails ON projects.project_id = projectdetails.project_id WHERE projects.project_id = '$codenumber'";
		}

		// data to be retrieved
		$recipientFullname;
		$recipientImage_url;

		if (!mysqli_query($con, $recipientDetailsQuery)){
			
			echo "Error:" . mysqli_error($con);
			
		} else {
			
			$resultRecipientDetails = mysqli_query($con, $recipientDetailsQuery);
			$rowRecipientDetails = mysqli_fetch_assoc($resultRecipientDetails);
			if ($entityType = "user"){
				$recipientFullname = $rowRecipientDetails['lastname'] . " " . $rowRecipientDetails['firstname'];
				$recipientImage_url = $rowRecipientDetails['image_url'];
			} else {
				$recipientFullname = $rowRecipientDetails['projectname'];
				$recipientImage_url = $rowRecipientDetails['image_url'];
			}
		}



		// Generate messages for a conversation
		$query = "SELECT conversation.initiator, conversation.recipient, message.messagebody, message.createdAt FROM conversation LEFT JOIN message ON conversation.message_id = message.message_id WHERE (conversation.initiator = '$initiator_id' AND conversation.recipient = '$recipient_id') OR (conversation.initiator = '$recipient_id' AND conversation.recipient = '$initiator_id')";

		if (!mysqli_query($con, $query)){
			
			echo "Error:" . mysqli_error($con);
			
		} else {
			
			$result = mysqli_query($con, $query);

			$messageHistory = "";

			$hasConversation = 0;

			while ($row = mysqli_fetch_assoc($result)){
				$hasConversation++;
				$deDate = date('jS M, Y', strtotime($row['createdAt']));
				$deTime = date('h:i:s', strtotime($row['createdAt']));

				if ($initiator_id === $row['initiator']){
					$messageHistory .= '<div class="container-fluid message"><div class="container"><div class="row"><div class="col-md-12" style="background: #eef;"><table><tr><td style="padding: 10px;" rowspan="2"><img style="width: 60px; height: 60px; border-radius: 100%;" src="' . $initiatorImage_url . '"></td><td style="font-weight: bolder; font-size: 110%; vertical-align: bottom; padding-top: 10px; padding-left: 5px;"><strong>'. $initiatorFullname .'</strong></td></tr><tr><td style="font-size: 80%; vertical-align: top; padding-top: 5px; padding-left: 15px; color: #999;">' .$deDate. '&nbsp;&nbsp;&nbsp;' .$deTime. '</td></tr></table></div></div><div class="row"><div style="width: 80%; margin-left: auto; margin-right:auto; padding: 20px 0px;">
						'.$row['messagebody'].'
					</div></div></div></div>';
				} else {
					$messageHistory .= '<div class="container-fluid message"><div class="container"><div class="row"><div class="col-md-12" style="background: #eef;"><table><tr><td style="padding: 10px;" rowspan="2"><img style="width: 60px; height: 60px; border-radius: 100%;" src="' . $recipientImage_url . '"></td><td style="font-weight: bolder; font-size: 110%; vertical-align: bottom; padding-top: 10px; padding-left: 5px;"><strong>'. $recipientFullname .'</strong></td></tr><tr><td style="font-size: 80%; vertical-align: top; padding-top: 5px; padding-left: 15px; color: #999;">' .$deDate. '&nbsp;&nbsp;&nbsp;' .$deTime. '</td></tr></table></div></div><div class="row"><div style="width: 80%; margin-left: auto; margin-right:auto; padding: 20px 0px;">
						'.$row['messagebody'].'
					</div></div></div></div>';
				}
			}
		}

		if($hasConversation > 0){
			echo $messageHistory;
		} else {
	 	echo '<div class="container-fluid"><div class="container"><div class="row"></div><div class="row"><div style="width: 80%; margin-left: auto; margin-right:auto; padding: 20px 0px;"><h6 style="width: 100%; text-align: center; font-weight: lighter;"> No conversation recorded yet!</h6>
	 		</div></div></div></div>';
		 }

		

	}
?>