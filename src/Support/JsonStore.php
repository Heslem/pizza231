<?php
namespace App\Support;

/**
 * Простое хранилище данных в JSON-файле (fallback-слой моделей)
 */
class JsonStore
{
    private string $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     * Прочитать данные из JSON-файла
     *
     * @return array Данные или пустой массив, если файл отсутствует/битый
     */
    public function read(): array
    {
        if (!file_exists($this->file)) {
            return [];
        }

        $data = json_decode(file_get_contents($this->file), true);

        return is_array($data) ? $data : [];
    }

    /**
     * Записать данные в JSON-файл
     */
    public function write(array $data): bool
    {
        $dir = dirname($this->file);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        return file_put_contents(
            $this->file,
            json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        ) !== false;
    }

    /**
     * Путь к файлу
     */
    public function path(): string
    {
        return $this->file;
    }
}
