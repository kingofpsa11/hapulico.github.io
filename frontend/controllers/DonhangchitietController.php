<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Donhangchitiet;
use frontend\models\DonhangchitietSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;

/**
 * DonhangchitietController implements the CRUD actions for Donhangchitiet model.
 */
class DonhangchitietController extends Controller
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
     * Lists all Donhangchitiet models.
     * @return mixed
     */
    public function actionIndex()
    {   
        $searchModel = new DonhangchitietSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Donhangchitiet model.
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
     * Creates a new Donhangchitiet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        echo '<pre>';
        var_dump(Yii::$app->request->post());
        die;
        // $count = count(Yii::$app->request->post('Donhangchitiet',[]));
        $count =3;
        $models = [new Donhangchitiet()];
        if ($count !== 0) {
            for($i = 1; $i < $count; $i++){
                $models[] = new Donhangchitiet();
            }
        }   
        if(Model::loadMultiple($models,Yii::$app->request->post()) && Model::validateMultiple($models)){
            foreach ($models as $model) {
                $model->save(false);
            }
            return $this->redirect('index');
        }
        return $this->render('create', [
            'models' => $models,
        ]);
    }

    /**
     * Updates an existing Donhangchitiet model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Donhangchitiet model.
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
     * Finds the Donhangchitiet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Donhangchitiet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Donhangchitiet::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
