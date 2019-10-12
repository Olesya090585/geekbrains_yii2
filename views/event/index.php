<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Event';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('eventNewFormSubmitted')): ?>
        <div class="alert alert-success">Event created.</div><p></p>
    <?php elseif (Yii::$app->session->hasFlash('eventEditFormSubmitted')): ?>
        <div class="alert alert-success">Event updated.</div><p></p>
    <?php else: ?>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'event-form']); ?>

                    <?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>
                    <?= $form->field($model, 'location') ?>
                    <?= $form->field($model, 'starts') ?>
                    <?= $form->field($model, 'ends') ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'event-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
