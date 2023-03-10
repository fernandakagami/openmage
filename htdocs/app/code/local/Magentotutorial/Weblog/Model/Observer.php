<?php

class Magentotutorial_Weblog_Model_Observer
{
        public function productSaveBefore(Varien_Event_Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();
        $product->setName('editado');
    }
}
