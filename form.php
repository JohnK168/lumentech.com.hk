<?php
include("./captcha/captcha.php");

if (session_id() == "") session_start();
$isSent = isset($_GET["s"]) ? $_GET["s"] : "";
$_SESSION['tokenMaker'] = md5( uniqid() );

$_SESSION['captcha'] = captcha();
//print_r($_SESSION['captcha']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Lumentech Company Limited</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta name="keywords" content="LED lighting, Lighting design consultant, Solid state lighting, Energy saving lighting, Environmental friendly lighting, DALI, DMX, LED 照明, LED 灯光设计顾问, 环保照明">
<link href="common.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<link href="style_iefix.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 7]>
<link href="style_iefix.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=en"></script>
<script type="text/javascript">
var lat = 22.3564471;
var lng = 114.12501700000007;
var myTitle = "Lumentech Company Limited";
  function initialize() {
    var myLatlng = new google.maps.LatLng(lat,lng);
    var myOptions = {
      zoom: 18,
      center: myLatlng,
      mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
      navigationControl: true,
      navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
      mapTypeId: google.maps.MapTypeId.ROADMAP

    }
    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    
    var marker = new google.maps.Marker({
        position: myLatlng, 
        map: map,
        title: myTitle
    });   
  }
</script>

</head>
<script language="javascript" type="text/javascript">
function check_form()
{
    var str = document.contact_form;
    if (str.title.value==""){
    	str.title.focus();
    	alert("Please enter the title.");
    	return false;
    }
    if (str.surname.value==""){
    	str.surname.focus();
    	alert("Please enter the surname.");
    	return false;
    }
    if (str.forename.value==""){
    	str.forename.focus();
    	alert("Please enter the forename.");
    	return false;
    }		
	if (str.email.value==""){
    	str.email.focus();
    	alert("Please enter email address.");
    	return false;
    }
    if (!checkEmail(str)){
    	str.email.focus();
    	return false;
    }
    if (str.phoneCountryCode.value==""){
    	str.phoneCountryCode.focus();
    	alert("Please enter the Country Code.");
    	return false;
    }
    if (str.phoneAreaCode.value==""){
    	str.phoneAreaCode.focus();
    	alert("Please enter the Area Code.");
    	return false;
    }
    if (str.phoneNo.value==""){
    	str.phoneNo.focus();
    	alert("Please enter the phone number.");
    	return false;
    }
    if (str.address1.value==""){
    	str.address1.focus();
    	alert("Please enter the address.");
    	return false;
    }
    if (str.address2.value==""){
    	str.address2.focus();
    	alert("Please enter the address.");
    	return false;
    }
    if (str.country.value==""){
    	str.country.focus();
    	alert("Please enter the country.");
    	return false;
    }
    if (str.company.value==""){
    	str.company.focus();
    	alert("Please enter the company.");
    	return false;
    }
    if (str.jobTitle.value==""){
    	str.jobTitle.focus();
    	alert("Please enter the job title.");
    	return false;
    }
    if (str.industry.value==""){
    	str.industry.focus();
    	alert("Please enter the industry.");
    	return false;
    }
    if (str.message.value==""){
    	str.message.focus();
    	alert("Please enter the message.");
    	return false;
    }
    
    if (str.captcha.value==""){
    	str.captcha.focus();
    	alert("Please enter the words.");
    	return false;
    }
    
    //alert("Email is sent.");return false;
    return true;
}		   
			
