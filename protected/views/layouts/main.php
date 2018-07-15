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
                    <a class="brand" href="<?php echo Yii::app()->homeUrl; ?>"> 	
                        <?php echo CHtml::encode(Yii::app()->name); ?>
                    </a>
                </div>
            </div>
        </div><!-- mainmenu -->

        <div class="container">
            <div  class="page-header">
                <?php if (isset($this->breadcrumbs)): ?>
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                    ));
                    ?><!-- breadcrumbs -->
                <?php endif ?>
            </div>
            <div class="content">
                <?php echo $content; ?>
            </div>

            <div class="footer text-center">
                Copyright &copy; <?php echo date('Y'); ?> by Cricket Association.<br/>
                All Rights Reserved.<br/>
            </div><!-- footer -->
        </div>

    </body>
</html>
