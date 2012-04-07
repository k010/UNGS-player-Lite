<?php
App::uses('AppController', 'Controller');

class ListasController extends AppController {
    
    public function index() {
        $this->Lista->recursive = -1;
        $userId = $this->Session->read('Auth.User.id');
        $this->set('listas', $this->paginate('Lista', array('Lista.user_id' => $userId)));
    }

    public function play() {
        //$this->Session->setFlash('Something custom!', 'flash_custom');
        
        if(!empty($this->request->data)){
            $listado = $this->Lista->setTmpList($this->request->data);
            //$this->Session->setFlash(__('Lista actualizada'), 'flash_ok');
        } else {
            $listado = $this->Lista->getTmpList();
            //$this->Session->setFlash(__('Lista anterior'), 'flash_info'); 
        }
            
         // busca los datos    
         $datos = $this->Lista->Song->find('all', array(
              'fields' => array('name'),
              'conditions' => array('Song.id' => $listado['Song'])
         ));
         
         // setea la info para la vista
         $info = $this->Lista->setInfoSong($datos);
         if($info){
             $this->set('datos',$info);
         } else {
             $this->Session->setFlash(__('No se pudo reproducir la musica')); 
         }
         
            
            
    }
    
    
    public function add() {
        if(!empty($this->request->data)){
            $this->Lista->set($this->request->data);
            if($this->Lista->validates()){
                pr($this->request->data);
                if($this->Lista->save($this->request->data)){
                    $this->Session->setFlash(__(Configure::read('Mensaje.ok'))); 
                    $this->redirect(array('action' => 'index'));
                }  else {
                    $this->Session->setFlash(__(Configure::read('Mensaje.error')));
                    }
            }else{
                $this->Session->setFlash(__(Configure::read('Mensaje.validacion')));
            }
        }  
        
        $userId = $this->Session->read('Auth.User.id');
        $this->set('userId', $userId);
        
    }
        
    public function view($id = null) {
        $userId = $this->Session->read('Auth.User.id');
        $condicion = array('Lista.id' => $id, 'Lista.user_id' => $userId);
        $lista = $this->Lista->find('first', array('conditions' => $condicion, 'recursive' => -1));
        $this->set('lista', $lista);
    }
        
    public function edit($id = null) {
        $this->Lista->id = $id;
        if (!$this->Lista->exists()) {
            throw new NotFoundException(__(Configure::read('Mensaje.error')), 'flash_error');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            pr($this->request->data);
            
            if ($this->Lista->save($this->request->data)) {
                $this->Session->setFlash(__(Configure::read('Mensaje.ok')), 'flash_ok');
                $this->redirect(array('controller' => 'listas', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__(Configure::read('Mensaje.validacion')), 'flash_info');
            }
        } else {
            $userId = $this->Session->read('Auth.User.id');
            $condicion = array('Lista.id' => $id, 'Lista.user_id' => $userId);
            $lista = $this->Lista->find('first',array('conditions' => $condicion, 'recursive' => -1));
            $this->request->data = $lista;
        }
    }
        
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Lista->id = $id;
        if (!$this->Lista->exists()) {
            throw new NotFoundException(__('Lista invalida'), 'flash_error');
        }
        if ($this->Lista->delete()) {
            $this->Session->setFlash(__('eliminado OK'), 'flash_ok');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__(Configure::read('Mensaje.validacion')), 'flash_info');
        $this->redirect(array('action' => 'index'));        
        
    } 
    
}
