console.log('1 задание');
const readline = require('readline-sync');
function inputArray(isInt = false) {
    let arr = [];

    while (true) {
        let input = readline.question("Введите число для массива (или Enter для завершения): ");
        if (input.trim() === '') {
            break;
        }

        let num = +input; //преобразование в число
        if (isNaN(num) || input.trim() === '') {
            console.log('Ошибка: введите корректное ' + (isInt ? 'целое ' : '') + 'число!');
            continue;
        }

        if (isInt) {
            let intPart = +input.split('.')[0];

            //проверка, отсутствует ли дробная часть
            if (intPart !== num || input.includes('.')) {
                console.log('Ошибка: введите целое число!');
                continue;
            }

            arr.push(num);
        } 
        //обычное число (можно дробное)
        else {
            arr.push(num);
        }
    }

    return arr;
}

console.log('2 задание');
function maxInTheArray(arr) {
    let i = 0;
    while (arr[i] !== undefined) {
        i++;
    }
    if (i === 0) {
        return false;
    }
    let max = arr[0];
    for (let j = 1; j < i; j++) {
        if (arr[j] > max) {
            max = arr[j];
        }
    }
    return max;
}

function minInTheArray(arr) {
    let i = 0;
    while (arr[i] !== undefined) {
        i++;
    }
    if (i === 0) {
        return false;
    }
    let min = arr[0];
    for (let j = 1; j < i; j++) {
        if (arr[j] < min) {
            min = arr[j];
        }
    }
    return min;
}

console.log('3 задание');
function meanTwoDigit(arr) {
    let sum = 0;
    let count = 0;
    let i = 0;
    while (arr[i] !== undefined) {
        let val = arr[i];
        let absVal = val < 0 ? -val : val;
        if (absVal >= 10 && absVal <= 99) {
            sum += val;
            count++;
        }
        i++;
    }
    return count > 0 ? sum / count : false;
}

console.log('4 задание');
function transformArray(arr) {
    let result = [];
    let j = 0;
    let i = 0;
    while (arr[i] !== undefined) {
        let val = arr[i];
        if (val > 0) {
            result[j++] = val * val;
        } else if (val < 0) {
            result[j++] = -val;
        } else {
            result[j++] = 0;
        }
        i++;
    }
    return result;
}

let floats = inputArray(false); 
let transformed = transformArray(floats);
console.log('Исходный:', floats);
console.log('Преобразованный:', transformed);