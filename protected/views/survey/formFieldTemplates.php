<section class="hidden">
<!-- allt innanför section id="questionTemplate" som samtidigt är utanför <span id="questionResultTarget"> kan ändras
utan att bryta javascriptet
-->
    <!-- för alla frågor -->
    <section id="questionTemplate">
	    <span class="questionResultTarget"></span>
	    <a href="#" class="removeQuestion"><span class="glyphicon glyphicon-trash pull-right "></span></a>
    </section>
     <!-- för vanliga textfält-->
    <div name="textTemplate">
        <input class="form-control textTemplate" type="text"/>
    </div>

    <!-- för vanliga textareas-->
    <div name="textareaTemplate">
        <textarea class="form-control textareaTemplate"></textarea>
    </div>
    <!-- för select -->
    <div name="dropdownTemplate">
        <select class="form-control dropdownTemplate">
            <option>--Välj--</option>
        </select>
    </div>
    <!-- checkboxes har bara add alternativ button-->
    <div name="checkboxTemplate">
        <a class="btn btn-success addAlternative"><?php echo Yii::t("t", "Nytt alternativ");?></a>
    </div>
    <!-- mallen för ett checkboxfield -->
    <div id="checkboxField">
        <label class="checkbox-inline">
            <input class="checkboxTemplate" type="checkbox"/>
        </label>
    </div>
    <!-- checkboxes har bara add alternativ button-->
    <div name="radioTemplate">
        <a class="newRadioAlternative  btn btn-success addAlternative"><?php echo Yii::t("t", "Nytt alternativ");?></a>
    </div>
    <!-- mallen för ett checkboxfield -->
    <div id="radioField">
        <label class="radio-inline">
            <input class="radioTemplate" type="radio"/>
        </label>
    </div>
    <!-- används för alternativens labels-->
    <span id="optionText" class="optionText"></span>
    <!--sortable li template-->
    <li id="sortableLiTemplate" class="insideDroppable ">
        <div class="panel panel-primary">
            <div class="panel-heading">
            </div>
            <div class="panel-body"></div>
        </div>
    </li>
</section>