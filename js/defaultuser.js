///
			///	Declaring Operation Category 
			///

			var operationCategories = "";
			var messageID = 1;
			var loggedInUser = "Panthera Leonardo";


			///
			/// Displays User Default load after signing in.........
			///	
			//console.log(projectList);
			operationCategories = "Projects";
			$("#selected-item-title").html("Projects");
			$("#user-content-area").html(projectList);

			///
			/// When a user click the project menu item, this code will run....
			///
			$("#project-menu-link").click(function(){
				$("#user-content-area").empty();
				$("#chat-area").empty();
				$("#side-menu-data").empty();
				$("#selected-item-title").empty();
				$("#project-menu-link").attr("class", "active");
				$("#message-menu-link").attr("class", "inactive");
				$("#network-menu-link").attr("class", "inactive");
				$("#selected-item-title").html("Projects");
				operationCategories = "Projects";
				$("#user-content-area").html(projectList);
				$("#side-menu-data").html(`<div style="width: 100%; text-align: center; color:#66666e; padding-top:30px; font-size: 150%;"> No Projects Menu</div>`);
			});

			///
			/// When a user click the message menu item, this code will run....
			///
			$("#message-menu-link").click(function(){
				$("#user-content-area").empty();
				$("#chat-area").empty();
				$("#side-menu-data").empty();
				$("#selected-item-title").empty();
				$("#project-menu-link").attr("class", "inactive");
				$("#message-menu-link").attr("class", "active");
				$("#network-menu-link").attr("class", "inactive");
				$("#selected-item-title").html("Messages");
				operationCategories = "Messages";
				$("#user-content-area").html(messageSection);
				$("#side-menu-data").html();

			});

			///
			/// When a user click the Network menu item, this code will run....
			///
			$("#network-menu-link").click(function(){
				$("#user-content-area").empty();
				$("#chat-area").empty();
				$("#side-menu-data").empty();
				$("#selected-item-title").empty();
				$("#project-menu-link").attr("class", "inactive");
				$("#message-menu-link").attr("class", "inactive");
				$("#network-menu-link").attr("class", "active");
				$("#selected-item-title").html("Network");
				operationCategories = "Network";
				$("#user-content-area").html(networkList);
				$("#side-menu-data").html(`<div style="width: 100%; text-align: center; color:#66666e; padding-top:30px; font-size: 150%;"> No Network Menu</div>`);
			});


			///
			///	Select category and items and progress to the next UI
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
						//console.log("View the profile details of the selected network");
						for (i=0; i < networkListArray.length; i++){
							if (networkListArray[i].account_holder === clickedItem){
								console.log(networkListArray[i]);
								$("#exampleModal").show();
								$("#exampleModalLabel").html(networkListArray[i].account_holder);
								$("#email").html("Email: " + networkListArray[i].email);
								$("#user-name").html("Username: " +networkListArray[i].username);
							}
						}

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