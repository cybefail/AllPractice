console.log('11 задание');
let liquids = ['вода', 'молоко', 'сок', 'чай', 'йогурт'];
let fruits = ['киви', 'банан', 'персик', 'манго', 'груша', 'ананас'];
let greens = ['мята', 'шпинат', 'руккола', 'петрушка', 'базилик'];

let chosenLiquid = 1; //номер выбранной основы для смузи
let chosenGreen = 2; //выбранная зелень
let chosenFruit = 3; //выбранный фрукт

let order = '';
order = 'Основа — ' + liquids[chosenLiquid - 1] + 
        ', фрукт — ' + fruits[chosenFruit - 1] + 
        ', зелень — ' + greens[chosenGreen - 1];
console.log(order); //'Основа — ' + основа для смузи + ', фрукт — ' + выбранный фрукт + ', зелень — ' + выбранная зелень

console.log('12 задание');
let groceries = ['чай', 'шпроты', 'печенье', 'сахар', 'чипсы'];
let shoppingList = '';
for (let i = 0; i < groceries.length; i++) {
    if (i === 0) {
        shoppingList += groceries[i];
    } else {
        shoppingList += ', ' + groceries[i];
    }
}
console.log(shoppingList); 


console.log('1 задание'); //проверка каждого числа
function getPrimesUpTo(n) {
    if (n < 2) return [];
    const primes = [];
    for (let i = 2; i <= n; i++) {
        let isPrime = true;
        
        for (let j = 2; j < i; j++) {
            if (i % j === 0) {
                isPrime = false;
                break;
            }
        }  
        if (isPrime) {
            primes.push(i);
        }
    }
    return primes;
}
console.log(getPrimesUpTo(30)); //[2, 3, 5, 7, 11, 13, 17, 19, 23, 29]

console.log('2 задание');
function findMostFrequent(arr) {
    if (arr.length === 0) return null;
    const count = {};
    //сколько раз встречается каждое число
    for (let num of arr) {
        count[num] = (count[num] || 0) + 1;
    }
    let maxCount = 0;
    let result = Infinity;  //большое число, чтобы любое реальное было меньше
    //число с максимальной частотой (если частоты равны — наименьшее число)
    for (let num in count) {
        const currentNum = Number(num);
        const currentCount = count[num];
        
        if (currentCount > maxCount || 
            (currentCount === maxCount && currentNum < result)) {
            maxCount = currentCount;
            result = currentNum;
        }
    }
    return result;
}
console.log(findMostFrequent([1, 3, 1, 4, 1, 5, 3, 3]));