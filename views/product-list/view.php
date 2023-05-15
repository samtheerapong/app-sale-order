<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductList */

$this->title = $model->sale_order_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'sale_order_id' => $model->sale_order_id, 'product_id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'sale_order_id' => $model->sale_order_id, 'product_id' => $model->product_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'sale_order_id',
            'product_id',
            'delivery_start',
            'delivery_end',
            'quantity',
            'counting_unit_id',
            'location_id',
            'ref',
        ],
    ]) ?>

</div>
