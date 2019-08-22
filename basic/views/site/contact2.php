<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */



use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\slider\Slider;


?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                                                                                                    Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>
        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact2-form']); ?>

                <div style="font-size: 20px;margin-top: 30px;">
                    <label>Целевая аудитория вашего сайта:</label>
                </div>

                <div style="margin-top: 40px;">
                    <span>Мужчины</span><span style="margin-left: 410px;">Женщины</span>
                <?= $form->field($model, 'auditor')->widget(Slider::classname(),  [
                    'pluginOptions'=>[
                        'min'=>0,
                        'max'=>100,
                        'step'=>1,

                    ]
                ])->label('');?>
                </div>

                <div style="margin-top: 50px; width: 500px;">
                    <span>Возраст:</span>
                <?= $form->field($model, 'age')->widget(Slider::classname(), [
                    'name'=>'rating_3',
                    'value'=>'0,100',
                    'sliderColor'=>Slider::TYPE_GREY,
                    'pluginOptions'=>[
                        'min'=>0,
                        'max'=>100,
                        'step'=>1,
                        'range'=>true,
                        'formatter'=>new yii\web\JsExpression("function(val) { 
                            if (val < 5) {
                                return 'Poor';
                            }
                            if (val < 10) {
                                return 'Fair';
                            }
                            if (val < 15) {
                                return 'Good';
                            }
                            if (val <= 20) {
                                return 'Excellent';
                            }
                        }")
                    ],
                ])->label('');?>
                </div>

                <div style="margin-top: 50px;">
                <label style="font-size: 20px;">Социальная группа:</label>
                    <div style="margin-top: 30px; margin-left: 30px;">
                        <?=$form->field($model, 'isMiddleClass')->checkbox()->label('Средний класс'); ?>
                        <?=$form->field($model, 'isTopManager')->checkbox()->label('Топ-менеджеры, директора и собственники'); ?>
                        <?=$form->field($model, 'isOther')->checkbox()->label('Другое')?>
                        <div id="otherInfo" style="display: none">
                            <?= $form->field($model, 'other')->textInput()->label('Опишите делатальней проблему') ?>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 40px;font-size: 15px;">
                    <div style="font-size: 15px;">
                    <?= $form->field($model, 'geoposition')->textarea()->label('География аудитории (города, области, страны):') ?>
                    </div>
                </div>
                <div class="form-group" id="">
                    <?= Html::a('Отправить', ['site/success'], [ 'id' => 'vld']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>

    <?php endif; ?>
</div>
