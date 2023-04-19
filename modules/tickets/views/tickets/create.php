<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\tickets\models\Tickets */

$this->title = Yii::t('app', 'Create Tickets');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tickets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tickets-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelTickets' => $modelTickets,
        'modelTasks' => $modelTasks,
    ]) ?>

</div>
