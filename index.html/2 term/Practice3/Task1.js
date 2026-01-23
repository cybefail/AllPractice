console.log('1 задание');
let euroRate = 74; //Курсы валют
let dollarRate = 63; //Курсы валют
let euroAmount = 500; //необходимые суммы на поездку.
let dollarAmount = 2500; //необходимые суммы на поездку.
//let rublesAmount - переменная, в которой результат вычислений
let rublesAmount = euroAmount * euroRate + dollarAmount * dollarRate;
console.log(rublesAmount);

console.log('2 задание');
let travelCost = 150000; //сумма необходимая на поездку.
let balance = 100000;
let debtAmount = (travelCost - balance) * 2;
console.log(debtAmount);

console.log('3 задание');
let flightDistance = 7260;
let averageSpeed = 600;
let flightTime = Math.round(flightDistance / averageSpeed);
console.log(flightTime);
//flightDistance - расстояние полёта в километрах.

console.log('4 задание');
let age = 5;
let ageGroup;
if (age <= 1) {
    ageGroup = 'Котята';
} else if (age <= 3) {
    ageGroup = 'Молодые коты';
} else if (age <= 7) {
    ageGroup = 'Коты средних лет';
} else {
    ageGroup = 'Почтенные коты';
}
console.log(ageGroup); //выведет: Коты средних лет

console.log('5 задание');
let weight = 5;
let recommendation;
if (weight < 4) {
    recommendation = 'Пора перекусить'; //меньше 4 кг
} else if (weight >= 4 && weight <= 5.5) {
    recommendation = 'Вес в норме'; //от 4 до 5.5 кг включительно
} else {
    recommendation = 'Пора на тренировку'; //больше 5.5 кг
}
console.log('Вес:', weight, 'кг - ', recommendation);


console.log('6 задание');
let number6 = 15;
let taskResult;
if (number6 % 15 === 0) { //проверка редкого и "сильного" случая
    taskResult = 'FizzBuzz';
} else if (number6 % 3 === 0) {
    taskResult = 'Fizz';
} else if (number6 % 5 === 0) {
    taskResult = 'Buzz';
} else {
    taskResult = number6;
}
console.log(taskResult); //FizzBuzz


console.log('7 задание');
let startNumber = 1;
let multiplier = 4;
let quantity = 7;
let current = startNumber;
for (let i = 0; i < quantity; i++) {
    console.log(current);
    current = current * multiplier;
}


console.log('8 задание');
let lastNumber8 = 10;
let sum = 0;
for (let i = 1; i <= lastNumber8; i++) {
    sum += i;
}
console.log(sum); //55
console.log(`Сумма от 1 до ${lastNumber8} = ${sum}`);


console.log('9 задание');
let lastNumber9 = 5;
let multiplicationResult = 1;
for (let i = 1; i <= lastNumber9; i++) {
    if (i % 2 === 0) {
        multiplicationResult *= i;
    }
}
console.log(multiplicationResult); // 8


console.log('10 задание');
let number10 = 15;
for (let i = 2; i < number10; i++) {
    if (number10 % i === 0) {
        console.log(i);
    }
}
