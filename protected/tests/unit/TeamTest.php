<?php
require_once('/CommonTestCases.php');

class TeamTest extends CommonTestCases
{
    protected function setUp()
    {
        parent::setUp();
        $_GET['team_id'] = '1';
        $_GET['name'] = "Chennai Super King";
    }

    private function statusFunc($status){
        $match =new Match();
        return $match->getMatchStatus($status);
    }

    /* Test Cases starting here */

    /* Test Total Matches played */
    function testGetTotalMatch(){

        $Matches = $this->executeQuery('select match_id from tbl_match where team1='.$_GET['team_id'].' OR team2='.$_GET['team_id']);
        $TeamCount = count($Matches);

        $team = new Team();

        $this->assertEquals($TeamCount,$team->getTotalMatch($_GET['team_id']));
    }

    function testGetTotalScore(){
        $match_data = $this->executeQuery('select score from tbl_match where (team1='.$_GET['team_id'].' OR team2='.$_GET['team_id'].') AND( winner = '.$_GET['team_id'].' OR winner is NULL )');

        $total_score = array_sum(array_column($match_data,'score'));       

        $team = new Team();
        $GetScore  = $team->getTotalScore($_GET['team_id'],'Y');

        $this->assertEquals($total_score,$GetScore);   
    }

    function testGetTotalWon(){
        $Matches = $this->executeQuery('select winner from tbl_match where winner='.$_GET['team_id']);
        $TeamCount = count($Matches);

        $team = new Team();

        $this->assertEquals($TeamCount,$team->getTotalWon($_GET['team_id']));  
    }
    
    function testGetTotalLost(){
        $Matches = $this->executeQuery('select winner from tbl_match where (team1='.$_GET['team_id'].' OR team2='.$_GET['team_id'].') AND winner !='.$_GET['team_id']);
        $TeamCount = count($Matches);

        $team = new Team();

        $this->assertEquals($TeamCount,$team->getTotalLost($_GET['team_id']));  
    }

    function testGetTotalTie(){
        $Matches = $this->executeQuery('select winner from tbl_match where (team1='.$_GET['team_id'].' OR team2='.$_GET['team_id'].') AND(winner is NULL )');
        $TeamCount = count($Matches);

        $team = new Team();

        $this->assertEquals($TeamCount,$team->getTotalTie($_GET['team_id']));  
    }

    function testCheckTeamExist(){
        $team = new Team();
        $this->assertFalse($team->checkTeamExist($_GET['name']));
    }

    /* To check match status */
    function testGetMatchStatus(){
        $this->assertEquals('Completed',$this->statusFunc(1));
        $this->assertEquals('Tie',$this->statusFunc(0));
    }

    /* test search with team value passed*/
    function testSearch(){
        //Scenario 1
        $teams = $this->getTableArray('select * from tbl_team where name like "%'.$_GET['name'].'%" order by team_id DESC','name');

        $team = new Team('search');
        $team->name = $_GET['name'];
        $teamData = $team->search()->getData();
        $team = $this->getModelArray($teamData,'name');

        $this->assertEquals($teams,$team);
    } 
}