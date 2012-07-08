<?php
App::uses('AppController', 'Controller');
/**
 * Songs Controller
 *
 * @property Song $Song
 */
class Songsv2Controller extends AppController {

    public function index() {
        $aux = $this->Songsv2->find('all');
        $listado = $this->Songsv2->setInfoSong($aux);
        
        $userId = $this->Session->read('Auth.User.id');
        $condicion = array('User.id' => $userId);
        $userList = $this->Songsv2->Lista->find('list', array('conditions' => $condicion, 'recursive' => 0));
        //debug($userList);
        
        $this->set(array('songs' => $listado, 'userList' => $userList));
    }
         
    public function index2() {
        $songs = $this->Songsv2->getAllSongs();
        //pr($songs);
        
        //preg_match_all('/([\d]+)/', "03-black_label_society-riders_of_the_damned.mp3", $test);
        //pr($test[0][0]);
        
        //$this->Songsv2->readSong();
        //exit();
        
        
        
        // listas del usuario
        $userId = $this->Session->read('Auth.User.id');
        $condicion = array('User.id' => $userId);
        $userList = $this->Songsv2->Lista->find('list', array('conditions' => $condicion, 'recursive' => 0));
        
        $this->set(array('userList' => $userList, 'listado' => $songs));
    }    
    
    
    public function add() {
        if($this->Songsv2->updateSongsLibrary($this->Session->read('Auth.User'))){
            $this->Session->setFlash(__('!!! Se ha encontrado nueva musica y ha actualizado correctamente !!!'), 'flash_info'); 
        } else {
            $this->Session->setFlash(__('La base de datos de musica se encuentra al dia'), 'flash_ok'); 
        }
    }

    public function view($id = null) {
        $this->Songsv2->id = $id;
        if (!$this->Songsv2->exists()) {
            throw new NotFoundException(__(Configure::read('Mensaje.validacion')));
        }
        
	$conditions = array('Song.id' => $id);
	$song = $this->Songsv2->find('first', array('conditions' => $conditions));
	$this->set(compact('song'));        
       
    }
        
    public function edit($id = null) {

    }
        
    public function delete($id = null) {

    }
}
