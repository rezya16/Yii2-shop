<?php


namespace frontend\controllers;
use frontend\models\Category;
use frontend\models\Product;
use Yii;
use yii\data\Pagination;
use yii\web\Request;

class CategoryController extends AppController
{
    public function actionIndex() {
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('E_SHOPPER');
        return $this->render('index', compact('hits'));
    }

    public function actionView() {
        $id = Yii::$app->request->get('id');
//        $products = Product::find()->where(['category_id' => $id])->all();
        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $category = Category::findOne($id);
        $this->setMeta('E-SHOPPER | '.$category->name, $category->keywords,
        $category->description);

        return $this->render('view', compact('products','pages','category'));
    }
}