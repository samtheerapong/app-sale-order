<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Qc */

$this->title = Yii::t('app', 'Create Qc');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Qcs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
