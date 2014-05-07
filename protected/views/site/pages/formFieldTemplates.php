<section class="hidden">
<!-- allt innanför section id="questionTemplate" som samtidigt är utanför <span id="questionResultTarget"> kan ändras
utan att bryta javascriptet
-->
    <!-- för alla frågor -->
    <section id="questionTemplate">
        <h4><span class="questionResultTarget"></span></h4>
    </section>
     <!-- för vanliga textfält-->
    <div name="textTemplate">
        <input class="form-control textTemplate" type="text"/>
    </div>
    <!-- för select -->
    <div name="dropdownTemplate">
        <select class="form-control dropdownTemplate">
            <option>--Välj...--</option>
        </select>
    </div>
    <!-- checkboxes-->
    <div name="checkboxTemplate">
        <label class="checkbox-inline">
            <input class="form-control checkboxTemplate" type="checkbox"/>
        </label>
    </div>

    <!-- Template för att välja antal svars alternativ -->
   <div id="numberOfOptionsDiv">
        <select id="numberOfOptionsSelect" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option>4</option>
            <option>5</option>
        </select>
   </div
</section>