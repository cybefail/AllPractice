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