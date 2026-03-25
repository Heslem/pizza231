<?php
namespace App\Models;

use App\Config\Config;

class Product {
    /* открывает файл с именем Config::FILE_PRODUCTS в режиме чтения ('r'), 
    затем считывает все содержимое из него в переменную $data, 
    закрывает файл, декодирует строку (формата json) в ассоциативный массив $arr
    функцией json_decode($data, true); и возвращает получившийся массив $arr 
    оператором return
    */
    public function loadData(): ?array
    {
        $data = file_get_contents(Config::FILE_PRODUCTS);
        if ($data) {
            $arr = json_decode($data, true);
            return $arr;
        }
        return null;
    }

    public function getBasketData(): array {
        // проверка корзины на существование
        if (!isset($_SESSION['basket'])) {
            $_SESSION['basket'] = [];
        }
        $products = $this->loadData();
        $basketProducts= [];

        foreach ($products as $product) {
            $id = $product['id'];

            if (array_key_exists($id, $_SESSION['basket'])) {
                // количество товара берем то что указано в корзине
                $quantity = $_SESSION['basket'][$id]['quantity'];
                // остальные характеристики берем из массива всех товаров
                $name = $product['name'];
                $price= $product['price'];
                // сумму вычислим 
                $sum  = $price * $quantity;

                // добавим в новый массив
                $basketProducts[] = array( 
                    'id' => $id, 
                    'name' => $name, 
                    'quantity' => $quantity,
                    'price' => $price,
                    'sum' => $sum,
                );
            }//if
        }//foreach

	    return $basketProducts;
    }
}
