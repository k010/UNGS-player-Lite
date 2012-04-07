<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
        public $name = 'User';
	public $displayField = 'username';
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo requerido',
				//'allowEmpty' => false,
				//'required' => true,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Campo requerido',
				//'allowEmpty' => false,
				//'required' => true,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
                        'isunique' => array(
				'rule' => 'isUnique',
				'message' => 'Email repetido',
                                
                        ),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo requerido',
				//'allowEmpty' => false,
				//'required' => true,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'psword' => array(
			'identicalFieldValues' => array(
				'rule' => array('identicalFieldValues', 'password'),
				'message' => 'contraseñas no coinciden',
				//'allowEmpty' => false,
				//'required' => true,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		), 
                'photo' => array(
			'image' => array(
				'rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg')),
				'message' => 'solo archivos de imagenes jpeg/jpg/gif/png',
				//'allowEmpty' => false,
				//'required' => true,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		), 
	);
    
    public $hasMany = 'Lista';    
        
        
    public function beforeSave() {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
    
    function identicalFieldValues( $field=array(), $compare_field=null ) {
        foreach( $field as $key => $value ){
            $v1 = $value;
            $v2 = $this->data[$this->name][ $compare_field ];                 
            if($v1 !== $v2) {
                return FALSE;
            } else {
                continue;
            }
        }
        return TRUE;
    }
    
    function isUploadedFile($val){
        if ((isset($val['error']) && $val['error'] == 0) || (!empty( $val['tmp_name']) && $val['tmp_name'] != 'none')) {
            return is_uploaded_file($val['tmp_name']);
        }
        return false;
    }

    function uploadImage($val){
        $origen = $val['tmp_name'];
        $destino = WWW_ROOT . 'img\users\\' . $val['name'];
        if(move_uploaded_file($origen, $destino)){
            return true;
        }

        return false;
    }
    
}

