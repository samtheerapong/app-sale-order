<?php

use app\models\Customer;
use app\models\Profile;
use app\models\Status;
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SaleOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sale Order');
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    @keyframes blink {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .blink {
        animation: blink 1s infinite;
    }
</style>

<div class="sale-order-index">

    <p style="text-align: right;">
        <?= Html::a('<i class="fa fa-plus"></i> ' . Yii::t('app', 'Create Sale Order'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box box-info box-solid">
        <div class="box-header">
            <div class="box-title"><?= $this->title ?></div>
        </div>
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'order_number',
                    
                    [
                        'attribute' => 'created_at',
                        'format' => 'date',
                        'contentOptions' => ['style' => 'width: 15%;'],
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'created_at',
                            'options' => ['placeholder' => Yii::t('app', 'Select date')],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'autoclose' => true,
                            ]
                        ]),
                    ],

                    // [
                    //     'attribute' => 'updated_at',
                    //     'format' => 'date',
                    //     'filter' => DatePicker::widget([
                    //         'model' => $searchModel,
                    //         'attribute' => 'updated_at',
                    //         'options' => ['placeholder' => Yii::t('app', 'Select date')],
                    //         'pluginOptions' => [
                    //             'format' => 'yyyy-mm-dd',
                    //             'autoclose' => true,
                    //         ]
                    //     ]),
                    // ],

                    // [
                    //     'attribute' => 'created_by',
                    //     'format' => 'html',
                    //     'contentOptions' => ['style' => 'width: 200px;'],
                    //     'value' => function ($model) {
                    //         return $model->user->profile->name;
                    //     },
                    //     'filter' => Select2::widget([
                    //         'model' => $searchModel,
                    //         'attribute' => 'created_by',
                    //         'data' => ArrayHelper::map(Profile::find()->all(), 'user_id', 'name'),
                    //         'theme' => Select2::THEME_DEFAULT,
                    //         'options' => ['placeholder' => Yii::t('app', 'Select...')],
                    //         'language' => 'th',
                    //         'pluginOptions' => [
                    //             'allowClear' => true
                    //         ],
                    //     ])
                    // ],

                    [
                        'attribute' => 'customer_id',
                        'format' => 'html',
                        'contentOptions' => ['style' => 'width: 250px;'],
                        'value' => function ($model) {
                            return $model->customer->customer_name;
                        },
                        // 'filter' => Html::activeDropDownList($searchModel, 'customer_id', ArrayHelper::map(Customer::find()->all(), 'id', 'customer_name'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'customer_id',
                            'data' => ArrayHelper::map(Customer::find()->all(), 'id', 'customer_name'),
                            'theme' => Select2::THEME_DEFAULT,
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],

                    'title',

                    [
                        'attribute' => 'receipt_date',
                        'format' => 'date',
                        'contentOptions' => ['style' => 'width: 15%;'],
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'receipt_date',
                            'options' => ['placeholder' => Yii::t('app', 'Select date')],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'autoclose' => true,
                            ]
                        ]),
                    ],

                    [
                        'attribute' => 'status_id',
                        'format' => 'html',
                        'value' => function ($model) {
                            $blinkClass = $model->status->id == 1 ? 'blink' : '';
                            return '<span class="badge ' . $blinkClass . '" style="background-color:' . $model->status->status_color . ';"><b>' . $model->status->status_name . '</b></span>';
                        },
                        'filter' => Html::activeDropDownList($searchModel, 'status_id', ArrayHelper::map(Status::find()->all(), 'id', 'status_name'), ['class' => 'form-control', 'prompt' => 'เลือก...'])
                    ],

                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'options' => ['style' => 'width:120px;'],
                        'buttonOptions' => ['class' => 'btn btn-default'],
                        'template' => '<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete}</div>'
                    ],
                ],
            ]); ?>


        </div>
    </div>
</div>