<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Warehouse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="warehouse-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'qc_id')->textInput() ?>

    <?= $form->field($model, 'warehouse_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'warehouse_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'warehouse_start')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'warehouse_end')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'warehouse_details')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
