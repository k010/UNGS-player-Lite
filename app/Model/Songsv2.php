<?php
App::uses('AppModel', 'Model');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
/**
 * Song Model
 *
 * @property Album $Album
 */
class Songsv2 extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'path';
        var $actsAs = array('Containable');

	public $validate = array(
		'Lista.id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'el campo no puede ser vacio',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);  
        
        
        /*
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
                        'song' => $track[1]
                    );

                } 
                return $resultado;
            } else {
                return false;
            }
        }   
        */
        
        public function updateSongsLibrary($user = null){
            // en un futuro funciona leyendo el disco
            //$base = new Folder($user['music_path']);
            
            $base = new Folder(WWW_ROOT . 'files' . DS . 'Music');
            $musica = $base->findRecursive('.*mp3', true);

            foreach ($musica as $song) {
                $separador = ($base->isWindowsPath($song)) ? "\\" : "/";                
                //$basePath = $user['music_path'] . $separador;                
                $basePath = WWW_ROOT . 'files' . DS . 'Music' . DS;                                
                
                // separa el path base
                $songAux = str_replace($basePath, "", $song); 
                $path = str_replace("\\", "/", $songAux); 
                //$path = $songAux;
                // separa band - album - song
                $songAux = explode($separador, $songAux);
                // niveles de arbol
                $niveles = count($songAux);
                // saca numero de track
                preg_match_all('/([\d]+)/', $songAux[$niveles-1], $track);
                
                $songName = str_replace(".mp3", "", $songAux[$niveles-1]);
                $trackSong = (isset($track)) ? $track[0][0] : 00;
                $updateSongs[] = array(
                    "band" => $songAux[$niveles-3],
                    "album" => $songAux[$niveles-2],
                    "track" => $trackSong,
                    "song" => $songName,
                    "path" =>  '/files/Music/' . $path,
                    "status" => 1
                );
                
                $listadoNew[] = $path;
            }
            
            // compara listado anterior y actual - si hay diferencia actualiza
            $listado = $this->find('list');
            $diferencias = array_diff($listadoNew, $listado);
            $nuevaMusica = "";
            // si listadoOLD es menor borro musica hago un truncate
            if(count($listadoNew) < count($listado)) {
                $this->query("TRUNCATE table songsv2s");
            } else {
                // tomo las diferencias, busco su origen y lo agrego
                foreach ($diferencias as $key => $value){
                    $nuevaMusica[] = $updateSongs[$key];
                }
                
            }
            // chequea si hubo diferencias entonces las carga
            if(isset($nuevaMusica) && !empty($nuevaMusica)){
                $this->saveMany($nuevaMusica);
                return true;
            } else {
                return false;
            }
        }
        
        public function getAllBandName() {
            return $result = $this->find('all', array('fields' => array('DISTINCT (Songsv2.band) band'), 'recursive' => 0));
        }
        
        public function getAlbumsByBandName($band = null) {
            if(isset($band) && !empty($band))
                return $result = $this->query("SELECT DISTINCT album FROM songsv2s WHERE band LIKE '%".$band."%'");
        }
        
        public function getSognsByAlbumName($album = null) {
            if(isset($album) && !empty($album))
                return $result = $this->query("SELECT song FROM songsv2s WHERE album LIKE '%".$album."%'");
        }
        

        public function getAllSongs() {
            $bandas = $this->getAllBandName();
            for($i = 0 ; $i < count($bandas) ; $i++){
                $bandaActual = $bandas[$i]['Songsv2']['band'];
                $albums = $this->getAlbumsByBandName($bandaActual);
                $resultado[$i] = array('Band' => $bandaActual);
                for($j = 0 ; $j < count($albums) ; $j++){
                    $albumActual = $albums[$j]['songsv2s']['album'];
                    $resultado[$i]['Album'][$j] = array('Name' => $albumActual);
                }
            }

            $listado = $resultado;
            foreach ($resultado as $key => $value) {
                foreach ($value['Album'] as $key2 => $value2) {
                    $conditions = array('album' => $value2);
                    $fields = array('Songsv2.path, Songsv2.song','Songsv2.track');
                    $temas = $this->find('all', array('conditions' => $conditions, 'fields' => $fields, 'recursive' => 0));
                    foreach ($temas as $tema) {
                        $listado[$key]['Album'][$key2]['Song'][] = array(
                            'Track' => $tema['Songsv2']['track'], 
                            'Name' => $tema['Songsv2']['song'], 
                            'Path' => $tema['Songsv2']['path']);
                    }
                }
            }
            return $listado;
           
        }
        
        public function readSong(){
            $path = "C:\Users\damian\Music\Sonata Arctica\Stones Grow Her Name (2012)\11-wildfire_part_iii___wildfire_town_population_0.mp3";
            $path = "file:///C:/Users/damian/Music/Black Label Society/2005 - Mafia/Black Label Society - Mafia - 03 - Suicide Messiah.mp3";            
            $path = "file:\\c:\\Users\\damian\\Music\\Black Label Society\\2005 - Mafia\\Black Label Society - Mafia - 03 - Suicide Messiah.mp3";
            $path = "C:\wamp\www\ungs-player\app\webroot\files\Music\Metallica\Load\2-2x4.mp3";
            $path = "files/Music/Metallica/Load/2-2x4.mp3";
            $path = "C:/wamp/www/ungs-player/app/webroot/files/Music/Metallica/Load/2-2x4.mp3";
            $path = "C:/Users/damian/Music/Black Label Society/2005 - Mafia/Black Label Society - Mafia - 03 - Suicide Messiah.mp3";            
            
            
            
            $file = new File($path);
            var_dump($file->info());
            var_dump($file->path);
            var_dump($file->readable());
            
            
        }
        
	public $hasAndBelongsToMany = array(
		'Lista' => array(
			'className' => 'Lista',
			'joinTable' => 'listas_songs',
			'foreignKey' => 'song_id',
			'associationForeignKey' => 'lista_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
	);        
        
        
        
       
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
