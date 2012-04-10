
    <div class="page-header">
        <h1><?php echo __('Listado de canciones');?></h1>
    </div>
    <div class="row-fluid">    
	
        <?php echo $this->Form->create('Listas', array('controller' => 'lista', 'action' => 'play', 'class' => 'form-horizontal')); ?>
        <fieldset>
            
            <div class="well form-search">
                <div align="center">
                    <span class="help-inline"><b>si ya has seleccionado los temas</b></span><br/><br/>                             
                        <?php echo $this->Form->submit('PLAY', array('class' => 'btn btn-danger btn-large', 'title' => 'PLAY')); ?>
                    <br/><span class="help-inline"><b>!!! Ahora dale Play !!!</b></span>             
                </div>
            </div>        
            
            <div class="well form-search">
                <span class="help-inline">Busqueda Rapida:</span>
                <input type="text" id="quickfind"/>
                <a class="btn btn-danger" id="cleanfilters" href="#">Limpiar Filtros</a>
                <div class="pull-right">
                    <span class="help-inline">Listas de reproduccion</span>
                    <?php echo $this->Form->select('Lista.id', $userList, array('empty' => 'Seleccione una lista')); ?>
                </div>
            </div>
        
        <table cellspacing="0" border="0" class="table table-striped table-bordered table-condensed" id="listado" width="100%">
        <thead>
            <tr>
                <th><?php echo __('Banda');?></th>
		<th><?php echo __('Album');?></th>
                <th><?php echo __('Track');?></th>
                <th><?php echo __('Nombre');?></th>

            </tr>
        </thead>
        <tbody>
	<?php foreach ($songs as $song): ?>
        <?php 
            $idAlbum = 'album_' . str_replace(' ', '', $song['album']); 
            $idSong = 'band_' . str_replace(' ', '', $song['band']) . '_album_' . str_replace(' ', '', $song['album']) . '_song_' . $song['song_id'];
        ?>
            <tr>
                    <td><?php echo h($song['band']); ?>&nbsp;</td>
                    <td ><?php echo h($song['album']); ?>&nbsp;</td>
                    <td><span class="badge badge-info"><?php echo h($song['song_number']); ?>&nbsp;</span></td>
                    <td title="PLAY" class="" id="<?php echo $song['song_id'] ?>"><span class=""><?php echo h($song['song']); ?>&nbsp;</span></td>                     
                    
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
        </tfoot>
	</table>

        </fieldset>
                  
</div>
        <?php echo $this->Html->script('jquery/picnet.table.filter.min.js'); ?>

<script>   
  $(document).ready(function(){
      //$('#container').css('background-image','img/bg.jepg');
      //$('#container').css("background:url('../img/bg2.jpg')");
      
      
    var options = {
        additionalFilterTriggers: [$('#quickfind')],
        clearFiltersControls: [$('#cleanfilters')],
        filterDelay: 100
    };      
    $('#listado').tableFilter(options);

    $("td[title=PLAY]").click(function(){
        //alert(this.id + $(this).html());
        $(this).children().toggleClass( "label label-info", 10 );
        //return false;
        
        if($(this).children().hasClass("label label-info")){
            
            $(this).children().children().remove();
            $('div[id=song_id_'+this.id+']').remove();
            
        } else {
            var sn = '<div id="song_id_'+this.id+'" style="display:none"><label> '+ $(this).html() +' <input type="checkbox" id='+this.id+' value='+ this.id +' name="data[Song][]" checked> </label></div>';
            $('#ListasPlayForm').append(sn);
            $(this).children().append('<i class="icon-play icon-white"></i>');            
        }
    });
  });
    
</script>


