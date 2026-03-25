<?php
namespace App\Views;

class OrderTemplate extends BaseTemplate {
    public static function getOrderTemplate(array $arr): string {
        $template = parent::getTemplate();
        $title= 'Оформление заказа';
        $content = '<main class="row">
            <h3 class="mb-5">Корзина</h3>';

        $all_sum = 0;
        foreach ($arr as $product) {
		    $name = $product['name'];
            $price = $product['price'];
		    $quantity = $product['quantity'];

            $sum = $price * $quantity;
            $all_sum += $sum;

            $content .= <<<LINE
                <div class="row">
                    <div class="col-5">
                    {$name}
                    </div>
                    <div class="col-3">
                    {$quantity} ед. x {$price} руб.
                    </div>
                    <div class="col-2">
                    {$sum} ₽
                    </div>
                </div>
                LINE;
	    }            
        $content .= '</main>';
        if ($all_sum == 0) {
            $content .= <<<LINE3
            <div class="row">
                <div class="col-12">
                - нет добавленных товаров -
                </div>
            </div>
            LINE3;
        } else {
            $content .= <<<LINE3
            <hr>
            <div class="row">
                <div class="col-5">
                <strong>Итоговая сумма заказа:</strong>
                </div>
                <div class="col-3">
                    &nbsp;
                </div>
                <div class="col-2">
                <strong>{$all_sum}</strong> ₽
                </div>
            </div>

            <div class="row">
                <div class="col-8">
                    &nbsp;
                </div>
                <div class="col-2 float-end">
                    <form action="/basket_clear" method="POST">
                        <button type="submit" class="btn btn-secondary mt-3">Очистить корзину</button>
                    </form>
                </div>
            </div>            
            LINE3;
        }
        $resultTemplate = sprintf($template, $title, $content);
        return $resultTemplate;
    }
}