<?php
require_once('/../../../yii/framework/test/CTestCase.php');
class MatchControllerTest extends CTestCase
{
    public function setUp() {
        // Import controller
        Yii::import('application.controllers.*');
    }
    public function testAdmin() {
        $controller = new MatchController('match');
       
        $this->assertTrue($controller!=null);
        $this->assertInstanceOf('MatchController', $controller);
        
        $controller->actionAdmin();
        $this->assertTrue($controller->viewData['model']!=null);
        $this->assertEquals('admin', $controller->viewId);
    }

    public function testLoadModel() {
        $controller = new MatchController('match');
        $testData = Match::model()->findByPk('2');
       
        $this->assertTrue($controller!=null);
        $this->assertInstanceOf('MatchController', $controller);
        
        $dataFromController = $controller->loadModel('2');
        $this->assertEquals($testData->match_id, $dataFromController->match_id);
        $this->assertEquals($testData->team1, $dataFromController->team1);
        $this->assertEquals($testData->team2, $dataFromController->team2);
        $this->assertEquals($testData->match_date, $dataFromController->match_date);
        $this->assertEquals($testData->match_status, $dataFromController->match_status);
        $this->assertEquals($testData->winner, $dataFromController->winner);
        $this->assertEquals($testData->score, $dataFromController->score);
        $this->assertEquals($testData->created_at, $dataFromController->created_at);
    }

    public function testCreate() {
        $controller = new MatchController('match');
        
        $this->assertTrue($controller!=null);
        $this->assertInstanceOf('MatchController', $controller);
        
        $controller->actionCreate();
        $this->assertTrue($controller->viewData['model']!=null);
        $this->assertEquals('create', $controller->viewId);
    }

    public function testUpdate() {
        $controller = new MatchController('match');
        
        $this->assertTrue($controller!=null);
        $this->assertInstanceOf('MatchController', $controller);
        
        $controller->actionUpdate('2');
        $this->assertTrue($controller->viewData['model']!=null);
        $this->assertEquals('update', $controller->viewId);
    }
}