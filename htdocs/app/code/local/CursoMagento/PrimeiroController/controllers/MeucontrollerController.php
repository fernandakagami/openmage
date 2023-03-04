<?php

class CursoMagento_PrimeiroController_MeucontrollerController extends CursoMagento_PrimeiroController_Controller_Front_Action
{

    public function minhaactionAction()
    {
        $params = $this->getRequest()->getParams();

        var_dump($params);

        $name = $this->getRequest()->getParam('name', 'Nome Default');
        $lastname = $this->getRequest()->getParam('lastname', 'Sobrenome Default');

        $name = $this->getRequest()->getPost('name', 'Nome Default');

        if ($this->getRequest()->isPost()) {
            $post = $this->getRequest()->getPost();
        }

        if ($this->getRequest()->isSecure()) {
            /** ... */
        }

        echo 'Oi, meu nome é ' . $name . ' e meu sobrenome é ' . $lastname;
    }
    
}