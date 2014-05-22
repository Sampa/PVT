<?php 
$this->breadcrumbs=array(
    Yii::t('t', 'Hem') => Yii::app()->getHomeUrl(),
     t('Statistik'),

);
?>

<div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">
            <h3><?php echo Yii::t('t','Statistik över CV-Pages');?></h3>
        </div>

	<table class="table table-bordered table-condensed table-hover">
        <tbody>
            <tr>
            	<th><?php echo Yii::t('t','Totalt antal användare');?></th>
                <th><?php echo Yii::t('t','Publicerare');?></th>
                <th><?php echo Yii::t('t','Rekryterare');?></th>
                <th></th>
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
            	<th><?php echo t('Användare som loggat in idag totalt');?></th>
               	<th><?php echo t('Publicerare');?></th>
            	<th><?php echo t('Rekryterare');?></th>
            	<th></th>
            </tr>
            <tr>
            	<td><?php echo count($dataProviderUsersToday['user']) ;?></td>
               	<td><?php echo (count($dataProviderUsersToday['user']) - count($dataProviderUsersToday['recruiter'])) ;?></td>
            	<td><?php echo count($dataProviderUsersToday['recruiter']) ;?></td>'

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
    <h3> <?php echo Yii::t('t','Antal inloggade användare idag');?> <?php echo date('Y-m-d') ?> </h3>
    <div id="usersToday" style="height: 300px;"></div>
</div>

<div>
    <h3> <?php echo Yii::t('t','Antal registrerade publicerare jämfört med antal rekryterare');?> </h3>
    <div id="searchWordsDonut" style="height: 300px;"></div>
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
    { y: '',
    a: <?php echo $dataProviderRecProcessSuccesful->getTotalItemCount();?>,
    b: <?php echo $dataProviderRecProcessOther->getTotalItemCount();?>,
    c: <?php echo $dataProviderRecProcessFailed->getTotalItemCount();?> },
  ],
  xkey: 'y',
  ykeys: ['a', 'b', 'c'],
  labels: ['Lyckades via CV-Pages', 'Lyckades på annat sätt', 'Misslyckade']
});

new Morris.Bar({
  element: 'usersToday',
  data: [
    { y: "" ,
    a: <?php echo (count($dataProviderUsersToday['user']) - count($dataProviderUsersToday['recruiter'])); ?>,
    b: <?php echo count($dataProviderUsersToday['recruiter']); ?>},
  ],
  xkey: 'y',
  ykeys: ['a', 'b'],
  labels: ['Publicerare', 'Rekryterare']
});



</script>