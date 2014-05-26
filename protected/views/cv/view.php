<?php
/* @var $this CvController */
/* @var $model Cv */
?>

<?php
$this->breadcrumbs=array(
	'CV'=>array('index'),
	$model->title,
);

?>

<h1><?php echo $model->title; ?></h1>
<a href="<?php echo Yii::app()->baseUrl."/".CHtml::encode($model->pathToPdf); ?>" rel="pdf">
    <?php echo t("Öppna cv");?>
</a>
<!-- skriva ut alla areas -->
<h3>Söker jobb i följande områden:</h3>
echo $area->region;
echo $area->city;
}
?>
<h3>tags</h3>
<?php
foreach($model->
<?php
foreach($model->areas as $area){
    echo $area->country;cvTags as $cvTag){
    echo "<br/>";
    $number = $cvTag->tag->frequency+30;
    echo '<span style="font-size:'.$number.'px">'.$cvTag->tag->name.'</span>';
    echo "<br/>";
}
?>
<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
        array(
            'label' =>'date',
            'value' => substr($model->date, 0, 10),
        ),
        'typeOfEmployment',
        array(
            'label' => 'CV:',
            'type' => 'raw',
            'value' => Chtml::link($model->title, $model->pathToPdf),
        ), 
        array(
            'label' => 'Ägare',
            'value' => $model->publisher->username,
        ),
    ),
)); ?>
<span id="cvIdContainer" class="hidden">
    <?php echo $model->id;?>
</span>
<script>
    $.ajax({
        type: "POST",
        dataType:"json",
        url: "/cv/"+$(this).attr("id")
    }).done(function( data ) { //hämtat antalet links
//        alert(data);
    });
        /*
            * hämtar antalet inbound links för ett cv från google
            * skickar antalet till server (CvController.php och actionSaveInboundLinks() som sparar det i databasen)
         */
    $(document).ready(function(){
        
        var cvIdentification = $("#cvIdContainer").html();
        $.ajax({
            type: "POST",
            dataType:"jsonp",
            url: "https://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=link:http://pvt.dsv.su.se/Group1/cv/"+cvIdentification
        }).done(function( data ) { //hämtat antalet links
            var numberOfLinks = data.responseData.cursor.resultCount;
            $.ajax({
                type: "POST",
                dataType:"json",
                url: "/cv/SaveInboundLinks",
                data: {
                    linkCount:numberOfLinks,
                    id:cvIdentification
                }
            }).done(function( data ) { //sparat dem i databasen
//                alert(data.status);
                //här kan vi notifiera användaren att vi är klara
            });
        });
    });
</script>