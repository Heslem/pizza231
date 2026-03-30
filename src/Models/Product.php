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

    public function saveData($arr) {
        $nameFile= Config::FILE_ORDERS;

        $handle = fopen($nameFile, "r");
        if (filesize($nameFile) > 0){ 
            $data = fread($handle, filesize($nameFile)); 
            $allRecords = json_decode($data, true); 
        } else {
            $allRecords = [];
        }
        fclose($handle);
        
        $allRecords[]= $arr;
        $json = json_encode($allRecords, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        $handle = fopen($nameFile, "w");
        fwrite($handle, $json);
        fclose($handle);
     }

     public function prepareData(array $form_data, array $basket_data): array {
        $arr = [];

	    $arr['fio'] = $form_data['fio'];
        $arr['address'] = $form_data['address'];
        $arr['phone'] = $form_data['phone'];
        $arr['email'] = $form_data['email'];
        $arr['created_at'] = date("d-m-Y H:i:s");	// добавим дату и время создания заказа

        $arr['products'] = $basket_data;
	    
        // подсчитаем общую сумму заказа
        $all_sum = 0;
        foreach ($basket_data as $product) {
		    $all_sum += $product['price'] * $product['quantity'];
        }
        $arr['all_sum'] = $all_sum;

        return $arr;
     }
}
