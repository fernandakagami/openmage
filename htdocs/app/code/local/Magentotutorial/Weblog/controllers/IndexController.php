<?php 

class Magentotutorial_Weblog_IndexController extends Mage_Core_Controller_Front_Action {

    public function showAllBlogPostsAction() {
        $posts = Mage::getModel('weblog/blogpost')->getCollection();  
        header('Content-type: application/json');
        echo json_encode($posts->getData());        
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
        $data = json_decode(file_get_contents('php://input'), true);        
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->setTitle($data['title']);
        $blogpost->setPost($data['post']);
        $blogpost->setDate((new DateTime())->format('Y-m-d H:i:s'));
        $blogpost->save();
        echo 'post with ID ' . $blogpost->getId() . ' created';
    }

    public function updatePostAction() {
        $data = json_decode(file_get_contents('php://input'), true);
        $params = $this->getRequest()->getParams();        
        $blogpost = Mage::getModel('weblog/blogpost');        
        $blogpost->load($params['id']);
        $blogpost->setTitle($data['title']);
        $blogpost->setPost($data['post']);
        $blogpost->setTimestamp((new DateTime())->format('Y-m-d H:i:s'));   
        $blogpost->save();
        echo 'post edited';
    }

    public function deletePostAction() {
        $params = $this->getRequest()->getParams();
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->load($params['id']);
        echo("Deleting the blogpost with an ID of ".$params['id']."<br/>");
        $blogpost->delete();
        echo("The blogpost with an ID of ".$params['id']." has been deleted"."<br/>");
    }   
    
}