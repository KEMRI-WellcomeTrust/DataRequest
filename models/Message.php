<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property int $id
 * @property int $project_id
 * @property string|null $msg_from
 * @property string|null $msg_to
 * @property string|null $msg_subject
 * @property string|null $msg_body
 * @property int|null $msg_status
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['msg_body'], 'string'],
            [['msg_status','project_id'], 'integer'],
            [['msg_from', 'msg_to', 'msg_subject'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'msg_from' => 'Msg From',
            'msg_to' => 'Msg To',
            'msg_subject' => 'Msg Subject',
            'project_id' => "Project",
            'msg_body' => 'Msg Body',
            'msg_status' => 'Msg Status',
        ];
    }

    /**
     * {@inheritdoc}
     * @return MessageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MessageQuery(get_called_class());
    }

    public function beforeSave($insert){

        if($this->isNewRecord){
            $this->date_created = date("Y-m-d H:i:s");
        }

        if($this->hasErrors()){
            return false;
        }
        else{
            return true;
        }
    }

    public function sendMessage($from, $to, $subject, $message, $project_id = ''){
        $body = <<<EOF
From: $from, <br/>
To: $to,  <br/>
Subject: $subject  <br/>
$message  <br/>

<p> Access the system at: <a href='https://analysis.chainnetwork.org/'> https://analysis.chainnetwork.org </a> </p>
<p> Email Us On: <br/>
Data: data@chainnetwork.org <br/>
Admin: admin@chainnetwork.org <br/>
General: contactus@chainnetwork.org  <br/>
</p>
EOF;

$state = false;

        try{
            //initialize sending email and attempt sending.
            Yii::$app->mailer->compose()
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setTo($to)
            ->setSubject($subject)
            // ->setTextBody('Plain text content')
            ->setHtmlBody($body)
            ->send();

            //save to db
            $message = new Message();
            $message->msg_from = $from;
            $message->msg_to = $to;
            $message->msg_subject = $subject;
            $message->msg_body = $body;
            $message->project_id = $project_id;
            $message->msg_status = 1; //success
            $message->save(false);

        }
        catch(Exception $e){
            try{
                //database entry with error log
                $message = new Message();
                $message->msg_from = $from;
                $message->msg_to = $to;
                $message->msg_subject = $subject;
                $message->msg_body = $body;
                $message->project_id = $project_id;
                $message->msg_status = 0; //failed
                $message->error_msg = $e->getMessage();
                $message->save(false);

            }
            catch(Exception $e){
                throw new Exception('Error on sending email. <br/>'.$e->getMessage());
            }
        }
        
    }
}
