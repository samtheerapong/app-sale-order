<?php

use yii\helpers\Html;
use kartik\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\LocationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Location');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-index">

    <p style="text-align: right;">
        <?= Html::a('<i class="fa fa-plus"></i> ' . Yii::t('app', 'Create Location'), ['create'], ['class' => 'btn btn-success']) ?>
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
                    'location_name',
                    [
                        'attribute' => 'actived',
                        'format' => 'html',
                        'value' => function ($model) {
                            return $model->actived == 1 ? "<span style=\"color:green;\">" . Yii::t('app', 'Yes') . " </span>" : "<span style=\"color:red;\">" . Yii::t('app', 'No') . "</span>";
                        },
                        'options' => ['style' => 'width:120px;'],
                        'contentOptions' => ['class' => 'text-center'],
                        'filter' => Html::activeDropDownList($searchModel, 'actived', ['1' => Yii::t('app', 'Yes'), '2' => Yii::t('app', 'No')], ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
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