<?php
require_once('/CommonTestCases.php');

class MatchTest extends CommonTestCases
{
    protected function setUp()
    {
        parent::setUp();
        $_GET['team1'] = '1';
    }

    private function statusFunc($status){
        $match =new Match();
        return $match->getMatchStatus($status);
    }

    /* Test Cases starting here */

    /* To check match status */
    function testGetMatchStatus(){
        $this->assertEquals('Completed',$this->statusFunc(1));
        $this->assertEquals('Tie',$this->statusFunc(0));
    }

    /* test search with team1 value passed*/
    function testSearch(){
        $matches1 = $this->getTableArray('select * from tbl_match where team1 like "%'.$_GET['team1'].'%" order by match_id DESC','team1');
        $match1 = new Match('search');
        $match1->team1 = $_GET['team1'];
        $matchData1 = $match1->search()->getData();
        $match1 = $this->getModelArray($matchData1,'team1');

        $this->assertEquals($matches1,$match1);
    } 
}