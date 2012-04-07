<div class="row">
    <div class="span12">
        <div class="well">
        <?php echo $this->Form->create('Lista', array('class' => 'form-horizontal'));?>
            <fieldset>
                    <legend><?php echo __('Agregar lista'); ?></legend>
            <?php
                    echo $this->Form->input('name', array('label' => 'Nombre'));
                    echo '<br/>';
                    echo $this->Form->input('description', array('label' => 'Descripcion'));
                    echo '<br/><br/>';
                    echo $this->Form->submit('Crear lista', array('class' => 'btn btn-primary btn-large', 'title' => 'Crear lista'));
            ?>
            </fieldset>                
        </div>        
    </div>
</div>

