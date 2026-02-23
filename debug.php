<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

// Проверяем загрузку
echo "1. Старт диагностики<br>";

try {
    // Пытаемся загрузить автозагрузчик
    $autoloadPath = __DIR__ . '/vendor/autoload.php';
    echo "2. Путь к autoload: $autoloadPath<br>";
    
    if (file_exists($autoloadPath)) {
        echo "3. Файл autoload.php найден<br>";
        require_once $autoloadPath;
        echo "4. Autoload загружен<br>";
        
        // Проверяем проблемный класс
        if (class_exists('SebastianBergmann\Version')) {
            echo "5. Класс Version существует<br>";
            
            // Пробуем создать объект
            try {
                $version = new SebastianBergmann\Version('1.0.0', __DIR__);
                echo "6. Объект Version создан<br>";
                echo "7. Версия: " . $version->asString() . "<br>";
            } catch (Throwable $e) {
                echo "8. Ошибка при создании объекта: " . $e->getMessage() . "<br>";
                echo "9. Файл: " . $e->getFile() . ":" . $e->getLine() . "<br>";
            }
        } else {
            echo "5. Класс Version НЕ существует!<br>";
            
            // Проверяем файл
            $versionFile = __DIR__ . '/vendor/sebastian/version/src/Version.php';
            if (file_exists($versionFile)) {
                echo "6. Файл Version.php найден<br>";
                echo "7. Содержимое:<br><pre>";
                echo htmlspecialchars(file_get_contents($versionFile));
                echo "</pre>";
            } else {
                echo "6. Файл Version.php НЕ найден<br>";
            }
        }
        
        // Пробуем загрузить Laravel
        echo "<br>--- Загрузка Laravel ---<br>";
        try {
            $app = require __DIR__ . '/bootstrap/app.php';
            echo "8. Laravel app загружен<br>";
            
            $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
            echo "9. Kernel создан<br>";
            
            echo "10. Laravel загружен успешно!<br>";
        } catch (Throwable $e) {
            echo "Ошибка Laravel: " . $e->getMessage() . "<br>";
        }
        
    } else {
        echo "3. Файл autoload.php НЕ найден!<br>";
    }
} catch (Throwable $e) {
    echo "ГЛОБАЛЬНАЯ ОШИБКА: " . $e->getMessage() . "<br>";
    echo "Файл: " . $e->getFile() . ":" . $e->getLine() . "<br>";
}

echo "<br>Диагностика завершена<br>";