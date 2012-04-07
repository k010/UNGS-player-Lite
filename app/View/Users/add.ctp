<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Registrarse'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('psword', array('label' => 'Confirmar password'));                
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar'));?>
</div>

