<?php
require_once('/CommonTestCases.php');

class PlayerTest extends CommonTestCases
{
    protected function setUp()
    {
        parent::setUp();
        $_GET['team_id'] = '1';
        $_GET['first_name'] = 'David';

    }


    /* Test Cases starting here */

    /* get Team name */
    function testGetTeamName(){
        $Matches = $this->executeQuery('select name from tbl_team where team_id='.$_GET['team_id']);
        $teamName =  isset($Matches[0]['name'])?$Matches[0]['name']:'';

        $player = new Player();

        $this->assertEquals($teamName,$player->getTeamName($_GET['team_id']));
    }

   

    /* test search with player value passed*/
    function testSearch(){
        //Scenario 1
        $players = $this->getTableArray('select * from tbl_player where first_name like "%'.$_GET['first_name'].'%" order by team_id DESC','first_name');

        $player = new Player('search');
        $player->first_name = $_GET['first_name'];
        $playerData = $player->search()->getData();
        $player = $this->getModelArray($playerData,'first_name');

        $this->assertEquals($players,$player);
    } 
}