<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить новость', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'author',
            'created_at',
            'updated_at',
            //'visible',

            //'post:ntext',
            [
                'attribute' => 'visible',
                'value' => function ($data) {
                    return !$data->visible ? '<span class="text-danger">Новость не показана на сайте</span>' : '<span class="text-success">Новость показана на сайте</span>';

                },
                'format'=>'raw',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
