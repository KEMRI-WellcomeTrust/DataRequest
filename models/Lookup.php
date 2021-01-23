<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%csec_lookup}}".
 *
 * @property int $id
 * @property int $fk_category
 * @property int $key
 * @property string $value
 *
 * @property CsecLookupCategory $fkCategory
 */
class Lookup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%lookup}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_category', 'key'], 'integer'],
            [['value'], 'string'],
            [['fk_category'], 'exist', 'skipOnError' => true, 'targetClass' => LookupCategory::className(), 'targetAttribute' => ['fk_category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fk_category' => 'Fk Category',
            'key' => 'Key',
            'value' => 'Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkCategory()
    {
        return $this->hasOne(LookupCategory::className(), ['id' => 'fk_category']);
    }
    
    public function beforeSave($insert){
        //get the last key of this category and increment by one.
        if($this->isNewRecord){
            $keyModel = $this->find()->where(['fk_category'=>$this->fk_category])->orderBy("id DESC")->one();
            if($keyModel){
                $this->key = $keyModel->key + 1;
            }
            else{
                $this->key = 1;
            }
        }
        
        
        if($this->hasErrors()){
            return false;
        }
        else{
            return true;
        }
    }
    
    public static function getValueFromVar($field, $_key){
        $category_id = Self::getLookupFromVar($field);
        if($category_id){
            return Self::getLookupCategoryValue($category_id, $_key);
        }
    }
    public static function getValue($category_name, $_key){
        $category_id = Self::getLookup($category_name);
        if($category_id){
            return Self::getLookupCategoryValue($category_id, $_key);
        }
    }
    
    public static function getLookupFromVar($field){
        $category = LookupCategory::findOne(['field'=>$field]);
        if($category){
            return $category->id;
        }
        
    }
    public static function getLookup($category_name){
        $category = LookupCategory::findOne(['category_name'=>$category_name]);
        if($category){
            return $category->id;
        }
    }
    
    public static function getLookupValues($category_name){
        
        $category = LookupCategory::findOne(['category_name'=>$category_name]);
        if($category){
            return Lookup::find()->where(['fk_category' =>$category->id])->select(['value', 'key'])->indexBy('key')->column();
        }
       
    }
    
    public static function getLookupCategoryValue($category_id, $_key){
        
        $one = Lookup::findOne(['fk_category'=>$category_id,'key'=>$_key]);
        
        if($one){
            return $one->value;
        }
        
    }
    public static function getLookupCategoryID($category_id, $_key){
        
        $one = Lookup::findOne(['fk_category'=>$category_id,'key'=>$_key]);
        
        if($one){
            return $one->id;
        }
        
    }
}
