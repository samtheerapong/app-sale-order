<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\date\DatePicker;
//
use yii\helpers\ArrayHelper;
use app\models\Status;


/* @var $this yii\web\View */
/* @var $searchModel app\models\PlanningSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Planning');
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
<div class="planning-index">

    <p style="text-align: right;">
        <?= Html::a('<i class="fa fa-plus"></i> ' . Yii::t('app', 'Create Planning'), ['create'], ['class' => 'btn btn-success']) ?>
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

                    // 'id',

                    // 'sale_order_id',
                    'saleOrder.order_number',
                    'saleOrder.title',

                    'created_at',
                    'created_by',
                    // 'updated_at',
                    // 'updated_by',
                   
                    // 'planning_start',
                    [
                        'attribute' => 'planning_start',
                        'format' => 'date',
                        'contentOptions' => ['style' => 'width: 15%;'],
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'planning_start',
                            'options' => ['placeholder' => Yii::t('app', 'Select date')],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'autoclose' => true,
                            ]
                        ]),
                    ],
                    // 'planning_end',
                    [
                        'attribute' => 'planning_end',
                        'format' => 'date',
                        'contentOptions' => ['style' => 'width: 15%;'],
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'planning_end',
                            'options' => ['placeholder' => Yii::t('app', 'Select date')],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'autoclose' => true,
                            ]
                        ]),
                    ],
                    'planning_details:ntext',

                    [
                        'attribute' => 'saleOrder.status_id',
                        // 'value' => 'saleOrder.status.status_name',
                        'format' => 'html',
                        'value' => function ($model) {
                            $blinkClass = $model->saleOrder->status->id == 1 ? 'blink' : '';
                            return '<span class="badge ' . $blinkClass . '" style="background-color:' . $model->saleOrder->status->status_color . ';"><b>' . $model->saleOrder->status->status_name . '</b></span>';
                        },
                        'filter' => Html::activeDropDownList(
                            $searchModel,
                            'status_id',
                            ArrayHelper::map(Status::find()->all(), 'id', 'status_name'),
                            [
                                'class' => 'form-control', // Add Bootstrap form-control class
                                'prompt' => Yii::t('app', 'Select...')
                            ]
                        ),
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