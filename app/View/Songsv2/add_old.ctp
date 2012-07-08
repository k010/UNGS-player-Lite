<?php echo $this->Html->css('uploadify/uploadify'); ?>
<?php echo $this->Html->script('uploadify/swfobject');?>
<?php echo $this->Html->script('uploadify/jquery.uploadify.v2.1.4');?>




<div class="songs form">
<?php echo $this->Form->create('Song');?>
	<fieldset>
		<legend><?php echo __('Add Song'); ?></legend>
	<?php
        
        /*
        echo $this->Form->input('field', array('options' => array(
                                                'Value 1'=>'Label 1',
                                                'Value 2'=>'Label 2',
                                                'Value 3'=>'Label 3'
                                                )));
        */
        //echo $this->Form->input('field', array('options' => array(1,2,3,4,5)));
        
        //debug($albumBand);
        
		//echo $this->Form->input('album_id');
		//echo $this->Form->input('number');
		//echo $this->Form->input('name');
	?>
                <label for="SongBand">Banda</label>
                <select id="SongBand" name="data[Song][band]">
                        <option value="">Elija Banda</option>
                        
                    <?php foreach ($albumBand as $band): ?>
                        <option value="<?php echo $band['Band']['id']; ?>"><?php echo $band['Band']['name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <br><br>

                <label for="SongAlbum">Album</label>
                <select id="SongAlbum" name="data[Song][album]">
                    <option value="">elija album</option>
                </select>
                
                
                
	</fieldset>

        <input id="file_upload" name="file_upload" type="file" />

        <br><br>
        <div class="input select" id="listado">
            <input name="data[Song][temas]" value="" id="listadoTemas" type="hidden">
        </div>

        
        <div class="submit">
            <input type="submit" value="Agregar" onclick="javascript:$('#file_upload').uploadifyUpload()">
        </div>

            
<?php //echo $this->Form->end(__('Submit'));?>
</div>




        <script type="text/javascript">
            var i = 1;
            var listado;
            $(document).ready(function() {
                $('#file_upload').uploadify({
                'uploader' : '<?php echo $this->Html->url('/app/webroot/uploadify/uploadify.swf');?>',
                'script' : '<?php echo $this->Html->url('/app/webroot/uploadify/uploadify.php');?>',
                'cancelImg' : '<?php echo $this->Html->url('/app/webroot/uploadify/cancel.png');?>',
                'folder' : '<?php echo $this->Html->url('/app/webroot/files/Music');?>',
                'auto' : false,
                'buttonText' : 'Browse',
                'multi' :true,
                'queueSizeLimit' : 5,
                'sizeLimit' : 1024*1024*1024,
                'onSelect' : function(event, ID, fileObj) {
                    
                        listado = "<div class='checkbox' id='"+fileObj.name+"'>";
                        listado += "<input name='data[Song][temas][]' value='"+fileObj.name+"' id='listadoTemas"+i+"' type='checkbox' checked=true>";
                        listado += "<label for='listadoTemas"+i+"'>"+fileObj.name+"</label>";
                        listado += "</div>";
                        
                        $('#listado').append(listado);
                        i++;
                    
                    },
                'onCancel' : function(event,ID,fileObj,data) {
                        $('#listado').children('div[id="'+fileObj.name+'"]').remove();
                    }                    
                    
                });
            });
        </script>
    