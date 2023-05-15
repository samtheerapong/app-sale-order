<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductList */

$this->title = Yii::t('app', 'Create Product List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
