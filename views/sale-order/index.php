<?php

use app\models\Status;
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SaleOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sale Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Sale Order'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'status.status_name',
            [
                'attribute' => 'status_id',
                'format' => 'html',
                'value' => function ($model) {
                    return '<span class="badge" style="background-color:' . $model->status->status_color . ';"><b>' . $model->status->status_name . '</b></span>';
                },
                'filter' => Html::activeDropDownList($searchModel, 'status_id', ArrayHelper::map(Status::find()->all(), 'id', 'status_name'), ['class' => 'form-control', 'prompt' => 'เลือก...'])
            ],
            'created_at:date',
            'updated_at:date',
            // [
            //     'attribute' => 'created_at',
            //     'format' => 'html',
            //     'value' => function ($model, $key, $index, $column) {
            //         return Yii::$app->formatter->asDate($model->created_at, 'medium'); //short,medium,long,full
            //     },
            //     'filter' => DatePicker::widget([
            //         'model' => $searchModel,
            //         'attribute' => 'created_at',
            //         'pluginOptions' => [
            //             'format' => 'dd-mm-yyyy',
            //             'autoclose' => true,
            //         ]
            //     ])
            // ],
            // [
            //     'attribute' => 'updated_at',
            //     'format' => 'html',
            //     'value' => function ($model, $key, $index, $column) {
            //         return Yii::$app->formatter->asDate($model->updated_at, 'medium'); //short,medium,long,full
            //     }
            // ],


            // 'updated_at:date',
            'created_by',
            //'updated_by',
            //'order_number',
            //'customer_id',
            //'title',
            //'details:ntext',
            //'ref',
            //'remask:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>