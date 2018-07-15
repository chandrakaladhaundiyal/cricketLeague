<?php

/**
 * This is the model class for table "tbl_player_history".
 *
 * The followings are the available columns in table 'tbl_player_history':
 * @property integer $player_history_id
 * @property integer $player_id
 * @property integer $matches_played
 * @property integer $total_runs
 * @property integer $highest_score
 * @property integer $fifties
 * @property integer $hundreds
 * @property string $created_at
 * @property string $updated_at
 */
class PlayerHistory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_player_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('player_id, matches_played, total_runs, highest_score, fifties, hundreds, created_at', 'required'),
			array('player_id, matches_played, total_runs, highest_score, fifties, hundreds', 'numerical', 'integerOnly'=>true),
			array('updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('player_history_id, player_id, matches_played, total_runs, highest_score, fifties, hundreds, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'player_history_id' => 'Player History',
			'player_id' => 'Player',
			'matches_played' => 'Matches Played',
			'total_runs' => 'Total Runs',
			'highest_score' => 'Highest Score',
			'fifties' => 'Fifties',
			'hundreds' => 'Hundreds',
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

		$criteria->compare('player_history_id',$this->player_history_id);
		$criteria->compare('player_id',$this->player_id);
		$criteria->compare('matches_played',$this->matches_played);
		$criteria->compare('total_runs',$this->total_runs);
		$criteria->compare('highest_score',$this->highest_score);
		$criteria->compare('fifties',$this->fifties);
		$criteria->compare('hundreds',$this->hundreds);
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
	 * @return PlayerHistory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
