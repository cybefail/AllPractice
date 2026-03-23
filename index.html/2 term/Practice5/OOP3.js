console.log('1 задание — с приватными полями и геттерами/сеттерами');

// Данные
const animalsData = [
  ['волк', 60, 'мясо'],
  ['Гепард', 98, 'мясо'],
  ['Лев', 60, 'мясо'],
  ['Лошадь', 88, 'трава'],
  ['Страус', 70, 'трава']
];

class Animal {
  #name;
  #speed;
  #food;

  constructor(name, speed, food) {
    this.#name  = name;
    this.#speed = speed;
    this.#food  = food;
  }

  // Геттеры
  getName()  { return this.#name;  }
  getSpeed() { return this.#speed; }
  getFood()  { return this.#food;  }

  // Сеттеры
  setName(newName) {
    if (typeof newName === 'string' && newName.trim() !== '') {
      this.#name = newName.trim();
    }
  }

  setSpeed(newSpeed) {
    if (typeof newSpeed === 'number' && newSpeed >= 0) {
      this.#speed = newSpeed;
    }
  }

  setFood(newFood) {
    if (typeof newFood === 'string' && newFood.trim() !== '') {
      this.#food = newFood.trim();
    }
  }

  run() {
    console.log(`${this.#name} бежит со скоростью ${this.#speed} км/ч`);
  }

  eat() {
    console.log(`${this.#name} ест ${this.#food}`);
  }
}

// Создаём животных
const animals = animalsData.map(([name, speed, food]) => 
  new Animal(name, speed, food)
);

// Выводим начальные данные
console.log("Исходные животные:");
console.log("─".repeat(50));

for (const animal of animals) {
  console.log(`Имя: ${animal.getName()}, скорость: ${animal.getSpeed()} км/ч, еда: ${animal.getFood()}`);
  animal.run();
  animal.eat();
  console.log("─".repeat(50));
}

// Меняем значения через сеттеры
console.log("\nМеняем значения некоторых свойств:");
animals[0].setName("Серый Волк");      // волк → Серый Волк
animals[1].setSpeed(110);               // гепард стал быстрее
animals[3].setFood("сено и яблоки");    // лошадь

console.log("\nПосле изменений:");
console.log("─".repeat(50));

for (const animal of animals) {
  console.log(`Имя: ${animal.getName()}, скорость: ${animal.getSpeed()} км/ч, еда: ${animal.getFood()}`);
  animal.run();
  animal.eat();
  console.log("─".repeat(50));
}


console.log('\n2 задание — Калькулятор с приватными полями');

class Calculator {
  #a = 0;
  #b = 0;

  read() {
    this.#a = Number(prompt("Введите первое число:", 0)) || 0;
    this.#b = Number(prompt("Введите второе число:", 0)) || 0;
  }

  // Геттеры
  getA() { return this.#a; }
  getB() { return this.#b; }

  // Сеттеры
  setA(value) {
    this.#a = Number(value) || 0;
  }

  setB(value) {
    this.#b = Number(value) || 0;
  }

  sum()  { return this.#a + this.#b; }
  mul()  { return this.#a * this.#b; }
  pow()  { return Math.pow(this.#a, this.#b); }
}

const calc = new Calculator();
calc.read();

console.log(`a = ${calc.getA()}`);
console.log(`b = ${calc.getB()}`);
console.log(`Сумма        = ${calc.sum()}`);
console.log(`Произведение  = ${calc.mul()}`);
console.log(`Степень (a^b) = ${calc.pow()}`);

// Пример изменения через сеттеры
calc.setA(10);
calc.setB(3);
console.log("\nПосле изменения через сеттеры:");
console.log(`a = ${calc.getA()}, b = ${calc.getB()}`);
console.log(`10³ = ${calc.pow()}`);


console.log('\n3 задание — Лестница с приватным полем');

class Ladder {
  #step = 0;

  getStep() {
    return this.#step;
  }

  up(steps = 1) {
    this.#step += steps;
    return this;
  }

  down(steps = 1) {
    this.#step -= steps;
    if (this.#step < 0) this.#step = 0;
    return this;
  }

  showStep() {
    console.log(`Текущая ступень: ${this.#step}`);
    return this;
  }

  // Пример сеттера (хотя обычно для лестницы не нужен, но для задания)
  setStep(value) {
    const num = Number(value);
    if (!isNaN(num) && num >= 0) {
      this.#step = Math.floor(num);
    }
  }
}

// Цепочка вызовов
const ladder = new Ladder();

ladder
  .showStep()       // 0
  .up(2)
  .up(3)
  .showStep()       // 5
  .down(4)
  .showStep()       // 1
  .down(10)
  .showStep();      // 0

console.log("─".repeat(40));

// Проверка геттера и сеттера
console.log("Текущая ступень через геттер:", ladder.getStep());  // 0

ladder.setStep(7);
console.log("После setStep(7):");
ladder.showStep();  // 7