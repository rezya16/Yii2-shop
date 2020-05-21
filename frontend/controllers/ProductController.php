<?php


namespace frontend\controllers;

use frontend\models\Category;
use frontend\models\Product;
use Yii;

class ProductController extends AppController
{
    public function actionView ($id) {
        $id = Yii::$app->request->get('id');
//        $product = Product::findOne('id');
        $product = Product::find()->with('category')->where(['id' => $id])->limit(1)->one();
        $hits = Product::find()->where(['hit' => '1'])->limit(4)->all();
        $this->setMeta('E-SHOPPER | '.$product->name, $product->keywords,
            $product->description);
        return $this->render('view', compact('product', 'hits'));
    }

}