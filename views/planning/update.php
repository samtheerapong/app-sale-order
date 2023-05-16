<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Planning */

$this->title = Yii::t('app', 'Update Planning: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Plannings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="planning-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelSaleOrder' => $modelSaleOrder,
    ]) ?>

</div>
