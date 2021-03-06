<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tazrum.subforum".
 *
 * @property integer $id
 * @property string $name
 * @property string $desc
 * @property integer $category_id
 * @property integer $last_topic_id
 *
 * @property Topic $lastTopic
 * @property Category $category
 * @property Topic[] $topics
 */
class Subforum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tazrum.subforum';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc', 'category_id'], 'required'],
            [['desc'], 'string'],
            [['category_id', 'last_topic_id'], 'integer'],
            [['name'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Naam',
            'desc' => 'Omschrijving',
            'category_id' => 'Categorie',
            'last_topic_id' => 'Laatste topic',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLastTopic()
    {
        return $this->hasOne(Topic::className(), ['id' => 'last_topic_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopics()
    {
        return $this->hasMany(Topic::className(), ['subforum_id' => 'id']);
    }
}
