<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Planning */

$this->title = $model->saleOrder->order_number;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Plannings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="planning-view">

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
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info box-solid">
                <div class="box-header">
                    <div class="box-title"><?= $model->saleOrder->order_number; ?></div>
                </div>
                <div class="box-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'template' => '<tr><th style="width: 250px;">{label}</th><td> {value}</td></tr>',
                        'attributes' => [
                            // 'id',
                            'saleOrder.order_number',
                            'saleOrder.status.status_name',
                            'saleOrder.customer.customer_name',
                            'saleOrder.title',
                            'saleOrder.details',
                            'saleOrder.receipt_date',
                            'saleOrder.ref',
                            'saleOrder.remask',
                        ],
                    ]) ?>


                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-warning box-solid">
                <div class="box-header">
                    <div class="box-title"><?= Yii::t('app', 'Planning') ?></div>
                </div>
                <div class="box-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'template' => '<tr><th style="width: 250px;">{label}</th><td> {value}</td></tr>',
                        'attributes' => [
                            // 'id',
                            'created_at',
                            'created_by',
                            'updated_at',
                            'updated_by',
                            'planning_start',
                            'planning_end',
                            'planning_details:ntext',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>




</div>