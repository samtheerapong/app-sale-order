<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductListSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sale_order_id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'delivery_start') ?>

    <?= $form->field($model, 'delivery_end') ?>

    <?= $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'counting_unit_id') ?>

    <?php // echo $form->field($model, 'location_id') ?>

    <?php // echo $form->field($model, 'ref') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
