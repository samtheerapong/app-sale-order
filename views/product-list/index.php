<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Product Lists');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product List'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sale_order_id',
            'product_id',
            'delivery_start',
            'delivery_end',
            'quantity',
            //'counting_unit_id',
            //'location_id',
            //'ref',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
