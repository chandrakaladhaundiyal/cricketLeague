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
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target="#yii_bootstrap_collapse_0">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <span class="brand"><?php echo CHtml::encode(Yii::app()->name); ?></span>
                    <div class="nav-collapse collapse" id="yii_bootstrap_collapse_0">
                        <?php $this->widget('zii.widgets.CMenu',array(
                                    'items'=>array(
                                        array('label'=>'Home', 'url'=>array('/site/index')),
                                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                                        ),
                                        'htmlOptions'=>array('class'=>'nav')
                                    )); 
                                ?>
                    </div>
                </div>
            </div>
        </div><!-- mainmenu -->
            <div class="container">
                <?php echo $content; ?>
            </div>

            <div class="footer text-center">
                Copyright &copy; <?php echo date('Y'); ?> by Cricket Association.<br/>
                All Rights Reserved.<br/>
            </div><!-- footer -->
    </body>
</html>
