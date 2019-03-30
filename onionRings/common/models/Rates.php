<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rates".
 *
 * @property int $rate_id
 * @property int $rate
 * @property int $rate_owner
 * @property int $rate_recipe
 *
 * @property Recipe $rateRecipe
 * @property Member $rateOwner
 */
class Rates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rate', 'rate_owner', 'rate_recipe'], 'required'],
            [['rate', 'rate_owner', 'rate_recipe'], 'integer'],
            [['rate_owner', 'rate_recipe'], 'unique', 'targetAttribute' => ['rate_owner', 'rate_recipe']],
            [['rate_recipe'], 'exist', 'skipOnError' => true, 'targetClass' => Recipe::className(), 'targetAttribute' => ['rate_recipe' => 'recipe_id']],
            [['rate_owner'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['rate_owner' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rate_id' => 'Rate ID',
            'rate' => 'Rate',
            'rate_owner' => 'Rate Owner',
            'rate_recipe' => 'Rate Recipe',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRateRecipe()
    {
        return $this->hasOne(Recipe::className(), ['recipe_id' => 'rate_recipe']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRateOwner()
    {
        return $this->hasOne(Member::className(), ['id' => 'rate_owner']);
    }

    public function getId($model) {
        $data = Rates::find()
        ->where('rate_owner = :owner && rate_recipe = :recipe',
            [
                ':owner' => $model->rate_owner,
                ':recipe' => $model->rate_recipe
            ])
        ->one();
        return $data->rate_id;
    }

    /**
     * {@inheritdoc}
     * @return RatesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RatesQuery(get_called_class());
    }
}
