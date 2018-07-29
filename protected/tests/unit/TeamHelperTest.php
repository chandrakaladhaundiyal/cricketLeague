<?php
require_once('/../../../yii/framework/test/CTestCase.php');
class TeamHelperTest extends CTestCase
{
   
    public function setUp() 
    {
        parent::setUp();
        // Import components
        Yii::import('application.components.*');
    }

    public function testGetTeamListHtml() 
    {
       
        $testData = $this->getTeamListTestData('2');

        $dataFromHelper = TeamHelper::getTeamListHtml('2');

        $this->assertEquals($testData, $dataFromHelper);
    }

    public function testGetWinnerListHtml() 
    {
        $teamArray = array('2','3');
        $testData = $this->getWinnerListTestData($teamArray);

        $dataFromHelper = TeamHelper::getWinnerListHtml($teamArray);

        $this->assertEquals($testData, $dataFromHelper);
    }

    private function getTeamListTestData($team_id) 
    {
        $teamList = Team::model()->findAll(array('condition'=>'team_id != :team_id','params'=>array(':team_id'=>$team_id),'order'=>'Name ASC'));
        $teamList=CHtml::listData($teamList,'team_id','name');
        
       $team2 = "<option value=''>Select Team2</option>";
       foreach($teamList as $key=>$val)
       $team2 .= CHtml::tag('option', array('value'=>$key),CHtml::encode($val),true);

        $winner = "<option value=''>Select Winner</option>";
        return CJSON::encode(array(
          'team2'=>$team2,
          'winner'=>$winner
        ));
    }

    private function getWinnerListTestData($teamArray) 
    {
        
        $teamList = implode(',',$teamArray);
        $teamList = rtrim($teamList,',');
        $teamWinnerList = Team::model()->findAll(array('condition'=>"team_id in ($teamList)",'order'=>'Name ASC'));
        $teamWinnerList=CHtml::listData($teamWinnerList,'team_id','name');
        
        $html = "<option value=''>Select Winner</option>";
        foreach($teamWinnerList as $key=>$val)
           $html .= CHtml::tag('option', array('value'=>$key),CHtml::encode($val),true);

        return $html;
    }

          
}