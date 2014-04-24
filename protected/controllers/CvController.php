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
                'actions'=>array('index','view'),
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
            if(isset($_POST['geoRegion']) && isset($_POST['geoCity']) && $_POST['countries'] != "default"){
                $geo = new GeograficArea;
                $geo->region  = $_POST['geoRegion'];
                $geo->country  = $_POST['countries'];
                $geo->city = $_POST['geoCity'];
                if($geo->save()){
                    $model->hasGeoArea = true;
                    $model->geographicAreaId  = $geo->id;
                }

            }
            if($model->hasGeoArea){
                $model->attributes=$_POST['Cv'];
                if ($model->save()){
                    $this->redirect(array('view','id'=>$model->id));
                }
            }
		}

		$this->render('create',array(
			'model'=>$model,
			'pdf'=>$pdf,
		));
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
        $criteria=new CDbCriteria;
        /*
         * Sets the order of how the results should be displayed.
         * date is the column to sort by and DESC means newest first(descending order)
         */
        if( Yii::app()->request->isAjaxRequest && isset($_POST['sortBy'])){
        	if($_POST['sortBy']=='date'){
        		$criteria->order= "date DESC";
        	}
        	else{
				$criteria->order= $_POST['sortBy'];
			}
		}else{
			$criteria->order= "date DESC";
		}
        
        $resultCount = -1;
        //this if checks if we have pressed the submit button in the search form
        if(isset($_POST['countries'])){
            /*
             * if you have selected "Sök på konsultuppdrag" checkbox add a condition to only find CV
             * where the column "typeOfEmployment" in the database has value "consult"
             */
            if(isset($_POST['consult']))
                $criteria->addSearchCondition("typeOfEmployment","consult");
            //same as above but for employment
            if(isset($_POST['employment']))
                $criteria->addSearchCondition("typeOfEmployment","employment");
            if($_POST['countries'] != "default"){
                /*
                 * getGeoModels return an array of all geograficareas that matches the country selected
                 * and the region and/or city values (if something is written in them)
                 */
                $geoGraphicAreas  = $this->getGeoModels($_POST["countries"],$_POST["geoRegion"],$_POST["geoCity"]);
                //the code to add conditions based on the models/objects returned above
                foreach($geoGraphicAreas as $area)
                    $criteria->compare("geographicAreaId",$area->id,true,"OR");
                $resultCount = sizeof($geoGraphicAreas);
            }else{
                /*man har inte valt något specifikt land så vi sätter ett värde över 0
                   *för att inte generera error meddelandet
                 *
                 */
                $resultCount = 1;
            }
        }
        //CActiveDataProvider is a class that handles the criteria above and finds the correct CV's
		$dataProvider=new CActiveDataProvider('Cv',array("criteria"=>$criteria));
        //render(display)  views/cv/index.php
		
		if( Yii::app()->request->isAjaxRequest){
			$this->renderPartial('_searchview',array(
			'dataProvider'=>$dataProvider,
	        'resultCount'=>$resultCount,
			));
		}else{
			$this->render('index',array(
			'dataProvider'=>$dataProvider,
	        'resultCount'=>$resultCount,
			));
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
        $criteria = new CDbCriteria();
        $criteria->addSearchCondition("country",$countryName);
        if(sizeof($region)>0){
            $criteria->addSearchCondition("region",$region);
        }
        if(sizeof($city)>0){
            $criteria->addSearchCondition("city",$city);
        }

        $geoModels  = GeograficArea::model()->findAll($criteria);
        return $geoModels;
    }
}