 <?php include('../server.php') ?>
 <?php 
  if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: ../login.php");
  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<style data-styles="">ion-icon{visibility:hidden}.hydrated{visibility:inherit}</style>
  	<title>Mee's Logistics</title>
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
  	<link rel="stylesheet" type="text/css" href="../css/regi.css">
    <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<script src="https://unpkg.com/ionicons@4.3.0/dist/ionicons/ionicons.vparyxzd.js" type="module" crossorigin="true" data-resources-url="https://unpkg.com/ionicons@4.3.0/dist/ionicons/" data-namespace="ionicons"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
</head>
<body class="bk_white" style="">
  <div class="border_bottom delivery_header">
    <div class="auth_header">
      <div class="padd left col_4 pt">
        <a class="icon ion-android-arrow-back small" href="javascript:history.back(-1)">Back</a>
      </div>
      <div class="align_center column col_4" style="margin-top:7px;">
        <a href="../index.php"><img src="../img/meeslogo1.png" style="margin:auto;"></a>
      </div>
      <div class="padd right align_right small col_4 pt">
        <!-- notification message -->
                <?php if (isset($_SESSION['success'])) : ?>
                  <div class="error success">
                    <h3>
                      <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                       ?>
                    </h3>
                  </div>
                <?php endif ?>
                <!-- logged in user information -->
                <?php if (isset($_SESSION['email'])) : ?>
                  <span> <?php echo $_SESSION['email']; ?></span>        
      </div>
    </div>
  </div>
  <div class="main_content col_5 margin_center clearfix">
		<div class="_new_push_form">
			<div class="init_new_push _the_feel">
				<div class="color_white align_center new_push_error weight_bold small hide"></div>
				<div class="color_white align_center new_push_notice weight_bold small hide"></div>
				<!-- new delivery form -->
        <form id="order_form" class="new_job" action="index.php" accept-charset="UTF-8" method="post">
          <?php include('../errors.php'); ?>
          <fieldset class="_pick_form mb3">
            <legend class="uppercased mb push_section_head color_white weight_bolder">Pick-up
            </legend>
            <!-- Pickup address -->
              <div class="saved_add" id="saved_add" data-lat="" data-long="" style="display: block;">
                <h2 class="color_inherit_one weight_bolder mb_none">
                    <label>Pickup Address</label> <br>
                    <input required="required" type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>" >
                    <?php endif ?>
                    <input type="text" placeholder="Address" name="address">
                </h2>
              </div>
              <!--Countries-->
              <div class="clearfix mb_none">
                         <div class="column col_6">
                          <select required="required" class="country_select" name="pickup_country">
                            <option value=""class="select">Country</option>
                            <option value="Nigeria">Nigeria</option>
                            <!--option value="Afghanistan">Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antigua">Antigua</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bonaire">Bonaire</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Brunei">Brunei</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Island">Cayman Island</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China, Peoples Republic">China, Peoples Republic</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Common Wealth No. Mariana Islands">Common Wealth No. Mariana Islands</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo">Congo</option>
                            <option value="Congo, The Democratic Republic of">Congo, The Democratic Republic of</option>
                            <option value="Cook Islands">TCook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Cote D Ivoire">Cote D Ivoire</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Curacao">Curacao</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="East Timor">East Timor</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Eritea">Eritea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethopia">Ethopia</option>
                            <option value="Falkland Island">Falkland Island</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guyana">French Guyana</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guernsey">Guernsey</option>
                            <option value="Guinea Republic">Guinea Republic</option>
                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                            <option value="Guinea-Equatorial">Guinea-Equatorial</option>
                            <option value="Guyana (British)">Guyana (British)</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland, Republic of">Ireland, Republic of</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jersey">Jersey</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea, Republic of (South)">Korea, Republic of (South)</option>
                            <option value="Korea, The D.P.R of (North)">Korea, The D.P.R of (North)</option>
                            <option value="Kosovo">Kosovo</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Lao Democratic Peoples Republic">Lao Democratic Peoples Republic</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libya">Libya</option>
                            <option value="Lichtenstein">Lichtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macau">Macau</option>
                            <option value="Macedonia, Republic of">Macedonia, Republic of</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Island">Marshall Island</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montenegro, Republic of">Montenegro, Republic of</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru, Republic of">Nauru, Republic of</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Nevis">Nevis</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Niue">Niue</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Reunion, Island of">Reunion, Island of</option>
                            <option value="Romania">Romania</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Helena">Saint Helena</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia, Republic of">Serbia, Republic of</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovania">Slovania</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="Somaliland">Somaliland</option>
                            <option value="South Africa">South Africa</option>
                            <option value="South Sudan">South Sudan</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="St. Barthelemy">St. Barthelemy</option>
                            <option value="St. Eustatius">St. Eustatius</option>
                            <option value="St. Kitts">St. Kitts</option>
                            <option value="St. Lucia">St. Lucia</option>
                            <option value="St. Maarten">St. Maarten</option>
                            <option value="St. Vincent">St. Vincent</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syria">Syria</option>
                            <option value="Tahiti">Tahiti</option>
                            <option value="Taiwan">Taiwan</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Thailand">Thailand</option>
                            <option value="The Canary Islands">The Canary Islands</option>
                            <option value="The Czech Republic">The Czech Republic</option>
                            <option value="The Netherlands">The Netherlands</option>
                            <option value="The Philippines">The Philippines</option>
                            <option value="The Russian Federation">The Russian Federation</option>
                            <option value="Togo">Togo</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinada and Tobago">Trinada and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States of America">United States of America</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Vietnam">Vietnam</option>
                            <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                            <option value="Virgin Islands (US)">Virgin Islands (US)</option>
                            <option value="Yemen, Republic of">Yemen, Republic of</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option-->
                          </select>
                    </div>
                    <div class="column col_6">
                          <select class="state_input" name="pickup_state">
                            <option value="">State</option>
                            <option value="Abia">Abia</option>
                            <option value="Abuja (FCT)">Abuja (FCT)</option>
                            <option value="Adamawa">Adamawa</option>
                            <option value="Akwa Ibom">Akwa Ibom</option>
                            <option value="Anambra">Anambra</option>
                            <option value="Bauchi">Bauchi</option>
                            <option value="Bayelsa">Bayelsa</option>
                            <option value="Benue">Benue</option>
                            <option value="Borno">Borno</option>
                            <option value="Cross River">Cross River</option>
                            <option value="Delta">Delta</option>
                            <option value="Ebonyi">Ebonyi</option>
                            <option value="Edo">Edo</option>
                            <option value="Ekiti">Ekiti</option>
                            <option value="Enugu">Enugu</option>
                            <option value="Gombe">Gombe</option>
                            <option value="Imo ">Imo </option>
                            <option value="Jigawa">Jigawa</option>
                            <option value="Kaduna">Kaduna</option>
                            <option value="Kano">Kano</option>
                            <option value="Kastina">Kastina</option>
                            <option value="Kebbi">Kebbi</option>
                            <option value="Kogi">Kogi</option>
                            <option value="Kwara">Kwara</option>
                            <option value="Lagos">Lagos</option>
                            <option value="Nasarawa">Nasarawa</option>
                            <option value="Niger">Niger</option>
                            <option value="Ogun">Ogun</option>
                            <option value="Ondo">Ondo</option>
                            <option value="Osun">Osun</option>
                            <option value="Oyo">Oyo</option>
                            <option value="Plateau">Plateau</option>
                            <option value="Rivers">Rivers</option>
                            <option value="Sokoto">Sokoto</option>
                            <option value="Taraba">Taraba</option>
                            <option value="Yobe">Yobe</option>
                            <option value="Zamfara">Zamfara</option>
                          </select>
                    </div>
                          
              </div>
              <div class="clearfix mb_none">
                  <div class="column col_5">
                    <input placeholder="City" class="locality city_input" autocomplete="nope" required="required" type="text" name="pickup_city" id="job_drops_attributes_0_dest_city">
                  </div>
                  <div class="column col_7">
                    <input placeholder="Mobile Number" class="locality city_input" autocomplete="nope" required="required" type="text" name="mobile" id="">
                  </div>
              </div>
          </fieldset> 
          <!-- End of pick-up -->
          <!-- drop-off -->
          <fieldset class="_pick_form mb3">
            <legend class="uppercased mb push_section_head color_white weight_bolder">Drop-off
            </legend>
              <div class="saved_add" id="saved_add" data-lat="" data-long="" style="display: block;">
                <h2 class="color_inherit_one weight_bolder mb_none">
                    <label>Drop-off Address</label> <br>
                    <input autocomplete="off" required="required" type="text" placeholder="Address" name="dropoff_address">
                </h2>
              </div>
              <div class="clearfix mb_none">
                         <div class="column col_6">
                          <!--Country-->
                          <select required="required" class="country_select" name="dropoff_country">
                            <option value="">Country</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="zone-6">Afghanistan</option>
                            <option value="zone-4">Albania</option>
                            <option value="zone-5">Algeria</option>
                            <option value="zone-8">American Samoa</option>
                            <option value="zone-4">Andorra</option>
                            <option value="zone-5">Angola</option>
                            <option value="zone-8">Anguilla</option>
                            <option value="zone-8">Antigua</option>
                            <option value="zone-8">Argentina</option>
                            <option value="zone-7">Armenia</option>
                            <option value="zone-8">Aruba</option>
                            <option value="zone-7">Australia</option>
                            <option value="zone-4">Austria</option>
                            <option value="zone-7">Azerbaijan</option>
                            <option value="zone-8">Bahamas</option>
                            <option value="zone-6">Bahrain</option>
                            <option value="zone-7">Bangladesh</option>
                            <option value="zone-8">Barbados</option>
                            <option value="zone-4">Belarus</option>
                            <option value="zone-4">Belgium</option>
                            <option value="zone-8">Belize</option>
                            <option value="zone-2">Benin</option>
                            <option value="zone-8">Bermuda</option>
                            <option value="zone-7">Bhutan</option>
                            <option value="zone-8">Bolivia</option>
                            <option value="zone-8">Bonaire</option>
                            <option value="zone-4">Bosnia and Herzegovina</option>
                            <option value="zone-5">Botswana</option>
                            <option value="zone-8">Brazil</option>
                            <option value="zone-7">Brunei</option>
                            <option value="zone-4">Bulgaria</option>
                            <option value="zone-2">Burkina Faso</option>
                            <option value="zone-5">Burundi</option>
                            <option value="zone-7">Cambodia</option>
                            <option value="zone-2">Cameroon</option>
                            <option value="zone-3">Canada</option>
                            <option value="zone-2">Cape Verde</option>
                            <option value="zone-8">Cayman Island</option>
                            <option value="zone-2">Central African Republic</option>
                            <option value="zone-2">Chad</option>
                            <option value="zone-8">Chile</option>
                            <option value="zone-7">China, Peoples Republic</option>
                            <option value="zone-8">Colombia</option>
                            <option value="zone-8">Common Wealth No. Mariana Islands</option>
                            <option value="zone-5">Comoros</option>
                            <option value="zone-2">Congo</option>
                            <option value="zone-2">Congo, The Democratic Republic of</option>
                            <option value="zone-8">TCook Islands</option>
                            <option value="zone-8">Costa Rica</option>
                            <option value="zone-2">Cote D Ivoire</option>
                            <option value="zone-4">Croatia</option>
                            <option value="zone-8">Cuba</option>
                            <option value="zone-8">Curacao</option>
                            <option value="zone-4">Cyprus</option>
                            <option value="zone-4">Denmark</option>
                            <option value="zone-5">Djibouti</option>
                            <option value="zone-8">Dominica</option>
                            <option value="zone-8">Dominican Republic</option>
                            <option value="zone-7">East Timor</option>
                            <option value="zone-8">Ecuador</option>
                            <option value="zone-5">Egypt</option>
                            <option value="zone-8">El Salvador</option>
                            <option value="zone-5">Eritea</option>
                            <option value="zone-4">Estonia</option>
                            <option value="zone-5">Ethopia</option>
                            <option value="zone-8">Falkland Island</option>
                            <option value="zone-4">Faroe Islands</option>
                            <option value="zone-8">Fiji</option>
                            <option value="zone-4">Finland</option>
                            <option value="zone-4">France</option>
                            <option value="zone-8">French Guyana</option>
                            <option value="zone-2">Gabon</option>
                            <option value="zone-2">Gambia</option>
                            <option value="zone-7">Georgia</option>
                            <option value="zone-4">Germany</option>
                            <option value="zone-2">Ghana</option>
                            <option value="zone-4">Gibraltar</option>
                            <option value="zone-4">Greece</option>
                            <option value="zone-4">Greenland</option>
                            <option value="zone-8">Grenada</option>
                            <option value="zone-8">Guadeloupe</option>
                            <option value="zone-8">Guam</option>
                            <option value="zone-8">Guatemala</option>
                            <option value="zone-1">Guernsey</option>
                            <option value="zone-2">Guinea Republic</option>
                            <option value="zone-2">Guinea-Bissau</option>
                            <option value="zone-2">Guinea-Equatorial</option>
                            <option value="zone-8">Guyana (British)</option>
                            <option value="zone-8">Haiti</option>
                            <option value="zone-8">Honduras</option>
                            <option value="zone-7">Hong Kong</option>
                            <option value="zone-4">Hungary</option>
                            <option value="zone-4">Iceland</option>
                            <option value="zone-7">India</option>
                            <option value="zone-7">Indonesia</option>
                            <option value="zone-6">Iran (Islamic Republic of)</option>
                            <option value="zone-6">Iraq</option>
                            <option value="zone-1">Ireland, Republic of</option>
                            <option value="zone-6">Israel</option>
                            <option value="zone-4">Italy</option>
                            <option value="zone-8">Jamaica</option>
                            <option value="zone-7">Japan</option>
                            <option value="zone-1">Jersey</option>
                            <option value="zone-6">Jordan</option>
                            <option value="zone-7">Kazakhstan</option>
                            <option value="zone-5">Kenya</option>
                            <option value="zone-8">Kiribati</option>
                            <option value="zone-7">Korea, Republic of (South)</option>
                            <option value="zone-7">Korea, The D.P.R of (North)</option>
                            <option value="zone-4">Kosovo</option>
                            <option value="zone-6">Kuwait</option>
                            <option value="zone-7">Kyrgyzstan</option>
                            <option value="zone-7">Lao Democratic Peoples Republic</option>
                            <option value="zone-4">Latvia</option>
                            <option value="zone-6">Lebanon</option>
                            <option value="zone-5">Lesotho</option>
                            <option value="zone-2">Liberia</option>
                            <option value="zone-5">Libya</option>
                            <option value="zone-4">Lichtenstein</option>
                            <option value="zone-4">Lithuania</option>
                            <option value="zone-4">Luxembourg</option>
                            <option value="zone-7">Macau</option>
                            <option value="zone-4">Macedonia, Republic of</option>
                            <option value="zone-5">Madagascar</option>
                            <option value="zone-5">Malawi</option>
                            <option value="zone-7">Malaysia</option>
                            <option value="zone-7">Maldives</option>
                            <option value="zone-2">Mali</option>
                            <option value="zone-4">Malta</option>
                            <option value="zone-8">Marshall Island</option>
                            <option value="zone-8">Martinique</option>
                            <option value="zone-5">Mauritania</option>
                            <option value="zone-5">Mauritius</option>
                            <option value="zone-5">Mayotte</option>
                            <option value="zone-3">Mexico</option>
                            <option value="zone-8">Micronesia, Federated States of</option>
                            <option value="zone-4">Moldova, Republic of</option>
                            <option value="zone-4">Monaco</option>
                            <option value="zone-7">Mongolia</option>
                            <option value="zone-4">Montenegro, Republic of</option>
                            <option value="zone-8">Montserrat</option>
                            <option value="zone-5">Morocco</option>
                            <option value="zone-5">Mozambique</option>
                            <option value="zone-7">Myanmar</option>
                            <option value="zone-5">Namibia</option>
                            <option value="zone-8">Nauru, Republic of</option>
                            <option value="zone-7">Nepal</option>
                            <option value="zone-8">Nevis</option>
                            <option value="zone-8">New Caledonia</option>
                            <option value="zone-8">New Zealand</option>
                            <option value="zone-8">Nicaragua</option>
                            <option value="zone-2">Niger</option>
                            <option value="zone-8">Niue</option>
                            <option value="zone-4">Norway</option>
                            <option value="zone-6">Oman</option>
                            <option value="zone-7">Pakistan</option>
                            <option value="zone-7">Palau</option>
                            <option value="zone-8">Panama</option>
                            <option value="zone-8">Papua New Guinea</option>
                            <option value="zone-8">Paraguay</option>
                            <option value="zone-8">Peru</option>
                            <option value="zone-4">Poland</option>
                            <option value="zone-4">Portugal</option>
                            <option value="zone-8">Puerto Rico</option>
                            <option value="zone-6">Qatar</option>
                            <option value="zone-5">Reunion, Island of</option>
                            <option value="zone-4">Romania</option>
                            <option value="zone-5">Rwanda</option>
                            <option value="zone-8">Saint Helena</option>
                            <option value="zone-8">Samoa</option>
                            <option value="zone-4">San Marino</option>
                            <option value="zone-2">Sao Tome and Principe</option>
                            <option value="zone-6">Saudi Arabia</option>
                            <option value="zone-2">Senegal</option>
                            <option value="zone-4">Serbia, Republic of</option>
                            <option value="zone-5">Seychelles</option>
                            <option value="zone-2">Sierra Leone</option>
                            <option value="zone-7">Singapore</option>
                            <option value="zone-4">Slovakia</option>
                            <option value="zone-4">Slovania</option>
                            <option value="zone-8">Solomon Islands</option>
                            <option value="zone-5">Somalia</option>
                            <option value="zone-5">Somaliland</option>
                            <option value="zone-5">South Africa</option>
                            <option value="zone-5">South Sudan</option>
                            <option value="zone-4">Spain</option>
                            <option value="zone-7">Sri Lanka</option>
                            <option value="zone-8">St. Barthelemy</option>
                            <option value="zone-8">St. Eustatius</option>
                            <option value="zone-8">St. Kitts</option>
                            <option value="zone-8">St. Lucia</option>
                            <option value="zone-8">St. Maarten</option>
                            <option value="zone-8">St. Vincent</option>
                            <option value="zone-5">Sudan</option>
                            <option value="zone-8">Suriname</option>
                            <option value="zone-5">Swaziland</option>
                            <option value="zone-4">Sweden</option>
                            <option value="zone-4">Switzerland</option>
                            <option value="zone-6">Syria</option>
                            <option value="zone-8">Tahiti</option>
                            <option value="zone-7">Taiwan</option>
                            <option value="zone-7">Tajikistan</option>
                            <option value="zone-5">Tanzania</option>
                            <option value="zone-7">Thailand</option>
                            <option value="zone-4">The Canary Islands</option>
                            <option value="zone-4">The Czech Republic</option>
                            <option value="zone-4">The Netherlands</option>
                            <option value="zone-7">The Philippines</option>
                            <option value="zone-4">The Russian Federation</option>
                            <option value="zone-2">Togo</option>
                            <option value="zone-8">Tonga</option>
                            <option value="zone-8">Trinada and Tobago</option>
                            <option value="zone-5">Tunisia</option>
                            <option value="zone-4">Turkey</option>
                            <option value="zone-8">Turks and Caicos Islands</option>
                            <option value="zone-8">Tuvalu</option>
                            <option value="zone-5">Uganda</option>
                            <option value="zone-4">Ukraine</option>
                            <option value="zone-6">United Arab Emirates</option>
                            <option value="zone-1">United Kingdom</option>
                            <option value="zone-3">United States of America</option>
                            <option value="zone-8">Uruguay</option>
                            <option value="zone-7">Uzbekistan</option>
                            <option value="zone-8">Vanuatu</option>
                            <option value="zone-8">Venezuela</option>
                            <option value="zone-7">Vietnam</option>
                            <option value="zone-8">Virgin Islands (British)</option>
                            <option value="zone-8">Virgin Islands (US)</option>
                            <option value="zone-6">Yemen, Republic of</option>
                            <option value="zone-5">Zambia</option>
                            <option value="zone-5">Zimbabwe</option>
                          </select>
                        </div>
                        <div class="column col_6">
                          <select class="state_input" id="del_state" name="dropoff_state">
                            <option>State</option>
                            <option value="zone-2">Abia</option>
                            <option value="zone-3">Abuja (FCT)</option>
                            <option value="zone-4">Adamawa</option>
                            <option value="zone-1">Akwa Ibom</option>
                            <option value="zone-2">Anambra</option>
                            <option value="zone-4">Bauchi</option>
                            <option value="zone-1">Bayelsa</option>
                            <option value="zone-4">Benue</option>
                            <option value="zone-4">Borno</option>
                            <option value="zone-1">Cross River</option>
                            <option value="zone-1">Delta</option>
                            <option value="zone-2">Ebonyi</option>
                            <option value="zone-1">Edo</option>
                            <option value="zone-3">Ekiti</option>
                            <option value="zone-2">Enugu</option>
                            <option value="zone-4">Gombe</option>
                            <option value="zone-2">Imo </option>
                            <option value="zone-4">Jigawa</option>
                            <option value="zone-4">Kaduna</option>
                            <option value="zone-4">Kano</option>
                            <option value="zone-4">Kastina</option>
                            <option value="zone-4">Kebbi</option>
                            <option value="zone-4">Kogi</option>
                            <option value="zone-4">Kwara</option>
                            <option value="zone-3">Lagos</option>
                            <option value="zone-4">Nasarawa</option>
                            <option value="zone-4">Niger</option>
                            <option value="zone-3">Ogun</option>
                            <option value="zone-3">Ondo</option>
                            <option value="zone-3">Osun</option>
                            <option value="zone-3">Oyo</option>
                            <option value="zone-4">Plateau</option>
                            <option value="zone-1">Rivers</option>
                            <option value="zone-4">Sokoto</option>
                            <option value="zone-4">Taraba</option>
                            <option value="zone-4">Yobe</option>
                            <option value="zone-4">Zamfara</option>
                          </select>
                        </div>                        
              </div> 
              <div class="clearfix mb_none">
                  <div class="column col_5">
                      <input placeholder="City" class="locality city_input" autocomplete="nope" required="required" type="text" name="dropoff_city" id="job_drops_attributes_0_dest_city">
                  </div>
                  <div class="column col_7">
                    <input placeholder="Mobile Number" class="locality city_input" autocomplete="nope" required="required" type="text" name="dropoff_mobile" id="">
                  </div>
              </div>           
              <li class="drop_close_hide m-b">     
                      <textarea placeholder="Delivery Instructions e.g Leave package with security" name="del_instruction" id="job_drops_attributes_0_dest_comment"></textarea>
              </li>
          </fieldset>
                    <li class="drop_close_hide clearfix"> 
                      <div class="column col_6">
                        <div class="col_11">
                          <label class="block_disp clear mb_none _bold">Package Weight (in Kg)</label>
                          <select required="" class="_weight selectize selectized" name="pack_weight" id="job_drops_attributes_0_weight" tabindex="-1">
                            <option value="" selected="selected"></option>
                            <option value="0.5">0.5</option>
                            <option value="1.0">1.0</option>
                            <option value="1.5">1.5</option>
                            <option value="2.0">2.0</option>
                            <option value="2.5">2.5</option>
                            <option value="3.0">3.0</option>
                            <option value="3.5">3.5</option>
                            <option value="4.0">4.0</option>
                            <option value="4.5">4.5</option>
                            <option value="5.0">5.0</option>
                            <option value="5.5">5.5</option>
                            <option value="6.0">6.0</option>
                            <option value="6.5">6.5</option>
                            <option value="7.0">7.0</option>
                            <option value="7.5">7.5</option>
                            <option value="8.0">8.0</option>
                            <option value="8.5">8.5</option>
                            <option value="9.0">9.0</option>
                            <option value="9.5">9.5</option>
                            <option value="10.0">10</option>
                            <option value="20.0">20</option>
                            <option value="30.0">30</option>                          
                            <option value="50.0">50</option>
                            <option value="70.0">70</option>
                            <option value="100.0">100</option>
                          </select>
                          <a href="#how" id="hidden" class="small_font block_disp weight_bold ital modal_click">How do I know the weight?</a>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                  <!--Script-How do I know the weight?-->
                  <script type="text/javascript">
                    var nav = document.getElementById('hidden'),
                      body = document.body;

                  nav.addEventListener('click', function(e) {
                      body.className = body.className? '' : 'with_nav';
                      e.preventDefault();
                  });
                  </script>
                  <div id="close">
                  <p id="how" class="small_font">
                      It is important that your parcel's weight is properly described. This helps us in determining the mode of transportation and its associated cost.  <br> 
                       &nbsp;
                  </p>
                  &nbsp;
                  </div>
                  <!--Style-How do I know the weight?-->
                  <style type="text/css">
                    #how {
                      display: none;
                  }
                  .with_nav #how {
                      display: block;
                  }
                  #how:target {
                      display: block;
                  }
                  </style>
                  <div class="mb3 col_4 margin_left">
                    <input type="submit" onClick="goPlaces()" name="delivery" value="Submit" class="btn btn_offi">
                  </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>