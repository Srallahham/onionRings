<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Picture;

/**
 * PictureSearch represents the model behind the search form of `common\models\Picture`.
 */
class PictureSearch extends Picture
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['picture_id', 'picture_album'], 'integer'],
            [['picture_title', 'picture_path'], 'safe'],
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
        $query = Picture::find();

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
            'picture_id' => $this->picture_id,
            'picture_album' => $this->picture_album,
        ]);

        $query->andFilterWhere(['like', 'picture_title', $this->picture_title])
            ->andFilterWhere(['like', 'picture_path', $this->picture_path]);

        return $dataProvider;
    }
}
