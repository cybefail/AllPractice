<?php
//ГОТОВО
//Наследование пр9 задание 4
echo '<h2>Задание 1-12: Класс Student и роли студентов</h2>';
class Student extends User
{
    //1 Приватное статическое свойство
    private static $numberStudents = 0;

    //2 геттер
    public static function getNumberStudents()
    {
        return self::$numberStudents;
    }

    //3 статический метод для вывода информации о студенте
    public static function printStudentInfo($student)
    {
        if ($student instanceof Student) {
            echo "Студент: {$student->getFirstName()} {$student->getLastName()}, ";
            echo "Email: {$student->getEmail()}, ";
            echo "Роль: " . ($student->getRole() ?? 'User') . "<br>";
        } else {
            echo "Передан не студент!<br>";
        }
    }

    //Конструктор — увеличивает счётчик
    public function __construct($firstName, $lastName, $email)
    {
        parent::__construct($firstName, $lastName, $email);
        self::$numberStudents++;
    }

    //Деструктор — уменьшает счётчик
    public function __destruct()
    {
        self::$numberStudents--;
    }
}

class User
{
    private $firstName;
    private $lastName;
    private $email;
    
    //8 Приватное свойство роль
    private $role = 'User'; 

    public function __construct($firstName, $lastName, $email)
    {
        $this->firstName = $this->correctName($firstName);
        $this->lastName = $this->correctName($lastName);
        if ($this->isEmailCorrect($email)) {
            $this->email = $email;
        } else {
            echo "Ошибка: Email $email некорректен!<br>";
            $this->email = '';
        }
    }

    //Геттеры
    public function getFirstName() { return $this->firstName; }
    public function getLastName()  { return $this->lastName; }
    public function getEmail()     { return $this->email; }
    public function getRole()      { return $this->role; } //геттер роли

    //10 Статический метод makeAdmin
    public static function makeAdmin($user)
    {
        if ($user instanceof User) {
            $user->role = 'Admin';
        }
    }

    private function isEmailCorrect($email)
    {
        if (strpos($email, '@') === false || strpos($email, '.') === false) return false;
        $atPos = strpos($email, '@');
        $dotPos = strrpos($email, '.');
        return $dotPos > $atPos;
    }

    private function correctName($name)
    {
        return trim(htmlspecialchars($name));
    }
}

$student1 = new Student("Иван",   "Иванов",   "ivan@ivanov.com");
$student2 = new Student("Мария",  "Петрова",  "maria@petrova.com");
$student3 = new Student("Пётр",   "Сидоров",  "petr@sidorov.com");
$student4 = new Student("Анна",   "Козлова",  "anna@kozlova.com");
$student5 = new Student("Дмитрий","Васильев", "dmitry@vasilev.com");

echo "Создано студентов: " . Student::getNumberStudents() . "<br><br>";

//6 удаление двух студентов
unset($student4);
unset($student5);

echo "После удаления двух студентов: " . Student::getNumberStudents() . "<br><br>";

//7 инфа об оставшихся
echo "<strong>Информация об оставшихся студентах:</strong><br>";
Student::printStudentInfo($student1);
Student::printStudentInfo($student2);
Student::printStudentInfo($student3);
echo "<br>";

//11 админ
User::makeAdmin($student1);

//12 роль и инфа админа 
echo "Роль студента 1 после назначения: " . $student1->getRole() . "<br><br>";

echo "<strong>Обновленная информация об админе (студент 1):</strong><br>";
Student::printStudentInfo($student1);

echo "<br>Итого студентов в конце: " . Student::getNumberStudents() . "<br>";
?>