function checkEmail(myForm) 
{
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.email.value))
    {
        return true;
    }
    alert("Please enter the correct email address.");
    return false;
}
</script>
<body onload="initialize();">
<div id="headerContainer">
  <div id="header">
    <table width="900" border="0" align="center" cellpadding="0" cellspacing="0" class="bg">
      <tr>
        <td valign="top">
          <ul id="topNav">
            <!-- Navigation must in reverse order for CSS-nav -->
            <li><a href="index.html">HOME</a></li>
            <li><a href="about.html">ABOUT US</a></li>
            <li><a href="product.html">PRODUCTS</a></li>
            <li><a href="form.php" class="navOn">CONTACT US</a></li>
          </ul></td>
        <td class="midCol"></td>
        <td width="141">
        <div class="langbar"><!--<a href="#">Eng</a> | <a href="#">?/a> | <a href="#">?/a>//--></div></td>
      </tr>
    </table>
    <table width="900" height="5" border="0" cellpadding="0" cellspacing="0" class="bg">
    	<tr>
        	<td class="leftCol2"></td>
            <td class="midCol2"></td>
            <td class="rightCol2"></td>
        </tr>
    </table>
    <table width="900" height="85" border="0" cellpadding="0" cellspacing="0">
    	<tr>
    		<td width="50%"><div class="headingPos"><h1><img src="images/logo.jpg" class="logo" /><span class="text1">Lumentech Company Limited</span></h1></div></td>
            <td width="50%" align="right"><div class="headingPos2">PHONE (852)2408 3438<br />FAX (852)3126 9318<br />EMAIL sales@lumentech.com.hk</div></td>
        </tr>
    </table>
    <!-- end #heade -->
  </div>
  <!-- end #headerContainer -->
</div>
<div id="container">
<table border="0" cellpadding="0" cellspacing="0">
	<tr>
        <td valign="top">
            <div id="aboutSidebar1">
            <div class="content">

            <table border="0" cellpadding="0" cellspacing="0">
            	<tr>
                	<td class="catTitleBG"><div class="Title">Contact Us</div><h3>&nbsp;</h3></td>
                </tr>
                <tr>
                    <td>
                    	<br />
                        <div class="categoryNav">
                            <li><a href="product.html">Major Products</a></li>
                            <li><a href="product2.html">Project Reference</a></li>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        </div>
        <!-- end #sidebar1 -->
        </td>
        <td width="20"></td>
    	<td valign="top">
            <div id="aboutSidebar2">
      <div class="otherContent">
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td width="350" rowspan="2" valign="top">
<!--        <iframe width="400" id="map_canvas" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src=""></iframe> //-->
        <div id="map_canvas" style="width: 350px; height: 250px;"></div>
        </td>
        <td class="contactBg"><h4>ADDRESS</h4>
          <p>B-16, 18th floor, Block B,<br />Kwai Fong Industrial Building,<br />9-15 Kwai Cheong Road,<br />Kwai Chung, Hong Kong</p></td>
      </tr>
      <tr>
        <td class="contactBg2"><p>Phone : (852)2408 3438<br />
            Fax : (852)3126 9318<br />
            Email : <a href="mailto:sales@lumentech.com.hk">sales@lumentech.com.hk</a></p></td>
      </tr>
    </table>
