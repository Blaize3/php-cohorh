
		/*
			Call Document Ready Method
		*/
		//Open Document Ready Method
		$(document).ready(function(){

			///
			///	Declaring Operation Category 
			///

			// Variable operations categories
 			var operationCategories = ""; 
 			projectSummaryItem();

 			if (operationCategories == "Messages"){
 				setInterval(displayConversation(), 1000);
 			}

 			// Generrate Section options
 			generateUserSelectOptions();


			function displayConversation(){
				var initiator_id = parseInt($("#user-id").val(), 10);
				var initiator_ent_type = 2;
				var recipient_id = parseInt($("#selected-item-title").attr("title"), 10);
				var recipient_ent_type;
				if (parseInt($("#selected-item-title").attr("title"), 10) == 0){
					recipient_ent_type = 1;
					recipient_id = parseInt($("#project-id").val(), 10);
				} else {
					recipient_ent_type = 2;
				}
				
				$.post("viewconversation.php", { initiator: initiator_id, initiator_entity_type: initiator_ent_type,
				    recipient: recipient_id, recipient_entity_type: recipient_ent_type }, function(isSuccessfulSignup){
					$("#message-holder-UI-container").html(isSuccessfulSignup);
				});
			}


 			$("#project-summary-link").click(function(){
 				operationCategories = "Projects";
 			})

 			$("#project-message-link").click(function(){
 				operationCategories = "Messages";
 				setInterval(displayConversation(), 1000);
 			})

 			$("#team-member-link").click(function(){
 				operationCategories = "Network";
 			})
			
			//
			/// window load status
			///
			// var user_id = $("#user-id").val();
			// var project_id = $("#project-id").val();
			// $.post("getProjectMessage.php", { userid: user_id, projectid: project_id }, function(isSuccessfulSignup){
			// 	console.log(isSuccessfulSignup);
			// 	$("#user-content-area").empty();
			// 	$("#chat-area").empty();
			// 	$("#side-menu-data").empty();
			// 	$("#selected-item-title").empty();
			// 	$("#project-summary-link").attr("class", "active");
			// 	$("#project-message-link").attr("class", "inactive");
			// 	$("#team-member-link").attr("class", "inactive");
			// 	$("#selected-item-title").html("");
			// 	$("#user-content-area").html("");
			// 	$("#side-menu-data").html(`<div style="width: 100%; text-align: center; color:#66666e; padding-top:30px; font-size: 150%;"> No Projects Menu</div>`);
			// });

			///
			///	menu buttons clicks
			///

			$(document).click(function(e){
				///
				///	get details of the selected item
				///
				 if(e.target.title){
					console.log(operationCategories);
					console.log(e.target.title);
					var category = operationCategories;
					var clickedItem = e.target.title;

				 	if (category === 'Projects'){
				 		console.log("Go to the selected project page");
					} else if (category === 'Messages'){
						/*
							Code Message and posting message

						*/

						if (clickedItem == "All Thread") {

						} else if (clickedItem == "Broadcast"){

						} else if (clickedItem == "Private"){

						} else {
							console.log(e.target.id);
							$("#selected-item-title").html("");
							$("#selected-item-title").attr("title", e.target.id);
							$("#selected-item-title").html($("#selected-item-title").html() + " @ " + e.target.title);
							$("#user-content-area").html(chatMessageHolderUI);
						 	$("#chat-area").html(chatSession)
							$("#message").attr("placeholder", "message @ " + e.target.title);
							setInterval(displayConversation(), 1000);
						}
					} else if (category === 'Network'){
						//console.log("id ==========>", e.target.id);
						//console.log("title ==========>", e.target.title);
						var user_id = e.target.title;
						$.post("getSelectedProjectMember.php", {user_id: user_id}, function(isSuccessfulSignup){
							var userData = JSON.parse(isSuccessfulSignup);
							//console.log(userData.firstname);
							$("#fullname").html(userData.lastname + " "+ userData.firstname);
							$("#userprofileimage").attr("src", userData.image_url);
							$("#email-details").html(userData.email);
							$("#tel-details").html(userData.telephone);
						});
						
					}
				 }// ends get details of the selected item
			});// ends document click

			// call function add project summary
			// $("#submitAddSummary").click(function(){
			// 	addProjectSummary();
			// });


			///
			///	Post a message
			///
			$(document).keypress(function(e){
				//console.log(e.originalEvent.keyCode);
				if (e.originalEvent.keyCode === 13){
					if (!($("#message").val() === "")){

						var initiator_id = parseInt($("#user-id").val(), 10);
						var initiator_ent_type = 2;
						var recipient_id = parseInt($("#selected-item-title").attr("title"), 10);
						var recipient_ent_type;
						if (parseInt($("#selected-item-title").attr("title"), 10) == 0){
							recipient_ent_type = 1;
							recipient_id = parseInt($("#project-id").val(), 10);
						} else {
							recipient_ent_type = 2;
						}

						var messageBody = $("#message").val();
						
						$.post("sendMessage.php", { initiator: initiator_id, initiator_entity_type: initiator_ent_type,
						    recipient: recipient_id, recipient_entity_type: recipient_ent_type, message: messageBody }, function(isSuccessfulSignup){
							console.log(isSuccessfulSignup);
							$("#message").val("");
						});


						setInterval(displayConversation(), 1000);

						// console.log("initiator id =====>", initiator_id);
						// console.log("initiator entity type =====>", initiator_ent_type);
						// console.log("recipient id =====>", recipient_id);
						// console.log("recipient entity type =====>", recipient_ent_type);
						// console.log("messageBody ====>", messageBody);
					}

					//console.log(today(), "====>", time());
				}
			}); //ends post Message
			
		});// Closes Document Ready

	