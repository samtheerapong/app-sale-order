<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Location */

$this->title = Yii::t('app', 'Update') . ' : ' . $model->location_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Location'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->location_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="location-update">

    <p> <?= Html::a('<i class="fas fa-arrow-left"></i> ' . Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-primary']) ?></p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>