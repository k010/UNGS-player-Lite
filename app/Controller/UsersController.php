<?php
class UsersController extends AppController {
    public function beforeFilter() {
      parent::beforeFilter();
          $this->Auth->allow('login', 'logout', 'add');          
    }    

    function login() {
        if(!empty($this->request->data)) {            
            $this->User->set($this->request->data);
            if($this->User->validates()) {
               if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
               }else{
                $this->Session->setFlash(__('Invalido username o password, Intente de nuevo'), 'flash_error');
                } 
            }
        }
        
    }

    function logout() {
        $this->redirect($this->Auth->logout());
    }    
    
    
    
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }
                
    public function add() {
        if(!empty($this->request->data)){
            $this->User->set($this->request->data);
            if($this->User->validates()){
                if($this->User->save($this->request->data)){
                    // crea una lista temporal una vez que se registro
                    $idUser = $this->User->getLastInsertID();
                    $lista = array(
                        'Lista' => array(
                            'user_id' => $idUser,
                            'name' => 'tmp',
                            'description' => 'lista tmp',
                            'status' => 1
                        )
                    );
                    if($this->User->Lista->save($lista)){
                        $this->Session->setFlash(__(Configure::read('Mensaje.ok')), 'flash_ok');
                        $this->redirect(array('action' => 'index'));                        
                    }

                }  else {
                    $this->Session->setFlash(__(Configure::read('Mensaje.error')), 'flash_error');
                    }
            }else{
                $this->Session->setFlash(__(Configure::read('Mensaje.validacion')), 'flash_info');
            }
        }
    }
        
    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__(Configure::read('Mensaje.validacion')), 'flash_info');
        }
        
	$conditions = array('User.id' => $id);
	$user = $this->User->find('first', array('conditions' => $conditions));
	$this->set(compact('user'));         
        
    }
        
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__(Configure::read('Mensaje.error')), 'flash_error');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            // chequea si hay algo para subir
            if($this->User->isUploadedFile($this->request->data['User']['photo'])){
               // sube la imagen
                if($this->User->uploadImage($this->request->data['User']['photo'])){
                    // setea en db el nombre de la imagen
                    $this->request->data['User']['photo'] = $this->request->data['User']['photo']['name'];
                    $this->Session->setFlash(__(Configure::read('Mensaje.ok')), 'flash_ok');
                } else {
                    $this->Session->setFlash(__(Configure::read('Mensaje.error')), 'flash_error');
                }
            } else {
                // deja la imagen que ya tenia
                $this->request->data['User']['photo'] = $this->request->data['User']['photo_name'];
                unset($this->request->data['User']['photo_name']);
            }
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__(Configure::read('Mensaje.ok')), 'flash_ok');
                //$this->redirect(array('controller' => 'users', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__(Configure::read('Mensaje.validacion')), 'flash_info');
            }
        } else {
            
            $conditions = array('User.id' => $id);
            $user = $this->User->find('first', array('conditions' => $conditions));
            $this->request->data = $user;            
            unset($this->request->data['User']['password']);
            
        }

        $photo_name = $this->User->find();
        $photo_name = $photo_name['User']['photo'];

        $this->set(array('photo_name' => $photo_name, 'id' => $id));            

    }
        
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario invalido'), 'flash_error');
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('eliminado OK'), 'flash_ok');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__(Configure::read('Mensaje.validacion')), 'flash_info');
        $this->redirect(array('action' => 'index'));
    }        

}
