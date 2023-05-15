<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DepartmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'department_code') ?>

    <?= $form->field($model, 'department_name') ?>

    <?= $form->field($model, 'department_details') ?>

    <?= $form->field($model, 'department_color') ?>

    <?php // echo $form->field($model, 'department_manager') ?>

    <?php // echo $form->field($model, 'department_head') ?>

    <?php // echo $form->field($model, 'department_email') ?>

    <?php // echo $form->field($model, 'department_tel') ?>

    <?php // echo $form->field($model, 'department_token') ?>

    <?php // echo $form->field($model, 'actived') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
