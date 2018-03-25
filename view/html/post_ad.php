<?php
session_start();
include '../../model/db.php';
include 'header.php';
include 'nav.php';
$conn = connect();
?>



    <div id="post_ad_container">
        <h1 id="ad_h1">Post your ad</h1>

      <form id="ad_form">

          <div id="ad_form_section1">

            <div class="form-group">
              <label for="ad_title">Ad Title</label>
              <input type="text" class="form-control" id="ad_title" placeholder="e.g. German Sheperd puppy - 4 months old">
            </div>

            <div class="form-group">
              <label for="description">Describe what you're offering</label>
              <textarea class="form-control" id="description" rows="6" placeholder="e.g. Owner supervised visits, minimum 1hr bookings, play with my german sheperd puppy in my backyard"></textarea>
            </div>

            <button class="btn btn-primary" onclick="showSection2();return false;"> Next </button>

          </div>

          <div id="ad_form_section2">

            <label> Location</label>
            <input type="text" placeholder="location"/>

            <label>What type of booking is allowed for your pet?</label>
            <select>
              <option>Owner Supervised</option>
              <option>Private</option>
              <option>Both available</option>
            </select>

              <button class="btn btn-primary" onclick="showSection3();return false;"> Next </button>
            </div>

            <div id="ad_form_section3">
              <p>
                plugin for photo adding
              </p>

              <button class="btn btn-primary" onclick="showSection4();return false;"> Next </button>
            </div>

            <div id="ad_form_section4">
              <label>Price</label>
              <input type="text" />

              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                  Hourly
                </label>
              </div>
              <div class="form-check">
              <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                  Per Person
                </label>
              </div>


              <div id="submit_button">
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
    </form>
  </div>

</body>
