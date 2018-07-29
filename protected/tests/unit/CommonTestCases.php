<?php
require_once('/../../../yii/framework/test/CDbTestCase.php');

class CommonTestCases extends CTestCase{

    public function executeQuery($sql){
        $db = Yii::app()->db->pdoInstance;
        $query = $db->query($sql);
        $fetchAll = $query->fetchAll();
        return $fetchAll;

    }

    public function getTableArray($sql, $keyName = ''){
        $db = Yii::app()->db->pdoInstance;
        $query = $db->query($sql);
        $fetchAll = $query->fetchAll();

        $arr = array();
        $varr = array();

        foreach($fetchAll as $k1=>$u){
            foreach($u as $k=>$v){
                if(!is_numeric($k))
                    $varr[$k] = $v; 
            }

            $arr[$k1] = $varr;
            unset($varr);
        }

        return $arr;
    }

    public function getModelArray($model, $keyName = ''){

        $ar = array();
        $varr = array();
        foreach($model as $k=>$t){
            $varr = $t->attributes;
            $ar[$k] = $varr;
            unset($varr);
        }
        
        return $ar;
    }
}