<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Recipe;

/**
 * RecipeSearch represents the model behind the search form of `common\models\Recipe`.
 */
class RecipeSearch extends Recipe
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recipe_id', 'recipe_picture', 'recipe_owner', 'recipe_category', 'recipe_album'], 'integer'],
            [['recipe_title', 'recipe_date', 'recipe_preparation'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Recipe::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'recipe_id' => $this->recipe_id,
            'recipe_picture' => $this->recipe_picture,
            'recipe_date' => $this->recipe_date,
            'recipe_owner' => $this->recipe_owner,
            'recipe_category' => $this->recipe_category,
            'recipe_album' => $this->recipe_album,
        ]);

        $query->andFilterWhere(['like', 'recipe_title', $this->recipe_title])
            ->andFilterWhere(['like', 'recipe_preparation', $this->recipe_preparation]);

        return $dataProvider;
    }

    public function searchCateogry($id, $params)
    {
        $query = Recipe::find()
          ->where('recipe_category = :id', [':id' => $id]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'recipe_id' => $this->recipe_id,
            'recipe_picture' => $this->recipe_picture,
            'recipe_date' => $this->recipe_date,
            'recipe_owner' => $this->recipe_owner,
            'recipe_category' => $this->recipe_category,
            'recipe_album' => $this->recipe_album,
        ]);

        $query->andFilterWhere(['like', 'recipe_title', $this->recipe_title])
            ->andFilterWhere(['like', 'recipe_preparation', $this->recipe_preparation]);

        return $dataProvider;
    }
}
