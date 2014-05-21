<?php 
$this->breadcrumbs=array(
    Yii::t('t', 'Hem') => Yii::app()->getHomeUrl(),
     t('Statistik'),

);
?>

<div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">
            <h3><?php echo Yii::t('t','Statistik');?></h3>
        </div>

	<table class="table table-bordered table-condensed table-hover">
        <tbody>
            <tr>
            	<th><?php echo Yii::t('t','Totalt antal användare');?></th>
                <th><?php echo Yii::t('t','Publicerare');?></th>
                <th><?php echo Yii::t('t','Rekryterare');?></th>
            </tr>
            <tr>
            	<td><?php echo $dataProvider->getTotalItemCount()-1;?></td>
            	<td><?php echo $dataProvider->getTotalItemCount()-$dataProviderRecruiter->getTotalItemCount()-1;?></td>
            	<td><?php echo $dataProviderRecruiter->getTotalItemCount();?></td>
            	<td></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
            	<th><?php echo t('Alla aktiva användare');?></th>
               	<th><?php echo t('Aktiva users - antal aktiva rekyterare');?></th>
            	<th><?php echo t('Aktiva rekryterare');?></th>
            	<th></th>
            </tr>
            <tr>
            	<td><?php echo t('Totala antalet användare');?></td>
               	<td><?php echo t('Aktiva users - antal aktiva rekyterare');?></td>
            	<td><?php echo t('Aktiva rekryterare');?></td>
            	<td></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th><?php echo Yii::t('t','CV:n i databasen');?></th>
                <th><?php echo Yii::t('t','Antal');?></th>
                <th></th>
                <th></th>           
            </tr>
            <tr>
            	<td></td>
            	<td><?php echo $dataProviderCv->getTotalItemCount();?></td>
            	<td></td>
            	<td></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
            	<th><?php echo Yii::t('t','Avslutade processer');?></th>
                <th><?php echo Yii::t('t','Lyckade processer via CV-pages');?></th>
                <th><?php echo Yii::t('t','På annat sätt lyckade processer');?></th>
                <th><?php echo Yii::t('t','Misslyckade processer');?></th>
            </tr>
            <tr>
            	<td></td>
            	<td><?php echo $dataProviderRecProcessSuccesful->getTotalItemCount();?></td>
            	<td><?php echo $dataProviderRecProcessOther->getTotalItemCount();?></td>
            	<td><?php echo $dataProviderRecProcessFailed->getTotalItemCount();?></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
            	<th><?php echo Yii::t('t','Sökningar idag');?></th>
                <th><?php echo Yii::t('t','Publicerare');?></th>
       			<th><?php echo Yii::t('t','Rekryterare');?></th>
     	       	<th><?php echo Yii::t('t','Gäst');?></th>  
            </tr>
            <tr>
            	<td><?php echo t('Alla sökningar idag');?></td>
            	<td><?php echo t('Sökningar på inloggade Publicerare');?></td>
            	<td><?php echo t('Sökningar på inloggade rekryterare');?></td>
            	<td><?php echo t('Sökningar gjorda av gäster');?></td>
            </tr>
        </tbody>
    </table>   
</div>

<div>
    <h3> <?php echo Yii::t('t','Avslutade processer. Fördelning mellan orsak.');?> </h3>
    <div id="usersBar" style="height: 300px;"></div>
</div>

<div>
    <h3> <?php echo Yii::t('t','Antal publicerare jämfört med antal rekryterare');?> </h3>
    <div id="searchWordsDonut" style="height: 300px;"></div>
</div>

<div>
    <h3> <?php echo Yii::t('t','Antal användare totalt. 2008-2013');?> </h3>
    <div id="exampelchart" style="height: 300px;"></div>
</div>

<script>

new Morris.Donut({
  element: 'searchWordsDonut',
  data: [
    {label: ("Publicerare"), value: <?php echo $dataProvider->getTotalItemCount()-$dataProviderRecruiter->getTotalItemCount()-1;?> },
    {label: ("Rekryterare"), value: <?php echo $dataProviderRecruiter->getTotalItemCount();?> },
  ]
});

new Morris.Bar({
  element: 'usersBar',
  data: [
    { y: '2014', a: <?php echo $dataProviderRecProcessSuccesful->getTotalItemCount();?>,
    b: <?php echo $dataProviderRecProcessOther->getTotalItemCount();?>,
    c: <?php echo $dataProviderRecProcessFailed->getTotalItemCount();?> },
  ],
  xkey: 'y',
  ykeys: ['a', 'b', 'c'],
  labels: ['Lyckades via CV-Pages', 'Lyckades på annat sätt', 'Misslyckade']
});

new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'exampelchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2008', value: 20 },
    { year: '2009', value: 38 },
    { year: '2010', value: 52 },
    { year: '2011', value: 90 },
    { year: '2012', value: 140 },
    { year: '2013', value: 232 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Värde']
});

</script>