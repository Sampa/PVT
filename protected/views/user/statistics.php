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
            	<th><?php echo 'Alla aktiva användare';?></th>
               	<th><?php echo 'Aktiva users - antal aktiva rekyterare';?></th>
            	<th><?php echo 'Aktiva rekryterare';?></th>
            	<th></th>
            </tr>
            <tr>
            	<td><?php echo 'Totala antalet användare'?></td>
               	<td><?php echo 'Aktiva users - antal aktiva rekyterare';?></td>
            	<td><?php echo 'Aktiva rekryterare';?></td>
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
            	<td><?php echo 'Alla sökningar idag';?></td>
            	<td><?php echo 'Sökningar på inloggade Publicerare';?></td>
            	<td><?php echo 'Sökningar på inloggade rekryterare';?></td>
            	<td><?php echo 'Sökningar gjorda av gäster';?></td>
            </tr>
        </tbody>
    </table>   
</div>