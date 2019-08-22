<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm2 extends Model
{public $isMiddleClass;
    public $isTopManager;
    public $isOther;
    public $other;
    public $geoposition;
    public $auditor = -1;
    public $age;

}
