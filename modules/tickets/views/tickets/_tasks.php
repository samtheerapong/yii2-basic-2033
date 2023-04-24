<?php

use yii\helpers\Html;
use yii\grid\GridView;

use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\tickets\models\TasksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tasks');
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tickets_id',
            // 'started_at:date',
            [
                'attribute' => 'started_at',
                'format' => 'date',
                'value' => 'started_at',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'started_at',
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'autoclose' => true,
                    ]
                ])
            ],
            // 'finished_at:date',
            [
                'attribute' => 'finished_at',
                'format' => 'date',
                'value' => 'finished_at',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'finished_at',
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'autoclose' => true,
                    ]
                ])
            ],
            // 'details:ntext',
            'actor',
            'image:ntext',

        ],
    ]); ?>


</div>
