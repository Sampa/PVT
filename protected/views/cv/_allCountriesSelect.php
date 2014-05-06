<?php
    $errorClass  = "";
    if(isset($model)){
        if(!$model->hasGeoArea)
            $errorClass ="has-error";
}
?>
<div class="row col-md-3" style="">
		<label class="" for="continent"><?php echo Yii::t("t","Kontinent");?></label>
		<select class="form-control " name="continent" id="continent" onchange="">
				<option value="6255146">Africa</option>
				<option value="6255152">Antarctica</option>
				<option value="6255147">Asia</option>
				<option value="6255148" selected>Europe</option>
				<option value="6255149">North America</option>
				<option value="6255151">Oceania</option>
				<option value="6255150">South America</option>
		</select>
</div>
<div id="selectCountry" class="col-md-3  <?php echo $errorClass;?>" style=" ">
	    <label class="" for="countries"><?php echo Yii::t("t","Land");?></label>
	    <select id="countries" name="countries" class="form-control" >
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
		<label class="" for="geoProvince"><?php echo Yii::t("t","Kommun");?></label>
		<select  class="form-control" name="geoProvince" id="geoProvince" >
			<option><?php echo Yii::t("t","Välj Provins");?></option>
		</select>
	</div>
    <div class="col-md-3">
        <label class="" for="geoCity"><?php echo Yii::t("t","Stad");?></label>
        <select class="form-control" name="geoCity" id="geoCity"">
	        <option><?php echo Yii::t("t","Välj Stad");?></option>
	    </select>
    </div>
</section>
<div style="clear:both;"></div>
<script type="text/javascript">
	$(document).ready(function(){

	});
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
			["continent","countries","geoRegion","geoProvince","geoCity"].forEach(function(item,index,list){
				$("#"+item).change(function(){
					if(list[index+1]){
						getPlaces(this.value,$("#"+list[index+1]));
					}
				});
			});
			jQuery("#continent").select2();
			jQuery("#countries").select2();
			jQuery("#geoRegion").select2();
			jQuery("#geoProvince").select2();
			jQuery("#geoCity").select2();
		});
	}(window,jQuery,void(0)));
</script>
