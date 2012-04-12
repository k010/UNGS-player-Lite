<div class="row">
    <legend><?php echo __('Perfil'); ?></legend>
        <ul class="thumbnails">
            <li class="span4">
                <div class="thumbnail">
                    <?php echo $this->Html->image('users/' . h($user['User']['photo']), array('alt' => 'CakePHP'))?>
                        <div class="caption">
                                <h2 align="center">Datos personales</h2>
                                <dl class="dl-horizontal">
                                        <dt><?php echo __('Nombre'); ?></dt>
                                        <dd>
                                                <?php echo h($user['User']['username']); ?>
                                                &nbsp;
                                        </dd>
                                        <dt><?php echo __('Email'); ?></dt>
                                        <dd>
                                                <?php echo h($user['User']['email']); ?>
                                                &nbsp;
                                        </dd>
                                        <dt><?php echo __('Modificado'); ?></dt>
                                        <dd>
                                                <?php echo h($user['User']['modified']); ?>
                                                &nbsp;
                                        </dd>
                                        <dt><?php echo __('Creado'); ?></dt>
                                        <dd>
                                                <?php echo h($user['User']['created']); ?>
                                                &nbsp;
                                        </dd>
                                </dl>                                
                        </div>
                </div>
            </li>
        </ul>      
</div>
