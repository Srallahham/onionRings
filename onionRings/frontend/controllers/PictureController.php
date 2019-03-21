<?php

namespace frontend\controllers;

use Yii;
use common\models\Picture;
use common\models\PictureSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PictureController implements the CRUD actions for Picture model.
 */
class PictureController extends Controller
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
     * Displays a single Picture model.
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
     * Creates a new Picture model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Picture();

        if ($model->load(Yii::$app->request->post())) {

            // get the instances of the uploaded files.
            $model->files = UploadedFile::getInstances($model, 'files');
            foreach ($model->files as $file) {
                $picture = new Picture();
                $fileName = $file->name;
                $file->saveAs('uploads/' . $fileName . '.' . $file->extension);

                // save the paths in the db.
                $picture->picture_title = $fileName;
                $picture->picture_path  = 'uploads/' . $fileName . '.' . $file->extension;
                $picture->picture_album = $model->picture_album;
                $picture->save();
            }
            return $this->redirect('/recipe/create');
            //return $this->redirect(['view', 'id' => $model->picture_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    
    /**
     * Finds the Picture model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Picture the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Picture::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
