<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->registerCssFile('css/site.css');


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

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <div style="width: 520px;">
                <?= $form->field($model, 'site_name')->textInput(['autofocus' => true])->hint('Пожалуйста, введите название сайта')->label('Название сайта') ?>
                </div>

                <div style="margin-top: 30px; margin-left: -3px; width: 600px;">
                    <span>Что нужно сделать:</span>&nbsp &nbsp<button id="showHideContent" class="hover_show_btn">Создать новый</button>&nbsp
                    <button class="hover_show_btn" id="hover_content">Обновить старый</button>
                </div>

                <!-- скрываемая область -->
                <div style="margin-top: 50px;" class="form-group row" id="content" style="display:none;">
                    <span style="margin-top: 6px;margin-left: 15px;">Доменное имя:</span>&nbsp &nbsp
                    <?= $form->field($model, 'domen_name')->textInput()->hint('Пропустите если нет сайта')->label('') ?>


                    <div class="col-sm-10">
                        <div class="form-check" style="margin-left: 130px;margin-top: 5px;">
                            <?=$form->field($model, 'needRegistration1')->checkbox()->label('Требуется зарегистрировать'); ?>
                        </div>
                        <div class="form-check" style="margin-left: 130px;margin-top: 5px;">
                            <?=$form->field($model, 'needRegistration2')->checkbox()->label('Уже зарегистрировано и доступно для управления'); ?>
                        </div>
                    </div>


                </div>

                <div style="margin-top: 50px;" class="form-group row" id="content2">
                    <span style="margin-left: 13px;">Что не устраивает в существующем интернет-магазине?</span>

                    <div class="col-sm-10" style="margin-left: 30px; margin-top: 10px;" id="div_btn_1">

                        <div class="form-check col-sm-10">
                            <?=$form->field($model, 'needDesign')->checkbox()->label('Дизайн')?>
                        </div>
                        <div class="form-check col-sm-10" style="margin-top: 5px;">
                            <?=$form->field($model, 'needAdmin')->checkbox()->label('Админка')?>
                        </div>
                        <div class="form-check col-sm-10" style="margin-top: 5px;">
                           <?=$form->field($model, 'needSpeed')->checkbox()->label('Быстродействие')?>
                        </div>
                    </div>

                    <div class="col-sm-10" style="margin-left: 250px;" id="div_btn_2">

                        <div class="form-check col-sm-10" style="">
                           <?=$form->field($model, 'needUser')->checkbox()->label('Удобство для покупателей')?>
                        </div>
                        <div class="form-check col-sm-10" style="">
                           <?=$form->field($model, 'needGoodlePosition')->checkbox()->label('Позиция в Google')?>
                        </div>
                        <div class="form-check col-sm-10" style="">
                           <?=$form->field($model, 'needElse')->checkbox()->label('Другое')?>
                        </div>

                    </div>

                </div>

                <!-- скрытая область -->



                <div class="form-group row" style="margin-top: 40px; margin-left: 0px; width: 530px;">
                    <span>Ваше ФИО:</span>
                    <?= $form->field($model, 'user_name')->textInput()->hint('Пожалуйста, введите ФИО')->label('') ?>
                </div>
                <div class="form-group row" style="margin-top: 20px; margin-left: 0px; width: 530px;">
                    <span>Ваш email:</span>
                <?= $form->field($model, 'email')->hint('Пожалуйста, введите почту')->label('') ?>
                </div>
                <div class="form-group row" style="margin-top: 20px; margin-left: 0px; width: 530px;">
                    <span>Ваш телефон:</span>
                <?= $form->field($model, 'phone') ->hint('Пожалуйста, введите номер телефона')->label('') ?>
                </div>

                <div class="form-group" id="">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>



            </div>
        </div>

    <?php endif; ?>
</div>
