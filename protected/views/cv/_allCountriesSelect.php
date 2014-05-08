<?php
    $errorClass  = "";
    if(isset($model)){
        if(!$model->hasGeoArea)
            $errorClass ="has-error";
}
?>

<div id="selectCountry" class="col-md-3  <?php echo $errorClass;?>" style=" ">
	    <label class="" for="countries"><?php echo Yii::t("t","Land");?></label>
	    <select id="countries" name="countries" class="form-control" >
            <option><?php echo Yii::t("t","Välj land");?></option>
            <optgroup label="<?php echo Yii::t("t","Antarktis");?>">
                <option value="3371123">Bouvet Island</option>
                <option value="1546748">French Southern Territories</option>
                <option value="1547314">Heard Island and McDonald Islands</option>
                <option value="3474415">South Georgia and the South Sandwich Islands</option>
            </optgroup>
            <optgroup label="<?php echo Yii::t("t","Afrika");?>">
                <option value="2589581">Algeria</option>
                <option value="3351879">Angola</option>
                <option value="2395170">Benin</option>
                <option value="933860">Botswana</option>
                <option value="2361809">Burkina Faso</option>
                <option value="433561">Burundi</option>
                <option value="2233387">Cameroon</option>
                <option value="3374766">Cape Verde</option>
                <option value="239880">Central African Republic</option>
                <option value="2434508">Chad</option>
                <option value="921929">Comoros</option>
                <option value="203312">Congo</option>
                <option value="223816">Djibouti</option>
                <option value="357994">Egypt</option>
                <option value="2309096">Equatorial Guinea</option>
                <option value="338010">Eritrea</option>
                <option value="337996">Ethiopia</option>
                <option value="2400553">Gabon</option>
                <option value="2413451">Gambia</option>
                <option value="2300660">Ghana</option>
                <option value="2420477">Guinea</option>
                <option value="2372248">Guinea-Bissau</option>
                <option value="2287781">Ivory Coast</option>
                <option value="192950">Kenya</option>
                <option value="932692">Lesotho</option>
                <option value="2275384">Liberia</option>
                <option value="2215636">Libya</option>
                <option value="1062947">Madagascar</option>
                <option value="927384">Malawi</option>
                <option value="2453866">Mali</option>
                <option value="2378080">Mauritania</option>
                <option value="934292">Mauritius</option>
                <option value="1024031">Mayotte</option>
                <option value="2542007">Morocco</option>
                <option value="1036973">Mozambique</option>
                <option value="3355338">Namibia</option>
                <option value="2440476">Niger</option>
                <option value="2328926">Nigeria</option>
                <option value="2260494">Republic of the Congo</option>
                <option value="49518">Rwanda</option>
                <option value="935317">Réunion</option>
                <option value="3370751">Saint Helena</option>
                <option value="2245662">Senegal</option>
                <option value="241170">Seychelles</option>
                <option value="2403846">Sierra Leone</option>
                <option value="51537">Somalia</option>
                <option value="953987">South Africa</option>
                <option value="7909807">South Sudan</option>
                <option value="366755">Sudan</option>
                <option value="934841">Swaziland</option>
                <option value="2410758">São Tomé and Príncipe</option>
                <option value="149590">Tanzania</option>
                <option value="2363686">Togo</option>
                <option value="2464461">Tunisia</option>
                <option value="226074">Uganda</option>
                <option value="2461445">Western Sahara</option>
                <option value="895949">Zambia</option>
                <option value="878675">Zimbabwe</option>
            </optgroup>
            <optgroup label="<?php echo Yii::t("t","Asien");?>">
                <option value="1149361">Afghanistan</option>
                <option value="174982">Armenia</option>
                <option value="587116">Azerbaijan</option>
                <option value="290291">Bahrain</option>
                <option value="1210997">Bangladesh</option>
                <option value="1252634">Bhutan</option>
                <option value="1282588">British Indian Ocean Territory</option>
                <option value="1820814">Brunei</option>
                <option value="1831722">Cambodia</option>
                <option value="1814991">China</option>
                <option value="2078138">Christmas Island</option>
                <option value="1547376">Cocos [Keeling] Islands</option>
                <option value="614540">Georgia</option>
                <option value="1819730">Hong Kong</option>
                <option value="1269750">India</option>
                <option value="1643084">Indonesia</option>
                <option value="130758">Iran</option>
                <option value="99237">Iraq</option>
                <option value="294640">Israel</option>
                <option value="1861060">Japan</option>
                <option value="248816">Jordan</option>
                <option value="1522867">Kazakhstan</option>
                <option value="285570">Kuwait</option>
                <option value="1527747">Kyrgyzstan</option>
                <option value="1655842">Laos</option>
                <option value="272103">Lebanon</option>
                <option value="1821275">Macao</option>
                <option value="1733045">Malaysia</option>
                <option value="1282028">Maldives</option>
                <option value="2029969">Mongolia</option>
                <option value="1327865">Myanmar [Burma]</option>
                <option value="1282988">Nepal</option>
                <option value="1873107">North Korea</option>
                <option value="286963">Oman</option>
                <option value="1168579">Pakistan</option>
                <option value="6254930">Palestine</option>
                <option value="1694008">Philippines</option>
                <option value="289688">Qatar</option>
                <option value="102358">Saudi Arabia</option>
                <option value="1880251">Singapore</option>
                <option value="1835841">South Korea</option>
                <option value="1227603">Sri Lanka</option>
                <option value="163843">Syria</option>
                <option value="1668284">Taiwan</option>
                <option value="1220409">Tajikistan</option>
                <option value="1605651">Thailand</option>
                <option value="298795">Turkey</option>
                <option value="1218197">Turkmenistan</option>
                <option value="290557">United Arab Emirates</option>
                <option value="1512440">Uzbekistan</option>
                <option value="1562822">Vietnam</option>
                <option value="69543">Yemen</option>
            </optgroup>
            <optgroup label="<?php echo Yii::t("t","Europa");?>">
                <option value="783754">Albania</option>
                <option value="3041565">Andorra</option>
                <option value="2782113">Austria</option>
                <option value="630336">Belarus</option>
                <option value="2802361">Belgium</option>
                <option value="3277605">Bosnia and Herzegovina</option>
                <option value="732800">Bulgaria</option>
                <option value="3202326">Croatia</option>
                <option value="146669">Cyprus</option>
                <option value="3077311">Czech Republic</option>
                <option value="2623032">Denmark</option>
                <option value="453733">Estonia</option>
                <option value="2622320">Faroe Islands</option>
                <option value="660013">Finland</option>
                <option value="3017382">France</option>
                <option value="2921044">Germany</option>
                <option value="2411586">Gibraltar</option>
                <option value="390903">Greece</option>
                <option value="719819">Hungary</option>
                <option value="2629691">Iceland</option>
                <option value="2963597">Ireland</option>
                <option value="3175395">Italy</option>
                <option value="831053">Kosovo</option>
                <option value="458258">Latvia</option>
                <option value="3042058">Liechtenstein</option>
                <option value="597427">Lithuania</option>
                <option value="2960313">Luxembourg</option>
                <option value="718075">Macedonia</option>
                <option value="2562770">Malta</option>
                <option value="617790">Moldova</option>
                <option value="2993457">Monaco</option>
                <option value="3194884">Montenegro</option>
                <option value="2750405">Netherlands</option>
                <option value="3144096">Norway</option>
                <option value="798544">Poland</option>
                <option value="2264397">Portugal</option>
                <option value="798549">Romania</option>
                <option value="2017370">Russia</option>
                <option value="3168068">San Marino</option>
                <option value="6290252">Serbia</option>
                <option value="3057568">Slovakia</option>
                <option value="3190538">Slovenia</option>
                <option value="2510769">Spain</option>
                <option value="607072">Svalbard and Jan Mayen</option>
                <option value="2661886" selected>Sweden</option>
                <option value="2658434">Switzerland</option>
                <option value="690791">Ukraine</option>
                <option value="2635167">United Kingdom</option>
                <option value="3164670">Vatican City</option>
                <option value="661882">Åland</option>
            </optgroup>
            <optgroup label="<?php echo Yii::t("t","Nordamerika");?>">
                <option value="3573511">Anguilla</option>
                <option value="3576396">Antigua and Barbuda</option>
                <option value="3577279">Aruba</option>
                <option value="3572887">Bahamas</option>
                <option value="3374084">Barbados</option>
                <option value="3582678">Belize</option>
                <option value="3573345">Bermuda</option>
                <option value="7626844">Bonaire</option>
                <option value="3577718">British Virgin Islands</option>
                <option value="6251999">Canada</option>
                <option value="3580718">Cayman Islands</option>
                <option value="3624060">Costa Rica</option>
                <option value="3562981">Cuba</option>
                <option value="7626836">Curaçao</option>
                <option value="3575830">Dominica</option>
                <option value="3508796">Dominican Republic</option>
                <option value="3585968">El Salvador</option>
                <option value="3425505">Greenland</option>
                <option value="3580239">Grenada</option>
                <option value="3579143">Guadeloupe</option>
                <option value="3595528">Guatemala</option>
                <option value="3723988">Haiti</option>
                <option value="3608932">Honduras</option>
                <option value="3489940">Jamaica</option>
                <option value="3570311">Martinique</option>
                <option value="3996063">Mexico</option>
                <option value="3578097">Montserrat</option>
                <option value="3617476">Nicaragua</option>
                <option value="3703430">Panama</option>
                <option value="4566966">Puerto Rico</option>
                <option value="3578476">Saint Barthélemy</option>
                <option value="3575174">Saint Kitts and Nevis</option>
                <option value="3576468">Saint Lucia</option>
                <option value="3578421">Saint Martin</option>
                <option value="3424932">Saint Pierre and Miquelon</option>
                <option value="3577815">Saint Vincent and the Grenadines</option>
                <option value="7609695">Sint Maarten</option>
                <option value="3573591">Trinidad and Tobago</option>
                <option value="3576916">Turks and Caicos Islands</option>
                <option value="4796775">U.S. Virgin Islands</option>
                <option value="6252001">United States</option>
            </optgroup>
            <optgroup label="<?php echo Yii::t("t","Oceanien");?>">
                <option value="5880801">American Samoa</option>
                <option value="2077456">Australia</option>
                <option value="1899402">Cook Islands</option>
                <option value="2170371">Coral Sea Islands Territory</option>
                <option value="1966436">East Timor</option>
                <option value="2205218">Fiji</option>
                <option value="4030656">French Polynesia</option>
                <option value="4043988">Guam</option>
                <option value="8335033">Jervis Bay Territory</option>
                <option value="4030945">Kiribati</option>
                <option value="2080185">Marshall Islands</option>
                <option value="2081918">Micronesia</option>
                <option value="2110425">Nauru</option>
                <option value="2139685">New Caledonia</option>
                <option value="2186224">New Zealand</option>
                <option value="4036232">Niue</option>
                <option value="2155115">Norfolk Island</option>
                <option value="4041468">Northern Mariana Islands</option>
                <option value="1559582">Palau</option>
                <option value="2088628">Papua New Guinea</option>
                <option value="4030699">Pitcairn Islands</option>
                <option value="4034894">Samoa</option>
                <option value="2103350">Solomon Islands</option>
                <option value="2077507">Territory of Ashmore and Cartier Islands</option>
                <option value="4031074">Tokelau</option>
                <option value="4032283">Tonga</option>
                <option value="2110297">Tuvalu</option>
                <option value="5854968">U.S. Minor Outlying Islands</option>
                <option value="2134431">Vanuatu</option>
                <option value="4034749">Wallis and Futuna</option>
            </optgroup>
            <optgroup label="<?php echo Yii::t("t","Sydamerika");?>">
                <option value="3865483">Argentina</option>
                <option value="3923057">Bolivia</option>
                <option value="3469034">Brazil</option>
                <option value="3895114">Chile</option>
                <option value="3686110">Colombia</option>
                <option value="3658394">Ecuador</option>
                <option value="3474414">Falkland Islands</option>
                <option value="3381670">French Guiana</option>
                <option value="3378535">Guyana</option>
                <option value="3437598">Paraguay</option>
                <option value="3932488">Peru</option>
                <option value="3382998">Suriname</option>
                <option value="3439705">Uruguay</option>
                <option value="3625428">Venezuela</option>
            </optgroup>
        </select>
