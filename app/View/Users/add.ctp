<div class="row">
    <div class="span12">
        <div class="well">
            <?php echo $this->Form->create('User', array('class' => 'form-horizontal well',
                                            'inputDefaults' => array(
                                            'div' => array('class' => 'control-group'),
                                            )
                                    ));?>
                    <fieldset>
                            <legend><?php echo __('Registrarse'); ?></legend>
                    <?php
                            echo $this->Form->input('username', array('label' => 'Usuario'));
                            echo $this->Form->input('email', array('label' => 'Email'));
                            echo $this->Form->input('password');
                            echo $this->Form->input('psword', array('label' => 'Confirmar password'));
                            echo "<br>";
                    ?>
                    </fieldset>
            <?php echo $this->Form->submit('Registrarse', array('class' => 'btn btn-primary btn-large', 'title' => 'Registrarse')); ?>
        </div>
    </div>        
</div>
