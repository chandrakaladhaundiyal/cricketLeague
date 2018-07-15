<?php

/**
 * This is the model class for table "tbl_tournament".
 *
 * The followings are the available columns in table 'tbl_tournament':
 * @property integer $tounament_id
 * @property string $name
 * @property integer $total_matches
 * @property string $start_date
 * @property string $end_date
 * @property string $created_at
 * @property string $updated_at
 */
class Tournament extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_tournament';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('total_matches', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>200),
			array('start_date, end_date, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tounament_id, name, total_matches, start_date, end_date, created_at, updated_at', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tounament_id' => 'Tounament',
			'name' => 'Name',
			'total_matches' => 'Total Matches',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
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

		$criteria->compare('tounament_id',$this->tounament_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('total_matches',$this->total_matches);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tournament the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
