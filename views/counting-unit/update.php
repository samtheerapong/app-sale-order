<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CountingUnit */

$this->title = Yii::t('app', 'Update') . ' : '.$model->unit;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Counting Unit'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->unit, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="counting-unit-update">

    <p> <?= Html::a('<i class="fas fa-arrow-left"></i> ' . Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-primary']) ?></p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>