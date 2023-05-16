<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerType */

$this->title = Yii::t('app', 'Update') . ' : '.$model->customer_type;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Type'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->customer_type, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="customer-type-update">

<p>  <?= Html::a('<i class="fas fa-arrow-left"></i> ' . Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-primary']) ?></p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
