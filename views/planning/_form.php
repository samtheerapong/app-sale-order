<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Planning */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="planning-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sale_order_id')->textInput() ?>

    <?= $form->field($model, 'planning_details')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