</div>
<div class="col-md-3">
	<label class="" for="geoRegion"><?php echo Yii::t("t","Region");?></label>
	<select  class="form-control" name="geoRegion" id="geoRegion" >
		<option><?php echo Yii::t("t","Välj Region");?></option>
		<option value="2721357">Blekinge</option>
		<option value="2699767">Dalarna</option>
		<option value="2711508">Gotland</option>
		<option value="2712411">Gävleborg</option>
		<option value="2708794">Halland</option>
		<option value="2703330">Jämtland</option>
		<option value="2702976">Jönköping</option>
		<option value="2702259">Kalmar</option>
		<option value="2699050">Kronoberg</option>
		<option value="604010">Norrbotten</option>
		<option value="3337385">Skåne</option>
		<option value="2673722">Stockholm</option>
		<option value="2676207">Södermanland</option>
		<option value="2666218">Uppsala</option>
		<option value="2664870">Värmland</option>
		<option value="2664415">Västerbotten</option>
		<option value="2664292">Västernorrland</option>
		<option value="2664179">Västmanland</option>
		<option value="3337386">Västra Götaland</option>
		<option value="2686655">Örebro</option>
		<option value="2685867">Östergötland</option>
	</select>
</div>
<section id="geographicAreaForm" style="display:block; margin-left:-15px; " >
	<div class="col-md-3">
		<label class="" for="geoCity"><?php echo Yii::t("t","Kommun");?></label>
		<select  class="form-control" name="geoCity" id="geoCity" >
			<option><?php echo Yii::t("t","Välj Kommun");?></option>
		</select>
	</div>
</section>
<div style="clear:both;"></div>
<script type="text/javascript">
	(function(window,$,undefined){
		var target;
		function getPlaces(gid,new_target){
			target = new_target;
			var url = "http://www.geonames.org/childrenJSON";
			$.ajax({
				url :url,
				dataType:"jsonp",
				jsonp:"callback",
				data:{
					geonameId:gid,
					style:"long"
				},
				success: handleResult
			});
		}
		function handleResult(data){
			target.children('option:not(:first)').remove();
			data.geonames.forEach(function(item){
				target.append( new Option(item.name,item.geonameId) );
			});
		}
		$(function(){
			["countries","geoRegion","geoCity"].forEach(function(item,index,list){
				$("#"+item).change(function(){
					if(list[index+1]){
						getPlaces(this.value,$("#"+list[index+1]));
					}
				});
			});
			jQuery("#countries").select2();
			jQuery("#geoRegion").select2();
			jQuery("#geoCity").select2();
		});
	}(window,jQuery,void(0)));
</script>
