<div class="page-header">
    <h1>UNGS-player</h1>
</div>
<div class="hero-unit">
    <div class="row">
        <div class="span4">
        <?php echo $this->Session->flash('auth', array('element' => 'flash_error')); ?>
        <?php echo $this->Form->create('User', array(
            'class' => 'well form-search',
            'inputDefaults' => array(
                    'div' => array('class' => 'control-group'),
                    'between' => '<div class="controls">',
                    'after' => '</div>',
                    'class' => '',
                )
            ));
        ?>
            <fieldset>
                <legend><?php echo __('Login'); ?></legend>
            <?php
                echo $this->Form->input('username', array('label' => array('text' => 'Usuario', 'class' => 'control-label')));
                echo $this->Form->input('password', array('label' => array('text' => 'Contraseña', 'class' => 'control-label')));
            ?>
            <?php echo $this->Form->submit('Entrar', array('class' => 'btn btn-success btn-large', 'title' => 'Entrar')); ?>
        </fieldset>
        </div>
        <div class="span6">
            <h3>Registrate, sube tus canciones y disfruta de un reproductor MP3 difrente</h3><br>
            <p>UNGS-player es un proyecto para la Universidad Gral. Sarmiento, como proposito de entrega del TP individual en la materia de Construccion del Software, dictada en la sede de San Fdo. durante el primer semestre del 2012</p>
            <p>El proyecto esta basado en <a href="http://cakephp.org/">Cakephp</a> y <a href="http://www.schillmania.com/projects/soundmanager2/">Soundmaner2</a></p>
            <p align="right">Realizado por Jesús Alonso</p>
            <div class="clearfix"></div>
            <?php echo $this->Html->link('Registrarse', '/users/add', array('class' => 'btn btn-primary btn-large')); ?>        
        </div>        
    </div>
</div>
    
     
    

