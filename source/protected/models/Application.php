<?php

/**
 * This is the model class for table "tbl_application".
 *
 * The followings are the available columns in table 'tbl_application':
 * @property integer $app_id
 * @property string $name
 * @property string $code
 * @property string $summary
 * @property string $category
 * @property string $rating
 * @property integer $ndownloads
 * @property string $logo
 * @property string $platform
 * @property string $device
 *
 * The followings are the available model relations:
 * @property Category $category0
 */
class Application extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_application';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, code, summary, category, ndownloads, logo, platform, device', 'required'),
			array('ndownloads', 'numerical', 'integerOnly'=>true),
			array('name, code, summary, logo, platform, device', 'length', 'max'=>128),
			array('category, rating', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('app_id, name, code, summary, category, rating, ndownloads, logo, platform, device', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'category0' => array(self::BELONGS_TO, 'Category', 'category'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'app_id' => 'App',
			'name' => 'Name',
			'code' => 'Code',
			'summary' => 'Summary',
			'category' => 'Category',
			'rating' => 'Rating',
			'ndownloads' => 'Ndownloads',
			'logo' => 'Logo',
			'platform' => 'Platform',
			'device' => 'Device',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('app_id',$this->app_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('rating',$this->rating,true);
		$criteria->compare('ndownloads',$this->ndownloads);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('platform',$this->platform,true);
		$criteria->compare('device',$this->device,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Application the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
