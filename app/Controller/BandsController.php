<?php
App::uses('AppController', 'Controller');
/**
 * Bands Controller
 *
 * @property Band $Band
 */
class BandsController extends AppController {
    var $helpers = array('Html', 'Js');
    

    public function index() {
        $this->Band->recursive = 2;
        $this->set('bands', $this->paginate());
    }

    
    public function play() {
        $this->Band->recursive = 2;
        $this->set('bands', $this->paginate());
    }    
    
    public function add() {
        if(!empty($this->request->data)){
            $this->Band->set($this->request->data);
            if($this->Band->validates()){
                pr($this->request->data);
                if($this->Band->save($this->request->data)){
                    $this->Session->setFlash(__(Configure::read('Mensaje.ok'))); 
                    $this->redirect(array('action' => 'index'));
                }  else {
                    $this->Session->setFlash(__(Configure::read('Mensaje.error')));
                    }
            }else{
                $this->Session->setFlash(__(Configure::read('Mensaje.validacion')));
            }
        }
    }
        
    public function view($id = null) {
        $this->Band->id = $id;
        if (!$this->Band->exists()) {
            throw new NotFoundException(__(Configure::read('Mensaje.validacion')));
        }
        
	$conditions = array('Band.id' => $id);
	$band = $this->Band->find('first', array('conditions' => $conditions));
	$this->set(compact('band'));        
       
    }
        
    public function edit($id = null) {
        $this->User->id = $id;
        /*
        if (!$this->User->exists()) {
            throw new NotFoundException(__(Configure::read('Mensaje.error')));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            // chequea si hay algo para subir
            if($this->User->isUploadedFile($this->request->data['User']['photo'])){
               // sube la imagen
                if($this->User->uploadImage($this->request->data['User']['photo'])){
                    // setea en db el nombre de la imagen
                    $this->request->data['User']['photo'] = $this->request->data['User']['photo']['name'];
                }
            } else {
                // deja la imagen que ya tenia
                $this->request->data['User']['photo'] = $this->request->data['User']['photo_name'];
                unset($this->request->data['User']['photo_name']);
            }
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__(Configure::read('Mensaje.ok')));
                $this->redirect(array('controller' => 'home', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__(Configure::read('Mensaje.validacion')));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
        
        $photo_name = $this->User->find();
        $photo_name = $photo_name['User']['photo'];

        $this->set('photo_name', $photo_name);            
            */
    }
        
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Band->id = $id;
        if (!$this->Band->exists()) {
            throw new NotFoundException(__('Cancion invalido'));
        }
        if ($this->Band->delete()) {
            $this->Session->setFlash(__('eliminado OK'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__(Configure::read('Mensaje.validacion')));
        $this->redirect(array('action' => 'index'));
    } 
    
}
