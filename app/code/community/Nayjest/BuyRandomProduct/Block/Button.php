<?php
class Nayjest_BuyRandomProduct_Block_Button extends Mage_Core_Block_Template
{
    public function getProducts() {

        return Nayjest_BuyRandomProduct_Model_Observer::$products;
    }

    public function getBlockProducts() {
        $products =  Mage::getBlockSingleton('catalog/product_list')->getLoadedProductCollection();
        //collection can be not loaded yet, so
        $products->load();
        return $products;
    }

    public function getRandomProduct() {
        /** @var $products Mage_Catalog_Model_Resource_Product_Collection */
        $products = $this->getBlockProducts();
        $items = $products->getItems();
        $randomIndex = array_rand($items);
        return $items[$randomIndex];
    }

    public function getAddRandToCartUrl()
    {
        $product = $this->getRandomProduct();
        return $this->helper('checkout/cart')->getAddUrl($product, array());
    }
}
