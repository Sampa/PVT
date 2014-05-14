<?php
class InboundlinksCommand extends CConsoleCommand {
    public function run($args) {
        // Load all tables of the application in the schema
        Yii::app()->db->schema->getTables();
// clear the cache of all loaded tables
        Yii::app()->db->schema->refresh();
    }
    public function init() {
//        Yii:: app () ->cache->flush();
        echo "Uppdaterar alla inboundlinks";
        $cvs = Cv::model()->findAll();
        foreach($cvs as $cv){
            $json = "https://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=link:http://pvt.dsv.su.se/Group1/cv/".$cv->id;
            $jsonfile = file_get_contents($json);
            $jsonAsObject = json_decode($jsonfile);
            var_dump($jsonAsObject);
            echo "<br/>";

//            if($jsonAsObject->responseData->cursor){
////                if(isset($jsonAsObject->responseData->cursor->resultCount)){
//                    $numberOfCvs =  $jsonAsObject->responseData->cursor->resultCount;
//                    $cv->numberOfLinks = 2;
//                }else{
//                    $cv->numberOfLinks = 1;
//                }
//            }
//            $cv->save(false);
        }
        parent::init();
    }

    public function actionIndex(){


    }
}