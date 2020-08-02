<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>

<button class="btn btn-info hide-news">Скрыть новости</button>
<button class="btn btn-info show-news">Показать новости</button>
    <div class="row">

        <div class="col-md-4 news-border">
            <h3 class="text-center"><?= Html::encode($this->title) ?></h3>
            <div class="news-column">
                <?php if (!empty($news)): ?>
                    <?php foreach ($news as $item) :?>


                <div class="news">
                    <div class="title">
                        <h3 class="text-center"><?=$item->title ; ?></h3>
                        <h4><?=$item->author ; ?><small class="navbar-right date-news"><?=Yii::$app->formatter->asDate("{$item->created_at}", 'php:m.d.Y');  ?></small></h4>
                    </div>
                    <div class="news-desription">
                        <?php $str=preg_replace('/<img[^>]+>/U','',$item->post)?>
                        <?=mb_strimwidth("{$str}", 0, 255, "...");?>

                        <a href="<?=\yii\helpers\Url::to(['site/view', 'id'=>$item->id])?>" target="_blank">Читать дальше</a>
                        <hr>
                    </div>
                </div>

                <?php endforeach;?>
                <div class="text-center">
                    <?=LinkPager::widget([
                        'pagination' => $pages,
                    ]);?>
                </div>
                <?php else: ?>
                    <h3 class="text-center">Новостей пока нет</h3>
                <?php endif; ?>
<!--                <button class="btn btn-info hide-news">Скрыть новости</button>-->
            </div>
        </div>
        <div class="col-md-8 content">
            <h3 class="text-center">Какой-то контент</h3>
            <button class="btn btn-info show-news">Показать новости</button>
        </div>
    </div>



