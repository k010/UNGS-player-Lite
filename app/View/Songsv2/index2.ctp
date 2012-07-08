<?php echo $this->element('playBar'); ?>
    <div class="page-header">
        <h1><?php echo __('Buscador');?></h1>
    </div>
    <div class="row-fluid">    
        <?php echo $this->Form->create('Listas', array('controller' => 'lista', 'action' => 'play', 'class' => '')); ?>
        <div class="well form-search">
            <div class="span11">
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend input-append">
                            <span class="add-on"><i class="icon-search"></i></span><input type="text" size="16" id="appendedPrependedInput" class="span5"><button type="button" class="btn btn-danger">Buscar</button>
                        </div>
                        <div class="pull-right">
                            <span class="help-inline">Listas de reproduccion</span>
                            <?php echo $this->Form->select('Lista.id', $userList, array('empty' => 'Seleccione una lista')); ?>
                        </div>
                    </div>
                </div>      
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>       
    <div class="row">        
        <?php foreach($listado as $lista): ?>
        <div class="span12">
            <h2><?php echo $lista['Band'] . " "; ?><small> ( <?php echo count($lista['Album']); ?> ) CD´s</small></h2>
        <hr/>
        </div>
        <?php foreach($lista['Album'] as $album): ?>        
        <div class="span6">
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                <tr>
                    <th>Track</th>
                    <th><?php echo $album['Name']; ?></th>
                    <th>Play</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($album['Song'] as $song): ?>
                    <tr>
                        <td><?php echo $song['Track']?></td>
                        <td><?php echo $song['Name']?></td>
                        <td>
                            <div id="artista" style="display:none;"><?php echo $lista['Band']; ?></div>
                            <button id="<?php echo $song['Path'];?>" name="play" class="btn btn-mini" data-toggle="button"><i class="icon-play"></i> Play</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>        
        <?php endforeach; ?>
        <div class="clearfix"></div>
        <?php endforeach; ?>
    </div>
<?php echo $this->Html->script('jquery/jquery.jplayer.min'); ?>
<?php echo $this->Html->script('jquery/jplayer.playlist.min'); ?>
<script>   
  $(document).ready(function(){
        var media = [];
	var player = new jPlayerPlaylist({
            jPlayer: "#musicPlayer",
            cssSelectorAncestor: "#musicPlayerContainer"
	},
        media, 
        {
            playlistOptions: {
                    enableRemoveControls: true
            },            
            swfPath: "<?php echo $this->webroot; ?>js/jquery",
            supplied: "mp3",
            wmode: "window",
            preload: 'metadata',
            solution: 'html, flash'
	});      
      
      
      // agrega y elimina temas
      $("[name=play]").click(function(){
            var nuevoTema = {
                title: ""+$(this).parent().prev().html()+"",
                artist: ""+$(this).prev("#artista").html()+"",
                mp3: ""+$(this).attr("id")+""
            };            
          if($(this).hasClass("active")){
              $(this).removeClass("btn-success");
              $(this).children("i").removeClass("icon-white");
              var tema = $(this).parent().prev().html();
              //player.remove(-1);
          } else {
            $(this).addClass("btn-success");
            $(this).children("i").addClass("icon-white");
            player.add(nuevoTema, false);
            
            
          }
      });
      
    $("#musicPlayer").bind($.jPlayer.event.play, function(event) { // Add a listener to report the time play began
        $("#marquesina").html("<marquee ><font color='#FFF'><b>" + event.jPlayer.status.media.title + " Por ( " + event.jPlayer.status.media.artist + " ) </b></font></marquee>"); 
    });
    
    $("#playList").bind('click', function(){
        $("#myModal").modal('show');
    });
    
  });
</script>