<?php

use app\models\Customer;
use app\models\Status;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\SaleOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sale-order-form">
    <div class="box box-info box-solid">
        <div class="box-header">
            <div class="box-title"><?= $this->title ?></div>
        </div>
        <div class="box-body">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'status_id')->dropDownList(
                        [
                            1 => Yii::t('app', 'New Order'),
                            14 => Yii::t('app', 'Cancel')
                        ],
                        [
                            // 'prompt' => Yii::t('app', 'Select...'),
                            'required' => true,
                        ]
                    ) ?>
                </div>

                <div class="col-md-3">
                    <?= $form->field($model, 'order_number')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-3">
                    <?= $form->field($model, 'receipt_date')->widget(
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

                <div class="col-md-3">
                    <?= $form->field($model, 'customer_id')->widget(Select2::class, [
                        'theme' => Select2::THEME_DEFAULT,
                        'language' => 'th',
                        'data' => ArrayHelper::map(Customer::find()->all(), 'id', 'customer_name'),
                        'options' => ['placeholder' => Yii::t('app', 'Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'ref')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'details')->textarea(['rows' => 3]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'remask')->textarea(['rows' => 3]) ?>
                </div>
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