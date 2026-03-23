console.log('1 задание');
//макс/мин значение и макс/мин длина
function randomIntArray(minLength, maxLength, minValue, maxValue) {
    //генерируется случайная длина массива
    const length = Math.floor(Math.random() * (maxLength - minLength + 1)) + minLength;
    const arr = [];
    for (let i = 0; i < length; i++) {
        //Math.random() от 0 до 1 (1 не включ)
        //Умножение на разницы между max и min +1 -> получ диапазон
        const randomNum = Math.floor(Math.random() * (maxValue - minValue + 1)) + minValue; //Math.floor() отбрасывает дробную часть преобраз в целое число
        arr.push(randomNum); //добавл число в конце массива
    }
    return arr;
}

console.log('2 задание');
const arr2 = randomIntArray(15, 40, -50, 300);

const toShow = arr2.slice(0, 10); //первые 10
toShow.push('...');
toShow.push(arr2[arr2.length - 1]); //последний элемент

console.log(toShow.join(' '));
console.log(arr2.length);
console.log("");

console.log('3 задание');
const arr3 = randomIntArray(10, 25, 0, 100);

const everySecond = [];
for (let i = 1; i < arr3.length; i += 2) {
    everySecond.push(arr3[i]);
}

console.log(everySecond.join(' → '));
console.log("");


console.log('4 задание');
const arr4 = randomIntArray(20, 50, -100, 200);
const evenNumbers = arr4.filter(num => num % 2 === 0);

console.log(evenNumbers.join(' '));
console.log("Длина массива с чётными числами:", evenNumbers.length);