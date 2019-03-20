<?php

namespace frontend\controllers;

use Yii;
use common\models\Recipe;
use common\models\RecipeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Picture;
use yii\web\UploadedFile;
use yii\db\Expression;
use common\models\Ingredient;
use common\models\RecipeIngredient;
use yii\db\Query;

/**
 * RecipeController implements the CRUD actions for Recipe model.
 */
class RecipeController extends Controller
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
     * Lists all Recipe models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecipeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCategory($id)
    {
      $searchModel = new RecipeSearch();
      $dataProvider = $searchModel->searchCateogry($id, Yii::$app->request->queryParams);
      return $this->render('category', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Recipe model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Recipe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Recipe();
        $model->scenario = 'create';

        $data = Ingredient::find()->all();

        if ($model->load(Yii::$app->request->post())) {

            // get the instance of the uploaded file.
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->recipe_owner = (yii::$app->user->isGuest)? 1 : yii::$app->user->identity->getId();
            $model->recipe_date = new Expression('now()');
            if ($model->upload() && $model->save(false)) {

              $ingredientList = $_POST['Recipe']['ingredients'];
              foreach ($ingredientList as $ingredient) {

                $row = new RecipeIngredient();

                $row->recipe_id = $model->recipe_id;
                $row->ingredient_id = $ingredient;
                $row->ingredient_unit = 5;
                $row->save();
              }

                return $this->redirect(['view', 'id' => $model->recipe_id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
            'data' => $data
        ]);
    }

    /**
     * Updates an existing Recipe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->recipe_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Recipe model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Recipe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Recipe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Recipe::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
