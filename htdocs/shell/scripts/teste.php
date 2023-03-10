<?php

ini_set('display_errors', true);
ini_set("memory_limit", -1);
set_time_limit(0);

error_reporting(E_ALL);
chdir(dirname(__FILE__));

$mageMagento = '../../app/Mage.php';

require $mageMagento;

umask(0);
Mage::app()->getStore();
Mage::app()->setCurrentStore(1);

######################################################################

$productData = array(    
        'sku'           => 'product',
        'name'          => 'Product',
        'description'   => 'Description of product',
        'short_description'   => 'Description of product',
        'weight'        => 100,
        'short_desc'    => 'Short description of product',
        'price'         => '10.00',        
        'category_ids'    => array(3),
        'status'        => 1,
        'visibility'    => 4,
        'tax_class_id'  => 2,
        'website_ids'   => array(1),
        'attribute_set_id' => 4,
        'type_id'       => 'simple',
        'stock_data'    => array(
            'use_config_manage_stock' => 0,
            'manage_stock' => 1,
            'min_sale_qty' => 1,
            'max_sale_qty' => 2,
            'is_in_stock' => 1,
            'qty' => 10
        )

);

for ($i = 0; $i < 20; $i++) {
    $product = Mage::getModel('catalog/product');
    $productData['sku'] = $productData['sku'] . md5(uniqid($i));
    $productData['name'] = $productData['name'] . md5(uniqid($i));    
    $product->setData($productData);
    $product->save();
}

