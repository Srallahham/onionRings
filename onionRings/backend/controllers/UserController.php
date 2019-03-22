<?php

namespace backend\controllers;

use Yii;
use backend\models\user;
use backend\models\userSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use backend\models\CreateUserForm;
use yii\web\ForbiddenHttpException;

/**
 * UserController implements the CRUD actions for user model.
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all user models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new userSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single user model.
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
     * Creates a new user model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
            $model = new CreateUserForm();
            if ($model->load(Yii::$app->request->post())) {
                $user = $model->signup();
                return $this->render('/admin/index');
            }

            return $this->render('/user/create', [
                'model' => $model,
            ]);

    }

    /**
     * Updates an existing user model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(yii::$app->user->can('create-user')){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            throw new ForbiddenHttpException('The door is lucked!!....You do not have the permission!');
        }

    }

    /**
     * Deletes an existing user model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(yii::$app->user->can('delete-user')){
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }else{
            throw new ForbiddenHttpException('The door is lucked!!....You do not have the permission!');
        }

    }

    /**
     * Finds the user model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return user the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = user::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
