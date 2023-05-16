<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Planning */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="planning-form">
    <div class="box box-info box-solid">
        <div class="box-header">
            <div class="box-title"><?= $this->title ?></div>
        </div>
        <div class="box-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($modelSaleOrder, 'status_id')->hiddenInput()->label(false) ?>
            <?= $form->field($model, 'sale_order_id')->hiddenInput()->label(false) ?>
     


            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'planning_start')->widget(
                        DatePicker::class,
                        [
                            'language' => 'th',
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true,
                                'autoclose' => true,
                            ]
                        ]
                    ); ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'planning_end')->widget(
                        DatePicker::class,
                        [
                            'language' => 'th',
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true,
                                'autoclose' => true,
                            ]
                        ]
                    ); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'planning_details')->textarea(['rows' => 3]) ?>
                </div>
            </div>

            <div class="box-footer">
                <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-save"></i> ' . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>