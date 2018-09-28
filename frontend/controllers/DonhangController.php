<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Donhang;
use frontend\models\DonhangSearch;
use frontend\models\Donhangchitiet;
use frontend\models\DonhangchitietSearch;
use frontend\models\Banggia;
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
        return $this->render('view', [
            'model' => $this->findModel($id),
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

        // $modelDetails = [new Donhangchitiet()];
        // $count = count(Yii::$app->request->post('Donhangchitiet'));
        // if($count !== 0){
        //     for ($i=1; $i < $count ; $i++) { 
        //         $modelDetails[] = new Donhangchitiet();
        //     }
        // }
        // // echo "<pre>";
        // // var_dump(Yii::$app->request->post('Donhang'));
        // // die;
        // if ($model->load(Yii::$app->request->post('Donhang'))){

        $modelDetail = new Donhangchitiet();

        if ($model->load(Yii::$app->request->post())){
            // $model->iddvdh = (int)$model->iddvdh;
            // echo Yii::$app->formatter->format($model->ngay,'date');

            // echo $model->ngay;
            // echo Yii::$app->formatter->asDate($model->ngay, 'dd/MM/yyyy');
            // var_dump($model->ngay);
            // die;
            if ($model->save()) {
                return $this->redirect(['index']);
                // if(Model::loadMultiple($modeldetails,Yii::$app->request->post('Donhangchitiet')) && Model::validateMultiple($modeldetails)){
                //     foreach ($modelDetails as $modelDetail) {
                //         $modelDetail->save(false);
                //     }
                // }
                // return $this->redirect(['view','id'=>$model->id]);
            }
        }

        return $this->render('createall', [
            'model' => $model,
            'modelDetail' => $modelDetail,
        ]);
    }

    public function actionCreate($iddvdh)
    {
        $model = new Donhangchitiet();
        $this->layout='mainmodal';

        // if ($model->load(Yii::$app->request->post())) {
        //     if ($model->save()){
        //         return $this->render(['creatall', 'model' => $model]);
        //     }
        // }
        return $this->render('create', [
            'model' => $model,
            'iddvdh'=>$iddvdh,
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
        $model = Donhang::find()
                ->where(['iddvdh'=>$id])
                ->orderBy(['sodh'=>SORT_DESC])
                ->one();
        $ngay = date('Y-m-d',time());
        if($model){
            echo $model->sodh."+".$ngay."+".$id;
        }
        else{
            echo '';
        }
    }

    public function actionLaygia($idsanpham,$soluong,$tiendo)
    {   
        $model = Banggia::find()->where('id = :id',[':id' => $idsanpham])->one();
        $result = [
            'idsanpham' => $idsanpham,
            'soluong' => $soluong,
            'gia' => $model->giavtcn,
            'tiendo' => $tiendo,
        ];

        die(json_encode($result));
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
