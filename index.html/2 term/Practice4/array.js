console.log('1 задание');
const readline = require('readline');
const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});
function askQuestion(query) {
    return new Promise(resolve => rl.question(query, resolve));
}
async function inputArray(onlyIntegers = false) {
    const arr = [];

    console.log("Ввод элементов массива. Для окончания введите пустую строку или 'end'\n");

    while (true) {
        const input = await askQuestion("Введите число (или 'end' для завершения): ");

        const trimmed = input.trim();
    //условия завершения ввода
        if (trimmed === '' || trimmed.toLowerCase() === 'end') {
            break;
        }
        //преобразование в число
        const num = Number(trimmed);
        if (isNaN(num) || trimmed === '') {
            console.log("→ Это не число. Попробуйте ещё раз.");
            continue;
        }
        //проверка на целое число
        if (onlyIntegers && !Number.isInteger(num)) {
            console.log("→ Нужно ввести целое число.");
            continue;
        }
        arr.push(num);
        console.log(`→ Добавлено: ${num}`);
    }

    rl.close(); //закрытие интерфейса посе окончания вводал
    return arr;
}


async function main() {
    console.log("Пример 1: любые числа\n");
    const numbers = await inputArray();
    console.log("\nРезультат:", numbers);

    console.log("Пример 2: только целые числа\n");
    const integers = await inputArray(true);
    console.log("\nРезультат:", integers);
}

// Запуск
main().catch(err => {
    console.error("Ошибка:", err);
    rl.close();
});

console.log("Задание 1 + 2");
const numbers = inputArray(); //обычные числа
//const numbers = inputArray(true);  //только целые

if (numbers.length > 0) {
    console.log("Массив:", numbers);
    console.log("Максимум:", maxInTheArray(numbers));
    console.log("Минимум:", minInTheArray(numbers));
} else {
    console.log("Массив пустой");
}

console.log('3 задание');
function meanTwoDigit(arr) {
    if (!Array.isArray(arr) || arr.length === 0) {
        return false;
    }
    
    let sum = 0;
    let count = 0;
    
    for (let num of arr) {
        //проверка, что число целое и двузначное
        if (Number.isInteger(num) && num >= 10 && num <= 99) {
            sum += num;
            count++;
        }
    }
    
    if (count === 0) {
        return false; //нет двузначных чисел
    }
    
    return sum / count;
}

console.log("\nЗадание 3 — среднее двузначных");
const arrForMean = inputArray(true);
const mean = meanTwoDigit(arrForMean);

if (mean === false) {
    console.log("Двузначных чисел в массиве нет или массив пуст");
} else {
    console.log("Среднее арифметическое двузначных:", mean);
}

console.log('4 задание');
function transformArray(arr) {
    if (!Array.isArray(arr) || arr.length === 0) {
        return [];
    }
    
    const result = [];
    
    for (let num of arr) {
        if (num >= 0) {
            result.push(num * num); //квадрат для положительных и нуля
        } else {
            result.push(Math.abs(num)); //модуль для отрицательных
        }
    }
    
    return result;
}

console.log("\nЗадание 4 — преобразование");
const floats = inputArray(); 
const transformed = transformArray(floats);

console.log("Исходный массив  :", floats);
console.log("Преобразованный   :", transformed);
