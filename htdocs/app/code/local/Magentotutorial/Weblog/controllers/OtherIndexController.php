<?php 

class Magentotutorial_Weblog_IndexController extends Mage_Core_Controller_Front_Action {

    public function showAllBlogPostsAction() {
        $posts = Mage::getModel('weblog/blogpost')->getCollection();  
        header('Content-type: application/json');
        echo json_encode($posts->getData());        
    }
        
    /*
    public function showAllBlogPostsAction() {
        $posts = Mage::getModel('weblog/blogpost')->getCollection();
        echo "<table border='1'><tr><th>Post ID</th><th>Post Title</th><th>Content</th><th>Updated At</th><th>Created At</th></tr>";
        foreach($posts as $blogpost){
            echo "<tr><td>".$blogpost->getId()."</td>";
            echo "<td>".$blogpost->getTitle()."</td>";
            echo "<td>".$blogpost->getPost()."</td>";
            echo "<td>".$blogpost->getDate()."</td>";
            echo "<td>".$blogpost->getTimestamp()."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    */

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

    /*
    public function createNewPostAction() {
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->setTitle('Code Post!');
        $blogpost->setPost('This post was created from code!');
        $blogpost->setDate(new DateTime());
        $blogpost->save();
        echo 'post with ID ' . $blogpost->getId() . ' created';
    }
    */

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

    /*
    public function editFirstPostAction() {
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->load(1);
        $blogpost->setTitle("The First post!");
        $blogpost->save();
        echo 'post edited';
    }
    */

    /*
    public function updatePostAction() {
        $blogposts = Mage::getModel('weblog/blogpost')->getCollection();
        foreach($blogposts as $post)
        {
            if($post->getId()%2==0)
            {
                $post->setPost("This is updated by updatePostAction!!!!");
                $post->setUpdatedAt(new DateTime());
                $post->save();
            }
        }
        echo 'Posts with even number id has been updated.';
        $this->showAllBlogPostsAction();
    }
    */

    /*
    public function deleteFirstPostAction() {
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->load(1);
        $blogpost->delete();
        echo 'post removed';
    }
    */

    public function deletePostAction() {
        $params = $this->getRequest()->getParams();
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->load($params['id']);
        echo("Deleting the blogpost with an ID of ".$params['id']."<br/>");
        $blogpost->delete();
        echo("The blogpost with an ID of ".$params['id']." has been deleted"."<br/>");
    }   
    
}