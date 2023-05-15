<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductList */

$this->title = Yii::t('app', 'Update Product List: {name}', [
    'name' => $model->sale_order_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sale_order_id, 'url' => ['view', 'sale_order_id' => $model->sale_order_id, 'product_id' => $model->product_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="product-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
