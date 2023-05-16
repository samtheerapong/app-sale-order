<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SaleOrder */

$this->title = Yii::t('app', 'Create Sale Order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sale Order'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-order-create">

    <p> <?= Html::a('<i class="fas fa-arrow-left"></i> ' . Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-primary']) ?></p>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>