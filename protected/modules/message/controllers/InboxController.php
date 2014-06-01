<?php

/**
 * Class InboxController
 */
class InboxController extends Controller
{

    /**
     * @var string
     */
    public $defaultAction = 'inbox';

    /**
     * @return array
     */
    public function accessRules()
	{
        //@ means those who have logged in
        //* means all users
        //with expression means the phpcode _within_ ' ' must return true
		return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','getUnreadMessages'),
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

    /**
     *
     */
    public function actionInbox() {
		$messagesAdapter = Message::getAdapterForInbox(Yii::app()->user->getId());
		$pager = new CPagination($messagesAdapter->totalItemCount);
		$pager->pageSize = 10;
		$messagesAdapter->setPagination($pager);

		$this->render(Yii::app()->getModule('message')->viewPath . '/inbox', array(
			'messagesAdapter' => $messagesAdapter
		));
	}

    /**
     * Hämtar de nya meddelandena för chatten (metoden körs typ varannan sekund via ett ajax scriptu
     */
    public function actiongetUnreadMessages(){

		if(Yii::app()->getModule('message')->getCountUnreadedMessages(Yii::app()->user->getId())){
			$allUnreadMessages=Yii::app()->getModule('message')->getUnreadMessages(Yii::app()->user->getId());
			$html="";
			foreach ($allUnreadMessages as $key => $message) {
				$message->markAsRead();
				$html=$html.$this->renderPartial(
					Yii::app()->getModule('message')->viewPath . '/_receivedTemplate',
					array("message"=>$message),true
				);
			}
			echo json_encode(array(
				"status"=>"ok",
				"html"=>$html,
				"messageCount"=>Yii::app()->getModule('message')->getCountUnreadedMessages(Yii::app()->user->getId())
            ));
		}else{
			echo json_encode(array(
				"status"=>"fail",
            ));
		}
	}


}
