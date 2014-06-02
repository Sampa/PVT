<?php
    $errorClass  = "";
    if(isset($model)){
        if(!$model->hasGeoArea)
            $errorClass ="has-error";
}
?>
<section id="geographicAreaForm" class="<?php echo $errorClass;?>" style="display:block; margin-left:-15px;" >
	<div id="selectCountry" class="col-md-3  " style=" ">
		    <label class="" for="countries"><?php echo Yii::t("t","Land");?></label>
		    <select id="countries" name="countries" class="form-control" data-placeholder="<?php echo Yii::t("t","Välj land");?>">
		    <option value="default" <?php echo isset($search) && $search ?"selected" : null; ?>></option>
		    <optgroup label="<?php echo Yii::t("t","Antarktis");?>">
	                <option id="3371123" value="Bouvet Island">Bouvet Island</option>
	                <option id="1546748" value="French Southern Territories">French Southern Territories</option>
	                <option id="1547314" value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
	                <option id="3474415" value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
	            </optgroup>
	            <optgroup label="<?php echo Yii::t("t","Afrika");?>">
	                <option id="2589581" value="Algeria">Algeria</option>
	                <option id="3351879" value="Angola">Angola</option>
	                <option id="2395170" value="Benin">Benin</option>
	                <option id="933860" value="Botswana">Botswana</option>
	                <option id="2361809" value="Burkina Faso">Burkina Faso</option>
	                <option id="433561" value="Burundi">Burundi</option>
	                <option id="2233387" value="Cameroon">Cameroon</option>
	                <option id="3374766" value="Cape Verde">Cape Verde</option>
	                <option id="239880" value="Central African Republic">Central African Republic</option>
	                <option id="2434508" value="Chad">Chad</option>
	                <option id="921929" value="Comoros">Comoros</option>
	                <option id="203312" value="Congo">Congo</option>
	                <option id="223816" value="Djibouti">Djibouti</option>
	                <option id="357994" value="Egypt">Egypt</option>
	                <option id="2309096" value="Equatorial Guinea">Equatorial Guinea</option>
	                <option id="338010" value="Eritrea">Eritrea</option>
	                <option id="337996" value="Ethiopia">Ethiopia</option>
	                <option id="2400553" value="Gabon">Gabon</option>
	                <option id="2413451" value="Gambia">Gambia</option>
	                <option id="2300660" value="Ghana">Ghana</option>
	                <option id="2420477" value="Guinea">Guinea</option>
	                <option id="2372248" value="Guinea-Bissau">Guinea-Bissau</option>
	                <option id="2287781" value="Ivory Coast">Ivory Coast</option>
	                <option id="192950" value="Kenya">Kenya</option>
	                <option id="932692" value="Lesotho">Lesotho</option>
	                <option id="2275384" value="Liberia">Liberia</option>
	                <option id="2215636" value="Libya">Libya</option>
	                <option id="1062947" value="Madagascar">Madagascar</option>
	                <option id="927384" value="Malawi">Malawi</option>
	                <option id="2453866" value="Mali">Mali</option>
	                <option id="2378080" value="Mauritania">Mauritania</option>
	                <option id="934292" value="Mauritius">Mauritius</option>
	                <option id="1024031" value="Mayotte">Mayotte</option>
	                <option id="2542007" value="Morocco">Morocco</option>
	                <option id="1036973" value="Mozambique">Mozambique</option>
	                <option id="3355338" value="Namibia">Namibia</option>
	                <option id="2440476" value="Niger">Niger</option>
	                <option id="2328926" value="Nigeria">Nigeria</option>
	                <option id="2260494" value="Republic of the Congo">Republic of the Congo</option>
	                <option id="49518" value="Rwanda">Rwanda</option>
	                <option id="935317" value="Réunion">Réunion</option>
	                <option id="3370751" value="Saint Helena">Saint Helena</option>
	                <option id="2245662" value="Senegal">Senegal</option>
	                <option id="241170" value="Seychelles">Seychelles</option>
	                <option id="2403846" value="Sierra Leone">Sierra Leone</option>
	                <option id="51537" value="Somalia">Somalia</option>
	                <option id="953987" value="South Africa">South Africa</option>
	                <option id="7909807" value="South Sudan">South Sudan</option>
	                <option id="366755" value="Sudan">Sudan</option>
	                <option id="934841" value="Swaziland">Swaziland</option>
	                <option id="2410758" value="São Tomé and Príncipe">São Tomé and Príncipe</option>
	                <option id="149590" value="Tanzania">Tanzania</option>
	                <option id="2363686" value="Togo">Togo</option>
	                <option id="2464461" value="Tunisia">Tunisia</option>
	                <option id="226074" value="Uganda">Uganda</option>
	                <option id="2461445" value="Western Sahara">Western Sahara</option>
	                <option id="895949" value="Zambia">Zambia</option>
	                <option id="878675" value="Zimbabwe">Zimbabwe</option>
	            </optgroup>
	            <optgroup label="<?php echo Yii::t("t","Asien");?>">
	                <option id="1149361" value="Afghanistan">Afghanistan</option>
	                <option id="174982" value="Armenia">Armenia</option>
	                <option id="587116" value="Azerbaijan">Azerbaijan</option>
	                <option id="290291" value="Bahrain">Bahrain</option>
	                <option id="1210997" value="Bangladesh">Bangladesh</option>
	                <option id="1252634" value="Bhutan">Bhutan</option>
	                <option id="1282588" value="British Indian Ocean Territory">British Indian Ocean Territory</option>
	                <option id="1820814" value="Brunei">Brunei</option>
	                <option id="1831722" value="Cambodia">Cambodia</option>
	                <option id="1814991" value="China">China</option>
	                <option id="2078138" value="Christmas Island">Christmas Island</option>
	                <option id="1547376" value="Cocos [Keeling] Islands">Cocos [Keeling] Islands</option>
	                <option id="614540" value="Georgia">Georgia</option>
	                <option id="1819730" value="Hong Kong">Hong Kong</option>
	                <option id="1269750" value="India">India</option>
	                <option id="1643084" value="Indonesia">Indonesia</option>
	                <option id="130758" value="Iran">Iran</option>
	                <option id="99237" value="Iraq">Iraq</option>
	                <option id="294640" value="Israel">Israel</option>
	                <option id="1861060" value="Japan">Japan</option>
	                <option id="248816" value="Jordan">Jordan</option>
	                <option id="1522867" value="Kazakhstan">Kazakhstan</option>
	                <option id="285570" value="Kuwait">Kuwait</option>
	                <option id="1527747" value="Kyrgyzstan">Kyrgyzstan</option>
	                <option id="1655842" value="Laos">Laos</option>
	                <option id="272103" value="Lebanon">Lebanon</option>
	                <option id="1821275" value="Macao">Macao</option>
	                <option id="1733045" value="Malaysia">Malaysia</option>
	                <option id="1282028" value="Maldives">Maldives</option>
	                <option id="2029969" value="Mongolia">Mongolia</option>
	                <option id="1327865" value="Myanmar [Burma]">Myanmar [Burma]</option>
	                <option id="1282988" value="Nepal">Nepal</option>
	                <option id="1873107" value="North Korea">North Korea</option>
	                <option id="286963" value="Oman">Oman</option>
	                <option id="1168579" value="Pakistan">Pakistan</option>
	                <option id="6254930" value="Palestine">Palestine</option>
	                <option id="1694008" value="Philippines">Philippines</option>
	                <option id="289688" value="Qatar">Qatar</option>
	                <option id="102358" value="Saudi Arabia">Saudi Arabia</option>
	                <option id="1880251" value="Singapore">Singapore</option>
	                <option id="1835841" value="South Korea">South Korea</option>
	                <option id="1227603" value="Sri Lanka">Sri Lanka</option>
	                <option id="163843" value="Syria">Syria</option>
	                <option id="1668284" value="Taiwan">Taiwan</option>
	                <option id="1220409" value="Tajikistan">Tajikistan</option>
	                <option id="1605651" value="Thailand">Thailand</option>
	                <option id="298795" value="Turkey">Turkey</option>
	                <option id="1218197" value="Turkmenistan">Turkmenistan</option>
	                <option id="290557" value="United Arab Emirates">United Arab Emirates</option>
	                <option id="1512440" value="Uzbekistan">Uzbekistan</option>
	                <option id="1562822" value="Vietnam">Vietnam</option>
	                <option id="69543" value="Yemen">Yemen</option>
	            </optgroup>
	            <optgroup label="<?php echo Yii::t("t","Europa");?>">
	                <option id="783754" value="Albania">Albania</option>
	                <option id="3041565" value="Andorra">Andorra</option>
	                <option id="2782113" value="Austria">Austria</option>
	                <option id="630336" value="Belarus">Belarus</option>
	                <option id="2802361" value="Belgium">Belgium</option>
	                <option id="3277605" value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
	                <option id="732800" value="Bulgaria">Bulgaria</option>
	                <option id="3202326" value="Croatia">Croatia</option>
	                <option id="146669" value="Cyprus">Cyprus</option>
	                <option id="3077311" value="Czech Republic">Czech Republic</option>
	                <option id="2623032" value="Denmark">Denmark</option>
	                <option id="453733" value="Estonia">Estonia</option>
	                <option id="2622320" value="Faroe Islands">Faroe Islands</option>
	                <option id="660013" value="Finland">Finland</option>
	                <option id="3017382" value="France">France</option>
	                <option id="2921044" value="Germany">Germany</option>
	                <option id="2411586" value="Gibraltar">Gibraltar</option>
	                <option id="390903" value="Greece">Greece</option>
	                <option id="719819" value="Hungary">Hungary</option>
	                <option id="2629691" value="Iceland">Iceland</option>
	                <option id="2963597" value="Ireland">Ireland</option>
	                <option id="3175395" value="Italy">Italy</option>
	                <option id="831053" value="Kosovo">Kosovo</option>
	                <option id="458258" value="Latvia">Latvia</option>
	                <option id="3042058" value="Liechtenstein">Liechtenstein</option>
	                <option id="597427" value="Lithuania">Lithuania</option>
	                <option id="2960313" value="Luxembourg">Luxembourg</option>
	                <option id="718075" value="Macedonia">Macedonia</option>
	                <option id="2562770" value="Malta">Malta</option>
	                <option id="617790" value="Moldova">Moldova</option>
	                <option id="2993457" value="Monaco">Monaco</option>
	                <option id="3194884" value="Montenegro">Montenegro</option>
	                <option id="2750405" value="Netherlands">Netherlands</option>
	                <option id="3144096" value="Norway">Norway</option>
	                <option id="798544" value="Poland">Poland</option>
	                <option id="2264397" value="Portugal">Portugal</option>
	                <option id="798549" value="Romania">Romania</option>
	                <option id="2017370" value="Russia">Russia</option>
	                <option id="3168068" value="San Marino">San Marino</option>
	                <option id="6290252" value="Serbia">Serbia</option>
	                <option id="3057568" value="Slovakia">Slovakia</option>
	                <option id="3190538" value="Slovenia">Slovenia</option>
	                <option id="2510769" value="Spain">Spain</option>
	                <option id="607072" value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
	                <option id="2661886" value="Sweden" <?php echo isset($search) && $search ? null: "selected"; ?>>Sweden</option>
	                <option id="2658434" value="Switzerland">Switzerland</option>
	                <option id="690791" value="Ukraine">Ukraine</option>
	                <option id="2635167" value="United Kingdom">United Kingdom</option>
	                <option id="3164670" value="Vatican City">Vatican City</option>
	                <option id="661882" value="Åland">Åland</option>
	            </optgroup>
	            <optgroup label="<?php echo Yii::t("t","Nordamerika");?>">
	                <option id="3573511" value="Anguilla">Anguilla</option>
	                <option id="3576396" value="Antigua and Barbuda">Antigua and Barbuda</option>
	                <option id="3577279" value="Aruba">Aruba</option>
	                <option id="3572887" value="Bahamas">Bahamas</option>
	                <option id="3374084" value="Barbados">Barbados</option>
	                <option id="3582678" value="Belize">Belize</option>
	                <option id="3573345" value="Bermuda">Bermuda</option>
	                <option id="7626844" value="Bonaire">Bonaire</option>
	                <option id="3577718" value="British Virgin Islands">British Virgin Islands</option>
	                <option id="6251999" value="Canada">Canada</option>
	                <option id="3580718" value="Cayman Islands">Cayman Islands</option>
	                <option id="3624060" value="Costa Rica">Costa Rica</option>
	                <option id="3562981" value="Cuba">Cuba</option>
	                <option id="7626836" value="Curaçao">Curaçao</option>
	                <option id="3575830" value="Dominica">Dominica</option>
	                <option id="3508796" value="Dominican Republic">Dominican Republic</option>
	                <option id="3585968" value="El Salvador">El Salvador</option>
	                <option id="3425505" value="Greenland">Greenland</option>
	                <option id="3580239" value="Grenada">Grenada</option>
	                <option id="3579143" value="Guadeloupe">Guadeloupe</option>
	                <option id="3595528" value="Guatemala">Guatemala</option>
	                <option id="3723988" value="Haiti">Haiti</option>
	                <option id="3608932" value="Honduras">Honduras</option>
	                <option id="3489940" value="Jamaica">Jamaica</option>
	                <option id="3570311" value="Martinique">Martinique</option>
	                <option id="3996063" value="Mexico">Mexico</option>
	                <option id="3578097" value="Montserrat">Montserrat</option>
	                <option id="3617476" value="Nicaragua">Nicaragua</option>
	                <option id="3703430" value="Panama">Panama</option>
	                <option id="4566966" value="Puerto Rico">Puerto Rico</option>
	                <option id="3578476" value="Saint Barthélemy">Saint Barthélemy</option>
	                <option id="3575174" value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
	                <option id="3576468" value="Saint Lucia">Saint Lucia</option>
	                <option id="3578421" value="Saint Martin">Saint Martin</option>
	                <option id="3424932" value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
	                <option id="3577815" value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
	                <option id="7609695" value="Sint Maarten">Sint Maarten</option>
	                <option id="3573591" value="Trinidad and Tobago">Trinidad and Tobago</option>
	                <option id="3576916" value="Turks and Caicos Islands">Turks and Caicos Islands</option>
	                <option id="4796775" value="U.S. Virgin Islands">U.S. Virgin Islands</option>
	                <option id="6252001" value="United States">United States</option>
	            </optgroup>
	            <optgroup label="<?php echo Yii::t("t","Oceanien");?>">
	                <option id="5880801" value="American Samoa">American Samoa</option>
	                <option id="2077456" value="Australia">Australia</option>
	                <option id="1899402" value="Cook Islands">Cook Islands</option>
	                <option id="2170371" value="Coral Sea Islands Territory">Coral Sea Islands Territory</option>
	                <option id="1966436" value="East Timor">East Timor</option>
	                <option id="2205218" value="Fiji">Fiji</option>
	                <option id="4030656" value="French Polynesia">French Polynesia</option>
	                <option id="4043988" value="Guam">Guam</option>
	                <option id="8335033" value="Jervis Bay Territory">Jervis Bay Territory</option>
	                <option id="4030945" value="Kiribati">Kiribati</option>
	                <option id="2080185" value="Marshall Islands">Marshall Islands</option>
	                <option id="2081918" value="Micronesia">Micronesia</option>
	                <option id="2110425" value="Nauru">Nauru</option>
	                <option id="2139685" value="New Caledonia">New Caledonia</option>
	                <option id="2186224" value="New Zealand">New Zealand</option>
	                <option id="4036232" value="Niue">Niue</option>
	                <option id="2155115" value="Norfolk Island">Norfolk Island</option>
	                <option id="4041468" value="Northern Mariana Islands">Northern Mariana Islands</option>
	                <option id="1559582" value="Palau">Palau</option>
	                <option id="2088628" value="Papua New Guinea">Papua New Guinea</option>
	                <option id="4030699" value="Pitcairn Islands">Pitcairn Islands</option>
	                <option id="4034894" value="Samoa">Samoa</option>
	                <option id="2103350" value="Solomon Islands">Solomon Islands</option>
	                <option id="2077507" value="Territory of Ashmore and Cartier Islands">Territory of Ashmore and Cartier Islands</option>
	                <option id="4031074" value="Tokelau">Tokelau</option>
	                <option id="4032283" value="Tonga">Tonga</option>
	                <option id="2110297" value="Tuvalu">Tuvalu</option>
	                <option id="5854968" value="U.S. Minor Outlying Islands">U.S. Minor Outlying Islands</option>
	                <option id="2134431" value="Vanuatu">Vanuatu</option>
	                <option id="4034749" value="Wallis and Futuna">Wallis and Futuna</option>
	            </optgroup>
	            <optgroup label="<?php echo Yii::t("t","Sydamerika");?>">
	                <option id="3865483" value="Argentina">Argentina</option>
	                <option id="3923057" value="Bolivia">Bolivia</option>
	                <option id="3469034" value="Brazil">Brazil</option>
	                <option id="3895114" value="Chile">Chile</option>
	                <option id="3686110" value="Colombia">Colombia</option>
	                <option id="3658394" value="Ecuador">Ecuador</option>
	                <option id="3474414" value="Falkland Islands">Falkland Islands</option>
	                <option id="3381670" value="French Guiana">French Guiana</option>
	                <option id="3378535" value="Guyana">Guyana</option>
	                <option id="3437598" value="Paraguay">Paraguay</option>
	                <option id="3932488" value="Peru">Peru</option>
	                <option id="3382998" value="Suriname">Suriname</option>
	                <option id="3439705" value="Uruguay">Uruguay</option>
	                <option id="3625428" value="Venezuela">Venezuela</option>
	            </optgroup>
	        </select>
	</div>
	<div class="col-md-3">
		<label class="" for="geoRegion"><?php echo Yii::t("t","Region");?></label>
		<select  class="form-control" name="geoRegion" id="geoRegion" data-placeholder="<?php echo Yii::t("t","Välj region");?>">
			<option value="default" selected></option>
			<option id="2721357" value="Blekinge">Blekinge</option>
			<option id="2699767" value="Dalarna">Dalarna</option>
			<option id="2711508" value="Gotland">Gotland</option>
			<option id="2712411" value="Gävleborg">Gävleborg</option>
			<option id="2708794" value="Halland">Halland</option>
			<option id="2703330" value="Jämtland">Jämtland</option>
			<option id="2702976" value="Jönköping">Jönköping</option>
			<option id="2702259" value="Kalmar">Kalmar</option>
			<option id="2699050" value="Kronoberg">Kronoberg</option>
			<option id="604010" value="Norrbotten">Norrbotten</option>
			<option id="3337385" value="Skåne">Skåne</option>
			<option id="2673722" value="Stockholm">Stockholm</option>
			<option id="2676207" value="Södermanland">Södermanland</option>
			<option id="2666218" value="Uppsala">Uppsala</option>
			<option id="2664870" value="Värmland">Värmland</option>
			<option id="2664415" value="Västerbotten">Västerbotten</option>
			<option id="2664292" value="Västernorrland">Västernorrland</option>
			<option id="2664179" value="Västmanland">Västmanland</option>
			<option id="3337386" value="Västra Götaland">Västra Götaland</option>
			<option id="2686655" value="Örebro">Örebro</option>
			<option id="2685867" value="Östergötland">Östergötland</option>
		</select>
	</div>
	<div class="col-md-4 cityWrapper" style="margin-top:7px;display: none;">
        <div class="col-md-10"
            <label class="" for="geoCity"><?php echo Yii::t("t","Kommun");?></label>
            <select  class="form-control" name="geoCity" id="geoCity" data-placeholder="<?php echo Yii::t("t","Välj kommun");?>">
	            <option value="default" selected></option>
            </select>
        </div>
        <!-- Vi vill bara visa en add ikon när man skapar cv-->
        <?php if(isset($showAddButton)):?>
        <div class="pull-left " id="newAreaWrapper"  style="margin-top: -17px; margin-left: 0px; margin-right: 0px;">
            <p> <?php echo t("Lägg till");?></p>
            <button id="addArea" class="btn btn-success btn-small">
                <span class="glyphicon glyphicon-plus-sign"> </span>
            </button>
        </div>
        <?php endif;?>
	</div>
</section>
<div style="clear:both;"></div>