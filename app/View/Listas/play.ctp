<!-- para el player -->
<?php echo $this->Html->css('player/player.css'); ?>
<?php echo $this->Html->css('player/flashblock.css'); ?>
<?php echo $this->Html->script('player/soundmanager2.js'); ?>
<?php echo $this->Html->script('player/page-player.js'); ?>

<script type="text/javascript">
    soundManager.flashVersion = 9;
    soundManager.preferFlash = true; // for visualization effects
    soundManager.useHighPerformance = true; // keep flash on screen, boost performance
    soundManager.wmode = 'transparent'; // transparent SWF, if possible
    soundManager.useFastPolling = true; // increased JS callback frequency    
    soundManager.url = '/ungs-player/files/player/';
    var PP_CONFIG = {
    autoStart: false,      // begin playing first sound when page loads
    playNext: true,        // stop after one sound, or play through list until end
    useThrottling: false,  // try to rate-limit potentially-expensive calls (eg. dragging position around)</span>
    usePeakData: false,     // [Flash 9 only] whether or not to show peak data (left/right channel values) - nor noticable on CPU
    useWaveformData: false,// [Flash 9 only] show raw waveform data - WARNING: LIKELY VERY CPU-HEAVY
    useEQData: false,      // [Flash 9 only] show EQ (frequency spectrum) data
    useFavIcon: true     // try to apply peakData to address bar (Firefox + Opera) - performance note: appears to make Firefox 3 do some temporary, heavy disk access/swapping/garbage collection at first(?) - may be too heavy on CPU
    }
    
</script>

<div class="page-header">
        <h1><?php echo __('Disfruta de tu musica junto a UNGS-player');?></h1>
</div>

    <div class="row-fluid"> 
    <div id="sm2-container"></div>  
    
        <ul class="thumbnails">
            <li class="span4">
                <div class="thumbnail" id="tapaDisco">
                    <?php echo $this->Html->image('cd.png', array('id' => 'album_cover'))?>
                </div>
                    <br/>
                 <div class="alert alert-info" id="title" style="display:none;"></div>
            </li>
            
            
            <li class="span8">            
                <ul class="nav nav-tabs nav-stacked" id="inline-playlist">
                <?php foreach ($datos as $k => $value ): ?>
                    
                    <li id="<?php echo $k; ?>">
                        <a class="" href="<?php echo $value['path'] ?>">
                            <?php echo h($value['band']); ?> :  
                            <?php echo h($value['song']); ?>
                        </a>
                        <div id="tapa" style="display:none;"><?php echo h($value['cover']); ?></div>
                        
                    </li>
                <?php endforeach; ?>
                </ul>                        
            </li>
        </ul>        
    </div>


<script>

    
    
    
   function cargarTapa(obj, activo){
      if(activo && obj != null){
            $('#tapaDisco').html('<img id="album_cover" width="360px" height="268px" src="'+$('#'+obj._data.oLI.id+' > div[id=tapa]').text()+'">');
            $("#album_cover").error(function () { 
                $('#tapaDisco').html('<?php echo $this->Html->image('cd.png', array('id' => 'album_cover'))?>');
                });

      } else {
          $('#tapaDisco').html('<?php echo $this->Html->image('cd.png', array('id' => 'album_cover'))?>');
      }
   }
   
  function extraInfo(obj, activo){
      if(activo && obj != null){
            setTimeout(function() {
                var album = obj.id3.TALB;
                var artista = obj.id3.TPE1;
                var tema = obj.id3.TIT2;
                var genero = obj.id3.TCON;
                var anio = obj.id3.TYER;
                    $('#title').html('<h3 align="center">.:  Info Extra  :.</h3><p align="center"><b>Estas escuchando </b>'+artista+'<br><b>El tema </b>'+tema+'<br><b>Del disco </b>'+album+'<br><b>Genero </b>'+genero+'<br><b>Año del disco </b>'+anio+'</p>');
                    $('#title').show();
            },3000);
      } else {
            $('#title').hide();
      }
  
  } 
   
</script>