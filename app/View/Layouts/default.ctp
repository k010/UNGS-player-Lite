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
    <body>
        
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="<?php echo $this->Html->url(array("controller" => "home", "action" => "index"));?>">UNGS-Player</a>            
                    <ul class="nav">
                        <!--<li class="active"><a href="#">Regular link</a></li>-->
                        <li class="dropdown" id="menu1">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
                                Musica
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $this->Html->url(array("controller" => "songs", "action" => "index"));?>"><i class="icon-music"></i> Escuchar musica</a></li>                                
                                <li class="divider"></li>
                                <li><a href="<?php echo $this->Html->url(array("controller" => "songs", "action" => "add"));?>"><i class="icon-plus-sign"></i> Scanear nueva musica</a></li>
                            </ul>
                       </li>
                       
                       <li class="dropdown" id="menu2">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#menu2">
                                Listas de reproduccion
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $this->Html->url(array("controller" => "listas", "action" => "index"));?>"><i class="icon-search"></i> Buscar listas</a></li>                                
                                <li class="divider"></li>
                                <li><a href="<?php echo $this->Html->url(array("controller" => "listas", "action" => "add"));?>"><i class="icon-plus-sign"></i> Agregar nueva lista</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-text pull-right">
                        <li class="dropdown">
                            <a href="#"
                                class="dropdown-toggle"
                                data-toggle="dropdown">
                                Hola <?php echo($this->Session->read('Auth.User.username')); ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $this->Html->url(array("controller" => "users", "action" => "view", $this->Session->read('Auth.User.id')));?>"><i class="icon-user"></i> Ver perfil</a></li>
                                <li class="divider"></li>                                
                                <li><a href="<?php echo $this->Html->url(array("controller" => "users", "action" => "edit", $this->Session->read('Auth.User.id')));?>"><i class="icon-pencil"></i> Modificar perfil</a></li>                                
                                <li class="divider"></li>
                                <li><a href="<?php echo $this->Html->url(array("controller" => "users", "action" => "logout"));?>"><i class="icon-off"></i> Logout</a></li>                                                                
                            </ul>
                        </li>
                    </ul>                    
                    
                    
                </div>            
            </div>                
        </div>           
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
