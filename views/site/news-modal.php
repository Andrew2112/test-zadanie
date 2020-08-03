<?php if (!empty($news)) :?>

    <div class="col-md-10 col-md-offset-1">
        <div class="news">
            <div class="title">
                <h3 class="text-center"><?=$news->title ; ?></h3>
                <h4><?=$news->author ; ?><small class="navbar-right date-news"><?=Yii::$app->formatter->asDate("{$news->created_at}", 'long');  ?></small></h4>
            </div>
            <div class="news-desription">
                <?=$news->post;?>


                <hr>
            </div>
        </div>
    </div>
<?php else: ?>
<h2>Такой новости нет</h2>
<?php endif; ?>
