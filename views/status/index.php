<?php

use app\models\Status;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Status');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-index">

    <p style="text-align: right;">
        <?= Html::a('<i class="fa fa-plus"></i> ' . Yii::t('app', 'Create Status'), ['create'], ['class' => 'btn btn-success']) ?>
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
                    // 'status_code',
                    [
                        'attribute' => 'status_code',
                        'format' => 'html',
                        'value' => function ($model) {
                            return '<span class="badge" style="background-color:' . $model->status_color . ';"><b>' . $model->status_code . '</b></span>';
                        },
                        // 'filter' => Html::activeDropDownList($searchModel, 'id', ArrayHelper::map(Status::find()->all(), 'id', 'status_code'), ['class' => 'form-control', 'prompt' => Yii::t('app', 'Select...')])
                        
                        // ******* แบบใช้ Select2 ******* 
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'id',
                            'data' => ArrayHelper::map(Status::find()->all(), 'id', 'status_code'),
                            'theme' => Select2::THEME_DEFAULT,
                            // 'theme' => Select2::THEME_BOOTSTRAP,
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'language' => 'th',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],
                    'status_name',
                    // 'status_details:ntext',
                    [
                        'attribute' => 'status_details',
                        'format' => 'ntext',
                        'value' => function ($model) {
                            // ******* ตัดตัวอักษรที่ 50 แล้วใส่ ... ต่อท้าย ******* 
                            $text = $model->status_details;
                            if (mb_strlen($text) > 50) {
                                $text = mb_substr($text, 0, 50) . '...';
                            }
                            return $text;
                        },
                    ],
                    // 'status_color',
                    //'actived',
                    [
                        'attribute' => 'actived',
                        'format' => 'html',
                        'value' => function ($model) {
                            return $model->actived == 1 ? "<span style=\"color:green;\">" . Yii::t('app', 'Yes') . " </span>" : "<span style=\"color:red;\">" . Yii::t('app', 'No') . "</span>";
                        },
                        'options' => ['style' => 'width:120px;'], // กำหนดขนาดความกว้าง
                        'contentOptions' => ['class' => 'text-center'], // จัดตรงกลาง
                        'filter' => Html::activeDropDownList($searchModel, 'actived', ['1' => Yii::t('app', 'Yes'), '2' => Yii::t('app', 'No')], ['class' => 'form-control', 'prompt' => Yii::t('app', 'Select...')])
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