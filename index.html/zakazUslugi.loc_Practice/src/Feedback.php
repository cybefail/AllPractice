<?php
namespace src;

use InvalidArgumentException;
use src\Entity;
use src\exceptions\InvalidException;
class Feedback extends Entity{
    protected string $name;
    protected string $status_id;
    protected string $phone;
    protected string $feedback;
    protected array $img;
    protected string $create_at;
    protected int $rating;
    protected string $agree;
    public string $tableName = 'review';

    public function getName(): string{
        return $this->name ?? '';
    }
    public function getPhone(): string{
        return $this->phone ?? '';
    }
    public function getFeedback(): string{
        return $this->feedback ?? '';
    }

    public function loadFromForm(array $fields, array $files) : void {
        $fields['img'] = $files;
        $this->load($fields);
    }

public function validate(): void{
    if(empty($this->name)){
        throw new InvalidArgumentException('Не передано имя');
    }
    if(empty($this->phone)){
        throw new InvalidArgumentException('Не передан телефон');
    }
    if(empty($this->feedback)){
        throw new InvalidArgumentException('Не передан текст отзыва');
    }
    if(!preg_match('/^[а-яА-Я\s\-]+$/u', $this->name)){
        throw new InvalidArgumentException('Неверный формат ФИО');
    }
    // Более мягкая проверка телефона
    if(!preg_match('/^(\+7|8)?[\s\-\(\)]*\d[\d\s\-\(\)]{9,}$/', $this->phone)){
        throw new InvalidArgumentException('Введите корректный номер телефона');
    }
    if(strlen(trim($this->feedback)) < 10){
        throw new InvalidArgumentException('Отзыв должен содержать минимум 10 символов');
    }
    if(strlen($this->feedback) > 500){
        throw new InvalidArgumentException('Отзыв слишком длинный (максимум 500 символов)');
    }

    if(empty($this->img['tmp_name']) || $this->img['error'] !== 0){
        throw new InvalidArgumentException('Файл не загружен');
    }

    $allowedExtenstion = ['jpg', 'png', 'jpeg', 'gif'];
    $extenstion = strtolower(pathinfo($this->img['name'], PATHINFO_EXTENSION));
    if(!in_array($extenstion, $allowedExtenstion)){
        throw new InvalidArgumentException("Разрешены только jpg, png, gif");
    }
    if($this->img['size'] > 5*1024*1024){
        throw new InvalidArgumentException('Файл слишком большой (максимум 5 МБ)');
    }
    if(empty($this->agree) || $this->agree != '1'){
        throw new InvalidArgumentException('Нужно согласиться на обработку данных');
    }
}

    public function save(): bool {
            $fileName = uniqid() . '_' . $this->img['name'];
            $pathFile = 'uploads/' . $fileName;
            if(!move_uploaded_file($this->img['tmp_name'], $pathFile)){
                throw new InvalidArgumentException('Ошибка при загрузке файла');
            }
        $fields = ['name' => $this->name, 'phone' => $this->phone, 'feedback' => $this->feedback,
        'img' => $pathFile
        ];
        return $this->insert($fields);
    }
}
?>