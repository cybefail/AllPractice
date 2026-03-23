console.log('1 задание');
const animalsData = [
  ['волк', 60, 'мясо'],
  ['Гепард', 98, 'мясо'],
  ['Лев', 60, 'мясо'],
  ['Лошадь', 88, 'трава'],
  ['Страус', 70, 'трава']
];
class Animal {
  constructor(name, speed, food) {
    this.name = name;
    this.speed = speed;
    this.food = food;
  }

  run() {
    console.log(`${this.name} бежит со скоростью ${this.speed} км/ч`);
  }

  eat() {
    console.log(`${this.name} ест ${this.food}`);
  }
}

//Создание объектов
const animals = animalsData.map(([name, speed, food]) => 
  new Animal(name, speed, food)
);

//Вывод
console.log("Созданы животные:");
console.log("─".repeat(40));

for (const animal of animals) {
  console.log(animal);
  animal.run();
  animal.eat();
  console.log("─".repeat(40));
}


console.log('2 задание');

class Calculator {
  constructor() {
    this.a = 0;
    this.b = 0;
  }

  read() {
    this.a = Number(prompt("Введите первое число:", 0)) || 0;
    this.b = Number(prompt("Введите второе число:", 0)) || 0;
  }

  sum() {
    return this.a + this.b;
  }

  mul() {
    return this.a * this.b;
  }

  pow() {
    return Math.pow(this.a, this.b);
  }
}

const calc = new Calculator();
calc.read();

console.log(`a = ${calc.a}`);
console.log(`b = ${calc.b}`);
console.log(`Сумма       = ${calc.sum()}`);
console.log(`Произведение = ${calc.mul()}`);
console.log(`Степень (a^b)= ${calc.pow()}`);


console.log('3 задание');

class Ladder {
  constructor() {
    this.step = 0;
  }

  up(steps = 1) {
    this.step += steps;
    return this;
  }

  down(steps = 1) {
    this.step -= steps;
    if (this.step < 0) this.step = 0;
    return this;
  }

  showStep() {
    console.log(`Текущая ступень: ${this.step}`);
    return this;
  }
}

//   Вариант с цепочкой вызовов
const ladder = new Ladder();

ladder
  .showStep()     // 0
  .up(2)
  .up(3)
  .showStep()     // 5
  .down(4)
  .showStep()     // 1
  .down(10)
  .showStep();    // 0

console.log("─".repeat(30));

// Вариант без цепочки
const ladder2 = new Ladder();
ladder2.up(5);
ladder2.down(2);
ladder2.showStep();   // 3

console.log("─".repeat(30));

// Ещё один пример из условия
ladder.showStep();    // 0 (новый объект)
ladder.up(2).up(3).showStep();   // 5
ladder.down(4).showStep();       // 1