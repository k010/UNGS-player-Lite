<div class="row">
    <div class="page-header">
        <h1><h2><?php  echo __('Usuarios');?></h2></h1>
    </div>
    <div class="listas index">
            <table class="table table-striped table-bordered table-condensed">
            <tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('foto');?></th>
			<th><?php echo $this->Paginator->sort('modificado');?></th>
			<th><?php echo $this->Paginator->sort('creado');?></th>
			<th class="actions"><?php echo __('Acciones');?></th>
            </tr>
            <?php foreach ($users as $user): ?>
            <tr>
                    <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['photo']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['created']); ?>&nbsp;</td>
                    <td class="actions">
                            <?php echo $this->Html->link(__('Ver'), array('action' => 'view', $user['User']['id'])); ?>
                            <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $user['User']['id'])); ?>
                            <?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
                    </td>
            </tr>
            <?php endforeach; ?>
	</table>
        
        
        
        
        <div class="well">  
            <p>
            <?php
            echo $this->Paginator->counter(array(
            'format' => __('Pagina {:page} de {:pages}, registros totales {:count}, desde {:start}, al {:end}')
            ));
            ?>	</p>
        </div>
        
        
        
        
            <div class="pagination pagination-centered">
                <ul>
            <?php
                    // paginacion con boostrap
                    echo $this->Paginator->prev('Anterior', array('tag' => 'li', 'class' => 'prev'), $this->Paginator->link('Anterior', array()), array('tag' => 'li','escape' => false,'class' => 'prev disabled')); 
                    // paginacion de numeros
                    if (!isset($modules)) {
                    $modulus = 11;
                    }
                    if (!isset($model)) {
                    $models = ClassRegistry::keys();
                    $model = Inflector::camelize(current($models));
                    }
                    
                    $page = $this->params['paging'][$model]['page'];
                    $pageCount = $this->params['paging'][$model]['pageCount'];
                    if ($modulus > $pageCount) {
                    $modulus = $pageCount;
                    }
                    $start = $page - intval($modulus / 2);
                    if ($start < 1) {
                    $start = 1;
                    }
                    $end = $start + $modulus;
                    if ($end > $pageCount) {
                    $end = $pageCount + 1;
                    $start = $end - $modulus;
                    }
                    for ($i = $start; $i < $end; $i++) {
                    $url = array('page' => $i);
                    $class = null;
                    if ($i == $page) {
                    $url = array();
                    $class = 'active';
                    }
                    echo $this->Html->tag('li', $this->Paginator->link($i, $url), array(
                    'class' => $class,
                    ));
                    }
                    
                    echo $this->Paginator->next('Siguiente', array('tag' => 'li', 'class' => 'prev'), $this->Paginator->link('Siguiente', array()), array('tag' => 'li','escape' => false,'class' => 'prev disabled'));                     
            ?>
               </ul>
            </div>

    </div>
</div>
