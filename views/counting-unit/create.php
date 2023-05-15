<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CountingUnit */

$this->title = Yii::t('app', 'Create Counting Unit');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Counting Units'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="counting-unit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
