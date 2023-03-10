<?php 

class Magentotutorial_Weblog_IndexController extends Mage_Core_Controller_Front_Action {

    public function indexAction() {
        
        $posts = Mage::getModel('weblog/blogpost')->getCollection();        
        $postsData = $posts->getData();

        $this->loadLayout();

        $crud = $this->getLayout()->getBlock("conteudo");

        $crud->setData('post', $postsData);
        
        $this->renderLayout();
    }
        
    public function readPostAction() {
        $params = $this->getRequest()->getParams();
        $blogpost = Mage::getModel('weblog/blogpost');        
        $blogpost->load($params['id']);
        $data = $blogpost->getData();
        header('Content-type: application/json');
        echo json_encode($data);
    }

    public function createNewPostAction() {            
        //$data = json_decode(file_get_contents('php://input'), true);
        $data = json_decode($this->getRequest()->getRawBody(), true);
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->setTitle($data['title']);
        $blogpost->setPost($data['post']);
        $blogpost->setDate((new DateTime())->format('Y-m-d H:i:s'));
        $blogpost->save();        
    }

    public function updatePostAction() {
        //$data = json_decode(file_get_contents('php://input'), true);
        $data = json_decode($this->getRequest()->getRawBody(), true);
        $params = $this->getRequest()->getParams();        
        $blogpost = Mage::getModel('weblog/blogpost');        
        $blogpost->load($params['id']);
        $blogpost->setTitle($data['title']);
        $blogpost->setPost($data['post']);
        $blogpost->setTimestamp((new DateTime())->format('Y-m-d H:i:s'));   
        $blogpost->save();        
    }

    public function deletePostAction() {
        $params = $this->getRequest()->getParams();
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->load($params['id']);        
        $blogpost->delete();        
    }   
    
}