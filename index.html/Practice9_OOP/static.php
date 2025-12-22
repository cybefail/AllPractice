<?php
//Статические методы и свойства
class User {
    private $firstName;
    private $lastName;
    private $email;
    // Задание 8: В классе User приватное свойство $role.
    // Задание 9:User должен получать роль 'User'.
    private $role = 'User';

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

    public function getRole() {
        return $this->role;
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
        echo "Роль: {$this->role}<br>";
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

    //Задание 10
    public static function makeAdmin($user) {
        $user->role = 'Admin';
    }
}

class Student extends User {
    private $course;
    private $group;
    //Задание 1
    private static $numberStudents = 0;

    //Задание 4 (часть)
    public function __construct($firstName, $lastName, $email, $course, $group) {
        parent::__construct($firstName, $lastName, $email);
        $this->course = $course;
        $this->group = $group;
        self::$numberStudents++;
    }

    //Задание 4 (часть)
    public function __destruct() {
        self::$numberStudents--;
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

    //Задание 2
    public static function getnumberStudents() {
        return self::$numberStudents;
    }

    //Задание 3
    public static function printStudentInfo($student) {
        echo "<strong>Информация о студенте:</strong><br>";
        $student->sayAboutMe();
        echo "<br>";
    }
}

//Задание 5
echo "<h2>Задание 5</h2>";
$student1 = new Student("Иван", "Золо", "ivan@zolovensky2004.com", 2, "Группа А");
$student2 = new Student("Илья", "Мазеллов", "ilya@mzlff.com", 3, "Группа Б");
$student3 = new Student("Анна", "Смирнова", "anna@example.com", 1, "Группа В");
$student4 = new Student("Боб", "Джонсон", "bob@example.com", 4, "Группа Г");
$student5 = new Student("Катя", "Петрова", "kate@example.com", 2, "Группа Д");
echo "Количество студентов: " . Student::getnumberStudents() . "<br><br>";

//Задание 6
echo "<h2>Задание 6</h2>";
unset($student4);
unset($student5);
echo "Количество студентов после удаления: " . Student::getnumberStudents() . "<br><br>";

//Задание 7
echo "<h2>Задание 7</h2>";
Student::printStudentInfo($student1);
Student::printStudentInfo($student2);
Student::printStudentInfo($student3);

//Задание 11
echo "<h2>Задание 11</h2>";
User::makeAdmin($student1);
echo "Роль для student1 установлена как Admin.<br><br>";

//Задание 12
echo "<h2>Задание 12</h2>";
echo "Роль администратора: " . $student1->getRole() . "<br><br>";

// Дополнительно: инфа о студенте-администраторе
echo "<strong>Информация о студенте 1 после изменения роли:</strong><br>";
Student::printStudentInfo($student1);
?>