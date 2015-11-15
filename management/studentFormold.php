<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<?php
    include("../lib/config.php");
    require("../lib/sqlQueries.php");
	require("../lib/studenFormValid.php");
?>

<!doctype html>
<html xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="utf-8">
	<title>Comp353</title>

	<link href="../style.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../css/general.css" rel="stylesheet" type="text/css">
	<link href="../css/navColor.css" rel="stylesheet" type="text/css">
	<link href="../css/datepicker.css" rel="stylesheet" type="text/css">


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="../js/html5shiv.min.js"></script>
	<script src="../js/respond.min.js"></script>
	<![endif]-->
	<script src="../js/control.js"></script>
</head>

<body>
<div class="container-fluid" >
	<div id="body">
		<div id="header">
			<div class="row">
				<div class="col-xs-12 text-center">
					<h1></h1>
				</div>
			</div>
		</div>
		<div id="navigation">
			<div class="row">
				<?php require("navigationManagement.php"); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 text-center">
				<h2></h2>
			</div>
		</div>
		<div id="reservation">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<h1 class="page-header text-center" style="color:black">Student Information Form</h1>
					<form id="registration-form" class="form-horizontal" role="form" method="post" action="../lib/newStudentProcess.php">
						<div class="form-control-group">
							<label for="firstName" class="col-sm-3 control-label">First Name :</label>
							<div class="col-sm-4">
								<input type="text" class="input-xlarge form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo htmlspecialchars($firstName); ?>">
							</div>
						</div>
						<div class="form-control-group">
							<label for="lastName" class="col-sm-3 control-label">Last Name :</label>
							<div class="col-sm-4">
								<input type="text" class="input-xlarge form-control" id="lastName" name="lastName" placeholder="Last Name" value="<?php echo htmlspecialchars($lastName); ?>">
							</div>
						</div>

						<div class="form-control-group">
							<label for="birthDate" class="col-sm-3 control-label">Date of Birth :</label>
							<div class="col-sm-4">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
									<input id="birthDate" name="birthDate" type="text" class="form-control date-picker" value="<?php echo htmlspecialchars($birthDate); ?>"/>

								</div>
							</div>
						</div>
						<div class="form-control-group">
							<div class="row">
								<label for="gender" class="col-sm-3 control-label" >Gender :</label>
								<div class="col-sm-4">
									<div class="radio">
											<label class="col-sm-4">Male</label><input type="radio" value="Male" id="inlineradio1" name="gender" <?php echo (isset($_POST['gender']) && $_POST['gender']=='Male'? 'checked' : '') ?>/>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label class="col-sm-4">Female</label><input type="radio" value="Female" id="inlineradio2" name="gender" <?php echo (isset($_POST['gender']) && $_POST['gender']=='Female'? 'checked' : '') ?>/>
									</div>
								</div>
							</div>

<!--							<div class="col-sm-4">-->
<!--								<div class="input-group-addon">-->
<!--									<div class="radio-inline">-->
<!--										<label><input type="radio" id="inlineradio1" name="gender" value="Male">Male </label>-->
<!--									</div>-->
<!--									<div class="radio-inline">-->
<!--										<label><input type="radio" id="inlineradio2" name="gender" value="Female">Female </label>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->

						</div>

