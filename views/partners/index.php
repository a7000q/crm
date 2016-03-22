<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Контрагенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'inn',
            'name',
            [
                'label' => "Расчетные счета",
                'format' => 'raw',
                'value' => function($data){
                    return Html::a('Открыть', Url::toRoute(['bank-accounts/index', 'id' => $data->id]));
                }
            ],
            [
                'label' => "Прайс",
                'format' => 'raw',
                'value' => function($data){
                    return Html::a('Открыть', Url::toRoute(['prices/index', 'id' => $data->id]));
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
