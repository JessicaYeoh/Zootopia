// GOOGLE MAPS API
window.onload = myMap;

function myMap() {
  var myCenter = new google.maps.LatLng(-27.469771, 153.025124);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 5};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);

  google.maps.event.addListener(marker,'click',function() {
  map.setZoom(12);
  map.setCenter(marker.getPosition());
  });
}
// GOOGLE MAPS API

// FUNCTIONS TO SHOW/HIDE POST AN AD SECTION
function showSection2(){
    document.getElementById('ad_form_section1').style.display = 'none';
    document.getElementById('ad_form_section2').style.display = 'block';
    document.getElementById('ad_form_section3').style.display = 'none';
    document.getElementById('ad_form_section4').style.display = 'none';
}

function showSection3(){
  document.getElementById('ad_form_section1').style.display = 'none';
  document.getElementById('ad_form_section2').style.display = 'none';
  document.getElementById('ad_form_section3').style.display = 'block';
  document.getElementById('ad_form_section4').style.display = 'none';
}

function showSection4(){
  document.getElementById('ad_form_section1').style.display = 'none';
  document.getElementById('ad_form_section2').style.display = 'none';
  document.getElementById('ad_form_section3').style.display = 'none';
  document.getElementById('ad_form_section4').style.display = 'block';
}
// END OF FUNCTIONS TO SHOW/HIDE POST AN AD SECTION
function showMsg(loginID) {

var updateUrl = "../../controller/update_profile.php?loginID=" + loginID;

  $.ajax(
    {
      url:updateUrl,
      method: 'post',
      data: $('#profile_update_form').serialize(),
      datatype: 'json',
      success:function(result) {
          $("#message").html("updated");
          // alert("Updated");
      },
      error: function(error) {
          $("#message").html("error");
          // alert("Error");
        }
    }
  );
}
