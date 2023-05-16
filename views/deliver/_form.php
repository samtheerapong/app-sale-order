<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Deliver */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deliver-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'warehouse_id')->textInput() ?>

    <?= $form->field($model, 'deliver_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deliver_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deliver_start')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deliver_end')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deliver_details')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
