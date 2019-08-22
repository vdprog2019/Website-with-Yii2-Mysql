<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ContactForm extends Model
{
    public $site_name;
    public $user_name;
    public $email;
    public $phone;
    public $domen_name = 'www.';
    public $needRegistration1;
    public $needRegistration2;
    public $needDesign;
    public $needAdmin;
    public $needSpeed;
    public $needUser;
    public $needGoodlePosition;
    public $needElse;
    public $subject;
    public $verifyCode;
    public $isMiddleClass;
    public $isTopManager;
    public $isOther;
    public $other;
    public $geoposition;
    public $auditor = -1;
    public $age;
    public $next;


    public function rules()
    {
        return [
            [['site_name', 'user_name','email','phone'], 'required', 'message' => ''],
            ['email', 'email'],
            ['phone', 'match', 'pattern' => ' /^(\+)?([()]?\d[()]?){10,14}$/ ', 'message' =>'К примеру +380(99)3361298 ']
        ];
    }
    ///<a[^>]+href\s*=\s*["']([^"']+)["'][^>]*>(.*?)<\/a>/mis
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }


    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setReplyTo([$this->email => $this->email])
                ->setSubject($this->site_name)
                ->setTextBody($this->user_name)
                ->send();
            return true;
        }
        return false;
    }
}
