<div class="row">
    <div class="span8">
        <?php echo $this->Form->create('User', array('type' => 'file', 
            'class' => 'form-horizontal well',
            'inputDefaults' => array(
                            'div' => array('class' => 'control-group'),
                        )
            ));?>    
	<fieldset>
		<legend><?php echo __('Editar Perfil'); ?></legend>
                <ul class="thumbnails">
                    <li class="span2">
                        <div class="thumbnail">
                            <?php echo $this->Html->image('users/' . $photo_name, array('alt' => 'CakePHP'))?>
                            <div class="caption">
                                <h5 align="center">Foto de perfil</h5>
                            </div>
                        </div>
                    </li>
                </ul>                  
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('email');
                
                if($this->Session->read('Auth.User.rol') == 'admin'){
                    echo $this->Form->input('rol', array('type' => 'select', 'options' => array('admin' => 'Admin', 'user' => 'Usuario'), 'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline'))));                    
                }
                
		echo $this->Form->input('password', array('error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline'))));
		echo $this->Form->hidden('photo_name', array('value' => $photo_name));
                echo $this->Form->input('User.photo', array('between'=>'<br />','type'=>'file', 'label' => 'Foto'));
                
                echo '<br><br>';
                echo $this->Form->submit('Modificar', array('class' => 'btn btn-success btn-large', 'title' => 'Modificar'));
                echo '<br>';
                echo $this->Html->link('Eliminar', array('controller' => 'users', 'action' => 'delete', $id), array('class' => 'btn btn-danger btn-large'), "Estas seguro de eliminarte?");
                echo '</div>';
	?>
	</fieldset>
    </div>
</div>
