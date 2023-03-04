<?php

class CursoMagento_AulaHelper_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $helper = Mage::helper('cursomagento_aulahelper');

        $aula = Mage::helper('cursomagento_aulahelper/aula');

        $core = Mage::helper('core');

        $usd = 50.00;
        $name = "Fernanda";

        echo $helper->__('This is Curso Magento!');
        echo $core->currency($usd);

        $encrypted = $core->encrypt($name);
        echo $encrypted . '<br>';

        echo $core->decrypt($encrypted);
    }

}