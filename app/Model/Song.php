<?php
App::uses('AppModel', 'Model');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
/**
 * Song Model
 *
 * @property Album $Album
 */
class Song extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
        var $actsAs = array('Containable');

        
        public function setInfoSong($datos = null){
            if($datos){
                // escapea para setear a la vista
                //debug($datos);
                foreach ($datos as $k => $d){
                    $listaAux = str_replace('\\', '/', $d['Song']);
                    $lista = str_replace('.mp3', '', $listaAux['name']);
                    $info = explode('/', $lista);
                    $track = explode('-', $info[2]);
                    
                    $resultado[] = array(
                        'band' => $info[0],
                        'album' => $info[1],
                        'song_id' => $d['Song']['id'],
                        'song_number' => $track[0],
                        /*'song' => $info[2]*/
                        'song' => $track[1]
                        
                    );

                } 
                return $resultado;
            } else {
                return false;
            }
        }        
        
        
       
        public function isMusicLoaded(){
            // scanea por nueva musica
            $dir = new Folder(WWW_ROOT . 'files' . DS . 'Music');
            // encuentro todos los mp3
            $files = $dir->findRecursive('.*mp3');
            $files = str_ireplace(WWW_ROOT . 'files' . DS . 'Music'. DS , '',$files);
            
            $nuevalista = $files;
            $ultimoupdate = $this->find('list');
            
            // busca las diferencias
            $diferencia = array_diff($nuevalista, $ultimoupdate);
            if($diferencia){
                //debug('existe diferencia');
                //debug($diferencia);
                
                    foreach ($diferencia as $d){
                        $update[] = array('name' => $d);
                    }
                    $this->saveMany($update);
                
                return true;
                
            } else {
                //debug('NO existe diferencia');
                return false;
            }
            
            
        }
        

}
