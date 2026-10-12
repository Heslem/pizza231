<?php
require 'vendor/autoload.php';

// Тест ProductController
try {
    $c = new App\Controllers\ProductController();
    $output = $c->get(1);
    
    if (strpos($output, 'Warning') !== false || strpos($output, 'Deprecated') !== false) {
        echo "FAIL: Вывод содержит предупреждения\n";
        echo substr($output, 0, 200) . "\n";
    } else {
        echo "PASS: ProductController работает без ошибок\n";
    }
} catch (Throwable $e) {
    echo "FAIL: " . $e->getMessage() . "\n";
}

// Тест CatalogController
try {
    $cc = new App\Controllers\CatalogController();
    ob_start();
    $cc->get();
    $catalogOutput = ob_get_clean();
    
    if (strpos($catalogOutput, 'Warning') !== false || strpos($catalogOutput, 'Deprecated') !== false) {
        echo "FAIL: Вывод содержит предупреждения\n";
    } else {
        echo "PASS: CatalogController работает без ошибок\n";
    }
} catch (Throwable $e) {
    echo "FAIL: " . $e->getMessage() . "\n";
}

echo "=== Тест завершён ===\n";
