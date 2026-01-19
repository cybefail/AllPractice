<?php
spl_autoload_register(function ($class_name) {
    require_once $class_name . ".php";
});
$s1 = new Student(1, "Анна Петрова", 20, 2, "Б123");
$s2 = new Student(2, "Ольга Иванова", 21, 1, "В789");
$s3 = new Student(3, "Максим Сидоров", 22, 3, "А456");
$t4 = new Teacher(4, "Иван Иванов", 45, ["Математика", "Физика"]);
$t5 = new Teacher(5, "Мария Кузнецова", 34, ["История"]);
$m6 = new Manager(6, "Сергей Смирнов", 38, "Директор", ["Управление", "Контроль", "Организация"]);
$m7 = new Manager(7, "Елена Новикова", 30, "Зам. Директора", ["Документооборот", "Координация"]);
echo "Students:\n";
echo $s1->name, " (" . $s1->group . ")\n";
echo $s2->name, " (" . $s2->group . ")\n";
echo $s3->name, " (" . $s3->group . ")\n";
echo "\nTeachers:\n";
echo $t4->name, " teaches ", implode(", ", $t4->subjects), "\n";
echo $t5->name, " teaches ", implode(", ", $t5->subjects), "\n";
echo "\nManagers:\n";
echo $m6->name, " - ", $m6->positions, "\n";
echo $m7->name, " - ", $m7->positions, "\n";
?>
