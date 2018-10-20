<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Dulieuduan;
use frontend\models\DulieuduanSearch;
use frontend\models\Thongtinduan;
use frontend\models\Status;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Provincial;
use yii\helpers\ArrayHelper;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;


/**
 * DulieuduanController implements the CRUD actions for Dulieuduan model.
 */
class DulieuduanController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {   

        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [],
                        'roles' => ['@'],
                    ],
                ],
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
     * Lists all Dulieuduan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DulieuduanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dulieuduan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $query = Thongtinduan::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->andFilterWhere([
            'idduan' => $id,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Dulieuduan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dulieuduan();
        $modelDetails = [new Thongtinduan()];

        //Lấy danh sách tỉnh thành
        $provincial = new Provincial();
        $provincial = $provincial->find()->asArray()->all();
        $provincial = ArrayHelper::map($provincial,'id','name');

        //Lấy danh mục trạng thái
        $status = Status::find()->asArray()->all();
        $status = ArrayHelper::map($status,'id','status');

        //Nếu có post thì tạo thêm các đối tượng Thongtinduan
        if (Yii::$app->request->post('Thongtinduan')){
            $count = count(Yii::$app->request->post('Thongtinduan'));
            for ($i=1; $i < $count ; $i++) {
                $modelDetails[] = new Thongtinduan();
            }
        }

        if ($model->load(Yii::$app->request->post())){
            if ($model->save()) {
                if(Model::loadMultiple($modelDetails,Yii::$app->request->post()) && Model::validateMultiple($modelDetails)){
                    foreach ($modelDetails as $modelDetail) {
                        $modelDetail->idduan = $model->id;
                        $modelDetail->save(false);
                    }
                    return $this->redirect(['view','id'=>$model->id]);
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'provincial' => $provincial,
            'modelDetails' => $modelDetails,
            'status' => $status,
        ]);
    }

    /**
     * Updates an existing Dulieuduan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelDetails = Thongtinduan::find()
                        ->where('idduan = :idduan',[':idduan' => $id])
                        ->all();
        $countOld = count($modelDetails);

        //Thêm hoặc xóa trong bảng Thongtinduan
        //Nếu thêm sản phẩm thì thêm object
        //Nếu bớt thì xóa trong database
        if(Yii::$app->request->post('Thongtinduan')){
            $countNew = count(Yii::$app->request->post('Thongtinduan'));

            if ($countOld < $countNew){
                for ($i=$countOld; $i < $countNew ; $i++) {
                    $modelDetails[] = new Thongtinduan();
                }
            }else if($countOld > $countNew){
                for ($i=$countNew; $i < $countOld ; $i++) {

                    //Xóa trong table thongtinduan
                    if (($delete = Thongtinduan::findOne($modelDetails[$i]->id)) !== null) {
                        $delete->delete();
                    }else{
                        throw new NotFoundHttpException('The requested page does not exist.');
                    }
                }
            }
        }

        //Lấy toàn bộ tỉnh vào trong field Tỉnh
        $provincial = new Provincial();
        $provincial = $provincial->find()->asArray()->all();
        $provincial = ArrayHelper::map($provincial,'id','name');

        
        //Lấy danh mục trạng thái
        $status = Status::find()->asArray()->all();
        $status = ArrayHelper::map($status,'id','status');

        if ($model->load(Yii::$app->request->post())){
            if ($model->save()) {
                
                if(Model::loadMultiple($modelDetails,Yii::$app->request->post()) && Model::validateMultiple($modelDetails)){
                    foreach ($modelDetails as $modelDetail) {
                        $modelDetail->idduan = $model->id;
                        $modelDetail->save(false);
                    }
                    return $this->redirect(['view','id'=>$model->id]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'provincial' => $provincial,
            'modelDetails' => $modelDetails,
            'status' => $status,
        ]);
    }

    /**
     * Deletes an existing Dulieuduan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Thongtinduan::deleteAll(['idduan' => $id]);
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the Dulieuduan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dulieuduan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dulieuduan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
