<?php

use app\models\CustomerType;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Customer');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <p style="text-align: right;">
        <?= Html::a('<i class="fa fa-plus"></i> ' . Yii::t('app', 'Create Customer'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box box-info box-solid">
        <div class="box-header">
            <div class="box-title"><?= $this->title ?></div>
        </div>
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'customer_code',
                    'customer_name',
                    'customer_en_name',
                    [
                        'attribute' => 'customer_type_id',
                        'format' => 'html',
                        'value' => function ($model) {
                            return $model->customerType->customer_type;
                        },
                        'filter' => Html::activeDropDownList($searchModel, 'customer_type_id', ArrayHelper::map(CustomerType::find()->all(), 'id', 'customer_type'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
                    ],
                    // 'customer_addr:ntext',
                    [
                        'attribute' => 'customer_addr',
                        'format' => 'ntext',
                        'value' => function ($model) {
                            $text = $model->customer_addr;
                            if (mb_strlen($text) > 50) {
                                $text = mb_substr($text, 0, 50) . '...';
                            }
                            return $text;
                        },
                    ],
                    // 'customer_tel',
                    //'customer_fax',
                    //'customer_email:email',
                    //'active',

                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'options' => ['style' => 'width:120px;'],
                        'buttonOptions' => ['class' => 'btn btn-default'],
                        'template' => '<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete}</div>'
                    ],
                ],
            ]); ?>

        </div>
    </div>
</div>