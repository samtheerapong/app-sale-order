<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QcSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="qc-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'production_id') ?>

    <?= $form->field($model, 'qc_by') ?>

    <?= $form->field($model, 'qc_at') ?>

    <?= $form->field($model, 'qc_start') ?>

    <?php // echo $form->field($model, 'qc_end') ?>

    <?php // echo $form->field($model, 'qc_details') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
