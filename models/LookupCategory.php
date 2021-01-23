<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%csec_lookup_category}}".
 *
 * @property int $id
 * @property string $category_name
 *
 * @property CsecLookup[] $csecLookups
 */
class LookupCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%lookup_category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => 'Category Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCsecLookups()
    {
        return $this->hasMany(CsecLookup::className(), ['fk_category' => 'id']);
    }
    
    public static function getLookupCategoryID($category_name){
        $one = LookupCategory::findOne(['category_name'=>$category_name]);
        
        if($one){
            return $one->id;
        }
    }
    public static function getLookupCategoryName($category_id){
        $one = LookupCategory::findOne(['id'=>$category_id]);
        
        if($one){
            return $one->category_name;
        }
    }
    public static function getFilters(){
        $return = array();
        $categories = LookupCategory::find()->all();
        if($categories){
            foreach ($categories as $category){
                $return[$category->id] = $category->category_name;
            }
        }
        
        return $return;
    }
}
