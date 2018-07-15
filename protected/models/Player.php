<?php

/**
 * This is the model class for table "tbl_player".
 *
 * The followings are the available columns in table 'tbl_player':
 * @property integer $player_id
 * @property integer $team_id
 * @property string $first_name
 * @property string $last_name
 * @property string $image
 * @property integer $jersey_number
 * @property string $country
 * @property string $created_at
 * @property string $updated_at
 */
class Player extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'tbl_player';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('team_id, first_name, last_name, image, jersey_number, country, created_at', 'required'),
            array('team_id, jersey_number', 'numerical', 'integerOnly'=>true),
            array('first_name, last_name, image, country', 'length', 'max'=>200),
            array('updated_at', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('player_id, team_id, first_name, last_name, image, jersey_number, country, created_at, updated_at', 'safe', 'on'=>'search'),
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
            'team'    => array(self::BELONGS_TO, 'Team',    'team_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'player_id' => 'Player',
            'team_id' => 'Team',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'image' => 'Image',
            'jersey_number' => 'Jersey Number',
            'country' => 'Country',
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
    public function search($id='')
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('player_id',$this->player_id);
        $criteria->compare('team_id',$this->team_id);
        $criteria->compare('first_name',$this->first_name,true);
        $criteria->compare('last_name',$this->last_name,true);
        $criteria->compare('image',$this->image,true);
        $criteria->compare('jersey_number',$this->jersey_number);
        $criteria->compare('country',$this->country,true);
        $criteria->compare('created_at',$this->created_at,true);
        $criteria->compare('updated_at',$this->updated_at,true);

        if ($id != '') {
            $criteria->AddCondition('team_id='.$id);
        }

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>5
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Player the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * Returns Player's full name  with image.
     * @return string
     */
    public function playerNameImage()
    {
        return $this->first_name . ' ' . $this->last_name ; 
    }

}
