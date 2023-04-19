<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\tickets\models\Tickets */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tickets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tickets-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'tickets_number',
            [
                'attribute' => 'tickets_status_id',
                'format' => 'html',
                'value' => function ($model) {
                    return '<span class="badge" style="background-color:' . $model->ticketsStatus->color . ';"><b>' . $model->ticketsStatus->tickets_status . '</b></span>';
                },
            ],
            // 'request_by',
            [ 
                'attribute' => 'request_by', 
                'value' => $model->requester->profile->name, 
            ], 
            'request_at:date',
            [
                'attribute' => 'request_sources_id',
                'format' => 'html',
                'value' => function ($model) {
                    return '<span style="color:' . $model->requestSources->color . ';">' . $model->requestSources->request_sources . '</span>';
                },
            ],
            [
                'attribute' => 'tickets_type_id',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->ticketsType->tickets_type;
                },
            ],
            [
                'attribute' => 'tickets_urgency_id',
                'format' => 'html',
                'value' => function ($model) {
                    return '<span style="color:' . $model->ticketsUrgency->color . ';">' . $model->ticketsUrgency->tickets_urgency . '</span>';
                },
            ],
            // 'tickets_impact_id',
            [
                'attribute' => 'tickets_impact_id',
                'format' => 'html',
                'value' => function ($model) {
                    return '<span style="color:' . $model->ticketsImpact->color . ';">' . $model->ticketsImpact->tickets_impact . '</span>';
                },
            ],
            // 'tickets_priority_id',
            [
                'attribute' => 'tickets_priority_id',
                'format' => 'html',
                'value' => function ($model) {
                    return '<span style="color:' . $model->ticketsPriority->color . ';">' . $model->ticketsPriority->tickets_priority . '</span>';
                },
            ],
            // 'location_id',
            [
                'attribute' => 'location_id',
                'format' => 'html',
                'value' => function ($model) {
                    return '<span style="color:' . $model->location->color . ';">' . $model->location->location . '</span>';
                },
            ],
            // 'updated_by',
            [ 
                'attribute' => 'updated_by', 
                'value' => $model->updater->profile->name, 
            ], 
            'created_at:date',
            'updated_at:date',
            'image:ntext',
        ],
    ]) ?>

</div>
