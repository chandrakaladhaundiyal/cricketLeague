<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">

        <?php
        echo Yii::app()->bootstrap->registerAllCss();
        echo Yii::app()->bootstrap->registerCoreScripts();
        ?>

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/css/style.css">
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/js/jquery.min.js"></script>

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
    <div id="page_content">
        <?php $this->widget('bootstrap.widgets.TbNavbar',array(
            'collapse'=>true,
            'items'=>array(
                array(
                    'class'=>'bootstrap.widgets.TbMenu',
                    'items'=>array(
                        array('label'=>'Team', 'url'=>array('/team/index')),
                        array('label'=>'Player', 'url'=>array('/player/admin')),
                        array('label'=>'Match', 'url'=>array('/match/admin')),
                    ),
                    'htmlOptions'=> array('class' => 'navbar-custom'),
                ),
            ),
        )); ?>

        <div class="container" id="page">

          <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
              'links'=>$this->breadcrumbs,
            )); ?><!-- breadcrumbs -->
          <?php endif?>

          <?php echo $content; ?>

          <div class="clear"></div>
      </div>

      <footer class="footer">
        <div class="container">
      
        Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
        All Rights Reserved.<br/>        
          
        </div>
    </footer>
    </body>
</html>
