<?php


namespace app\models;
use yii\db\ActiveRecord;

class Data extends ActiveRecord
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
    public $auditor;
    public $age;

    public static function tableName()
    {
        return '{{data}}';
    }

}