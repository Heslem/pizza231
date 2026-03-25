<?php
namespace App\Controllers;
use App\Views\OrderTemplate;
use App\Models\Product;

class OrderController {
    public function get(): string 
    {
        $product = new Product();
        // получаем массив с характеристиками товаров из корзины
        $data = $product->getBasketData();
        return OrderTemplate::getOrderTemplate($data);
    }
}