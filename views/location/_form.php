<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Location */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="location-form">
    <div class="box box-info box-solid">
        <div class="box-header">
            <div class="box-title"><?= $this->title ?></div>
        </div>
        <div class="box-body">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-md-10">
                    <?= $form->field($model, 'location_name')->textInput(['maxlength' => true]) ?>
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

            <div class="box-footer">
                <div class="form-group">
                    <?= Html::submitButton('<i class="fa fa-save"></i> ' . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>