<?php

use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
mihaildev\elfinder\Assets::noConflict($this);
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>

<!--    --><?//= $form->field($model, 'post')->textarea(['rows' => 6]) ?>
<!--    --><?//=$form->field($model, 'post')->widget(CKEditor::class,[
//        'editorOptions' => [
//            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
//            'inline' => false, //по умолчанию false
//        ], ]); ?>
    <?=$form->field($model, 'post')->widget(CKEditor::class, [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[]),
    ]) ?>


    <?= $form->field($model, 'visible')->checkbox([
        'template' => '<div class="col-md-1">{label}</div><div class="col-md-5">{input}</div><div class="col-md-6">{error}</div>'
    ])?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
