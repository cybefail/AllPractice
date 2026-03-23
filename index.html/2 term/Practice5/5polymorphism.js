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
    perimeter() {
        return null;
    }
    area() {
        return null;
    }
    toString() {
        return "Фигура";
    }
}

class Rectangle extends Shape {
    constructor(width, height, x = 0, y = 0) {
        super(x, y);
        this.width = width;
        this.height = height;
    }

    perimeter() {
        return (this.width + this.height) * 2;
    }

    area() {
        return this.width * this.height;
    }

    toString() {
        return "Прямоугольник";
    }
}

class Square extends Rectangle {
    constructor(side, x = 0, y = 0) {
        super(side, side, x, y);
        this.side = side;
    }

    // Можно переопределить, если нужен особый вывод
    toString() {
        return "Квадрат";
    }

    //perimeter() и area() уже корректно наследуются от Rectangle
}

class Circle extends Shape {
    constructor(radius, x = 0, y = 0) {
        super(x, y);
        this.radius = radius;
    }
//В классе Circle метод perimeter() должен возвращать длину окружности.
    perimeter() {
        //длина окр-ти
        return 2 * Math.PI * this.radius;
    }

    area() {
        return Math.PI * this.radius ** 2;
    }

    toString() {
        return "Круг";
    }
}

class Triangle extends Shape {
    constructor(a, b, c, x = 0, y = 0) {
        super(x, y);
        this.a = a; //сторона a
        this.b = b; //сторона b
        this.c = c; //сторона c

        //проверка возможности существования треугольника
        if (a + b <= c || a + c <= b || b + c <= a) {
            throw new Error("Треугольник с такими сторонами не существует");
        }
    }

    perimeter() {
        return this.a + this.b + this.c;
    }

    area() {
        //Формула Герона
        const p = this.perimeter() / 2;
        return Math.sqrt(
            p * (p - this.a) * (p - this.b) * (p - this.c)
        );
    }

    toString() {
        return "Треугольник";
    }
}

//Создание объекты
const rect   = new Rectangle(10, 6);
const square = new Square(7);
const circle = new Circle(5);
const tri    = new Triangle(6, 8, 10);

//Массив фигур
const shapes = [rect, square, circle, tri];

//Выводим информацию
console.log("Все фигуры в массиве:\n");

shapes.forEach((shape, index) => {
    console.log(`Фигура ${index + 1}: ${shape.toString()}`);
    console.log(`  Периметр: ${shape.perimeter()?.toFixed(2) ?? "—"}`);
    console.log(`  Площадь:  ${shape.area()?.toFixed(2) ?? "—"}`);
    console.log("");
});