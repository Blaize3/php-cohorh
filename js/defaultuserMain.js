/*
			Call Document Ready Method
		*/

		//Open Document Ready Method
		$(document).ready(function(){			
			///
			///	Declaring Operation Category 
			///

			var operationCategories = "";
			var messageID = 1; 


			///
			/// Displays User Default load after signing in.........
			///

			var user_id = $("#user-id").val();
			$.post("getUserProjects.php", {userid: user_id}, function(isSuccessfulSignup){
				$("#user-content-area").empty();
				$("#chat-area").empty();
				$("#side-menu-data").empty();
				$("#selected-item-title").empty();
				$("#project-menu-link").attr("class", "active");
				$("#message-menu-link").attr("class", "inactive");
				$("#network-menu-link").attr("class", "inactive");
				$("#selected-item-title").html("");
				operationCategories = "Projects";
				$("#user-content-area").html(isSuccessfulSignup);
				$("#side-menu-data").html(`<div style="width: 100%; text-align: center; color:#66666e; padding-top:30px; font-size: 150%;"> No Projects Menu</div>`);
			});


			///
			///	Select category and items and progress to the next UI
			///

			$(document).click(function(e){
				///
				///	get details of the selected item
				///
				if(e.target.title){
					//console.log(operationCategories);
					//console.log(e.target.title);
					var category = operationCategories;
					var clickedItem = e.target.title;

					if (category === 'Projects'){
						//console.log("Go to the selected project page");
						//console.log(clickedItem);
						var project_id = clickedItem;

						$.post("loadSelectedProject.php", {projectid: project_id}, function(isSuccessfulSignup){
							//console.log(isSuccessfulSignup);
							if (isSuccessfulSignup == 1){
								window.location = "selectedgroup.php";
							}
						});
					} else if (category === 'Messages'){
						/*
							Code Message and posting message

						*/

						//console.log("Go to Chat section of the network");

						$("#selected-item-title").html($("#selected-item-title").html() + " @ " + e.target.title);
						$("#user-content-area").html(chatMessageHolderUI);
						$("#chat-area").html(chatSession)
						$("#message").attr("placeholder", "message @ " + e.target.title);
						$("#side-menu-data").html(`<div style="width: 100%; text-align: center; color:#66666e; padding-top:30px; font-size: 150%;"> No Projects Menu</div>`);


					} else if (category === 'Network'){
						/*
							View selected Network Details

						*/

						
						

					}
				}// ends get details of the selected item
			});// ends document click



			///
			///	Post a message
			///
			$(document).keypress(function(e){
				//console.log(e.originalEvent.keyCode);
				if (e.originalEvent.keyCode === 13){
					if (!($("#message").val() === "")){
						$("#message-holder-UI-container").append(`
							<div id="${messageID}" class="chat-message-sent">
							<div class="username-date-time">
								<span class="username">@${loggedInUser}</span><br> <span class="time">${time()}</span> &nbsp;&nbsp;<span class="date">${today()}</span>
							</div>
							<div class="message-body">
								${$("#message").val()}
							</div>
						</div>
							`);
						messageID++;
						$("#message").val("");
					}

					//console.log(today(), "====>", time());
				}
			});



			///
			///	Change Profile pix UI
			///
			$("#change-pix").click(function(e){
				e.preventDefault();
				$("#user-content-area").empty();
				$("#chat-area").empty();
				$("#side-menu-data").empty();
				$("#selected-item-title").empty();
				$("#project-menu-link").attr("class", "inactive");
				$("#message-menu-link").attr("class", "inactive");
				$("#network-menu-link").attr("class", "inactive");
				$("#selected-item-title").html("");
				$("#user-content-area").html(changeProfileImage);
				$("#side-menu-data").html("");
				$("#image-update").attr('src', $("#session-image_url").val());
			});

			$(".form").submit(function(e){
				e.preventDefault();
			});


			///
			///	Create Project UI
			///
			$("#create-project").click(function(e){
				e.preventDefault();
				$("#user-content-area").empty();
				$("#chat-area").empty();
				$("#side-menu-data").empty();
				$("#selected-item-title").empty();
				$("#project-menu-link").attr("class", "inactive");
				$("#message-menu-link").attr("class", "inactive");
				$("#network-menu-link").attr("class", "inactive");
				$("#selected-item-title").html("");
				$("#user-content-area").html(createProject);
				$("#side-menu-data").html("");
				//$("#image-update").attr('src', $("#session-image_url").val());
			});

			///
			///	Change Password UI
			///
			$("#change-password").click(function(e){
				e.preventDefault();
				$("#user-content-area").empty();
				$("#chat-area").empty();
				$("#side-menu-data").empty();
				$("#selected-item-title").empty();
				$("#project-menu-link").attr("class", "inactive");
				$("#message-menu-link").attr("class", "inactive");
				$("#network-menu-link").attr("class", "inactive");
				$("#selected-item-title").html("");
				$("#user-content-area").html(verifyPassword);
				$("#side-menu-data").html("");
				//$("#image-update").attr('src', $("#session-image_url").val());
			});

			//change profile image
			$("#submitimage").click(function(e){
				e.preventDefault();
				$.post("uploadimage.php", function(isSuccessfulSignup){
					console.log(isSuccessfulSignup);
					$("#image-update").attr('src', isSuccessfulSignup);
				});	
			});

		});// Closes Document Ready

	