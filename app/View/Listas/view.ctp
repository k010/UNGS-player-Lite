<div class="row">
    <div class="page-header">
        <h1><h2><?php  echo __('Listas');?></h2></h1>
    </div>
        <ul class="thumbnails">
            <li class="span4">
                <div class="thumbnail">
                    <div class="caption">
                        <dl class="dl-horizontal">
                                <dt><?php echo __('Id'); ?></dt>
                                <dd>
                                        <?php echo h($lista['Lista']['id']); ?>
                                        &nbsp;
                                </dd>
                                <dt><?php echo __('Name'); ?></dt>
                                <dd>
                                        <?php echo h($lista['Lista']['name']); ?>
                                        &nbsp;
                                </dd>
                                <dt><?php echo __('Description'); ?></dt>
                                <dd>
                                        <?php echo h($lista['Lista']['description']); ?>
                                        &nbsp;
                                </dd>
                                <dt><?php echo __('Created'); ?></dt>
                                <dd>
                                        <?php echo h($lista['Lista']['created']); ?>
                                        &nbsp;
                                </dd>
                                <dt><?php echo __('Modified'); ?></dt>
                                <dd>
                                        <?php echo h($lista['Lista']['modified']); ?>
                                        &nbsp;
                                </dd>
                        </dl>
                    </div>
                </div>
            </li>
        </ul>      
</div>