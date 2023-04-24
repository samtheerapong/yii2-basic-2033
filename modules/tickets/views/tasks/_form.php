<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use app\modules\tickets\models\Tickets;

/* @var $this yii\web\View */
/* @var $model app\modules\tickets\models\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tickets_id')->dropDownlist(ArrayHelper::map(Tickets::find()->all(), 'id', 'tickets_number'), ['prompt' => 'กรุณาเลือก ...',]) ?>

    <?= $form->field($model, 'started_at')->widget(
        DatePicker::class,
        [
            'language' => 'th',
            'options' => ['placeholder' => 'Select date ...'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true,
                'autoclose' => true,
            ]
        ]
    ); ?>

    <?= $form->field($model, 'finished_at')->widget(
        DatePicker::class,
        [
            'language' => 'th',
            'options' => ['placeholder' => 'Select date ...'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true,
                'autoclose' => true,
            ]
        ]
    ); ?>

    <?= $form->field($model, 'details')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'actor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>