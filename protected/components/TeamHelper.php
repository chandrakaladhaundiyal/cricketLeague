<?php

class TeamHelper 
{

	public static function uploadImage($model,$name,$type) 
	{
		$check = '';
		$folder_name = '';
		$time = time();
		if ($type == 'image') {
			$folder_name = 'player_images/';
		}
		$uploadedFile=CUploadedFile::getInstance($model,$type);
		if (!empty($uploadedFile)) {
			$fileName = "{$time}-{$name}-{$uploadedFile->name}";
			$check = $uploadedFile->saveAs(Yii::app()->basePath.'/../themes/images/'.$folder_name.$fileName);
		}
		if ($check) {
			return $fileName;
		} else {
			return $check;
		}
		
	}

	public static function getTeamListHtml($team_id) 
	{
		$teamList = Team::model()->findAll(array('condition'=>'team_id != :team_id','params'=>array(':team_id'=>$team_id),'order'=>'Name ASC'));
		$teamList=CHtml::listData($teamList,'team_id','name');
			
	   	$teamHtml = "<option value=''>Select Team2</option>";
	   	foreach($teamList as $key=>$val)
	   		$teamHtml .= CHtml::tag('option', array('value'=>$key),CHtml::encode($val),true);

	   	$winner = "<option value=''>Select Winner</option>";

		return CJSON::encode(array(
		  'team2'=>$teamHtml,
		  'winner'=>$winner
		));
	}

	public static function getWinnerListHtml($teamArray) 
	{
		$html = '';
		if(!empty($teamArray)) {
			$teamList = implode(',',$teamArray);
			$teamList = rtrim($teamList,',');
			$teamWinnerList = Team::model()->findAll(array('condition'=>"team_id in ($teamList)",'order'=>'Name ASC'));
			$teamWinnerList=CHtml::listData($teamWinnerList,'team_id','name');
			
		   $html = "<option value=''>Select Winner</option>";
		   foreach($teamWinnerList as $key=>$val)
		   $html .= CHtml::tag('option', array('value'=>$key),CHtml::encode($val),true);
		}

		return $html;
	}
}