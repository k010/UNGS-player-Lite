<?php echo $this->Html->css('player/page-player.css'); ?>
<?php echo $this->Html->css('player/flashblock.css'); ?>
     
<?php echo $this->Html->script('player/soundmanager2.js'); ?>
<?php echo $this->Html->script('player/page-player.js'); ?>

		
<script type="text/javascript">
    soundManager.url = '/ungs-player/files/player/';
</script>


<div>
    <div id="sm2-container">
        <!-- SM2 flash movie goes here -->
    </div>
			
    <h2>Estas escuchando: </h2>
    <ul class="playlist">
        
        <?php pr(WWW_ROOT . 'files' . 'Music'); $url = WWW_ROOT . 'files' . '\Music'; ?>
        <li><?php //echo $this->Html->link(__('King Nothing'), array( $url . '/Metallica' . '/Load' . '5-King nothing.mp3' )); ?></li>
        
        
        
        <li><a href="../app/webroot/files/Music/Metallica/Load/5-King nothing.mp3">King Nothing</a></li>
        <li><a href="../app/webroot/files/Music/Metallica/Load/11-Mama said.mp3">Mama Said</a></li>
        <li><a href="../app/webroot/files/Music/Metallica/Reload/4-The unforgiven II.mp3">The unforgiven II</a></li>
        <li><a href="../app/webroot/files/Music/Iron Maiden/Powerslave/1-Aces High.mp3">Aces High</a></li>
        
    </ul>
</div>


