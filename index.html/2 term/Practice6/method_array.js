console.log('1 задание');
//массив, где каждое число * на 2
const numbers = [3, 7, 1, 9, 4];
const doubled = numbers.map(n => n * 2);

console.log(doubled);  
// [6, 14, 2, 18, 8]


console.log('2 задание');
//Сумма и произведение элементов в виде массива [сумма, произведение]
const nums = [2, 3, 4, 5];

const sumAndProduct = nums.reduce(
  (acc, curr) => [acc[0] + curr, acc[1] * curr],
  [0, 1] // начальное значение: [сумма=0, произведение=1]
);

console.log(sumAndProduct);  
//[14, 120]


console.log('3 задание');
//Общая длина всех строк в массиве пословиц
const proverbs = [
  "Тише едешь — дальше будешь",
  "Волков бояться — в лес не ходить",
  "Делу время — потехе час"
];

const totalLength = proverbs
  .map(str => str.length)
  .reduce((sum, len) => sum + len, 0);

console.log(totalLength);  
//61  (20 + 27 + 14)


console.log('4 задание');
//Пирамидка без циклов (самый простой способ с методами массивов)
const lines = [5,4,3,2,1];

lines
  .map(n => "x".repeat(n))
  .forEach(line => console.log(line));

/*Вывод:
xxxxx
xxxx
xxx
xx
x
*/

console.log('5 задание');
//Имена только совершеннолетних пользователей (возраст >= 18)
const users = [
    { id: 1, name: 'Анна',  age: 25 },
    { id: 2, name: 'Иван',  age: 30 },
    { id: 3, name: 'Мария', age: 17 },
    { id: 4, name: 'Петр',  age: 15 }
];

const adultNames = users
    .filter(user => user.age >= 18)      // user.age, а не users.age
    .map(user => user.name);             // user.name (без пробела)

console.log(adultNames);
// → ['Анна', 'Иван']


console.log('6 задание');
const find = id => users.find(user => user.id === id);

console.log(find(3));              // { id: 3, name: 'Мария', age: 17 }
console.log(find(2)?.name);        // Иван
console.log(find(5));              // undefined



const users = [
  { id: 1, name: 'Анна',  age: 25 },
  { id: 2, name: 'Иван',  age: 30 },
  { id: 3, name: 'Мария', age: 17 },
  { id: 4, name: 'Петр',  age: 15 }
];

//{ id: 1, name: 'Анна', age: 25 }