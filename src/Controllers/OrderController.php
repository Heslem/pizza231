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

    public function create() {
        $model = new Product();
        // список заказанных продуктов - берем список товаров из корзины
        $products = $model->getBasketData();
        // подготовка массив c данными заказа
        $arr = $model->prepareData( $_POST, $products );
        // сохранение заказа
        $model->saveData($arr);

        // очистка корзины
        $_SESSION['basket'] = [];
        // вывод сообщения
        $_SESSION['flash'] = "Спасибо! Ваш заказ успешно создан и передан службе доставки";
        header("Location: /");
	    return '';
    }

}