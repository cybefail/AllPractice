<?php
//echo '<h2>предыдущий класс(Задание 1 и 2)</h2>';
class User {
    private $firstName;
    private $lastName;
    private $email;

    public function __construct($firstName, $lastName, $email) {
        $this->firstName = $this->correctName($firstName);
        $this->lastName = $this->correctName($lastName);
        if ($this->isEmailCorrect($email)) {
            $this->email = $email;
        } else {
            echo "Ошибка: Email $email некорректен!<br>";
            $this->email = '';
        }
        if (strlen($firstName) > 128) {
            echo "Ошибка: Имя $firstName слишком длинное!<br>";
        }
        if (strlen($lastName) > 128) {
            echo "Ошибка: Фамилия $lastName слишком длинная!<br>";
        }
    }

    public function getFirstName() { //геттеры
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setFirstName($firstName) { //сеттеры
        $this->firstName = $this->correctName($firstName);
        if (strlen($firstName) > 128) {
            echo "Ошибка: Имя $firstName слишком длинное!<br>";
        }
    }

    public function setLastName($lastName) {
        $this->lastName = $this->correctName($lastName);
        if (strlen($lastName) > 128) {
            echo "Ошибка: Фамилия $lastName слишком длинная!<br>";
        }
    }

    public function setEmail($email) {
        if ($this->isEmailCorrect($email)) {
            $this->email = $email;
        } else {
            echo "Ошибка: Email $email некорректен!<br>";
            $this->email = '';
        }
    }

    public function sayAboutMe() {
        echo "Меня зовут {$this->firstName} {$this->lastName}<br>";
        if (!empty($this->email)) {
            echo "Email: {$this->email} (проверка методом isEmailCorrect - корректный адрес почты)<br>";
        } else {
            echo "Email: не указан (проверка методом isEmailCorrect - некорректныйт адрес почты)<br>";
        }
    }

    private function isEmailCorrect($email) {
        if (strpos($email, '@') === false || strpos($email, '.') === false) {
            return false;
        }
        $atPosition = strpos($email, '@');
        $lastDotPosition = strrpos($email, '.');
        return $lastDotPosition > $atPosition;
    }

    private function correctName($name) {
        return trim(htmlspecialchars($name)); 
    }
}

//echo '<h2>Задание 1: Определение класса Student</h2>';
//echo '<h2>Задание 2: Конструктор класса Student</h2>';
//echo '<h2>Задание 3: Геттеры и сеттеры для course и group</h2>';
//echo '<h2>Задание 4: Переопределение метода sayAboutMe()</h2>';
class Student extends User {
    private $course;
    private $group;

    public function __construct($firstName, $lastName, $email, $course, $group) {
        parent::__construct($firstName, $lastName, $email);
        $this->course = $course;
        $this->group = $group;
    }

    public function getCourse() {
        return $this->course;
    }

    public function setCourse($course) {
        $this->course = $course;
    }

    public function getGroup() {
        return $this->group;
    }

    public function setGroup($group) {
        $this->group = $group;
    }

    public function sayAboutMe() {
        parent::sayAboutMe();
        echo "Курс: {$this->course}<br>";
        echo "Группа: {$this->group}<br>";
    }
}

//echo '<h2>Задание 5 пользователь и студенты, метод sayAboutMe()</h2>';
$user = new User("Рахал", "Мамут", "haker@vrekah"); //№1 юзер
echo "<strong>Информация о пользователе:</strong><br>";
$user->sayAboutMe();
echo "<br>";

$student1 = new Student("Иван", "Золо", "ivan@zolovensky2004.com", 2, "Группа А"); //№1 студент
echo "<strong>Информация о студенте 1:</strong><br>";
$student1->sayAboutMe();
echo "<br>";

$student2 = new Student("Илья", "Мазеллов", "ilya@mzlff.com", 3, "Группа Б"); //№2 студент
echo "<strong>Информация о студенте 2:</strong><br>";
$student2->sayAboutMe();
echo "<br>";
?>