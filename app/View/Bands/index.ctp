<div class="bands index">
    
	<h2><?php echo __('Listado de canciones');?></h2>
        
        <?php echo $this->Form->create('Lista', array('controller' => 'lista', 'action' => 'play')); ?>
        
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo "Albums"; ?></th>
                        <th><?php echo "Canciones"; ?></th>
	</tr>
        
	<?php foreach ($bands as $band): ?>
                <tr>
                    <td><h4><?php echo __('Artista');?></h4></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>

		<tr>
                    <td><?php echo h($band['Band']['name']);?>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                
                    <tr>
                        <td>&nbsp;</td>
                        <td><h4><?php echo __('Albums');?></h4></td>
                        <td>&nbsp;</td>
                    </tr>
                
                    <?php foreach ($band['Album'] as $key => $album): ?>
                    <tr>
                        <td>&nbsp;</td>
                        <td><?php echo h($album['name']); ?>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>

                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>    
                            <td><h4><?php echo __('Canciones');?></h4></td>
                        </tr>

                        <?php foreach ($album['Song'] as $song): ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>
                                <input type="checkbox" id="ListaListId<?php echo $song['id'] ?>" value="<?php echo $song['id'] ?>" name="data[Song][]">
                                <label id="ListaListId<?php echo $song['id'] ?>" for="ListaListId<?php echo $song['id'] ?>"><?php echo h($song['name']); ?></label>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                           
                    <?php endforeach; ?>
                        
            <?php endforeach; ?>
                        
	</table>
        
        <?php echo $this->Form->end('Escuchar'); ?>            
        
        
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
    

</div>            
            
</div>

<!-- reproduce la musica seleccionada -->
<script type="text/javascript">
    
/*
 $(document).ready(function(){
     

   $('checkbox[id^="ListaListId"]').click(function(){
       
       if(!($(this).hasClass('ui-state-highlight ui-corner-all'))){
            
            //var input = "<div class=\"checkbox\"><input type=\"checkbox\" checked='true' id=\"ListaListId"+i+"\" value=\""+$(this).text()+"\" name=\"data[Lista][list][]\"><label for=\"ListaListId"+i+"\">"+$(this).attr('id')+"</label></div>";
            
            //$('#ListaPlayForm').append(input);
            
            // cambia el estilo
            $(this).addClass("ui-state-highlight ui-corner-all");
            
            //incrementa el elemento
            
       } else {
           
          $(this).removeClass("ui-state-highlight ui-corner-all");
           
       }
        
        
        
        
   });
 });
 
 */
</script>