<?php
App::uses('AppController', 'Controller');
/**
 * Albums Controller
 *
 * @property Album $Album
 */
class AlbumsController extends AppController {

    public function index() {
        $this->Album->recursive = 0;
        $this->set('albums', $this->paginate());
        
        
        //$conditions = array('Album.id' => $id);
	//$song = $this->Album->find('first', array('conditions' => $conditions));
	//$this->set(compact('song'));
        pr($this->Album->find('all'));
    }
                
    public function add() {
        if(!empty($this->request->data)){
            $this->Album->set($this->request->data);
            if($this->Album->validates()){
                pr($this->request->data);
                if($this->Album->save($this->request->data)){
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
        $this->Album->id = $id;
        if (!$this->Album->exists()) {
            throw new NotFoundException(__(Configure::read('Mensaje.validacion')));
        }
        
	$conditions = array('Album.id' => $id);
	$album = $this->Album->find('first', array('conditions' => $conditions));
	$this->set(compact('album'));        
       
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
        $this->Album->id = $id;
        if (!$this->Album->exists()) {
            throw new NotFoundException(__('Cancion invalido'));
        }
        if ($this->Album->delete()) {
            $this->Session->setFlash(__('eliminado OK'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__(Configure::read('Mensaje.validacion')));
        $this->redirect(array('action' => 'index'));
    } 
    
}
