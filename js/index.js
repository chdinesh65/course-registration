$(document).ready(function() {
	// your js code goes here...
	$('#button').show();
	//infoMessage
	$("#username").parent().append("<span id = \"userinfo\" class =\"info\"> Enter a unique user name</span>").css('color', 'green')
	$("#userinfo").hide();
	
	$("#password").parent().append("<span id = \"pwinfo\" class =\"info\"> Enter a strog password</span>").css('color', 'green')
    $("#pwinfo").hide();
	 

	 //error
	 $("#username").parent().append("<span id = \"usererror\" class =\"error\"> Only letters and numbers are accepted </span>").css('color', 'red')
	 $("#usererror").hide(); 
	 
	 $("#password").parent().append("<span id = \"pwerror\" class =\"error\"> Password should contain atleast 5 - characters</span>").css('color', 'red')
	 $("#pwerror").hide();
	 
	 $("#email").parent().append("<span id = \"emailerror\" class =\"error\">Enter a correct/Valid email-address</span>").css('color', 'red')
	 $("#emailerror").hide();
	 
	 $("#fname").parent().append("<span id = \"fnameerror\" class =\"error\"> Firstname field MUST contain only alphabets and spaces</span>").css('color', 'red')
	 $("#fnameerror").hide();
	 
	 $("#lname").parent().append("<span id = \"lnameerror\" class =\"error\"> Lastname field MUST contain only alphabets </span>").css('color', 'red')
	 $("#lnameerror").hide();
	 
	 
	
	 
	$("#username").focus(function(){
		$("#usererror").hide();
		$("#pwinfo").hide();
		$("#userinfo").show();
	});

	$("#username").blur(function(){
		$("#usererror").hide();
		$("#userinfo").hide();
		var username=$("#username").val();
		var username_regex= '^[a-zA-Z0-9]+$';
		if(username==null || username==""){
			$("#usererror").hide();
			$("#userinfo").show();
		}
		else{
			if(username.match(username_regex)){$('#button').show();}
			else{
				$("#usererror").show();
				$('#button').hide();
			}
		}
	});

	$("#password").focus(function(){
		$("#pwerror").hide();
		$("#userinfo").hide();
		$("#pwinfo").show();
	});

	$("#password").blur(function(){
		$("#pwerror").hide();
		$("#pwok").hide();
		$("#pwinfo").hide();
		var password=$("#password").val();
		if(password==null || password==""){
			$("#pwerror").hide();
			$("#pwinfo").show();
		}
		else{
			if((password.length>=5)){$('#button').show();$("#pwinfo").hide();}
			else{
				$("#pwerror").show();
				$('#button').hide();
			}
		}

	});


	$("#email").blur(function(){
		$("#emailerror").hide();
		var email=$("#email").val();
		var email_regex = '^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$';
			if(email.match(email_regex) || email==null || email=="" ){$('#button').show();}
			else{$("#emailerror").show();
				$('#button').hide();
			}

	});
	
	$("#fname").blur(function(){
		$("#fnameerror").hide();
		var fname=$("#fname").val();
		var fname_regex= '^[a-zA-Z, ]+$';
			if(fname.match(fname_regex) || fname==null || fname=="" ){$('#button').show();}
			else{
				$("#fnameerror").show();
				$('#button').hide();
		}
	});
	
	$("#lname").blur(function(){
		$("#lnameerror").hide();
		var lname=$("#lname").val();
		var lname_regex= '^[a-zA-Z]+$';
			if(lname.match(lname_regex) || lname==null || lname=="" ){$('#button').show();}
			else{
				$("#lnameerror").show();
				$('#button').hide();
			}
	});
	
});
