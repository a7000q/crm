<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\ActiveForm;
use app\assets\UIConfirmationsAsset;
UIConfirmationsAsset::register($this); 
/* @var $this yii\web\View */
/* @var $model app\models\FuelModule */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Топливные модули', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuel-module-view">

    <h1><?= Html::encode($this->title) ?></h1>

   <p>
        <?php $form = ActiveForm::begin(['action' => ['delete', 'id' => $model->id],  'enableClientValidation' => false]); ?>
            <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <button class="btn btn-danger" data-toggle="confirmation" data-original-title="Вы уверены что хотите удалить данный элемент?" title="">Удалить</button>
            <?= Html::a('Секции', ['fuel-module-sections/index', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?php ActiveForm::end(); ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'address'
        ],
    ]) ?>

</div>