<!--						<div class="form-control-group">-->
<!--							<label for="gender" class="col-sm-3 control-label">Gender :</label>-->
<!--							<div class="row">-->
<!--								<div class="col-sm-4">-->
<!--									<div class="radio">-->
<!--										<label><input id="inlineradio1" class="col-sm-4" name="gender" value="Male" type="radio" --><?php //echo (isset($_POST['gender']) && $_POST['gender']=='Male'? 'checked' : '') ?><!--Male</label>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-sm-4">-->
<!--									<div class="radio">-->
<!--										<label><input id="inlineradio2" class="col-sm-4" name="gender" value="Female" type="radio" --><?php //echo (isset($_POST['gender']) && $_POST['gender']=='Female'? 'checked' : '') ?><!--Female</label>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!---->
<!--						</div>-->


						<div class="form-control-group">
							<label for="address" class="col-sm-3 control-label">Address :</label>
							<div class="col-sm-9">
								<input type="text" class="input-xlarge form-control" id="address" name="address" placeholder="ex: 420 St. Elsewhere" value="<?php echo htmlspecialchars($address); ?>"></div>
						</div>
						<div class="form-group">
							<label for="city" class="col-sm-3 control-label">City :</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="city" name="city" placeholder="ex: Montreal" value="<?php echo htmlspecialchars($city); ?>">
								<?php echo '<p class="text-danger">'.$errCity.'</p>';?>
							</div>
						</div>
						<div class="form-group">
							<label for="province" class="col-sm-3 control-label">Province :</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="province" name="province" placeholder="ex: Quebec" value="<?php echo htmlspecialchars($province); ?>">
								<?php echo '<p class="text-danger">'.$errProvince.'</p>';?>
							</div>
						</div>
						<div class="form-group">
							<label for="postalCode" class="col-sm-3 control-label">Code Postal :</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="postalCode" name="postalCode" placeholder="ex: H4B 1R6" value="<?php echo htmlspecialchars($postalCode); ?>">
								<?php echo '<p class="text-danger">'.$errPostalCode.'</p>';?>
							</div>
						</div>
						<div class="form-group">
							<label for="country" class="col-sm-3 control-label">Country :</label>
							<div class="col-sm-9">
								<!-- RAVI - NEED CLARAFICATION HERE!!!! -->
								<!-- <input type="text" class="form-control" id="country" name="country" placeholder="country" value="<?php #echo htmlspecialchars($country); ?>">
                                <?php #echo '<p class="text-danger">'.$errCountry.'</p>';?> -->
								<select id="country" name="country" class="form-control" value="<?php echo htmlspecialchars($country); ?>">
									<option value="" selected="selected">--- Select a Country ---</option>
									<option <?php if(isset($_POST['country']) && $_POST['country'] == 'Canada')  echo ' selected="selected"';?> value="Canada">Canada</option>
									<option value="Afganistan">Afghanistan</option>
									<option value="Albania">Albania</option>
									<option value="Algeria">Algeria</option>
									<option value="American Samoa">American Samoa</option>
									<option value="Andorra">Andorra</option>
									<option value="Angola">Angola</option>
									<option value="Anguilla">Anguilla</option>
									<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
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
									<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
									<option value="Botswana">Botswana</option>
									<option value="Brazil">Brazil</option>
									<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
									<option value="Brunei">Brunei</option>
									<option value="Bulgaria">Bulgaria</option>
									<option value="Burkina Faso">Burkina Faso</option>
									<option value="Burundi">Burundi</option>
									<option value="Cambodia">Cambodia</option>
									<option value="Cameroon">Cameroon</option>
									<option value="Canary Islands">Canary Islands</option>
									<option value="Cape Verde">Cape Verde</option>
									<option value="Cayman Islands">Cayman Islands</option>
									<option value="Central African Republic">Central African Republic</option>
									<option value="Chad">Chad</option>
									<option value="Channel Islands">Channel Islands</option>
									<option value="Chile">Chile</option>
									<option value="China">China</option>
									<option value="Christmas Island">Christmas Island</option>
									<option value="Cocos Island">Cocos Island</option>
									<option value="Colombia">Colombia</option>
									<option value="Comoros">Comoros</option>
									<option value="Congo">Congo</option>
									<option value="Cook Islands">Cook Islands</option>
									<option value="Costa Rica">Costa Rica</option>
									<option value="Cote DIvoire">Cote D'Ivoire</option>
									<option value="Croatia">Croatia</option>
									<option value="Cuba">Cuba</option>
									<option value="Curaco">Curacao</option>
									<option value="Cyprus">Cyprus</option>
									<option value="Czech Republic">Czech Republic</option>
									<option value="Denmark">Denmark</option>
									<option value="Djibouti">Djibouti</option>
									<option value="Dominica">Dominica</option>
									<option value="Dominican Republic">Dominican Republic</option>
									<option value="East Timor">East Timor</option>
									<option value="Ecuador">Ecuador</option>
									<option value="Egypt">Egypt</option>
									<option value="El Salvador">El Salvador</option>
									<option value="Equatorial Guinea">Equatorial Guinea</option>
									<option value="Eritrea">Eritrea</option>
									<option value="Estonia">Estonia</option>
									<option value="Ethiopia">Ethiopia</option>
									<option value="Falkland Islands">Falkland Islands</option>
									<option value="Faroe Islands">Faroe Islands</option>
									<option value="Fiji">Fiji</option>
									<option value="Finland">Finland</option>
									<option value="France">France</option>
									<option value="French Guiana">French Guiana</option>
									<option value="French Polynesia">French Polynesia</option>
									<option value="French Southern Ter">French Southern Ter</option>
									<option value="Gabon">Gabon</option>
									<option value="Gambia">Gambia</option>
									<option value="Georgia">Georgia</option>
									<option value="Germany">Germany</option>
									<option value="Ghana">Ghana</option>
									<option value="Gibraltar">Gibraltar</option>
									<option value="Great Britain">Great Britain</option>
									<option value="Greece">Greece</option>
									<option value="Greenland">Greenland</option>
									<option value="Grenada">Grenada</option>
									<option value="Guadeloupe">Guadeloupe</option>
									<option value="Guam">Guam</option>
									<option value="Guatemala">Guatemala</option>
									<option value="Guinea">Guinea</option>
									<option value="Guyana">Guyana</option>
									<option value="Haiti">Haiti</option>
									<option value="Hawaii">Hawaii</option>
									<option value="Honduras">Honduras</option>
									<option value="Hong Kong">Hong Kong</option>
									<option value="Hungary">Hungary</option>
									<option value="Iceland">Iceland</option>
									<option value="India">India</option>
									<option value="Indonesia">Indonesia</option>
									<option value="Iran">Iran</option>
									<option value="Iraq">Iraq</option>
									<option value="Ireland">Ireland</option>
									<option value="Isle of Man">Isle of Man</option>
									<option value="Israel">Israel</option>
									<option value="Italy">Italy</option>
									<option value="Jamaica">Jamaica</option>
									<option value="Japan">Japan</option>
									<option value="Jordan">Jordan</option>
									<option value="Kazakhstan">Kazakhstan</option>
									<option value="Kenya">Kenya</option>
									<option value="Kiribati">Kiribati</option>
									<option value="Korea North">Korea North</option>
									<option value="Korea Sout">Korea South</option>
									<option value="Kuwait">Kuwait</option>
									<option value="Kyrgyzstan">Kyrgyzstan</option>
									<option value="Laos">Laos</option>
									<option value="Latvia">Latvia</option>
									<option value="Lebanon">Lebanon</option>
									<option value="Lesotho">Lesotho</option>
									<option value="Liberia">Liberia</option>
									<option value="Libya">Libya</option>
									<option value="Liechtenstein">Liechtenstein</option>
									<option value="Lithuania">Lithuania</option>
									<option value="Luxembourg">Luxembourg</option>
									<option value="Macau">Macau</option>
									<option value="Macedonia">Macedonia</option>
									<option value="Madagascar">Madagascar</option>
									<option value="Malaysia">Malaysia</option>
									<option value="Malawi">Malawi</option>
									<option value="Maldives">Maldives</option>
									<option value="Mali">Mali</option>
									<option value="Malta">Malta</option>
									<option value="Marshall Islands">Marshall Islands</option>
									<option value="Martinique">Martinique</option>
									<option value="Mauritania">Mauritania</option>
									<option value="Mauritius">Mauritius</option>
									<option value="Mayotte">Mayotte</option>
									<option value="Mexico">Mexico</option>
									<option value="Midway Islands">Midway Islands</option>
									<option value="Moldova">Moldova</option>
									<option value="Monaco">Monaco</option>
									<option value="Mongolia">Mongolia</option>
									<option value="Montserrat">Montserrat</option>
									<option value="Morocco">Morocco</option>
									<option value="Mozambique">Mozambique</option>
									<option value="Myanmar">Myanmar</option>
									<option value="Nambia">Nambia</option>
									<option value="Nauru">Nauru</option>
									<option value="Nepal">Nepal</option>
									<option value="Netherland Antilles">Netherland Antilles</option>
									<option value="Netherlands">Netherlands (Holland, Europe)</option>
									<option value="Nevis">Nevis</option>
									<option value="New Caledonia">New Caledonia</option>
									<option value="New Zealand">New Zealand</option>
									<option value="Nicaragua">Nicaragua</option>
									<option value="Niger">Niger</option>
									<option value="Nigeria">Nigeria</option>
									<option value="Niue">Niue</option>
									<option value="Norfolk Island">Norfolk Island</option>
									<option value="Norway">Norway</option>
									<option value="Oman">Oman</option>
									<option value="Pakistan">Pakistan</option>
									<option value="Palau Island">Palau Island</option>
									<option value="Palestine">Palestine</option>
									<option value="Panama">Panama</option>
									<option value="Papua New Guinea">Papua New Guinea</option>
									<option value="Paraguay">Paraguay</option>
									<option value="Peru">Peru</option>
									<option value="Phillipines">Philippines</option>
									<option value="Pitcairn Island">Pitcairn Island</option>
									<option value="Poland">Poland</option>
									<option value="Portugal">Portugal</option>
									<option value="Puerto Rico">Puerto Rico</option>
									<option value="Qatar">Qatar</option>
									<option value="Republic of Montenegro">Republic of Montenegro</option>
									<option value="Republic of Serbia">Republic of Serbia</option>
									<option value="Reunion">Reunion</option>
									<option value="Romania">Romania</option>
									<option value="Russia">Russia</option>
									<option value="Rwanda">Rwanda</option>
									<option value="St Barthelemy">St Barthelemy</option>
									<option value="St Eustatius">St Eustatius</option>
									<option value="St Helena">St Helena</option>
									<option value="St Kitts-Nevis">St Kitts-Nevis</option>
									<option value="St Lucia">St Lucia</option>
									<option value="St Maarten">St Maarten</option>
									<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
									<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
									<option value="Saipan">Saipan</option>
									<option value="Samoa">Samoa</option>
									<option value="Samoa American">Samoa American</option>
									<option value="San Marino">San Marino</option>
									<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
									<option value="Saudi Arabia">Saudi Arabia</option>
									<option value="Senegal">Senegal</option>
									<option value="Serbia">Serbia</option>
									<option value="Seychelles">Seychelles</option>
									<option value="Sierra Leone">Sierra Leone</option>
									<option value="Singapore">Singapore</option>
									<option value="Slovakia">Slovakia</option>
									<option value="Slovenia">Slovenia</option>
									<option value="Solomon Islands">Solomon Islands</option>
									<option value="Somalia">Somalia</option>
									<option value="South Africa">South Africa</option>
									<option value="Spain">Spain</option>
									<option value="Sri Lanka">Sri Lanka</option>
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
									<option value="Togo">Togo</option>
									<option value="Tokelau">Tokelau</option>
									<option value="Tonga">Tonga</option>
									<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
									<option value="Tunisia">Tunisia</option>
									<option value="Turkey">Turkey</option>
									<option value="Turkmenistan">Turkmenistan</option>
									<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
									<option value="Tuvalu">Tuvalu</option>
									<option value="Uganda">Uganda</option>
									<option value="Ukraine">Ukraine</option>
									<option value="United Arab Erimates">United Arab Emirates</option>
									<option value="United Kingdom">United Kingdom</option>
									<option value="United States of America">United States of America</option>
									<option value="Uraguay">Uruguay</option>
									<option value="Uzbekistan">Uzbekistan</option>
									<option value="Vanuatu">Vanuatu</option>
									<option value="Vatican City State">Vatican City State</option>
									<option value="Venezuela">Venezuela</option>
									<option value="Vietnam">Vietnam</option>
									<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
									<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
									<option value="Wake Island">Wake Island</option>
									<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
									<option value="Yemen">Yemen</option>
									<option value="Zaire">Zaire</option>
									<option value="Zambia">Zambia</option>
									<option value="Zimbabwe">Zimbabwe</option>
								</select>
								<?php echo '<p class="text-danger">'.$errCountry.'</p>';?>
							</div>
						</div>
						<div class="form-group">
							<label for="phone" class="col-sm-3 control-label">Phone Number :</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="ex: (514) 123-4567" value="<?php echo htmlspecialchars($phoneNumber); ?>" onchange="checkPhoneNumber()">
								<?php echo '<p class="text-danger">'.$errPhoneNumber.'</p>';?>

							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-3 control-label">Email</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($email); ?>">
								<?php echo '<p class="text-danger">'.$errEmail.'</p>';?>
							</div>
						</div>
						<div class="form-group">
							<label for="studentNumber" class="col-sm-3 control-label">Student Number :</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="studentNumber" name="studentNumber" placeholder="ex: 12345678" value="<?php echo htmlspecialchars($studentNumber); ?>">
								<?php echo '<p class="text-danger">'.$errStudentNumber.'</p>';?>
							</div>
						</div>

						<div class="form-group">
							<label for="type" class="col-sm-3 control-label">Type :</label>
							<div class="col-sm-9">
								<label class="radio-inline">
									<input id="inlineradio1" name="type" value="Local" type="radio" <?php echo (isset($_POST['type']) && $_POST['type']=='Local'? 'checked' : '') ?>>Local</label>
								<label class="radio-inline">
									<input id="inlineradio2" name="type" value="International" type="radio" <?php echo (isset($_POST['type']) && $_POST['type']=='International' ? 'checked' : '') ?>>International</label>
								<?php echo '<p class="text-danger">'.$errtype.'</p>';?>
							</div>
						</div>
						<div class="form-group">
							<label for="status" class="col-sm-3 control-label">Status :</label>
							<div class="col-sm-9">
								<label class="radio-inline" >
									<input id="fulltime" name="status" value="Full-Time" type="radio"  onclick="javascript:displayPositionDiv();" <?php echo (isset($_POST['status']) && $_POST['status']=='Full-Time'? 'checked' : '') ?>>Full-Time</label>
								<label class="radio-inline" >
									<input id="parttime" name="status" value="Part-Time" type="radio"  onclick="javascript:displayPositionDiv();" <?php echo (isset($_POST['status']) && $_POST['status']=='Part-Time'? 'checked' : '') ?>>Part-Time</label>
								<label class="radio-inline" >
									<input id="onleave" name="status" value="On-Leave" type="radio"  onclick="javascript:displayPositionDiv();" <?php echo (isset($_POST['status']) && $_POST['status']=='On-Leave'? 'checked' : '') ?>>On-Leave</label>
								<label class="radio-inline" >
									<input id="graduated" name="status" value="Graduated" type="radio"  onclick="javascript:displayPositionDiv();" <?php echo (isset($_POST['status']) && $_POST['status']=='Graduated'? 'checked' : '') ?>>Graduated</label>
								<?php echo '<p class="text-danger">'.$errStatus.'</p>';?>
							</div>
						</div>
						<div class="form-group" id="displayPosition" style="display:none">
							<label for="position" class="col-sm-3 control-label">Position :</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="position" name="position" placeholder="ex: Software Developer" value="<?php echo htmlspecialchars($position); ?>">
								<?php echo '<p class="text-danger">'.$errPosition.'</p>';?>
							</div>
						</div>
						<div class="form-group">
							<label for="level" class="col-sm-3 control-label">Level :</label>
							<div class="col-sm-9">
								<select id="level" name="level" class="form-control">
									<option value="--- Select a Level ---" <?php echo (isset($_POST['level']) && $_POST['level'] == '--- Select a Level ---'? ' selected=selected"':'')?>>--- Select a Level ---</option>
									<option <?php echo (isset($_POST['level']) && $_POST['level'] == 'Undergraduate'? ' selected=selected"':'')?> value="Undergraduate">Undergraduate (BS)</option>
									<option <?php echo (isset($_POST['level']) && $_POST['level'] == 'Graduate'? ' selected=selected"':'')?> value="Graduate">Graduate (MS)</option>
									<option <?php echo (isset($_POST['level']) && $_POST['level'] == 'Doctorate'? ' selected=selected"':'')?> value="Doctorate">Doctorate (PhD)</option>
									<option <?php echo (isset($_POST['level']) && $_POST['level'] == 'Post-Doctorate'? ' selected=selected"':'')?> value="Post-Doctorate">Post-Doctorate</option>
								</select>
								<?php echo '<p class="text-danger">'.$errLevel.'</p>';?>
							</div>
						</div>
						<div class="form-group">
							<label for="program" class="col-sm-3 control-label">Program :</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="program" name="program" placeholder="ex: Software Engineering" value="<?php echo htmlspecialchars($program); ?>">
								<?php echo '<p class="text-danger">'.$errProgram.'</p>';?>
							</div>
						</div>
						<div class="form-group">
							<label for="department" class="col-sm-3 control-label">Department ID :</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="department" name="department" placeholder="ex: ENCS" value="<?php echo htmlspecialchars($department); ?>">
								<?php echo '<p class="text-danger">'.$errDepartment.'</p>';?>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-9 col-sm-offset-2">
								<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-9 col-sm-offset-2">
								<?php echo $result; ?><?php echo $name;?>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>


	</div><!---body--->
</div><!----container fluid------->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../js/jquery_min_1112.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>
<script>
	$(".date-picker").datepicker();

	$(".date-picker").on("change", function () {
		var id = $(this).attr("id");
		var val = $("label[for='" + id + "']").text();
		$("#msg").text(val + " changed");
	});
</script>
<script src="../js/functions.js"></script>

<script src="../js/jquery-1.7.1.min.js"></script>

<script src="../js/jquery.validate.js"></script>

<script src="../script.js"></script>
<script>
	addEventListener('load', prettyPrint, false);
	$(document).ready(function(){
		$('pre').addClass('prettyprint linenums');
	});
</script>
</body>
</html>