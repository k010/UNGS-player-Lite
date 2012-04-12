<?php
App::uses('AppModel', 'Model');
class Lista extends AppModel {
	public $displayField = 'name';
        var $actsAs = array('Containable');
	public $validate = array(
		'name' => array(
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

        public $belongsTo = 'User';
	public $hasAndBelongsToMany = array(
		'Song' => array(
			'className' => 'Song',
			'joinTable' => 'listas_songs',
			'foreignKey' => 'lista_id',
			'associationForeignKey' => 'song_id',
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
        
        public function setInfoSong($datos = null){
            if($datos){
                // escapea para setear a la vista
                foreach ($datos as $k => $d){
                    $listaAux = str_replace('\\', '/', $d['Song']);
                    $lista = str_replace('.mp3', '', $listaAux['name']);
                    $info = explode('/', $lista);
                    
                    $resultado[] = array(
                        'band' => $info[0],
                        'album' => $info[1],
                        'song' => $info[2],
                        'path' => "../" . APP_DIR . "/" . WEBROOT_DIR . "/files/Music/" . $lista . '.mp3',
                        'cover' => "../" . APP_DIR . "/" . WEBROOT_DIR . "/files/Music/".$info[0]."/".$info[1]."/Tapa.jpg"
                    );

                }                
                return $resultado;
            } else {
                return false;
            }
        }
         
        public function updateSongsList($data = null){
            if($data){
                 $tmp['Song'] = $data['Song']; 
                 //debug($data);
                    if($this->save($data)){
                        return $tmp;
                    } else {
                        debug('NO guardo');
                        return false;
                    } 
            }
        }
        
        public function updateSongsListTmp($data = null, $user = null){
            $c = array('Lista.name' => 'tmp', 'user_id' => $user);
            $buscaTmp = $this->find('first', array(
                    'conditions' => $c,
                    'recursive' => -1,
                    'fields' => array('id')
            ));            
            
            $setTmp = array(
                'Lista' => array('id' => $buscaTmp['Lista']['id']),
                'Song' => $data
                
            );
            
            $tmp['Song'] = $setTmp['Song'];
            if($this->save($setTmp)){
                return $tmp;
            } else {
                debug('NO guardo');
                return false;
            }                 
        }        
        
        public function getSongsList($data = null){
            if($data){
                $conditions = array('Lista.id' => $data['Lista']['id']);
                $listado = $this->find('first', array(
                            'conditions' => $conditions,
                            'fields' => array('Lista.id','Lista.name'),
                            'contain' => array('Song.id','Song.name')
                    ));
                foreach ($listado['Song'] as $value) {
                    $tmp['Song'][] = $value['id'];
                }
                return $tmp;
            }
        }
        
}
