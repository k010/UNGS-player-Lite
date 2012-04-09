<?php
App::uses('AppModel', 'Model');
/**
 * List Model
 *
 * @property Song $Song
 */
class Lista extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
/**
 * Validation rules
 *
 * @var array
 */
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
        
        
        
        public function setTmpList($data){
            // busca la lista tmp
            $conditions = array('Lista.name' => 'tmp');
            $listado = $this->find('first', array('conditions' => $conditions));

            // carga los temas a la lista tmp
            $tmp = array();
            $tmp['Lista'] = $listado['Lista'];
            $tmp['Song'] = $data;
            unset($tmp['Lista']['modified']);
            unset($tmp['Lista']['created']);
            
            //debug($tmp);
            
            if($this->save($tmp)){
                return $result = $tmp['Song'];
            } else {
                return false;
            }
            
        }

        public function getTmpList(){
            $conditions = array('Lista.name' => 'tmp');
            $listado = $this->find('first', array(
                        'conditions' => $conditions,
                        'fields' => array('id','name'),
                ));
            
            foreach ($listado['Song'] as $value) {
                $tmp['Song'][] = $value['id'];
            }
            
            return $tmp;
        }
        
        
        public function getSongsList($data = null){
            
            if($data){
                $conditions = array('Lista.id' => $data['Listas']['userlist']);
                $listado = $this->find('first', array(
                            'conditions' => $conditions,
                            'fields' => array('Lista.id','Lista.name'),
                            'contain' => array(
                                'Song' => array(
                                    'fields' => array('Song.id', 'Song.name'),
                                )
                            ),
                            
                    ));

                
                debug($listado);
                foreach ($listado['Song'] as $value) {
                    $tmp['Song'][] = $value['id'];
                }

                return $tmp;
            }
        }
        
        
        
}
