<?php


namespace frontend\controllers;
use frontend\models\Category;
use frontend\models\Product;
use Yii;
use yii\web\Request;

class CategoryController extends AppController
{
    public function actionIndex() {
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        return $this->render('index', compact('hits'));
    }

    public function actionView() {
        $id = Yii::$app->request->get('id');
        $products = Product::find()->where(['category_id' => $id])->all();
        return $this->render('view', compact('products'));
    }
}