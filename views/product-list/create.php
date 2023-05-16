<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductList */

$this->title = Yii::t('app', 'Create Product List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-list-create">

<p> <?= Html::a('<i class="fas fa-arrow-left"></i> ' . Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-primary']) ?></p>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
