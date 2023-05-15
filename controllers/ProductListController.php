<?php

namespace app\controllers;

use Yii;
use app\models\ProductList;
use app\models\ProductListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductListController implements the CRUD actions for ProductList model.
 */
class ProductListController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProductList models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductList model.
     * @param integer $sale_order_id
     * @param integer $product_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($sale_order_id, $product_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($sale_order_id, $product_id),
        ]);
    }

    /**
     * Creates a new ProductList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductList();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'sale_order_id' => $model->sale_order_id, 'product_id' => $model->product_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $sale_order_id
     * @param integer $product_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($sale_order_id, $product_id)
    {
        $model = $this->findModel($sale_order_id, $product_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'sale_order_id' => $model->sale_order_id, 'product_id' => $model->product_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $sale_order_id
     * @param integer $product_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($sale_order_id, $product_id)
    {
        $this->findModel($sale_order_id, $product_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $sale_order_id
     * @param integer $product_id
     * @return ProductList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($sale_order_id, $product_id)
    {
        if (($model = ProductList::findOne(['sale_order_id' => $sale_order_id, 'product_id' => $product_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
