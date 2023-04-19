<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\tickets\models\Tickets */

$this->title = Yii::t('app', 'Update Tickets: {name}', [
    'name' => $modelTickets->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tickets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelTickets->id, 'url' => ['view', 'id' => $modelTickets->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tickets-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelTickets' => $modelTickets,
    ]) ?>

</div>
