<?php
App::uses('AppController', 'Controller');

class ListasController extends AppController {

        //public $paginate = array(
        //'limit' => 1
        //);
    
    
    public function index() {
        $this->Lista->recursive = 0;
        $this->set('listas', $this->paginate());
 
        
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
        
       $songs = $this->Lista->Song->find('list');
       $this->set(compact('songs'));        
        //pr($this->request->data);
        
    }
        
    public function view($id = null) {
        $condicion = array('Lista.id' => $id);
        $lista = $this->Lista->find('first', $condicion);
        
        $this->set('lista', $lista);
       
    }
        
    public function edit($id = null) {
        $this->Lista->id = $id;
        
       $songs = $this->Lista->Song->find('list');
       $this->set(compact('songs'));        
        pr($this->request->data);        
    }
        
    public function delete($id = null) {
    } 
    
}
