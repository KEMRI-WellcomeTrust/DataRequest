<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Progress]].
 *
 * @see Progress
 */
class ProgressQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Progress[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Progress|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
