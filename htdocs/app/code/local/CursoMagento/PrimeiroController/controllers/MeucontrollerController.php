<?php

class CursoMagento_PrimeiroController_MeucontrollerController extends CursoMagento_PrimeiroController_Controller_Front_Action
{

    public function minhaactionAction()
    {
        $this->printarNome();

        // if (!$this->getRequest()->isPost()) {
        //    $this->_redirect('*/*/actionredirect');
        //    return;
        //}        

        // $this->_forward('actionforward', 'meucontroller', 'primeirocontroller' . array());

        /* 
        $params = $this->getRequest()->getParams();

        var_dump($params);

        $name = $this->getRequest()->getParam('name', 'Nome Default');
        $lastname = $this->getRequest()->getParam('lastname', 'Sobrenome Default');

        $name = $this->getRequest()->getPost('name', 'Nome Default');

        if ($this->getRequest()->isPost()) {
            $post = $this->getRequest()->getPost();
        }

        if ($this->getRequest()->isSecure()) {          
        }

        $this->getResponse()->setBody('Fernanda');

        echo 'Oi, meu nome é ' . $name . ' e meu sobrenome é ' . $lastname;

        $this->loadLayout();

        $this->renderLayout();
        */
    }

    public function actionforwardAction()
    {
        echo 'Action Forward';
    }

    public function actionredirectAction()
    {
        echo 'Action Redirect';
    }
    
}