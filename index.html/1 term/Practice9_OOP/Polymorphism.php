<?php
echo '<h1>Полиморфизм</h1>';
echo '<h2>Задания 1-6</h2>';

class User
{
    private $firstName;
    private $lastName;
    private $email;
    private $ID;
    private $role = 'User';

    public function __construct($firstName, $lastName, $email, $ID = null)
    {
        $this->firstName = $this->correctName($firstName);
        $this->lastName  = $this->correctName($lastName);

        if ($this->isEmailCorrect($email)) {
            $this->email = $email;
        } else {
            echo "Ошибка: Email $email некорректен!<br>";
            $this->email = '';
        }

        $this->ID = $ID ?? uniqid('user_');
    }

    public function getFirstName() { return $this->firstName; }
    public function getLastName()  { return $this->lastName; }
    public function getEmail()     { return $this->email; }
    public function getRole()      { return $this->role; }
    public function getID()        { return $this->ID; }

    private function isEmailCorrect($email)
    {
        if (strpos($email, '@') === false || strpos($email, '.') === false) return false;
        $atPos = strpos($email, '@');
        $dotPos = strrpos($email, '.');
        return $dotPos > $atPos + 1;
    }

    private function correctName($name)
    {
        return trim(htmlspecialchars($name));
    }

    public function sayAboutMe()
    {
        echo "Я — обычный пользователь: {$this->firstName} {$this->lastName}, email: {$this->email}<br>";
    }
}

class Student extends User
{
    private static $numberStudents = 0;

    public static function getNumberStudents() { return self::$numberStudents; }

    public function __construct($firstName, $lastName, $email, $ID = null)
    {
        parent::__construct($firstName, $lastName, $email, $ID);
        self::$numberStudents++;
    }

    public function __destruct()
    {
        self::$numberStudents--;
    }

    public function sayAboutMe()
    {
        echo "Я — СТУДЕНТ: {$this->getFirstName()} {$this->getLastName()}, ";
        echo "email: {$this->getEmail()}, роль: {$this->getRole()}<br>";
    }
}

class Teacher extends User
{
    private $subjects = [];

    public function __construct($firstName, $lastName, $email, $subjects = [], $ID = null)
    {
        parent::__construct($firstName, $lastName, $email, $ID);
        $this->subjects = $subjects;
    }

    public function sayAboutMe()
    {
        echo "Я — ПРЕПОДАВАТЕЛЬ: {$this->getFirstName()} {$this->getLastName()}, ";
        echo "email: {$this->getEmail()}<br>";
        if (!empty($this->subjects)) {
            echo "Веду предметы: " . implode(', ', $this->subjects) . "<br>";
        }
    }
}

class Manager extends User
{
    private $position;
    private $jobDuties = [];

    public function __construct($firstName, $lastName, $email, $position, $jobDuties = [], $ID = null)
    {
        parent::__construct($firstName, $lastName, $email, $ID);
        $this->position = $position;
        $this->jobDuties = $jobDuties;
    }

    public function sayAboutMe()
    {
        echo "Я — АДМИНИСТРАЦИЯ ({$this->position}): {$this->getFirstName()} {$this->getLastName()}, ";
        echo "email: {$this->getEmail()}<br>";
        if (!empty($this->jobDuties)) {
            echo "Обязанности: " . implode('; ', $this->jobDuties) . "<br>";
        }
    }
}

//Создание пользователей
$users = [
    new Student("Иван", "Золовенский", "ivan@zolo2004.com"),
    new Student("Мария", "Петрова", "maria@petrova.com"),
    new Teacher("Алексей", "Смирнов", "alexeyino@agent.ru", ["Информатика"]),
    new Teacher("Ольга", "Кузнецова", "olga@kuznetsova.ru", ["Математика", "Физика"]),
    new Manager("Дмитрий", "Нагиев", "zxcdimosik@admin.ru", "Директор", [
        "Руководство школой",
        "Приём сотрудников",
        "Контроль учебного процесса"
    ]),
    new Manager("Елена", "Морозова", "elena@admin.ru", "Завуч", [
        "Составление расписания",
        "Организация мероприятий",
        "Работа с родителями"
    ]),
    new User("Антон", "Фёдоров", "anton@fedorov.com")
];

//Сортировка по фамилии и имени
usort($users, function($a, $b) {
    $cmp = strcmp($a->getLastName(), $b->getLastName());
    if ($cmp === 0) {
        $cmp = strcmp($a->getFirstName(), $b->getFirstName());
    }
    return $cmp;
});

//Удаление пользователя по индексу
if (isset($_GET['delete'])) {
    $index = (int)$_GET['delete'];
    if (isset($users[$index])) {
        unset($users[$index]);
        $users = array_values($users);
    }
}

//Вывод списка
echo "<h3>Список пользователей:</h3>";
foreach ($users as $index => $user) {
    $user->sayAboutMe();
    echo "<a href='?delete=$index' style='color:red; margin-left: 20px;' onclick='return confirm(\"Удалить этого пользователя?\");'>
            [Удалить]
          </a>";
    echo "<hr>";
}

//Розыгрыш
echo "<h3>Задание 6: Розыгрыш приза среди всех участников</h3>";

if (!empty($users)) {
    $winnerIndex = array_rand($users);
    $winner = $users[$winnerIndex];

    echo "Поздравляем победителя розыгрыша!<br><br>";
    echo "Победитель — №" . ($winnerIndex + 1) . " в списке.<br><br>";

    $winner->sayAboutMe();

    if ($winner instanceof Student) {
        echo "(Студент получает приз)<br>";
    } elseif ($winner instanceof Teacher) {
        echo "(Преподаватель получает приз)<br>";
    } elseif ($winner instanceof Manager) {
        echo "(Администрация получает приз)<br>";
    } else {
        echo "(Обычный пользователь получает приз)<br>";
    }
} else {
    echo "Нет участников для розыгрыша.<br>";
}

echo "<br>Розыгрыш завершён. Обновите страницу для нового розыгрыша.";
?>