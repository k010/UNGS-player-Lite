<div class="row">
    <div class="span12">
        <div class="well">
        <?php echo $this->Form->create('Lista', array('class' => 'form-horizontal', 
            'inputDefaults' => array(
                            'div' => array('class' => 'control-group'),
                        )
            ));?>
	<fieldset>
		<legend><?php echo __('Editar lista'); ?></legend>
	<?php
                echo $this->Form->input('id');
                echo $this->Form->input('user_id',array('type' => 'hidden', 'label' => 'ID'));                
		echo $this->Form->input('name', array('label' => 'Nombre'));
                echo '<br/>';
		echo $this->Form->input('description', array('label' => 'Descripcion'));
                echo '<br/><br/>';
                echo $this->Form->submit('Modificar lista', array('class' => 'btn btn-primary btn-large', 'title' => 'Crear lista'));
	?>
	</fieldset>                
        </div>        
    </div>
</div>