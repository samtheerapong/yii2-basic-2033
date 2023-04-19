<?php

namespace app\modules\tickets\controllers;

use Yii;
use app\modules\tickets\models\Tasks;
use app\modules\tickets\models\Tickets;
use app\modules\tickets\models\TicketsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TicketsController implements the CRUD actions for Tickets model.
 */
class TicketsController extends Controller
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
     * Lists all Tickets models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TicketsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tickets model.
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
     * Creates a new Tickets model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelTickets = new Tickets();
        $modelTasks = new Tasks();
        
        $modelTickets->tickets_type_id = 1;
        $modelTickets->tickets_status_id = 1;
        $modelTickets->request_sources_id = 1;
        $modelTickets->tickets_urgency_id = 3;
        $modelTickets->tickets_impact_id = 3;
        $modelTickets->tickets_priority_id = 3;
        
        if ($modelTickets->load(Yii::$app->request->post()) 
            // && $modelTasks->load(Yii::$app->request->post()) 
            // && Model::validateMultiple([$modelTickets,$modelTasks])
            ) 

        {

            if($modelTickets->save()){
                $modelTasks->tickets_id = $modelTickets->id;
                $modelTasks->save();
              }
            return $this->redirect(['view', 'id' => $modelTickets->id]);
        }

        return $this->render('create', [
            'modelTickets' => $modelTickets,
            'modelTasks' => $modelTasks,
        ]);
    }

    /**
     * Updates an existing Tickets model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $modelTickets = $this->findModel($id);

        if ($modelTickets->load(Yii::$app->request->post()) && $modelTickets->save()) {
            return $this->redirect(['view', 'id' => $modelTickets->id]);
        }

        return $this->render('update', [
            'modelTickets' => $modelTickets,
        ]);
    }

    /**
     * Deletes an existing Tickets model.
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
     * Finds the Tickets model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tickets the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tickets::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
