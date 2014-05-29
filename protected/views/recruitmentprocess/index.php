<?php
/* @var $this RecruitmentprocessController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
    Yii::t('t', 'Hem') => Yii::app()->getHomeUrl(),
	Yii::t('t','Rekryteringsprocesser'),
);
?>
    <div align="right">
      <a href="<?php echo Yii::app()->baseUrl;?>/recruitmentprocess/create">
          <span class="glyphicon glyphicon-plus"></span>  <?php echo Yii::t("t","Lägg till ny process");?>
      </a>
    </div>
    <div class="panel panel-info">
        <!-- Default panel contents -->
        <div class="panel-heading">
            <h3><?php echo Yii::t('t','Pågående processer');?></h3>
        </div>

        <table class="table table-bordered table-condensed table-hover">
            <tbody>
                <tr>
                    <th><?php echo Yii::t('t','Startdatum');?></th>
                    <th><?php echo Yii::t('t','Titel');?></th>
                    <th><?php echo Yii::t('t','Företag');?></th>
                    <th><?php echo Yii::t('t','Anställningsform');?></th>
                    <th><?php echo Yii::t('t','Typ av tjänst');?></th>
                </tr>
                <?php
                foreach($allModels as $model){
                    if($model->endDate == null && $model->recruiterId ==Yii::app()->user->id){
                ?>
                <tr class="onClick" id="<?php echo $model->id;?>">
                    <td><?php
                            echo substr($model->startDate, 0, 10);
                        ?>
                    </td>
                    <td><?php
                            echo $model->title;
                        ?>
                    </td>
                     <td><?php
                            echo $model->company;
                        ?>
                    </td>
                    <td><?php
                            echo $model->typeOfEmployment;
                        ?>
                    </td>
                    <td><?php
                            echo $model->typeOfService;
                        ?>
                    </td>
                   <!--  <td>
                        <a href="<?php echo Yii::app()->baseUrl;?>/recruitmentprocess/view/<?php echo $model->id?>">
                            <span class="glyphicon glyphicon-search"></span>  <?php echo Yii::t("t","Granska process");?>
                        </a>
                    </td> -->
                </tr>
                    <?php
                    }
                }?>
            </tbody>
        </table>

    </div>

    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">
            <h3><?php echo Yii::t('t','Avslutade processer');?></h3>
        </div>

        <table class="table table-bordered table-condensed table-hover">

            <tbody>
            <tr>
                <th><?php echo Yii::t('t','Startdatum');?></th>
                <th><?php echo Yii::t('t','Titel');?></th>
                <th><?php echo Yii::t('t','Företag');?></th>
                <th><?php echo Yii::t('t','Antsällningsform');?></th>
                <th><?php echo Yii::t('t','Typ av tjänst');?></th>
                <th><?php echo Yii::t('t','Slutdatum');?></th>
            </tr>
            <?php
            foreach($allModels as $model){
                if($model->endDate!=null && $model->recruiterId ==Yii::app()->user->id){
                    ?>
                    <tr class="onClick" id="<?php echo $model->id;?>">
                        <td><?php
                            echo substr($model->startDate,0,10);
                            ?></td>

                        <td><?php
                            echo $model->title;
                            ?></td>
                        <td><?php
                            echo $model->company;
                            ?></td>
                        <td><?php
                            echo $model->typeOfEmployment;
                            ?></td>
                        <td><?php
                            echo $model->typeOfService;
                            ?></td>
                        <td><?php
                            echo substr($model->endDate, 0, 10);
                            ?></td>
                    </tr>
                <?php
                }
            }

            ?>

            </tbody>
        </table>
    </div>
<script>
$(".onClick").on("click",function(event){
    event.preventDefault();
    window.document.location ='recruitmentprocess/view/'+$(this).attr("id");
});
</script>