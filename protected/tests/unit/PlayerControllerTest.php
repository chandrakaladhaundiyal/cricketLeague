<?php
require_once('/../../../yii/framework/test/CTestCase.php');
class PlayerControllerTest extends CTestCase
{
    public function setUp() {
        // Import controller
        Yii::import('application.controllers.*');
    }
    public function testAdmin() {
        $controller = new PlayerController('player');
        
        $this->assertTrue($controller!=null);
        $this->assertInstanceOf('PlayerController', $controller);
        
        $controller->actionAdmin();
        $this->assertTrue($controller->viewData['model']!=null);
        $this->assertEquals('admin', $controller->viewId);
    }

    public function testLoadModel() {
        $controller = new PlayerController('player');
        $testData = Player::model()->findByPk('2');
        
        $this->assertTrue($controller!=null);
        $this->assertInstanceOf('PlayerController', $controller);
        
        $dataFromController = $controller->loadModel('2');
        $this->assertEquals($testData->player_id, $dataFromController->player_id);
        $this->assertEquals($testData->team_id, $dataFromController->team_id);
        $this->assertEquals($testData->first_name, $dataFromController->first_name);
        $this->assertEquals($testData->last_name, $dataFromController->last_name);
        $this->assertEquals($testData->image, $dataFromController->image);
        $this->assertEquals($testData->country, $dataFromController->country);
        $this->assertEquals($testData->jersey_number, $dataFromController->jersey_number);
    }

    public function testCreate() {
        $controller = new PlayerController('player');
        
        $this->assertTrue($controller!=null);
        $this->assertInstanceOf('PlayerController', $controller);
        
        $controller->actionCreate();
        $this->assertTrue($controller->viewData['model']!=null);
        $this->assertEquals('create', $controller->viewId);
    }

    public function testUpdate() {
        $controller = new PlayerController('player');
        
        $this->assertTrue($controller!=null);
        $this->assertInstanceOf('PlayerController', $controller);
        
        $controller->actionUpdate('2');
        $this->assertTrue($controller->viewData['model']!=null);
        $this->assertEquals('update', $controller->viewId);
    }

}