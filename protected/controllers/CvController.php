<?php

class CvController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
        //@ means those who have logged in
        //* means all users
        //with expression means the phpcode _within_ ' ' must return true
		return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','view','SaveInboundLinks'),
                'users'=>array('*'),
            ),
			array('allow', // allow authenticated user to perform 'create' and 'upload' actions
				'actions'=>array('create','upload'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'admin' action
				'actions'=>array('admin','delete'), //admin action lists users own cv for managing them
				'users'=>array('@'),
			),
//            array('allow', // allow owners to perform 'delete' action
//                'actions'=>array('delete'),
//                'users'=>array('@'),
//                'expression'=>'Yii::app()->controller->isOwner()',
//            ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    public function isOwner(){
        $model = Cv::model()->findByPk(Yii::app()->request->getParam('id'));
       if(is_null($model))
           throw new CException(Yii::t("t","Cv:et du försöker nå existerar inte")); //häng daniel för skitsvenska
        if($model->publisher === Yii::app()->user->id)
            return true;
        return false;
    }
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            $model=new Cv;
		Yii::import( "xupload.models.XUploadForm" );
		$pdf = new XUploadForm;
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if (isset($_POST['Cv'])) {
             $model->hasGeoArea=false;
              $model->geographicAreaId = 22;
             $model->attributes=$_POST['Cv'];
             if ($model->save()){
                 if(isset($_POST['geoRegion']) && isset($_POST['geoCity']) && $_POST['countries'] != "default"){
                     $areas = explode("//",$_POST['geoAreas']);
                     foreach($areas as $singleArea){
                         $area = explode(",", $singleArea);
                         $geo = new GeograficArea;
                         if(isset($area[1])){
                             $geo->country  = $area[0];
                             $geo->region  = $area[1];
                             $geo->city = $area[2];
                             if(!$geo->save()){
                                 die();
                             }
                             $cvArea = new CvArea();
                             $cvArea->cvId = $model->id;
                             $cvArea->AreaId = $geo->id;
                             $cvArea->save();
                         }
                     }
                     $model->hasGeoArea = true;
                     $model->geographicAreaId  = 1;
                 }
                 $tags = explode(",", $_POST['Cv']['tags']);
                 foreach($tags as $key=>$tag){
                     $currentTag=  Tag::model()->find("name='".$tag."'");
                     if($currentTag){
                         $currentTag->frequency = $currentTag->frequency +1;
                     }else{
                         $currentTag = new Tag;
                         $currentTag->frequency = 1;
                         $currentTag->name = $tag;
                     }
                     $currentTag->save();

                     $cvTagRelation = new CvTag;
                     $cvTagRelation->tagId = $currentTag->id;
                     $cvTagRelation->cvId = $model->id;
                     $cvTagRelation->save();
                 }
                 $this->redirect(array('view','id'=>$model->id));
             }
        }

		$this->render('create',array(
			'model'=>$model,
			'pdf'=>$pdf,
		));
	}
    public function actionSaveInboundLinks(){
        $linkCount = $_POST['linkCount'];
        $id = $_POST['id'];
        $model = Cv::model()->findByPk($id);
        $model->numberOfLinks = $linkCount;

        if($model->save()){
            $phpArrayData = array("status"=>"success");
            $phpArrayDataInJsonFormat = json_encode($phpArrayData);
            echo $phpArrayDataInJsonFormat;
        }else{
            echo json_encode(array("status"=>"failed"));
        }
    }
	/* takes care of pdf upload */
	public function actionUpload( ) {
		Yii::import( "xupload.models.XUploadForm" );
		//Here we define the paths where the files will be stored temporarily
		$path = realpath( Yii::app( )->getBasePath( )."/../pdf/tmp/" )."/";
		$publicPath = Yii::app( )->getBaseUrl( )."/pdf/tmp/";

		//This is for IE which doens't handle 'Content-type: application/json' correctly
		header( 'Vary: Accept' );
		if( isset( $_SERVER['HTTP_ACCEPT'] )
			&& (strpos( $_SERVER['HTTP_ACCEPT'], 'application/json' ) !== false) ) {
			header( 'Content-type: application/json' );
		} else {
			header( 'Content-type: text/plain' );
		}

		//Here we check if we are deleting and uploaded file
		if( isset( $_GET["_method"] ) ) {
			if( $_GET["_method"] == "delete" ) {
				if( $_GET["file"][0] !== '.' ) {
					$file = $path.$_GET["file"];
					if( is_file( $file ) ) {
						unlink( $file );
					}
				}
				echo json_encode( true );
			}
		} else {
			$model = new XUploadForm;
			$model->file = CUploadedFile::getInstance( $model, 'file' );
			//We check that the file was successfully uploaded
			if( $model->file !== null ) {
				//Grab some data
				$model->mime_type = $model->file->getType( );
				$model->size = $model->file->getSize( );
				$model->name = $model->file->getName( );
				//(optional) Generate a random name for our file
				$filename = md5( Yii::app( )->user->id.microtime( ).$model->name);
				$filename .= ".".$model->file->getExtensionName( );
				if( $model->validate( ) ) {
					//Move our file to our temporary dir
					if(!is_dir($path))
						mkdir($path.$filename);
					$model->file->saveAs( $path.$filename );
//					chmod( $path.$filename, 0777 );
					//here you can also generate the image versions you need
					//using something like PHPThumb


					//Now we need to save this path to the user's session
					if( Yii::app( )->user->hasState( 'pdf' ) ) {
						$userImages = Yii::app( )->user->getState( 'pdf' );
					} else {
						$userImages = array();
					}
					$userImages[] = array(
						"path" => $path.$filename,
						"filename" => $filename,
						'size' => $model->size,
						'mime' => $model->mime_type,
						'name' => $model->name,
					);
					Yii::app( )->user->setState( 'pdf', $userImages );

					//Now we need to tell our widget that the upload was succesfull
					//We do so, using the json structure defined in
					// https://github.com/blueimp/jQuery-File-Upload/wiki/Setup
					echo json_encode( array( array(
						"name" => $model->name,
						"type" => $model->mime_type,
						"size" => $model->size,
						"url" => $publicPath."/".$filename,
						"delete_url" => $this->createUrl( "upload", array(
								"_method" => "delete",
								"file" => $filename
							) ),
						"delete_type" => "POST"
					) ) );
				} else {
					//If the upload failed for some reason we log some data and let the widget know
					echo json_encode( array(
						array( "error" => $model->getErrors( 'file' ),
						) ) );
					Yii::log( "XUploadAction: ".CVarDumper::dumpAsString( $model->getErrors( ) ),
						CLogger::LEVEL_ERROR, "xupload.actions.XUploadAction"
					);
				}
			} else {
				throw new CHttpException( 500, "Could not upload file" );
			}
		}
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Cv'])) {
			$model->attributes=$_POST['Cv'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}
        Yii::import( "xupload.models.XUploadForm" );
        $pdf = new XUploadForm;
		$this->render('update',array(
			'model'=>$model,
            'pdf'=>$pdf,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request

			//Will go thru Hotlist objects that got the same id as the reported one and add these to the $ReportedRemove
			$ReportedRemove=Hotlist::model()->findAll("cvId=".$id);
			foreach ($ReportedRemove as $deletecv){
				$deletecv->delete();
			}
			$ReportedRemove=ReportedCv::model()->findAll("cvId=".$id);
			foreach ($ReportedRemove as $deletecv){
				$deletecv->delete();
			}
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}

	/**
	 * Lists all CVs. If search form is submitted it lists only matching CV's.
     * If no searchresults are found it reverts to default and shows all CV's
	 */
	public function actionIndex()
	{
		//CDBcriteria is a Yii class to make it easier to create advanced SQL queries
		//alla $criteria = $this->setXYZCondition($criteria) så är XYZ en metod i CvController
		$criteria=new CDbCriteria;
        $criteria = $this->setSortOrderCondition($criteria);

        if(isset($_GET['searchKey']))//if you write in free text search field in jumbotron-index
			$criteria->addSearchCondition("pdfText",$_GET['searchKey']);

        //this if checks if we have pressed the submit button in the search form
        $criteria = $this->handleSearch($criteria);
        //CActiveDataProvider is a class that handles the criteria above and finds the correct CV's
		$dataProvider=new CActiveDataProvider('Cv',array("criteria"=>$criteria));

		//hämta antalet resultat och nollställ kriteriet så vi kan visa alla om det var 0 resultat
		$resultCount = $dataProvider->getTotalItemCount();
		if($resultCount<1)
			$dataProvider->setCriteria(new CDbCriteria());
		//vad vi ska skicka till vyn så vi kan använda/visa det där
		$dataToView = array(
			'dataProvider'=>$dataProvider,
			'resultCount'=>$resultCount,
		);
		//om vi har gjort en ajaxrequest (sorteringsknapparnas jquery kod orsaker den)
		if( Yii::app()->request->isAjaxRequest){
			$this->renderPartial('_searchview',$dataToView);
		}else{
			$this->render('index',$dataToView);
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Cv('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Cv'])) {
			$model->attributes=$_GET['Cv'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Cv the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Cv::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Cv $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='cv-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    /*
     * accepts a country shortname (possible those listed in views/cv/_allCountriesSelect.php
     * returns the geoGraphicArea models with that country set
     */
    private function getGeoModels($countryName,$region,$city)
    {
	    //starta nytt kriteria objekt för att filtrera sökresultaten
        $criteria = new CDbCriteria();
	    //country har alltid ett värde
        $criteria->addSearchCondition("country",$countryName);
        //if antalet tecken i $region är mer än noll så har man valt en region i sökformuläret
	    if(sizeof($region)>0){
            $criteria->addSearchCondition("region",$region);
        }
	    //if antalet tecken i $city är mer än noll så har man valt en kommun/city i sökformuläret
	    if(sizeof($city)>0){
		    //buggar pga default val o_O
//	        $criteria->addSearchCondition("city",$city);
        }
	    //hämtar enbart de geo models som uppfyller kraven
        $geoModels  = GeograficArea::model()->findAll($criteria);
	    //initiera en tom array vi kan fylla i våra loopar nedan
	    $relations =array();
	    foreach($geoModels as $geo){ //för varje rad i tabellen GeoGraphicArea som matchade alla valda sökkriterier
		    //här loopar vi igenom varje relation denna rad har till tabellen CvArea (associationsklass)
		    foreach($geo->cvAreas as $areaRelation){
			    //ta cv id:t från relationen och stoppa in i vår array() enbart om det inte redan finns där
			    if(!in_array($areaRelation->cvId,$relations))
			        $relations[]= $areaRelation->cvId;
		    }
	    }
	    //returnera en array med alla id:n på CV som har en relation till området användaren söker på
        return $relations;
    }
	/*
		 * Sets the order of how the results should be displayed.
		 * date is the column to sort by and DESC means newest first(descending order)
	 */
	private function setSortOrderCondition($criteria) {
		if(isset($_POST['sortBy'])){
			if($_POST['sortBy']=='date')
				$criteria->order= "date DESC";
			else //sortera utifrån det man tryckte på i första hand och om två är lika gå efter datumet (desc = nyast först)
				$criteria->order= $_POST['sortBy'] .", date DESC";
		}else{ //defaultvillkor
			$_POST['sortBy'] = "date";
			$criteria->order= "numberOfLinks DESC, date DESC";
		}
		return $criteria;
	}
	/*
		 * if you have selected "Sök på konsultuppdrag" checkbox add a condition to only find CV
		 * where the column "typeOfEmployment" in the database has value "consult"
		*  if/else below is critical to display all results if both employment and consult checkboxes
		 * are selected. It makes no change
	*/
	private function setTypeOfEmploymentCondition($criteria) {
		if(isset($_POST['consult']) && isset($_POST['employment'])){
			//dont touch this its retarded that this seems to be needed
		}else{
			if(isset($_POST['consult']) && !isset($_POST['employment']))
				$criteria->addSearchCondition("typeOfEmployment","consult");
			// same as above but for employment
			if(isset($_POST['employment']) && !isset($_POST['consult']))
				$criteria->addSearchCondition("typeOfEmployment","employment");
		}
		return $criteria;
	}

	private function setTagsCondition($criteria) {
		if(isset($_POST['tags']) && strlen($_POST['tags']) > 0){
			$allCvIds = array(); //initiate empty array
			$tagsAsArray = explode(",",$_POST['tags']); //transform from one long string with tags to an array of strings
			foreach($tagsAsArray as $tag){ //loop all tags the user entered
				//kontrollera denna query
				$tagModel = Tag::model()->find("name='".$tag."'"); //try to find it in the database
				if($tagModel !=null){ //the tag exists
					//loop the array with each row in the table that connects this tag to a cv
					foreach($tagModel->cvTags as $cvTag){
						$allCvIds[] = $cvTag->cvId; //add the primary key of the cv to build an array of CV Ids that has atleast one of the tags the user searched for
					}
				}
			}
			$criteria->addInCondition("id",$allCvIds,"OR");//adding the sql condition (primary key of a cv must be in this array to be shown as a result
		}
		return $criteria;
	}

	private function setGeoAreaCondition($criteria) {
		if($_POST['countries'] != "default"){

			$listOfCvPks  = $this->getGeoModels($_POST["countries"],$_POST["geoRegion"],$_POST["geoCity"]);
//			$criteria->addInCondition("id",$listOfCvPks);
			//the code to add conditions based on the models/objects returned above

			foreach($listOfCvPks as  $index=>$pk){
				$criteria->compare("id",$pk,true,"OR");
			}
			//om inga cv:n hittades som matchade regionen vill vi tvinga fram ett "inga resultat hittades"
			if(sizeof($listOfCvPks)<1){ //put some impossible criteria to force $dataProvider to get a resultCount of 0
				$criteria->compare("geographicAreaId",0);
				$criteria->compare("geographicAreaId",1);
			}
		}
		return $criteria;
	}
	/*
	 * Den här hanterar ifall vi trycker på sökknappen
	 */
	private function handleSearch($criteria) {
		if(isset($_POST['countries'])){
			$criteria = $this->setTypeOfEmploymentCondition($criteria);
			if(isset($_POST['searchbox']))//if you write in free text search field
				$criteria->addSearchCondition("pdfText",$_POST['searchbox']);
			$criteria = $this->setTagsCondition($criteria);//om man valt någon tag att söka på
			$criteria = $this->setGeoAreaCondition($criteria); //hanterar om man valt att söka på region
		}
		return $criteria;
	}
}