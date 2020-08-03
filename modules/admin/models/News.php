<?php

namespace app\modules\admin\models;

use yii\behaviors\TimestampBehavior;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $author
 * @property string $created_at
 * @property string $post
 */
class News extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                 'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'post'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['post'], 'string'],
            [['title', 'author'], 'string', 'max' => 255],
            [['author'], 'default', 'value'=>'Администрация БМИТ'],
            [['visible'], 'boolean'],
            [['visible'], 'default', 'value'=>'1'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название новости',
            'author' => 'Автор',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата изменения',
            'post' => 'Новость',
            'visible'=>'Показывать новость на сайте'
        ];
    }
}
