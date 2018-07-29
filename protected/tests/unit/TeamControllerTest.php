<?php
require_once('/../../../yii/framework/test/CTestCase.php');
class TeamControllerTest extends CTestCase
{
    public function setUp() {
        // Import controller
        Yii::import('application.controllers.*');
    }
    public function testIndex() {
        $controller = new TeamController('team');
        
        $this->assertTrue($controller!=null);
        $this->assertInstanceOf('TeamController', $controller);
        
        $controller->actionIndex();
        $this->assertTrue($controller->viewData['model']!=null);
        $this->assertEquals('index', $controller->viewId);
    }

    public function testLoadModel() {
        $controller = new TeamController('team');
        $testData = Team::model()->findByPk('2');

        $this->assertTrue($controller!=null);
        $this->assertInstanceOf('TeamController', $controller);
        
        $dataFromController = $controller->loadModel('2');
        $this->assertEquals($testData->team_id, $dataFromController->team_id);
        $this->assertEquals($testData->name, $dataFromController->name);
        $this->assertEquals($testData->logo, $dataFromController->logo);
        $this->assertEquals($testData->club_state, $dataFromController->club_state);
        $this->assertEquals($testData->created_at, $dataFromController->created_at);
    }

    public function testCreate() {
        $controller = new TeamController('team');
        
        $this->assertTrue($controller!=null);
        $this->assertInstanceOf('TeamController', $controller);
        
        $controller->actionCreate();
        $this->assertTrue($controller->viewData['model']!=null);
        $this->assertEquals('create', $controller->viewId);
    }

    public function testUpdate() {
        $controller = new TeamController('team');
        
        $this->assertTrue($controller!=null);
        $this->assertInstanceOf('TeamController', $controller);
        
        $controller->actionUpdate('2');
        $this->assertTrue($controller->viewData['model']!=null);
        $this->assertEquals('update', $controller->viewId);
    }

    public function testFixtures() {
        $controller = new TeamController('team');
        
        $this->assertTrue($controller!=null);
        $this->assertInstanceOf('TeamController', $controller);
        
        $controller->actionFixtures();
        $this->assertTrue($controller->viewData['model']!=null);
        $this->assertEquals('fixtures', $controller->viewId);
    }
 
}