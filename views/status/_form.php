<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\ColorInput;

/* @var $this yii\web\View */
/* @var $model app\models\Status */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="status-form">
    <div class="box box-info box-solid">
        <div class="box-header">
            <div class="box-title"><?= $this->title ?></div>
        </div>
        <div class="box-body">
            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'status_code')->textInput(['maxlength' => true, 'required' => true,]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'status_name')->textInput(['maxlength' => true, 'required' => true,]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'status_color')->widget(ColorInput::class, ['options' => ['placeholder' => Yii::t('app', 'Select...'), 'required' => true,]]); ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'actived')->dropDownList(
                        [
                            1 => Yii::t('app', 'Yes'),
                            2 => Yii::t('app', 'No')
                        ],
                        [
                            'prompt' => Yii::t('app', 'Select...'),
                            'required' => true,
                        ]
                    ) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'status_details')->textarea(['rows' => 3]) ?>
                </div>
            </div>

            <div class="box-footer">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?= Html::submitButton('<i class="fa fa-save"></i> ' . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
                
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>