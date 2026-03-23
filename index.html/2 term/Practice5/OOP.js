console.log('1 задание');
//1 Данные 
const animalsData = [
    ['волк',60,'мясо'],
    ['Гепард', 98,'мясо'],
    ['Лев',60,'мясо'],
    ['Лошадь',88,'трава'],
    ['Страус',70,'трава']
];

//2 Конструктор
function Animal(name, speed, food) {
  this.name = name;
  this.speed = speed;
  this.food = food;
}

//3 Методы
Animal.prototype.run = function() {
  console.log(`${this.name} бежит со скоростью ${this.speed} км/ч`);
};

Animal.prototype.eat = function() {
  console.log(`${this.name} ест ${this.food}`);
};

//4 Создание 5 объектов
const animals = [];

for (let data of animalsData) {
  const [name, speed, food] = data;
  animals.push(new Animal(name, speed, food));
}
//5 Выводим объекты и вызываем методы
console.log("Созданы животные:");

animals.foreach(animal => {
  console.log(animal);
  animal.run();
  animal.eat();
  console.log("─".repeat(30));
});

console.log('2 задание');
function Calculator() {
  this.a = 0;
  this.b = 0;
}

Calculator.prototype.read = function() {
  this.a = Number(prompt("Введите первое число:", 0));
  this.b = Number(prompt("Введите второе число:", 0));
  
  // защита от NaN
  if (isNaN(this.a)) this.a = 0;
  if (isNaN(this.b)) this.b = 0;
};

Calculator.prototype.sum = function() {
  return this.a + this.b;
};

Calculator.prototype.mul = function() {
  return this.a * this.b;
};

Calculator.prototype.pow = function() {
  return Math.pow(this.a, this.b);
}; pow() //возвращает результат возведения в степень (первое введенное число - основание, второе - показатель степени)


let calc = new Calculator();

calc.read(); //запрашивает ввод двух значений с клавиатуры и сохраняет их в свойствах объекта.

console.log(`a = ${calc.a}`);
console.log(`b = ${calc.b}`);
console.log(`Сумма = ${calc.sum()}`);
console.log(`Произведение = ${calc.mul()}`);
console.log(`Степень (a^b) = ${calc.pow()}`);

mul() //возвращает произведение этих свойств.


console.log('3 задание');
function Ladder() {
  this.step = 0;
}

Ladder.prototype.up = function(steps = 1) {
  this.step += steps;
  return this; // для цепочки вызовов
};

Ladder.prototype.down = function(steps = 1) {
  this.step -= steps;
  if (this.step < 0) this.step = 0; // не уходим ниже 0
  return this;
};

Ladder.prototype.showStep = function() {
  console.log(`Текущая ступень: ${this.step}`);
  return this;
};



let ladder = new Ladder();

ladder
  .showStep()//0
  .up(2)
  .up(3)
  .showStep()// 5
  .down(4)
  .showStep()// 1
  .down(10)
  .showStep();// 0


// Ещё один вариант записи (без цепочки):
let ladder2 = new Ladder();
ladder2.up(5);
ladder2.down(2);
ladder2.showStep();   // 3

ladder.showStep(); // 0(выводит ступеньку на который мы находимся)
ladder.up(2);
ladder.up(3);
ladder.showStep(); // 5
ladder.down(4);
ladder.showStep(); // 1