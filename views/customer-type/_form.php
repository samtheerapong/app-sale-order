<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'actived')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
