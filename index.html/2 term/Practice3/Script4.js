console.log('1 задание');
let monthNumber = 6;
switch(monthNumber){
    case 1:
        console.log('Январь');
        break;
    case 2:
        console.log('Февраль');
        break;
    case 3:
        console.log('Март');
        break;
    case 4:
        console.log('Апрель');
        break;
    case 5:
        console.log('Май');
        break;
    case 6:
        console.log('Июнь');
        break;
    case 7:
        console.log('Июль');
        break;
    case 8:
        console.log('Август');
        break;
    case 9:
        console.log('Сентябрь');
        break;
    case 10:
        console.log('Октябрь');
        break;
    case 11:
        console.log('Ноябрь');
        break;
    case 12:
        console.log('Декабрь');
        break;
    deafault:
        console.log('Нет месяца с таким номером');
}

console.log('2 задание');
let mouthNumber;
let mouth;
if (mouthNumber = 1) {
    mouth = 'Январь';
} else if (mouthNumber = 2) {
    mouth = 'Февраль';
} else if (mouthNumber = 3) {
    mouth = 'Март';
} else if (nmouthNumber = 4) {
    mouth = 'Апрель';
} else if (mouthNumber = 5) {
    mouth = 'Май';
} else if (mouthNumber = 6) {
    mouth = 'Июнь';
} else if (mouthNumber = 7) {
    mouth = 'Июль';
} else if (mouthNumber = 8) {
    mouth = 'Август';
} else if (mouthNumber = 9) {
    mouth = 'Сентябрь';
} else if (mouthNumber = 10) {
    mouth = 'Октябрь';
} else if (mouthNumber = 11) {
    mouth = 'Ноябрь';
} else if (mouthNumber = 12) {
    mouth = 'Декабрь';
} else {
    mouth = 'Нет месяца с таким номером';
}
console.log(mouth); 

console.log('3 задание');
let day = 3;
switch (day) {
  case 1: //пн
    console.log("7 уроков");
    break;
  case 2: //вт
      console.log("8 уроков");
    break;
  case 3: //ср
    console.log("5 уроков");
    break;
  case 4: //чт
    console.log("8 уроков");
    break;
  case 5: //пт
    console.log("8 уроков");
    break;
  case 6: //сб
    console.log("0 уроков (выходной)");
    break;
  case 7: //вс
    console.log("0 уроков (выходной)");
    break;
  default:
    console.log("Нет такого дня недели");
}

console.log('4 задание');
let lastDigit = 7; //последняя цифра числа
let result;
switch (lastDigit) {
  case 0: result = 0;
    break;
  case 1: result = 1;
    break;
  case 2: result = 4;
    break;
  case 3: result = 9;
    break;
  case 4: result = 6; //16
    break;
  case 5: result = 5; //25
    break;
  case 6: result = 6; //36
    break;
  case 7: result = 9; //49
    break;
  case 8: result = 4; //64
    break; 
  case 9: result = 1; //81
    break;
  default:
    console.log("Это не цифра");
    result = null;
}
if (result !== null) {
  console.log(`Последняя цифра квадрата = ${result}`);
}

console.log('5 задание');
let number = 584392;
if (number === 0) {
  console.log("1 цифра");
} else {
  let digits = String(Math.abs(number)).length;
  console.log(`${digits} цифр`);
}