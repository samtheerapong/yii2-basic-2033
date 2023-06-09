<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

//use models
use app\modules\tickets\models\TicketsType;
use app\modules\tickets\models\Location;
use app\modules\tickets\models\TicketsStatus;
use app\modules\tickets\models\RequestSources;
use app\modules\tickets\models\TicketsUrgency;
use app\modules\tickets\models\TicketsImpact;
use app\modules\tickets\models\TicketsPriority;


/* @var $this yii\web\View */
/* @var $model app\modules\tickets\models\Tickets */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tickets-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelTickets, 'request_at')->widget(
        DatePicker::class, [
        'language' => 'th',
        'options' => ['placeholder' => 'Select date ...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'autoclose' => true,
        ]
    ]
    ); ?>

    <?= $form->field($modelTickets, 'tickets_type_id')->dropDownlist(ArrayHelper::map(TicketsType::find()->all(), 'id', 'tickets_type'), ['prompt' => 'กรุณาเลือก ...',]) ?>

    <?= $form->field($modelTickets, 'tickets_status_id')->dropDownlist(ArrayHelper::map(TicketsStatus::find()->all(), 'id', 'tickets_status'), ['prompt' => 'กรุณาเลือก ...',]) ?>

    <?= $form->field($modelTickets, 'request_sources_id')->dropDownlist(ArrayHelper::map(RequestSources::find()->all(), 'id', 'request_sources'), ['prompt' => 'กรุณาเลือก ...',]) ?>

    <?= $form->field($modelTickets, 'tickets_urgency_id')->dropDownlist(ArrayHelper::map(TicketsUrgency::find()->all(), 'id', 'tickets_urgency'), ['prompt' => 'กรุณาเลือก ...',]) ?>

    <?= $form->field($modelTickets, 'tickets_impact_id')->dropDownlist(ArrayHelper::map(TicketsImpact::find()->all(), 'id', 'tickets_impact'), ['prompt' => 'กรุณาเลือก ...',]) ?>

    <?= $form->field($modelTickets, 'tickets_priority_id')->dropDownlist(ArrayHelper::map(TicketsPriority::find()->all(), 'id', 'tickets_priority'), ['prompt' => 'กรุณาเลือก ...',]) ?>

    <?= $form->field($modelTickets, 'location_id')->dropDownlist(ArrayHelper::map(Location::find()->all(), 'id', 'location'), ['prompt' => 'กรุณาเลือก ...',]) ?>

    <?= $form->field($modelTickets, 'image')->textarea(['rows' => 3]) ?>

    <!-- Tasks -->
    <?php //echo $form->field($modelTasks, 'started_at')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($modelTasks, 'finished_at')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($modelTasks, 'details')->textarea(['rows' => 3]) ?>

    <?php //echo $form->field($modelTasks, 'actor')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($modelTasks, 'image')->textarea(['rows' => 3]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>