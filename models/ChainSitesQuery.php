<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ChainSites]].
 *
 * @see ChainSites
 */
class ChainSitesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ChainSites[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ChainSites|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
