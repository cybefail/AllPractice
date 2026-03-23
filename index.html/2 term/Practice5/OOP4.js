console.log('1 задание');
class Animal {
    constructor() {
        this.weight = 0;
    }
    
    eat() {
        console.log("Животное ест...");
    }
}

class Bear extends Animal {
    constructor(weight = 200) {
        super();
        this.weight = weight;
    }
    
    run(speed) {
        console.log(`Медведь бежит со скоростью ${speed} км/ч. Вес: ${this.weight} кг`);
    }
}

//создание объект
const bear = new Bear(320);

console.log(bear); // Bear { weight: 320 }
bear.run(25); // Медведь бежит со скоростью 25 км/ч. Вес: 320 кг
bear.eat(); // Животное ест...


console.log('2 задание');
class Shape {
    constructor(x = 0, y = 0) {
        this.x = x;
        this.y = y;
    }
    
    move(dx, dy) {
        this.x += dx;
        this.y += dy;
        console.log(`Фигура переместилась на (${this.x}, ${this.y})`);
    }
}

class Rectangle extends Shape {
    constructor(width, height, x = 0, y = 0) {
        super(x, y);
        this.width = width;
        this.height = height;
    }
    
    perimeter() {
        const p = (this.width + this.height) * 2;
        console.log(`Периметр прямоугольника = ${p}`);
        return p;
    }
}

class Square extends Rectangle {
    constructor(length, x = 0, y = 0) {
        super(length, length, x, y);
        this.length = length;
    }
    
    // Можно переопределить perimeter, если хочется более красивый вывод
    perimeter() {
        const p = this.length * 4;
        console.log(`Периметр квадрата = ${p}`);
        return p;
    }
}

class Circle extends Shape {
    constructor(radius, x = 0, y = 0) {
        super(x, y);
        this.radius = radius;
    }
    
    area() {
        const a = Math.PI * this.radius ** 2;
        console.log(`Площадь круга = ${a.toFixed(2)}`);
        return a;
    }
}


// Тестируем

console.log("\n=== Прямоугольник ===");
const rect = new Rectangle(8, 5);
rect.perimeter();          // Периметр прямоугольника = 26
rect.move(10, -3);         // Фигура переместилась на (10, -3)

console.log("\n=== Квадрат ===");
const square = new Square(7);
square.perimeter();        // Периметр квадрата = 28
square.move(4, 4);         // Фигура переместилась на (4, 4)

console.log("\n=== Круг ===");
const circle = new Circle(10);
circle.area();             // Площадь круга = 314.16
circle.move(-2, 5);        // Фигура переместилась на (-2, 5)