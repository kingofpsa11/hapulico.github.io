<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Donhang;
use frontend\models\DonhangSearch;
use frontend\models\Donhangchitiet;
use frontend\models\DonhangchitietSearch;
use frontend\models\Banggia;
use frontend\models\Khachhang;
use frontend\models\Donvi;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;
use yii\db\Query;


/**
 * DonhangController implements the CRUD actions for Donhang model.
 */
class DonhangController extends Controller
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
     * Lists all Donhang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DonhangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Donhang model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $query = Donhangchitiet::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->andFilterWhere([
            'idsodh' => $id,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Donhang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateall()
    {
        $model = new Donhang();
        $modelDetails = [new Donhangchitiet()];

        // echo "<pre>";
        // var_dump(Yii::$app->request->post('Donhangchitiet',[]));
        // die;

        if (Yii::$app->request->post('Donhangchitiet')){
            $count = count(Yii::$app->request->post('Donhangchitiet'));
            for ($i=1; $i <= $count ; $i++) { 
                $modelDetails[] = new Donhangchitiet();
            }
        }


        if ($model->load(Yii::$app->request->post())){
            if ($model->save()) {
                // return $this->redirect(['index']);
                if(Model::loadMultiple($modeldetails,Yii::$app->request->post('Donhangchitiet')) && Model::validateMultiple($modeldetails)){
                    foreach ($modelDetails as $modelDetail) {
                        $modelDetail->save(false);
                    }
                }
                return $this->redirect(['view','id'=>$model->id]);
            }
        }

        return $this->render('createall', [
            'model' => $model,
        ]);
    }

    public function actionCreate($iddvdh)
    {
        $model = new Donhang();
        $modelDetails = [new Donhangchitiet()];

        //Lấy danh sách tỉnh thành
        $customer = Khachhang::find()->where(['loaikhach'=>1])->all();
        $customer = ArrayHelper::map($customer,'id','tenkhach');

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
     * Updates an existing Donhang model.
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
     * Deletes an existing Donhang model.
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
     * Finds the Donhang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Donhang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
	public function actionList($q = null, $id = null)
	{
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$out = ['results' => ['id'=>'','text'=>'']];
		if(!is_null($q)){
			$query = new Query;
			$query->select('id,tensanpham AS text')
				->from('tbl_banggia')
				->where(['like','tensanpham',$q])
				->limit(20);
			$command = $query->createCommand();
            // echo "<pre>";
            // var_dump($command);
            // die();
			$data = $command->queryAll();
			$out['results'] = array_values($data);
		}
		elseif ($id >0){
			$out['result'] = ['id' => $id, 'text' => Banggia::find($id)->tensanpham];
		}
		return $out;
		
	}
	
    public function actionLists($id)
    {   
        // $donvi = Donvi::find()
        //         ->where('khachhang_id = :khachhang_id', [':khachhang_id' => $id])
        //         ->one();
        // $donvi = $donvi->tenviettat;
        
        // $year = date('y');
        
        $model = Donhang::find()
                ->where(['dvdh_id'=>$id])
                ->orderBy(['sodh'=>SORT_DESC])
                ->one();

        if($model){
            $sodh = $model->sodh;
            $so = explode(".", $sodh);
            $so[2] ++;
            $so[2] = str_pad($so[2], 3, "0", STR_PAD_LEFT);
            $sodh = $so[0].'.'.$so[1].'.'.$so[2];
            echo $sodh;
        }
        else{
            echo '';
        }
    }

    public function actionGetprice($id)
    {   

        $gia = Banggia::findOne($id)->giavtcn;
        echo $gia;
    }
    protected function findModel($id)
    {
        if (($model = Donhang::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
