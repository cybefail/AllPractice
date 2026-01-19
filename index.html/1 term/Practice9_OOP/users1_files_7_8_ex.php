<?php
//Пр 9 Задание 7: Фабричный метод + сохранение в JSON

class User {
    protected $type;
    protected $name;

    public function __construct($type, $data = []) {
        $this->type = $type;
        $this->name = $data['Name'] ?? 'Без имени';
    }

    public function getName() {
        return $this->name;
    }

    public function sayAboutMe() {
        return "Пользователь: " . $this->getName();
    }
}

class Student extends User {
    private $course;
    private $group;

    public function __construct($data) {
        parent::__construct('student', $data);
        $this->course = $data['Course'] ?? '';
        $this->group  = $data['Group'] ?? '';
    }

    public function sayAboutMe() {
        return "<b>Студент:</b> " . $this->getName() .
               ", курс: " . $this->course .
               ", группа: " . $this->group;
    }
}

class Teacher extends User {
    private $subjects = [];

    public function __construct($data) {
        parent::__construct('teacher', $data);
        $this->subjects = $data['Subjects'] ?? [];
    }

    public function sayAboutMe() {
        $subjectsStr = is_array($this->subjects) ? implode(', ', $this->subjects) : 'нет предметов';
        return "Учитель: " . $this->getName() . ", предметы: " . $subjectsStr;
    }
}

class Manager extends User {
    private $position = '';
    private $duties = [];

    public function __construct($data) {
        parent::__construct('manager', $data);
        $this->position = $data['Position'] ?? '';
        $this->duties   = $data['jobDuties'] ?? [];
    }

    public function sayAboutMe() {
        $dutiesStr = is_array($this->duties) ? implode(', ', $this->duties) : 'нет обязанностей';
        return "<b>Менеджер:</b> " . $this->getName() .
               ", должность: " . $this->position .
               ", обязанности: " . $dutiesStr;
    }
}

// Фабричная функция
function createUser($userData) {
    // Проверяем, есть ли ключ Type и его значение
    $type = $userData['Type'] ?? null;

    return match ($type) {
        'student' => new Student($userData),
        'teacher' => new Teacher($userData),
        'manager' => new Manager($userData),
        default   => null, // если тип неизвестен — пропускаем
    };
}

// Загрузка данных из JSON
$users = []; // массив ассоциативных массивов (данные из JSON)
$filename = 'users1.json';

if (file_exists($filename)) {
    $json = file_get_contents($filename);
    $data = json_decode($json, true);

    if (is_array($data) && isset($data['users']) && is_array($data['users'])) {
        $users = $data['users'];
    }
}

// Добавление нового студента
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['Name'])) {
    $newStudent = [
        'Type'   => 'student',
        'Name'   => trim($_POST['Name']),
        'Course' => trim($_POST['Course'] ?? ''),
        'Group'  => trim($_POST['Group'] ?? '')
    ];

    $users[] = $newStudent;

    // Сохраняем обратно в JSON
    file_put_contents($filename, json_encode(['users' => $users], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    // Обновляем страницу, чтобы избежать повторной отправки формы
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Создаём объекты с помощью фабрики
$objects = [];
foreach ($users as $userData) {
    $obj = createUser($userData);
    if ($obj !== null) { // пропускаем, если тип неизвестен
        $objects[] = $obj;
    }
}
?>

    <h2>Задание 7: Добавление студентов и восстановление объектов из JSON</h2>

    <h3>Добавить нового студента</h3>
    <form method="post">
        <input type="text" name="Name" placeholder="Имя студента" required><br><br>
        <input type="number" name="Course" placeholder="Курс (например, 3)" min="1" required><br><br>
        <input type="text" name="Group" placeholder="Группа (например, ПИ-21)" required><br><br>
        <button type="submit">Добавить студента</button>
    </form>

    <hr>

    <h3>Список всех пользователей</h3>
    <?php if (empty($objects)): ?>
        <p>Пока нет пользователей. Добавьте первого студента</p>
    <?php else: ?>
        <?php foreach ($objects as $obj): ?>
            <?php echo $obj->sayAboutMe(); ?><br><br>
        <?php endforeach; ?>
    <?php endif; ?>

    <p><small>Данные сохраняются в файле <code>users1.json</code></small></p>
</body>
</html>