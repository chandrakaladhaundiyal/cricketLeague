<?php

/**
 * This is the model class for table "tbl_match".
 *
 * The followings are the available columns in table 'tbl_match':
 * @property integer $match_id
 * @property integer $team1
 * @property integer $team2
 * @property string $match_status
 * @property integer $winner
 * @property integer $score
 * @property string $created_at
 * @property string $updated_at
 */
class Match extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'tbl_match';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('match_id', 'required'),
            array('match_id, team1, team2, winner, score', 'numerical', 'integerOnly'=>true),
            array('match_status', 'length', 'max'=>1),
            array('created_at, updated_at', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('match_id, team1, team2,match_date, match_status, winner, score, created_at, updated_at', 'safe', 'on'=>'search'),
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
            'team_first' => array(self::BELONGS_TO, 'Team', 'team1'),
            'team_second' => array(self::BELONGS_TO, 'Team', 'team2'),
            'winnerTeam' => array(self::BELONGS_TO, 'Team', 'winner'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'match_id' => 'Match',
            'team1' => 'Team1',
            'team2' => 'Team2',
            'match_status' => 'Match Status',
            'winner' => 'Winner',
            'score' => 'Score',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'Date Of Match' =>'match_date'
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

        $criteria->compare('match_id',$this->match_id);
        $criteria->compare('team1',$this->team1);
        $criteria->compare('team2',$this->team2);
        $criteria->compare('match_date',$this->match_date);
        $criteria->compare('match_status',$this->match_status,true);
        $criteria->compare('winner',$this->winner);
        $criteria->compare('score',$this->score);
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
     * @return TblMatchModel the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

     /**
     * Return winners
     * @param integer $team_id .
     * @return integer $total_score.
     */
    public static function getWinner($team_id)
    {
        $winner = '';
        try {
            if ($team_id != NULL) {
                $winner = Team::model()->winner->name;
            }
            $match_data = Match::model()->findAll(array('select'=>'score','condition'=>'winner = :team or match_status = :status','params' => array(':team' => $team_id,':status' => '0')));
            if (!empty($match_data)) {
                $total_score = array_sum(array_column($match_data,'score'));
            }
            return $total_score;
        } catch (Exception $ex) {
            return $total_score;
        }
    }
}
