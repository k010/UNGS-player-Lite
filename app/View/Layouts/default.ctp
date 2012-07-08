<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP ');

?>
<!--
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
-->
<!DOCTYPE html>
<html lang="en">    
<head>    
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="">
                <meta name="author" content="">
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
                echo $this->Html->css('bootstrap');
                echo $this->Html->css('bootstrap-responsive');
                
                
                
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

        <?php echo $this->Html->css('jquery/redmond/jquery-ui-1.8.18.custom.css'); ?>
        <?php echo $this->Html->script('jquery/jquery-1.7.1.min.js'); ?>
        <?php echo $this->Html->script('jquery/jquery-ui-1.8.18.custom.min.js'); ?>
        <?php echo $this->Html->script('cakebootstrap.js'); ?>
        <?php echo $this->Html->script('bootstrap.js'); ?>
                
        
    <script>
    $(document).ready(function(){
        $('.dropdown-toggle').dropdown();
    });
    </script>  
    </head>
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 60px;
      }
    </style>    
    <body>
        <?php
            if($this->Session->read('Auth.User') != null){
                echo $this->element('navBar');
            }
        ?>
              
	<div id="container" class="container">
            <div id="header">
            </div>
            <div id="content">
                <?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
            </div>
            <footer>
                <?php //echo $this->element('sql_dump'); ?>
            </footer>             
	</div>
     
        
    </body>
    

    
</html>
