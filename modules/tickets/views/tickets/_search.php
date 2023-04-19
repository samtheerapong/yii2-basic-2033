<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\tickets\models\TicketsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tickets-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'request_at') ?>

    <?= $form->field($model, 'tickets_type_id') ?>

    <?= $form->field($model, 'tickets_status_id') ?>

    <?= $form->field($model, 'request_sources_id') ?>

    <?php // echo $form->field($model, 'tickets_urgency_id') ?>

    <?php // echo $form->field($model, 'tickets_impact_id') ?>

    <?php // echo $form->field($model, 'tickets_priority_id') ?>

    <?php // echo $form->field($model, 'location_id') ?>

    <?php // echo $form->field($model, 'image') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
