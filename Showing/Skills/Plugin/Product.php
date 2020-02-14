<?php

namespace Showing\Skills\Plugin;

class Product
{
    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        $adjustedPrice = 10;
        
        return $result * $adjustedPrice;
    }

}