<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\db\Expression;
use yii\web\Response;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use common\models\Recipe;
use common\models\RecipeSearch;
use common\models\Picture;
use common\models\Model;
use common\models\RecipeIngredient;
use common\models\Comment;
use common\models\Like;





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
          'access' => [
            'class' => AccessControl::className(),
            'only' =>['create', 'update'],
            'rules' => [
               [
                 'allow' => true,
                 'roles' => ['@']
               ]
            ]
          ],
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

    public function actionLike()
    {
        $model = new Like();
        if($model->load(Yii::$app->request->post())) {

            if($model->save()) {
                echo 1;
            } else {
                $id = Like::getId($model);
                $model->find($id)->one()->delete();
                echo $id;
            }
        }
    }

    public function actionComment($id)
    {
        $model = new Comment();
        if ($model->load(Yii::$app->request->post())) {

            if($model->save())
                echo 1;
            else
                echo 0;
        }

        return $this->renderAjax('comment', [
            'model' => $model,
            'recipe_id' => $id,
        ]);

    }
    public function actionCreate()
    {
        $model = new Recipe();
        $model->scenario = 'create';

        $modelsIngredient = [new RecipeIngredient];

        if ($model->load(Yii::$app->request->post())) {

            // get the instance of the uploaded file.
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->recipe_owner = (yii::$app->user->isGuest)? 1 : yii::$app->user->identity->getId();
            $model->recipe_date = new Expression('now()');

            if ($model->upload() && $model->save(false)) {

            $oldIDs = ArrayHelper::map($modelsIngredient, 'recipe_ingredient_id', 'recipe_ingredient_id');
            $modelsIngredient = Model::createMultiple(RecipeIngredient::classname(), $modelsIngredient);
            Model::loadMultiple($modelsIngredient, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsIngredient, 'recipe_ingredient_id', 'recipe_ingredient_id')));

            // validate all models
            $valid = true; //$model->validate();
            $valid = Model::validateMultiple($modelsIngredient) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            RecipeIngredient::deleteAll(['recipe_ingredient_id' => $deletedIDs]);
                        }
                        foreach ($modelsIngredient as $modelIngredient) {
                            $modelIngredient->recipe_id = $model->recipe_id;
                            if (! ($flag = $modelIngredient->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->recipe_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
              }
            }
        }
        return $this->render('create', [
            'model' => $model,
            'modelsIngredient' => (empty($modelsIngredient)) ? [new RecipeIngredient] : $modelsIngredient,

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
