<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
// Use Models
use app\modules\tickets\models\TicketsType;
use app\modules\tickets\models\TicketsStatus;
use app\modules\tickets\models\RequestSources;
use app\modules\tickets\models\Location;
use app\modules\tickets\models\TasksSearch;
use app\modules\tickets\models\User;
use app\modules\tickets\models\TicketsImpact;
use app\modules\tickets\models\Profile;
use app\modules\tickets\models\TicketsUrgency;

//
use kartik\date\DatePicker;
use yii\web\Request;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\tickets\models\TicketsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ticket');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tickets-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Tickets'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'kartik\grid\ExpandRowColumn',   //https://youtu.be/7u0p8fKriy0
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model, $key, $index, $column) {
                    $searchModel = new TasksSearch();
                    $searchModel->tickets_id = $model->id;
                    $dataProvider =  $searchModel->search(Yii::$app->request->queryParams);


                    return Yii::$app->controller->renderPartial('_tasks', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);
                },
            ],
            // 'id',
            'tickets_number',
            // 'request_by',
            [
                'attribute' => 'request_by',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->requester->profile->name;
                },
                // 'filter' => Html::activeDropDownList($searchModel,'id',ArrayHelper::map(Profile::find()->all(), 'id', 'name'),['class' => 'form-control', 'prompt' => 'ทั้งหมด']),
            ],
            [
                'attribute' => 'request_at',
                'format' => 'date',
                'value' => 'request_at',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'request_at',
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'autoclose' => true,
                    ]
                ])
            ],
            [
                'attribute' => 'location_id',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->location->location;
                },
                'filter' => Html::activeDropDownList($searchModel, 'location_id', ArrayHelper::map(Location::find()->all(), 'id', 'location'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
            ],
            [
                'attribute' => 'tickets_type_id',
                'format' => 'html',
                'value' => function ($model) {
                    // return '<span class="badge" style="background-color:' . $model->ticketsType->color . ';"><b>' . $model->ticketsType->tickets_type . '</b></span>';
                    return $model->ticketsType->tickets_type;
                },
                'filter' => Html::activeDropDownList($searchModel, 'tickets_type_id', ArrayHelper::map(TicketsType::find()->all(), 'id', 'tickets_type'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
            ],
            [
                'attribute' => 'tickets_urgency_id',
                'format' => 'html',
                'value' => function ($model) {
                    // return '<span class="badge" style="background-color:' . $model->ticketsUrgency->color . ';"><b>' . $model->ticketsUrgency->tickets_urgency . '</b></span>';
                    return '<span style="color:' . $model->ticketsUrgency->color . ';"><b>' . $model->ticketsUrgency->tickets_urgency . '</b></span>';
                },
                'filter' => Html::activeDropDownList($searchModel, 'tickets_urgency_id', ArrayHelper::map(TicketsUrgency::find()->all(), 'id', 'tickets_urgency'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
            ],
            [
                'attribute' => 'tickets_status_id',
                'format' => 'html',
                'value' => function ($model) {
                    return '<span class="badge" style="background-color:' . $model->ticketsStatus->color . ';"><b>' . $model->ticketsStatus->tickets_status . '</b></span>';
                },
                'filter' => Html::activeDropDownList($searchModel, 'tickets_status_id', ArrayHelper::map(TicketsStatus::find()->all(), 'id', 'tickets_status'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
            ],
            // 'updated_by',
            // ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'kartik\grid\ActionColumn',
                'options' => ['style' => 'width:120px;'],
                'buttonOptions' => ['class' => 'btn btn-default'],
                'template' => '<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete}</div>'
            ],
        ],
    ]); ?>


</div>