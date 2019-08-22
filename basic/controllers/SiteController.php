<?php

namespace app\controllers;

use app\models\Data;
use Symfony\Component\Validator\Constraints\EqualTo;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\ContactForm;
use app\models\ContactForm2;
use app\models\UserInfo;



class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */

    public function actionIndex()
    {
        return $this->actionContact();
    }
    /**
     * Displays contact page.
     *
     * @return Response|string
     */

    public function actionContact()
    {
        $model = new ContactForm();

        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            return $this->render('contact2', ['model' => $model ]);
            saveRoDB($model);
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
public  function actionSuccess(){
    return $this->render('success');
}
    public function actionContact2()
    {
        return $this->saveRoDB();
    }

   public function saveRoDB($model){
            $data = new  Data();
            $data ->site_name = $model->site_name;
            $data ->user_name = $model->user_name;
            $data ->email = $model->email;
            $data ->age = $model->age;
            $data ->auditor = $model->auditor;
            $data ->domen_name = $model->domen_name;
            $data ->geoposition = $model->geoposition;
            $data ->isMiddleClass = $model->isMiddleClass;
            $data ->isOther = $model->isOther;
            $data ->isTopManager = $model->isTopManager;
            $data ->needDesign = $model->needDesign;
            $data ->needElse = $model->needElse;
            $data ->needGoodlePosition =$model->needGoodlePosition;
            $data ->needRegistration1 = $model->needRegistration1;
            $data ->needRegistration2 = $model->needRegistration2;
            $data ->needSpeed = $model->needSpeed;
            $data ->needUser = $model->needUser;
            $data ->other = $model->other;
            $data ->phone = $model->phone;
            $data ->subject = $model->subject;
            $data->save();
    }


};