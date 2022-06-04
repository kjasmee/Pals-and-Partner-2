<?php
  include ('include/header.php');

  if($isLoggedIn):
    include ('php/user_details.php');
  
    $pricingfetch = getpricing();
    while($pricef = $pricingfetch->fetch_array()) { $pricing[] = $pricef; }
    function listprices() {
      echo json_encode(getpricing()->fetch_all(PDO::FETCH_ASSOC));
    }
?>
<!-- Login css -->
<link rel="stylesheet" href="assets/css/login.css">

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Get Quote</h2>
                        <form id="get-quote-form">
                          <input type="hidden" name="user_id" value="<?php echo $user_id ?>"/>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" value="<?php echo $name ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"  value="<?php echo $email ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-lock"></i></label>
                                <input type="text" name="phone" id="phone" placeholder="Phone Number"  value="<?php echo $phone ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="sqfootage"><i class="zmdi zmdi-n-4-square"></i></label>
                                <input type="number" name="area" id="area" placeholder="Square Footage in Number" required/>
                            </div>
                            <div class="form-group">
                              <label for="allergies"><i class="fas fa-allergies"></i></label>
                              <input list="allergies" name="allergies" id="allergies" placeholder="Mention Allergies">
                              <datalist id="allergies">
                                <option value="Chemicals">
                                <option value="Dust">
                              </datalist>
                            </div>
                            <div class="form-group">
                                <label for="frequency"><i class="zmdi zmdi-view-week" required></i></label>
                                <select name="frequency" id="frequency">
                  								<option value="once">Once</option>
                  								<option value="Weekly">Weekly</option>
                  								<option value="Fortnightly">Fortnightly</option>
                                  <option value="Monthly">Monthly</option>
                  							</select>
                            </div>
                            <div class="form-group">
                                <label for="service"><i class="zmdi zmdi-star"></i></label>
                                <select name="service" id="service" required onchange='modellist(`<?php listprices() ?>`)'>
                                  <option value="*">Select Cleaning Type</option>
                                  <?php 
                                    $valueid=array();
                                    $valueprid=array();
                                    foreach ($pricing as $value) {
                                      echo '<option value="'.$value['pricing_id'].'">'.$value['cleaning_type'].'</option>';
                                    } 
                                  ?>
                  							</select>
                            </div>
                            <div class="pricingtable">
                              <div class="modellist">
                                <span>For every cleaning service, $</span><span name="model" id="model">0</span>
                              </div>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="get-quote" id="get-quote" class="form-submit" value="Get Quote"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="assets/img/quote.jpg" alt="request quote"></figure>
                    </div>
                </div>
            </div>
        </section>

    </div>

<script type="text/javascript">
  // filter dropdown menu for price based on cleaning type
  function modellist(listindex) {
    const optionValue = document.querySelector("#model")
    const cleaningType = document.querySelector("#service")
    const cleaningSelection = cleaningType.value
    const samples = JSON.parse(listindex)
    const selectedValue = samples.filter((sample)=>(sample[0]===cleaningSelection))
    optionValue.innerText=selectedValue[0][2]
  }
  //Get Quote
  $('#get-quote-form').submit(function(e) {
    e.preventDefault();
    console.log($(this).serialize());
    $.ajax({
      type: "POST",
      url: './php/get-quote.php',
      data: $(this).serialize(),
      success: function(response)
      {          
          if (response == true) {
            Swal.fire(
              'Quote Requested Successfully',
              '',
              'success'
            );
            Swal.success();
          }
          else {
            Swal.fire(response);
          }
      }
  });
  });
</script>

<?php else:?>
  <br/>
  <br/>
  <br/>
  <div class="container">
    <h5 class="display-4">Please Login to Get Quote</h5>
  </div>
<?php endif;?>
