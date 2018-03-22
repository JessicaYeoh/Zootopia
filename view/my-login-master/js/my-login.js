// LOGIN/REGISTRATION PAGE
$(function() {
	$("input[type='password'][data-eye]").each(function(i) {
		var $this = $(this);

		$this.wrap($("<div/>", {
			style: 'position:relative'
		}));
		$this.css({
			paddingRight: 60
		});
		$this.after($("<div/>", {
			html: 'Show',
			class: 'btn btn-primary btn-sm',
			id: 'passeye-toggle-'+i,
			style: 'position:absolute;right:10px;top:50%;transform:translate(0,-50%);-webkit-transform:translate(0,-50%);-o-transform:translate(0,-50%);padding: 2px 7px;font-size:12px;cursor:pointer;'
		}));
		$this.after($("<input/>", {
			type: 'hidden',
			id: 'passeye-' + i
		}));
		$this.on("keyup paste", function() {
			$("#passeye-"+i).val($(this).val());
		});
		$("#passeye-toggle-"+i).on("click", function() {
			if($this.hasClass("show")) {
				$this.attr('type', 'password');
				$this.removeClass("show");
				$(this).removeClass("btn-outline-primary");
			}else{
				$this.attr('type', 'text');
				$this.val($("#passeye-"+i).val());
				$this.addClass("show");
				$(this).addClass("btn-outline-primary");
			}
		});
	});

// window.sessionStorage.setItem('emailexists', 'false');
					// email variable = var email = $("#email");
					// var checkurl = "registration_check_email.php?username(name of input)=" + email(variable name).value;

	// $("#username").on('blur', function() {
// function checkEmail() {
	// 	var email = $("#username").val();
	// 	var checkurl = "../../../controller/registration_check_email.php?username=" + email;
	//
	// 			$.ajax({
	// 					url: checkurl,
	// 					method: 'get',
	// 					datatype: 'json',
	// 					success: function(result) {
	// 							if(result.emailexists == true) {
	// 									window.sessionStorage.setItem('emailexists', 'true');
	// 									$("#user_errDiv2").html("This email is already registered");
	// 							} else {
	// 									window.sessionStorage.setItem('emailexists', 'false');
	// 							}
	// 					},
	// 					error: function(err) {
	// 							console.log(err);
	// 					}
	// 			});
	// });
// }

	$('#register_section1').validate({ //jquery validate plugin (must use id on form, do not use $('#register_section1').form.validate)
		rules:{ //what rules to apply for each input
			username:{ //username = input name
				email:true //email = rules within jquery validate plugin that has a set of rules for the email type
			},
			password:{
				minlength: 8
			}
		},
		messages:{ //what messages to show if the rule is not met
			username: {
				email: "please input correct email"
			},
			password: {
				minlength: "password is too short"
			}
		}
	});
});

// SHOW/HIDE REGISTRATION PAGE
function show_register_section2(){
  document.getElementById('register_section1').style.display = 'none';
  document.getElementById('register_section2').style.display = 'block';
}
// END OF SHOW/HIDE REGISTRATION PAGE

// $("#username").on('keyup', function checkemail() {


function checkemail()
    {
     var email=document.getElementById("username").value;

     if(email)
     {
      $.ajax({
      type: 'post',
      url: '../../controller/checkdata.php',
      data: {
       user_name:email,
      },
			// datatype: 'json',
      success: function (response) {
       $('#email_status').html(response);
				 if(response=="")
	       {
	        return true;
	       }
	       else
	       {
	        return false;
	       }
			 }
			//  error: function(error) {
	 	// 		$('#email_status').html(error);
			 //  }
		});
	}
	else
	{
		$('#email_status').html("");
		return false;
	}
}
