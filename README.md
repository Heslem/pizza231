## Задание - создание модульного теста на бизнес-логику и безопасность

Работа с git
```
запустите Git Bash 
перейдите в каталог c:/xampp/htdocs
> cd c:/xampp/htdocs
выполните в bash терминале - получение изменений
> git pull
создайте новую ветку
> git checkout -b task-29-03-26-test-security
```
Итак, мы научились создавать заказы, записывать их в json-файл  
Давайте научимся их тестировать, а именно выполнять функциональные модульные тесты  
для проверки задач:  
- проверки бизнес-логики (правильности вычислений, проверки правил);  
- тесты безопасности (защита от иньекций вредоностного кода).  

Найдите метод create() для OrderController  
и создайте метод $model->prepareData( $_POST, $products ) для модели Product,  
который, получив два массива в качестве параметров:  
$_POST - с данными формы   
$products - товары из корзины   
подготовит массив $arr c данными заказа для последующего сохранения  

Установите PHPUnit как зависимость для разработки:  
`composer require --dev phpunit/phpunit`  
В каталоге `tests/` создайте файл ProductTest.php с неймспейсом Test.  
```
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testProbe() // Вместо testItAddsTwoNumbers
    {
        $this->assertEquals(4, 2 + 2);
    }
}
```
Настройте автозагрузку в composer.json:  
```
{
    "autoload": {
        "psr-4": {
            "App\\": "src/",
            "Test\\": "tests/"
        }
    }
}
```
Выполните команду для обновления автозагрузки:  
`composer dump-autoload`

Запустите тесты:  
`vendor/bin/phpunit --color ./tests`  

Закоммитьте и запуште изменения
```
> git status
> git add .
> git status
> git commit -m "Флеш сообщения"
> git push
```
Передвиньте в Project issues с этой задачей на "In progress"  
Скопируйте ссылку на ветку с выполненным заданием и закройте issue со ссылкой на эту ветку.  

Сдайте работу - создав запрос на изменения Pull Request   
- зайдите на github и создайте Pull Request со своего аккаунта в исходный репозиторий (для аккаунта Coopteh)  
