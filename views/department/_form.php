<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Department */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'department_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_details')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'department_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_manager')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_head')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'actived')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
