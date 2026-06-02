<?php

namespace src;

use src\exceptions\InvalidArgumentException;

class Application extends Entity
{
    protected int $user_id;
    protected string $reason;
    protected string $text;
    protected string $date;
    protected string $time;
    protected string $created_at;
    protected string $status;
    public string $tableName = 'application';

    public function validate(): void{
        date_default_timezone_set('Europe/Moskow');
        if(empty($this->reason)){
            throw new InvalidArgumentException('Ну указана причина обращения');
        }
        if(empty($this->text)){
            throw new InvalidArgumentException('Ну указано описание');
        }
        if(empty($this->date)){
            throw new InvalidArgumentException('Не указана дата');
        }
        if(empty($this->time)){
            throw new InvalidArgumentException('Не указано время');
        }
        if(!preg_match('/^\d{4}-\d{2}-\d{2}$/', $this->date)){
            throw new InvalidArgumentException('Неверный формат даты');
        }
        if(!preg_match('/^\d{2}:\d{2}$/', $this->time)){
            throw new InvalidArgumentException('Неверный формат времени');
        }
    }
    public function saveApplication(int $user_id): bool{
        $fields = [
            'user_id' => $user_id,
            'reason' => $this->reason,
            'text' => $this->text,
            'date' => $this->date,
            'time' => $this->time,
            'status_id' => '1'
        ];
        return $this->insert($fields);
    }
}