<?php
/**
 *
 * @category    Nayjest
 * @package     Nayjest_BuyRandomProduct
 * @copyright   Copyright (c) 2013 Vitalii Stepanenko
 * @author      Vitalii Stepanenko <mail@vitaliy.in>
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Nayjest_BuyRandomProduct_Block_Button extends Mage_Core_Block_Template
{
    public function getProducts()
    {
        $products = Mage::getBlockSingleton('catalog/product_list')->getLoadedProductCollection();
        //collection can be not loaded yet, so
        $products->load();
        return $products;
    }

    public function getRandomProduct()
    {
        /** @var $products Mage_Catalog_Model_Resource_Product_Collection */
        $products = $this->getProducts();
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
