<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Production */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="production-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'planning_id')->textInput() ?>

    <?= $form->field($model, 'production_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'production_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'production_start')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'production_end')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'production_details')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
