<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DataRequest]].
 *
 * @see DataRequest
 */
class DataRequestQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DataRequest[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DataRequest|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
