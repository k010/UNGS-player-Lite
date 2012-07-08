<?php
App::uses('AppController', 'Controller');
/**
 * Songs Controller
 *
 * @property Song $Song
 */
class SongsController extends AppController {

    public function index() {
        $aux = $this->Song->find('all');
        $listado = $this->Song->setInfoSong($aux);
        
        $userId = $this->Session->read('Auth.User.id');
        $condicion = array('User.id' => $userId);
        $userList = $this->Song->Lista->find('list', array('conditions' => $condicion, 'recursive' => 0));
        //debug($userList);
        
        $this->set(array('songs' => $listado, 'userList' => $userList));
    }
         
    public function add() {
        if($this->Song->isMusicLoaded()){
            $this->Session->setFlash(__('!!! Se ha encontrado nueva musica y ha actualizado correctamente !!!'), 'flash_info'); 
        } else {
            $this->Session->setFlash(__('La base de datos de musica se encuentra al dia'), 'flash_ok'); 
        }
    }

    public function view($id = null) {
        $this->Song->id = $id;
        if (!$this->Song->exists()) {
            throw new NotFoundException(__(Configure::read('Mensaje.validacion')));
        }
        
	$conditions = array('Song.id' => $id);
	$song = $this->Song->find('first', array('conditions' => $conditions));
	$this->set(compact('song'));        
       
    }
        
    public function edit($id = null) {

    }
        
    public function delete($id = null) {

    }
}
