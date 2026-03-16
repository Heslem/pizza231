<?php
namespace App\Views;

class ProductTemplate extends BaseTemplate {
    public static function getTemplate(): string {
        $template = parent::getTemplate();
        $title= 'Главная страница';
        $content = <<<LINE
        <section>        
        <div class="h-50 w-50 mx-auto">          
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" style="height:80vh;">
                    <div class="carousel-item active">
                    <img src="/../../asserts/img/pizza01.jpg" class="d-block w-100 h-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="/../../asserts/img/pizza02.jpg" class="d-block w-100 h-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="/../../asserts/img/pizza03.jpg" class="d-block w-100 h-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>        
        </div>
        </section>
        <main class="row">
            <div class="p-5">
                <p>Здесь можно заказать пиццу с доставкой по городу Кемерово.</p>
                <p>Широкий ассортимент, низкие цены, быстрая доставка!</p>
                <p class="mt-5">Первая пицца бесплатно, при заказе 3000 руб!</p>
                <p> (*) Сайт разработан в рамках обучения в "Кузбасском кооперативном техникуме"<br>
                по специальности 09.02.07 "Специалист по информационным технологиям".</p>
            </div>
        </main> 
        LINE;
        $resultTemplate = sprintf($template, $title, $content);
        return $resultTemplate;
    }

    /* получает ассоциативный массив с данными о продукте
    и выводить их в виде карточки (шаблон Card из фреймворка Bootstrap)
    (слева картинка, справа - название, описание и цена).
    */
    public static function getCardTemplate($data):string {
        $card= <<<CARD
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{$data['image']}" class="img-fluid rounded-start" alt="{$data['name']}">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{$data['name']}</h5>
                        <p class="card-text">{$data['price']} рублей</p>
                        <p class="card-text"><small class="text-body-secondary">{$data['description']}</small></p>
                    </div>
                    </div>
                </div>
            </div>
        CARD;
        $template = parent::getTemplate();
        $title= 'Карточка товара: ' . $data['name'];
        $resultTemplate = sprintf($template, $title, $card);
        return $resultTemplate;
    }
}