<!-- start Contact information -->
    <form action="./send.php" method="post" name="contact_form" class="contactFormText" id="contact_form" enctype="multipart/form-data" onSubmit="return check_form();">
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td align="left" class="header" border="0">
            <?php
				if( $isSent == "1" )
				{
					echo "<span style=\"color:green; font-weight:bold\">Message is sent successful.</span><br />";
				}
				elseif( $isSent == "0" )
				{
					echo "<span style=\"color:red; font-weight:bold\">Message is sent fail.</span><br />";
				}
            ?>
          <br /><h4>Contact Information</h4></td>
          <td align="right" class="header" border="0">
            <label><b>( <span class="red_wd10 style4">*</span> )<span class="blk_wd10 style4">Field is required</span></b></label>
          </td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="1" cellpadding="5">
        <tr>
          <td>Title<span class="red_wd12">*</span></td>
          <td>
			<select name="title" id="title" class="info6">
              <option value="">Select</option>
              <option value="Mr">Mr</option>
              <option value="Ms">Ms</option>
              <option value="Mrs">Mrs</option>
              <option value="Dr">Dr</option>
              <option value="Prof">Prof</option>
            </select>
          </td>
          <td>Surname<span class="red_wd12">*</span></td>
          <td><input name="surname" type="text" id="surname" class="info1" /></td>
          <td>Forename<span class="red_wd12">*</span></td>
          <td><input name="forename" type="text" id="forename" class="info1" /></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="1" cellpadding="5">
        <tr>
          <td width="1">Email<span class="red_wd12">*</span></td>
          <td><input type="text" name="email" id="email" class="info2" /></td>
          <td colspan="4" valign="top"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="1" cellpadding="5">
        <tr>
          <td>phone: (Country Code)<span class="red_wd12">*</span></td>
          <td><input type="text" name="phoneCountryCode" id="phoneCountryCode" class="info3" /></td>
          <td>(Area Code)<span class="red_wd12">*</span></td>
          <td><input type="text" name="phoneAreaCode" id="phoneAreaCode" class="info3" /></td>
          <td colspan="2"><input type="text" name="phoneNo" id="phoneNo" class="info1" /></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="1" cellpadding="5">
        <tr>
          <td width="80">Address<span class="red_wd12">*</span></td>
          <td><input type="text" name="address1" id="address1" class="info4" /></td>
        </tr>
        <tr>
          <td width="80">&nbsp;</td>
          <td><input type="text" name="address2" id="address2" class="info4" /></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="1" cellpadding="5">
        <tr>
          <td width="80">Country<span class="red_wd12">*</span></td>
          <td>
          <select id='country' name='country' class="info5">
              <option value="">----------------- Select Country -----------------</option>
              <option value="United States">United States</option>
              <option value="Canada">Canada</option>
              <option value="Afghanistan">Afghanistan</option>
              <option value="Albania">Albania</option>
              <option value="Algeria">Algeria</option>
              <option value="American Samoa">American Samoa</option>
              <option value="Andorra">Andorra</option>
              <option value="Angola">Angola</option>
              <option value="Anguilla">Anguilla</option>
              <option value="Antarctica">Antarctica</option>
              <option value="Antigua and Barbuda">Antigua and Barbuda</option>
              <option value="Argentina">Argentina</option>
              <option value="Armenia">Armenia</option>
              <option value="Aruba">Aruba</option>
              <option value="Australia">Australia</option>
              <option value="Austria">Austria</option>
              <option value="Azerbaidjan">Azerbaidjan</option>
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
              <option value="Bosnia-Herzegovina">Bosnia-Herzegovina</option>
              <option value="Botswana">Botswana</option>
              <option value="Bouvet Island">Bouvet Island</option>
              <option value="Brazil">Brazil</option>
              <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
              <option value="Brunei Darussalam">Brunei Darussalam</option>
              <option value="Bulgaria">Bulgaria</option>
              <option value="Burkina Faso">Burkina Faso</option>
              <option value="Burundi">Burundi</option>
              <option value="Cambodia">Cambodia</option>
              <option value="Cameroon">Cameroon</option>
              <option value="Cape Verde">Cape Verde</option>
              <option value="Cayman Islands">Cayman Islands</option>
              <option value="Central African Republic">Central African Republic</option>
              <option value="Chad">Chad</option>
              <option value="Chile">Chile</option>
              <option value="China">China</option>
              <option value="Christmas Island">Christmas Island</option>
              <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
              <option value="Colombia">Colombia</option>
              <option value="Comoros">Comoros</option>
              <option value="Congo">Congo</option>
              <option value="Cook Islands">Cook Islands</option>
              <option value="Costa Rica">Costa Rica</option>
              <option value="Croatia">Croatia</option>
              <option value="Cuba">Cuba</option>
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
              <option value="Former Czechoslovakia">Former Czechoslovakia</option>
              <option value="Former USSR">Former USSR</option>
              <option value="France">France</option>
              <option value="France (European Territory)">France (European Territory)</option>
              <option value="French Guyana">French Guyana</option>
              <option value="French Southern Territories">French Southern Territories</option>
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
              <option value="Guadeloupe (French)">Guadeloupe (French)</option>
              <option value="Guam (USA)">Guam (USA)</option>
              <option value="Guatemala">Guatemala</option>
              <option value="Guinea">Guinea</option>
              <option value="Guinea Bissau">Guinea Bissau</option>
              <option value="Guyana">Guyana</option>
              <option value="Haiti">Haiti</option>
              <option value="Heard and McDonald Islands">Heard and McDonald Islands</option>
              <option value="Honduras">Honduras</option>
              <option value="Hong Kong" selected>Hong Kong</option>
              <option value="Hungary">Hungary</option>
              <option value="Iceland">Iceland</option>
              <option value="India">India</option>
              <option value="Indonesia">Indonesia</option>
              <option value="International">International</option>
              <option value="Iran">Iran</option>
              <option value="Iraq">Iraq</option>
              <option value="Ireland">Ireland</option>
              <option value="Israel">Israel</option>
              <option value="Italy">Italy</option>
              <option value="Ivory Coast (Cote D&#39;Ivoire)">Ivory Coast (Cote D&#39;Ivoire)</option>
              <option value="Jamaica">Jamaica</option>
              <option value="Japan">Japan</option>
              <option value="Jordan">Jordan</option>
              <option value="Kazakhstan">Kazakhstan</option>
              <option value="Kenya">Kenya</option>
              <option value="Kiribati">Kiribati</option>
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
              <option value="Malawi">Malawi</option>
              <option value="Malaysia">Malaysia</option>
              <option value="Maldives">Maldives</option>
              <option value="Mali">Mali</option>
              <option value="Malta">Malta</option>
              <option value="Marshall Islands">Marshall Islands</option>
              <option value="Martinique (French)">Martinique (French)</option>
              <option value="Mauritania">Mauritania</option>
              <option value="Mauritius">Mauritius</option>
              <option value="Mayotte">Mayotte</option>
              <option value="Mexico">Mexico</option>
              <option value="Micronesia">Micronesia</option>
              <option value="Moldavia">Moldavia</option>
              <option value="Monaco">Monaco</option>
              <option value="Mongolia">Mongolia</option>
              <option value="Montserrat">Montserrat</option>
              <option value="Morocco">Morocco</option>
              <option value="Mozambique">Mozambique</option>
              <option value="Myanmar">Myanmar</option>
              <option value="Namibia">Namibia</option>
              <option value="Nauru">Nauru</option>
              <option value="Nepal">Nepal</option>
              <option value="Netherlands">Netherlands</option>
              <option value="Netherlands Antilles">Netherlands Antilles</option>
              <option value="Neutral Zone">Neutral Zone</option>
              <option value="New Caledonia (French)">New Caledonia (French)</option>
              <option value="New Zealand">New Zealand</option>
              <option value="Nicaragua">Nicaragua</option>
              <option value="Niger">Niger</option>
              <option value="Nigeria">Nigeria</option>
              <option value="Niue">Niue</option>
              <option value="Norfolk Island">Norfolk Island</option>
              <option value="North Korea">North Korea</option>
              <option value="Northern Mariana Islands">Northern Mariana Islands</option>
              <option value="Norway">Norway</option>
              <option value="Oman">Oman</option>
              <option value="Pakistan">Pakistan</option>
              <option value="Palau">Palau</option>
              <option value="Panama">Panama</option>
              <option value="Papua New Guinea">Papua New Guinea</option>
              <option value="Paraguay">Paraguay</option>
              <option value="Peru">Peru</option>
              <option value="Philippines">Philippines</option>
              <option value="Pitcairn Island">Pitcairn Island</option>
              <option value="Poland">Poland</option>
              <option value="Polynesia (French)">Polynesia (French)</option>
              <option value="Portugal">Portugal</option>
              <option value="Puerto Rico">Puerto Rico</option>
              <option value="Qatar">Qatar</option>
              <option value="Reunion (French)">Reunion (French)</option>
              <option value="Romania">Romania</option>
              <option value="Russian Federation">Russian Federation</option>
              <option value="Rwanda">Rwanda</option>
              <option value="S. Georgia & S. Sandwich Isls.">S. Georgia & S. Sandwich Isls.</option>
              <option value="Saint Helena">Saint Helena</option>
              <option value="Saint Kitts & Nevis Anguilla">Saint Kitts & Nevis Anguilla</option>
              <option value="Saint Lucia">Saint Lucia</option>
              <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
              <option value="Saint Tome (Sao Tome) and Principe">Saint Tome (Sao Tome) and Principe</option>
              <option value="Saint Vincent & Grenadines">Saint Vincent & Grenadines</option>
              <option value="Samoa">Samoa</option>
              <option value="San Marino">San Marino</option>
              <option value="Saudi Arabia">Saudi Arabia</option>
              <option value="Senegal">Senegal</option>
              <option value="Seychelles">Seychelles</option>
              <option value="Sierra Leone">Sierra Leone</option>
              <option value="Singapore">Singapore</option>
              <option value="Slovak Republic">Slovak Republic</option>
              <option value="Slovenia">Slovenia</option>
              <option value="Solomon Islands">Solomon Islands</option>
              <option value="Somalia">Somalia</option>
              <option value="South Africa">South Africa</option>
              <option value="South Korea">South Korea</option>
              <option value="Spain">Spain</option>
              <option value="Sri Lanka">Sri Lanka</option>
              <option value="Sudan">Sudan</option>
              <option value="Suriname">Suriname</option>
              <option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
              <option value="Swaziland">Swaziland</option>
              <option value="Sweden">Sweden</option>
              <option value="Switzerland">Switzerland</option>
              <option value="Syria">Syria</option>
              <option value="Tadjikistan">Tadjikistan</option>
              <option value="Taiwan">Taiwan</option>
              <option value="Tanzania">Tanzania</option>
              <option value="Thailand">Thailand</option>
              <option value="Togo">Togo</option>
              <option value="Tokelau">Tokelau</option>
              <option value="Tonga">Tonga</option>
              <option value="Trinidad and Tobago">Trinidad and Tobago</option>
              <option value="Tunisia">Tunisia</option>
              <option value="Turkey">Turkey</option>
              <option value="Turkmenistan">Turkmenistan</option>
              <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
              <option value="Tuvalu">Tuvalu</option>
              <option value="Uganda">Uganda</option>
              <option value="Ukraine">Ukraine</option>
              <option value="United Arab Emirates">United Arab Emirates</option>
              <option value="United Kingdom">United Kingdom</option>
              <option value="Uruguay">Uruguay</option>
              <option value="USA Military">USA Military</option>
              <option value="USA Minor Outlying Islands">USA Minor Outlying Islands</option>
              <option value="Uzbekistan">Uzbekistan</option>
              <option value="Vanuatu">Vanuatu</option>
              <option value="Vatican City State">Vatican City State</option>
              <option value="Venezuela">Venezuela</option>
              <option value="Vietnam">Vietnam</option>
              <option value="Virgin Islands (British)">Virgin Islands (British)</option>
              <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
              <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
              <option value="Western Sahara">Western Sahara</option>
              <option value="Yemen">Yemen</option>
              <option value="Yugoslavia">Yugoslavia</option>
              <option value="Zaire">Zaire</option>
              <option value="Zambia">Zambia</option>
              <option value="Zimbabwe">Zimbabwe</option>
            </select>
          </td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="1" cellpadding="5">
        <tr>
          <td>Age</td>
          <td><input type="text" name="age" id="age" class="info3" /></td>
          <td>Age Group</td>
          <td>
			<select name="agegroup" id="agegroup" class="info1">
              <option value="">-- Select --</option>
              <option value="<20">&lt;20</option>
              <option value="21-30">21-30</option>
              <option value="31-45">31-45</option>
              <option value="46-55">45-55</option>
              <option value=">55">&gt;55</option>
            </select>
          </td>
          <td>Gender</td>
          <td><input type="radio" name="gender" id="gender" value="male" /> M&nbsp;&nbsp;<input type="radio" name="gender" id="gender" value="female" /> F</td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="1" cellpadding="5">
        <tr>
          <td colspan="2" class="header"><h4>Company Information<br />
            </h4></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="1" cellpadding="5">
        <tr>
          <td>Name<span class="red_wd12">*</span></td>
          <td><input type="text" name="company" id="company" class="info1" /></td>
          <td>Job Title<span class="red_wd12">*</span></td>
          <td><input type="text" name="jobTitle" id="jobTitle" class="info1" /></td>
          <td>Size</td>
          <td>
			<select name="companySize" id="companySize" class="info1">
              <option value="">-- Select --</option>
              <option value="1">1</option>
              <option value="2-4">2-4</option>
              <option value="5-9">5-9</option>
              <option value="10-19">10-19</option>
              <option value="20-49">20-49</option>
              <option value="50-499">50-499</option>
              <option value="500-999">500-999</option>
              <option value="over 1000">over 1000</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Industry<span class="red_wd12">*</span></td>
          <td colspan="5">
              <select name="industry" id="industry" class="info4">
                  <option value="">---------------------------------------- Select ----------------------------------------</option>
                  <option value="Accounting">Accounting</option>
                  <option value="Banking">Banking</option>
                  <option value="Building & Construction">Building & Construction</option> 
                  <option value="Charity, Social Services, Non-Profit Organisation">Charity, Social Services, Non-Profit Organisation</option>
                  <option value="Clothing, Garment, Textile">Clothing, Garment, Textile</option> 
                  <option value="Design">Design</option> 
                  <option value="Education">Education</option>
                  <option value="Electronics, Electrical Equipment">Electronics, Electrical Equipment</option> 
                  <option value="Engineering">Engineering</option>
                  <option value="Finance, Investment">Finance, Investment</option> 
                  <option value="Freight Forwarding, Delivery">Freight Forwarding, Delivery</option>
                  <option value="Health & Beauty Care">Health & Beauty Care</option> 
                  <option value="Hospitality, Catering">Hospitality, Catering</option> 
                  <option value="Human Resources Management, Consultancy">Human Resources Management, Consultancy</option>  
                  <option value="Information Technology">Information Technology</option> 
                  <option value="Insurance">Insurance</option>
                  <option value="Jewellery, Gems, Watches">Jewellery, Gems, Watches</option>
                  <option value="Legal Services">Legal Services</option> 
                  <option value="Logistic, Transportation">Logistic, Transportation</option> 
                  <option value="Management Consultancy, Service">Management Consultancy, Service</option> 
                  <option value="Manufacturing">Manufacturing</option>
                  <option value="Marketing Research">Marketing Research</option>
                  <option value="Media, Advertsing">Media, Advertsing</option>
                  <option value="Medical, Pharmaceutical">Medical, Pharmaceutical</option> 
                  <option value="Motor Vehicles">Motor Vehicles</option> 
                  <option value="Property Agency">Property Agency</option>
                  <option value="Property Developer">Property Developer</option>
                  <option value="Property Management">Property Management</option>
                  <option value="Public relations, Marketing Services">Public relations, Marketing Services</option> 
                  <option value="Restaurant">Restaurant</option> 
                  <option value="Sports">Sports</option> 
                  <option value="Telecommunication">Telecommunication</option> 
                  <option value="Tourism, Travel Agency">Tourism, Travel Agency</option> 
                  <option value="Toys">Toys</option> 
                  <option value="Trading and Distribution">Trading and Distribution</option> 
                  <option value="Wholesale, Retail">Wholesale, Retail</option> 
                  <option value="Others">Others</option> 
            </select>
          </td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="1" cellpadding="5">
        <tr>
          <td colspan="2" class="header"><h4>Message<span class="red_wd12">*</span></h4></td>
        </tr>
        <tr>
          <td><textarea name="message" class="comment" id="message"></textarea></td>
          <td valign="top"></td>
        </tr>
		<tr>
		  <td><h4>Please type the words :</h4>
		  <?php echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA" />';?><br />
		  <input type="text" id="captcha" name="captcha" value=""  class="info1">
		  </td>
		  <td valign="top">&nbsp;</td>
		</tr>
        <tr>
          <td colspan="2"><input name="button" type="submit" class="submitBtn" id="button" value="Submit" />
            <input name="button2" type="reset" class="resetBtn" id="button2" value="Reset" /></td>
        </tr>
      </table>
      <input type="hidden" id="token" name="token" value="<?php echo $_SESSION['tokenMaker']; ?>">
    </form>
    <!-- end Contact information -->   
    
    
    

      </div>
            
            <!-- end #sidebar2 -->
            </div>
        </td>
    </tr>
</table> 
  <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->
  <br class="clearfloat" />
  <!-- end #container -->
</div>
<div id="footerContainer">
  <div id="footer">
  	<table width="100%" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td><p>Copyright 2015 Lumentech Company Limited. All rights reserved </p></td>
            <td align="right"><div class="footerText">Unit B-16, 18th floor, Block B, Kwai Fong Industrial Building, 9-15 Kwai Cheong Road, Kwai Chung, Hong Kong</div></td>
        </tr>
    </table>
    <!-- end #footer -->
  </div>
  <!-- end #footerContainer -->
</div>
</body>
</html>
