<div class="navbar navbar-fixed-top">
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
                        <?php if($this->Session->read('Auth.User.rol') == 'admin'): ?>
                            <li><a href="<?php echo $this->Html->url(array("controller" => "users", "action" => "index"));?>"><i class="icon-user"></i> Usuarios</a></li>                        
                            <li class="divider"></li>                                                        
                        <?php endif; ?>
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
