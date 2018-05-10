// GOOGLE MAPS API
// window.onload = myMap;
//
// function myMap() {
//   var myCenter = new google.maps.LatLng(-27.469771, 153.025124);
//   var mapCanvas = document.getElementById("map");
//   var mapOptions = {center: myCenter, zoom: 5};
//   var map = new google.maps.Map(mapCanvas, mapOptions);
//   var marker = new google.maps.Marker({position:myCenter});
//   marker.setMap(map);
//
//   google.maps.event.addListener(marker,'click',function() {
//   map.setZoom(12);
//   map.setCenter(marker.getPosition());
//   });
// }
// GOOGLE MAPS API

// LOGIN/REGISTRATION PAGE
$(function() { //shorthand of $(document).ready(function() { ... });

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
// END OF LOGIN/REGISTRATION PAGE

// REGISTRATION PAGE - Email and password validation
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
    				minlength: "password must be atleast 8 characters"
    			}
    		}
    	});

});


$(function() {
    $("#ad_section2").click(function(){
        $("#ad_form_section1").hide();
        $("#ad_form_section2").show();
    });

    $("#back_section1").click(function(){
        $("#ad_form_section1").show();
        $("#ad_form_section2").hide();
    });

    $("#ad_section3").click(function(){
        $("#ad_form_section3").show();
        $("#ad_form_section2").hide();
    });

    $("#back_section2").click(function(){
        $("#ad_form_section2").show();
        $("#ad_form_section3").hide();
    });
});

// END OF FUNCTIONS TO SHOW/HIDE POST AN AD SECTION

// Update profile function
function showMsg(login_ID) {

    var updateUrl = "../../controller/update_profile.php?loginID=" + login_ID;

      $.ajax(
        {
          url:updateUrl,
          method: 'post',
          data: $('#profile_update_form').serialize(),
          datatype: 'json',
          success:function(result) {
              if(result.userUpdate == true) {
                alert("Updated");
                var name=$("#profile_first_name").val(); //get the value of first name typed into the input
                $(".welcome").html("Welcome "+name);
              } else {
                alert("Error");
              }

          },
          error: function(error) {
                alert("Error");

              }
        }
      );
}
// END Update profile function


// Update pet profile
function updatePet(pet_ID) {

    var updatePet = "../../controller/update_pet.php?petID=" + pet_ID;

      $.ajax(
        {
          url:updatePet,
          method: 'post',
          data: $('#pet_profile_update_form').serialize(),
          datatype: 'json',
          success:function(result) {
              if(result.petUpdate == true) {
                alert("Updated");
              } else {
                alert("Error");
              }
          },
          error: function(error) {
              alert("Error");
            }
        }
      );
}
// END update pet profile

// AJAX add pet
// function addPet(login_ID) {
//
//     var addPetUrl = "../../controller/add_pet_profile.php?loginID=" + login_ID;
//
//       $.ajax(
//         {
//           url:addPetUrl,
//           method: 'post',
//           data: $('#pet_profile_update_form').serialize(),
//           datatype: 'json',
//           success:function(result) {
//               alert("Pet added");
//           },
//           error: function(error) {
//               alert("Error");
//             }
//         }
//       );
// }
// END AJAX add pet




// AJAX create booking
function addBooking(login_ID) {

    var addBookingUrl = "../../controller/create_booking_process.php?loginID=" + login_ID;

      $.ajax(
        {
          url:addBookingUrl,
          method: 'post',
          data: $('#create_booking_form').serialize(),
          datatype: 'json',
          success:function(result) {
              alert("Booking added");
          },
          error: function(error) {
              alert("Error");
            }
        }
      );
}
// END AJAX create booking



// Check email if already exists
function checkemail() {

     var email=document.getElementById("username").value;

     var checkUrl = '../../controller/checkdata.php?email=' + email;

     if(email)
     {
      $.ajax({
      type: 'get',
      url: checkUrl,
      data: {
       user_name:email,
      },
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
		});
	}
	else
	{
		$('#email_status').html("");
		return false;
	}
}
// END Check email if already exists


$(document).ready(function(){
// Booking date jQuery plugin
  var date_input=$('input[name="book_date"]'); //our date input has the name "date"
  var container=$('#book_date form').length>0 ? $('#book_date form').parent() : "body";
  var options={
    format: 'dd/mm/yyyy',
    orientation: 'top right',
    container: container,
    todayHighlight: true,
    autoclose: true
  };
  date_input.datepicker(options);



// Start and Finish time jQuery plugin
  $('#start').timepicker({
    'minTime': '7:00am',
    'maxTime': '9:00pm',
    // 'step': 15
    // 'forceRoundTime': true
  });
  $('#finish').timepicker({
    'minTime': '7:00am',
    'maxTime': '9:00pm'
  });


// Price formatter create booking
  $('#agreed_price').priceFormat({
    prefix: '$',
    centsSeparator: '.'
  });

  $('#price').priceFormat({
    prefix: '$',
    centsSeparator: '.'
  });
});

// Pet profile picture
$(document).ready(function (e) {

		// Function to preview image after validation
		// $(function() {
		$("#file").change(function() {

    		var file = this.files[0];
    		var imagefile = file.type;
        var size = this.files[0].size;
    		var match= ["image/jpeg","image/png","image/jpg"];

    		if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])) || !(size <1000000))
    		{
        		$('#previewing').attr('src','../images/default.png');

        		alert("Invalid file type/size! Note: only jpeg/jpg/png image types allowed and image must be less than 1mb in size");
        		return false;
    		}
    		else
    		{
        		var reader = new FileReader();
        		reader.onload = imageIsLoaded;
        		reader.readAsDataURL(this.files[0]);
		    }
		});
		// });
		function imageIsLoaded(e) {
		$("#file").css("color","green");
		$('#image_preview').css("display", "block");
		$('#previewing').attr('src', e.target.result);
		$('#previewing').attr('width', '150px');
		$('#previewing').attr('height', '150px');
		};
});

