<?php

/**
 * This is the model class for table "tbl_team".
 *
 * The followings are the available columns in table 'tbl_team':
 * @property integer $team_id
 * @property string $name
 * @property string $logo
 * @property string $club_state
 * @property string $created_at
 * @property string $updated_at
 */
class Team extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'tbl_team';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, logo, club_state, created_at', 'required'),
            array('name, logo', 'length', 'max'=>200),
            array('club_state', 'length', 'max'=>500),
            array('updated_at', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('team_id, name, logo, club_state, created_at, updated_at', 'safe', 'on'=>'search'),
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
            'team_id' => 'Team',
            'name' => 'Name',
            'logo' => 'Logo',
            'club_state' => 'Club State',
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

        $criteria->compare('team_id',$this->team_id);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('logo',$this->logo,true);
        $criteria->compare('club_state',$this->club_state,true);
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
     * @return Team the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * Return total number of matches played by each team
     * @param integer $team_id .
     * @return integer count of matches 
     */
    public static function getTotalMatch($team_id)
    {
        try {
            $match_data = Match::model()->findAll(array('select'=>'match_id','condition'=>'team1 = :team1 or team2 = :team1','params' => array(':team1' => $team_id)));
            return count($match_data);
        } catch (Exception $ex) {
            return 0;
        }
          
    }
    /**
     * Return total score of team
     * @param integer $team_id .
     * @return integer $total_score.
     */
    public static function getTotalScore($team_id)
    {
        $total_score = 0;
        try {
            $match_data = Match::model()->findAll(array('select'=>'score','condition'=>'(team1 = :team_first or team2 = :team_second) and (winner = :winnerTeam or winner is :tie) ','params' => array(':team_first' => $team_id,'team_second' => $team_id, 'winnerTeam' => $team_id , "tie" => NULL)));
            if (!empty($match_data)) {
                $total_score = array_sum(array_column($match_data,'score'));
            }
            return $total_score;
        } catch (Exception $ex) {
            return $total_score;
        }
    }

    /**
     * Return total Won
     * @param integer $team_id .
     * @return integer won count.
     */
    public static function getTotalWon($team_id)
    {
        try {
            $match_data = Match::model()->findAll(array('select'=>'winner','condition'=>'winner = :team','params' => array(':team' => $team_id)));
            return count($match_data);
        } catch (Exception $ex) {
            return 0;
        }
    }

    /**
     * Return total lost
     * @param integer $team_id .
     * @return integer lost count.
     */
    public static function getTotalLost($team_id)
    {
        try {
            $match_data = Match::model()->findAll(array('select'=>'winner','condition'=>'(team2 = :team_second or team1 = :team_first) and (winner != :matchWinner) ','params' => array(':team_second' => $team_id,':team_first' => $team_id,':matchWinner' => $team_id)));
            return count($match_data);
        } catch (Exception $ex) {
            return 0;
        }
    }

    /**
     * Return total lost
     * @param integer $team_id .
     * @return integer lost count.
     */
    public static function getTotalTie($team_id)
    {
        try {
            $match_data = Match::model()->findAll(array('select'=>'winner','condition'=>'(team2 = :team_second or team1 = :team_first) and (winner is :matchWinner) ','params' => array(':team_second' => $team_id,':team_first' => $team_id,':matchWinner' => NULL)));
            return count($match_data);
        } catch (Exception $ex) {
            return 0;
        }
    }
}
