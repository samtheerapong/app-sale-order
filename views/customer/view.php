<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = $model->customer_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="customer-view">

    <div style="display: flex; justify-content: space-between;">
        <p style="text-align: left;">
            <?= Html::a('<i class="fas fa-arrow-left"></i> ' . Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-primary']) ?>
        </p>
        <p style="text-align: right;">
            <?= Html::a('<i class="fas fa-edit"></i> ' . Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
            <?= Html::a('<i class="fas fa-trash"></i> ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>
    <div class="box box-info box-solid">
        <div class="box-header">
            <div class="box-title"><?= $this->title ?></div>
        </div>
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'template' => '<tr><th style="width: 250px;">{label}</th><td> {value}</td></tr>',
                'attributes' => [
                    // 'id',
                    'customer_code',
                    'customer_name',
                    'customer_en_name',
                    // 'customer_type_id',
                    [
                        'attribute' => 'customer_type_id',
                        'format' => 'html',
                        'value' => function ($model) {
                            return $model->customerType->customer_type;
                        },
                    ],
                    'customer_addr:ntext',
                    'customer_tel',
                    'customer_fax',
                    'customer_email:email',
                    [
                        'attribute' => 'actived',
                        'format' => 'html',
                        'value' => function ($model) {
                            return $model->actived == 1 ? "<span style=\"color:green;\">" . Yii::t('app', 'Yes') . " </span>" : "<span style=\"color:red;\">" . Yii::t('app', 'No') . "</span>";
                        },
                    ],
                ],
            ]) ?>

        </div>
    </div>
</div>