<?php
namespace app\controllers;

use app\models\SipStatus;
use Yii;
use app\models\AsteriskEvent;
use yii\web\Controller;
use yii\filters\AccessControl;

class AsteriskController extends \yii\web\Controller
{

    public function beforeAction($action) 
    { 
       $this->enableCsrfValidation = false; 
       return parent::beforeAction($action); 
    }

	public function behaviors()
    	{
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['event'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['event'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['test'],
                        'roles' => ['*']
                    ]
                ],
            ],
        ];
    }


    public function actionEvent()
        {
            $post = json_decode(file_get_contents('php://input'),true);
            error_reporting(0);
            $status = null;
            if ($post['Event'] == 'ExtensionsStatus' && $post['Privilege'] == 'call,all'){
                $status = 'free';
            } else if($post['Event'] == 'VarSet' && $post['Privilege'] == 'dialplan,all' && $post['ChannelStateDesc'] == 'Ring' && $post['Exten'] == '1002' && $post['Cause-txt'] == 'Null') {
                $status = 'calling';
            } else if($post['Event'] == 'DialEnd' && $post['Exten'] == '1002' && $post['DialStatus'] == 'ANSWER') {
                $status = 'talking';
            }
            $sip_status = new SipStatus();
            $sip_status->status = $status;
            $sip_status->save(false);

            /* $data->event=$post['Event'];
               $data->privilege=$post['Privilege'];
               $data->bridge_uniqueid=$post['BridgeUniqueid'];
               $data->bridge_type=$post['BridgeType'];
               $data->bridge_technology=$post['BridgeTechnology'];
               $data->bridge_creator=$post['BridgeCreator'];
               $data->bridge_name=$post['BridgeName'];
               $data->bridge_num_channels=$post['BridgeNumChannels'];
               $data->bridge_video_source_mode=$post['BridgeVideoSourceMode'];
               $data->channel=$post['Channel'];
               $data->channel_state=$post['ChannelState'];
               $data->channel_state_desc=$post['ChannelStateDesc'];
               $data->caller_id_num=$post['CallerIdNum'];
               $data->caller_id_name=$post['CallerIdName'];
               $data->connected_line_num=$post['ConnectedLineNum'];
               $data->connected_line_name=$post['ConnectedLineName'];
               $data->language=$post['Language'];
               $data->account_code=$post['AccountCode'];
               $data->context=$post['Context'];
               $data->exten=$post['Exten'];
               $data->priority=$post['Priority'];
               $data->uniqueid=$post['Uniqueid'];
               $data->linkedid=$post['Linkedid'];
               $data->cause_txt=$post['Cause-txt'];
               $data->dial_status=$post['DialStatus'];
               $data->dest_connected_line_num=$post['DestConnectedLineNum'];
               $data->variable=$post['Variable'];
               $data->dest_exten=$post['DestExten'];
               $data->dest_channel_state_desc=$post['DestChannelStateDesc'];*/
    //        if(!$data->save()) { echo 'err->' . json_encode($data->errors); }
        }


    public function actionCheck()
    {

        return $this->render('check');
        $numbers=[1001,1002,1003,1004,1005,1006,1007,1008,1009,1010];

        for ($i=0; $i < $numbers; $i++) { 
        $criteria=new CDbCriteria();
        $criteria->select='event,channel_state_desc,channel'; 
        var_dump($criteria);

        }
    }
}
