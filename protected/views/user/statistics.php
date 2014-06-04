<?php 
$this->breadcrumbs=array(
    Yii::t('t', 'Hem') => Yii::app()->getHomeUrl(),
    t('Statistik'),

);
?>
<div class="panel panel-info" style="text-align: center;">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <h3><?php echo Yii::t('t','Statistik över CV-Pages');?></h3>
    </div>
    <h3> <?php echo Yii::t('t',' Antal CV:n i databasen = ');?> <?php echo $dataProviderCv->getTotalItemCount();?> </h3>
    <div>
        <h3> <?php echo Yii::t('t',' Antal sökningar per dag. Fördelat på roll.');?> </h3>
        <div id="searchHistory" style="height: 300px;"></div>
    </div>
    <div>
        <h3> <?php echo Yii::t('t',' Avslutade processer. Fördelning mellan orsak.');?> </h3>
        <div id="usersBar" style="height: 300px;"></div>
    </div>
    <div>
        <h3> <?php echo Yii::t('t',' Antal inloggade användare idag');?> <?php echo date('Y-m-d') ?> </h3>
        <div id="usersToday" style="height: 300px;"></div>
    </div>

    <div>
        <h3> <?php echo Yii::t('t',' Antal registrerade publicerare jämfört med antal rekryterare');?> </h3>
        <div id="searchWordsDonut" style="height: 300px;"></div>
    </div>
</div>
<script>
    new Morris.Line({
        element: 'searchHistory',
        data: [
            { y: '<?php echo $dataProviderDates[0] ?>',
                a: <?php echo $dataProviderSearchHistoryPublisher[0]?>,
                b: <?php echo $dataProviderSearchHistoryRecruiter[0]?>,
                c: <?php echo $dataProviderSearchHistoryGuest[0]?>
            },
            { y: '<?php echo $dataProviderDates[1] ?>',
                a: <?php echo $dataProviderSearchHistoryPublisher[1]?>,
                b: <?php echo $dataProviderSearchHistoryRecruiter[1]?>,
                c: <?php echo $dataProviderSearchHistoryGuest[1]?>
            },
            { y: '<?php echo $dataProviderDates[2] ?>',
                a: <?php echo $dataProviderSearchHistoryPublisher[2]?>,
                b: <?php echo $dataProviderSearchHistoryRecruiter[2]?>,
                c: <?php echo $dataProviderSearchHistoryGuest[2]?>
            },
            { y: '<?php echo $dataProviderDates[3] ?>',
                a: <?php echo $dataProviderSearchHistoryPublisher[3]?>,
                b: <?php echo $dataProviderSearchHistoryRecruiter[3]?>,
                c: <?php echo $dataProviderSearchHistoryGuest[3]?>
            },
            { y: '<?php echo $dataProviderDates[4] ?>',
                a: <?php echo $dataProviderSearchHistoryPublisher[4]?>,
                b: <?php echo $dataProviderSearchHistoryRecruiter[4]?>,
                c: <?php echo $dataProviderSearchHistoryGuest[4]?>
            },
            { y: '<?php echo $dataProviderDates[5] ?>',
                a: <?php echo $dataProviderSearchHistoryPublisher[5]?>,
                b: <?php echo $dataProviderSearchHistoryRecruiter[5]?>,
                c: <?php echo $dataProviderSearchHistoryGuest[5]?>
            },
            { y: '<?php echo $dataProviderDates[6] ?>',
                a: <?php echo $dataProviderSearchHistoryPublisher[6]?>,
                b: <?php echo $dataProviderSearchHistoryRecruiter[6]?>,
                c: <?php echo $dataProviderSearchHistoryGuest[6]?>
            },
        ],
        xkey: 'y',
        ykeys: ['a', 'b', 'c'],
        labels: ['Publicerare', 'Rekryterare', 'Gäst']
    });

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