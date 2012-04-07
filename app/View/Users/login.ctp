<div class="page-header">
    <h1>UNGS-player</h1>
</div>
<div class="hero-unit">
    <div class="row">
        <div class="span4">
        <?php echo $this->Session->flash('auth'); ?>
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
                //echo $this->Form->input('username', array('label' => 'Usuario'));
                //echo $this->Form->input('password', array('label' => 'Contraseña'));

            ?>

            <?php echo $this->Form->submit('Entrar', array('class' => 'btn btn-success btn-large', 'title' => 'Entrar')); ?>
        </fieldset>
        </div>
        <div class="span6">
            <h3>Registrate para poder disfrutar de miles de canciones</h3>
            <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <div class="clearfix"></div>
            <?php echo $this->Html->link('Registrarse', '/users/add', array('class' => 'btn btn-primary btn-large')); ?>        
        </div>        
    </div>
</div>
    
     
    