// Profile picture
$(document).ready(function () {
    //If image edit link is clicked
    $(".editLink").on('click', function(e){
        e.preventDefault();
        $("#fileInput:hidden").trigger('click');
    });

    //On select file to upload
    $("#fileInput").on('change', function(){
        var image = $('#fileInput').val();
        var img_ex = /(\.jpg|\.jpeg|\.png)$/i;
        var size = this.files[0].size;

		//validate file type
        if(!img_ex.exec(image) || !(size <1000000)){
            alert('Please upload only jpg/jpeg/png file types. File must be less than 1mb.');
            $('#fileInput').val('');
            return false;
        }else{
            $('.uploadProcess').show();
            $('#uploadForm').hide();
            $( "#picUploadForm" ).submit();
        }
    });
});

//After completion of image upload process
function completeUpload(success, fileName) {
	if(success == 1){
		$('#imagePreview').attr("src", "");
		$('#imagePreview').attr("src", fileName);
		$('#fileInput').attr("value", fileName);
		$('.uploadProcess').hide();
	}else{
		$('.uploadProcess').hide();
		alert('There was an error during file upload!');
	}
	return true;
}




function checkPet() {

     var petID = $( "#pet_ad option:selected" ).val();

     if(petID)
     {
        $.ajax({
        type: 'post',
        url: '../../controller/checkPet.php',
        data: {
         pet_ad:petID,
        },
  			// datatype: 'json',
        success: function (response) {
         $('#pet_status').html(response);
  				 if(response=="")
  	       {
  	        return true;
  	       }
  	       else
  	       {
  	        return false;
  	       }
  			 }
    	  });
    	}
    	else
    	{
    		$('#pet_status').html("");
    		return false;
    	}
    }



// AJAX post ad
function addAd(login_ID) {

    var petID = $( "#pet_ad option:selected" ).val();

    var addAdUrl = "../../controller/post_ad_process.php?loginID=" + login_ID + "&petID=" + petID;

      $.ajax(
        {
          url:addAdUrl,
          method: 'post',
          data: $('#ad_form').serialize(),
          datatype: 'json',
          success:function(result) {
            console.log(result);
            if(result.petAd == false){
              alert("Pet ad already exists!");
            }else{
              alert("Ad posted!");
              $('#image_table').hide();
            }

            // if(petID){
            //   alert("Pet ad already exists!");
            // }else{
            //   alert("Ad posted!");
            //   $('#image_table').hide();
            // }
          },
          error: function(error) {
              alert(error);
              console.log(error);
            }
        }
      );

}
// END AJAX post ad

$(document).ready(function(){
 load_image_data();
 function load_image_data()
 {
   var petID = $( "#pet_ad option:selected" ).val();

  $.ajax({
   url:"../../controller/fetch.php?petID=" + petID,
   method:"POST",
   success:function(data)
   {
    $('#image_table').html(data);
   }
  });
 }
 $('#multiple_files').change(function(){
  var error_images = '';
  var form_data = new FormData();
  var files = $('#multiple_files')[0].files;
  if(files.length > 6)                      //FIX THIS
  {
   error_images += 'You can not select more than 6 files';
  }
  else
  {
   for(var i=0; i<files.length; i++)
   {
    var name = document.getElementById("multiple_files").files[i].name;
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
    {
     error_images += '<p>Invalid '+i+' File</p>';
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("multiple_files").files[i]);
    var f = document.getElementById("multiple_files").files[i];
    var fsize = f.size||f.fileSize;
    if(fsize > 1000000)
    {
     error_images += '<p>' + i + ' File Size is very big</p>';
    }
    else
    {
     form_data.append("file[]", document.getElementById('multiple_files').files[i]);
    }

   }
  }
  if(error_images == '')
  {
    var petID = $( "#pet_ad option:selected" ).val();

   $.ajax({
    url:"../../controller/upload_ad_images.php?petID=" + petID,
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#error_multiple_files').html('<br /><label class="text-primary">Uploading...</label>');
    },
    success:function(data)
    {
     $('#error_multiple_files').html('<br /><label class="text-success">Uploaded</label>');
     load_image_data();
    }
   });
  }
  else
  {
   $('#multiple_files').val('');
   $('#error_multiple_files').html("<span class='text-danger'>"+error_images+"</span>");
   return false;
  }
 });

 $(document).on('click', '.delete', function(){
  var adImageID = $(this).attr("id");
  var image_name = $(this).data("image_name");
  if(confirm("Are you sure you want to remove it?"))
  {
   $.ajax({
    url:"../../controller/adImage_delete.php",
    method:"POST",
    data:{adImageID:adImageID, image_name:image_name},
    success:function(data)
    {
     load_image_data();
     alert("Image removed");
    }
   });
  }
 });

});

// loading svg for ajax forms
$(document).ready(function (){

  var $loading = $('.loader').hide();
  var $loading = $('.loader');

  $(document).ajaxStart(function () {
    $loading.show();
  })
  .ajaxStop(function () {
    $loading.hide();
  });

});
