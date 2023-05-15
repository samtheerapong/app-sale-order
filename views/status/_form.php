<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Status */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="status-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_details')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'actived')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
