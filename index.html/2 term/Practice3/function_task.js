console.log('1 задание');
function checkVehicle(wheels, weight) {
  if (wheels === 2 && weight < 100) {
    return 'Парковка разрешена';
  }
  return 'Вам здесь не место! Мяу!';
}
console.log(checkVehicle(2, 15)); //'Парковка разрешена'

console.log('2 задание');
function calculatePressure(density, depth) {
  const g = 9.8;
  const pressure = density * g * depth;
  return Math.round(pressure);
}
console.log(calculatePressure(1000, 5)); //≈49000
console.log(calculatePressure(997, 0)); //0

console.log('3 задание');
function election(arr) {
  //массив пустой или не передан — возвращаем false (или можно по-другому, зависит от требований)
  if (!arr || arr.length === 0) {
    return false;
  }
  let trueCount = 0;
  //подсчет кол-ва true
  for (let i = 0; i < arr.length; i++) {
    if (arr[i] === true) {
      trueCount++;
    }
  }
  //количество false = общая длина минус количество true
  let falseCount = arr.length - trueCount;
  //если true больше или равно false — побеждает true
  if (trueCount >= falseCount) {
    return true;
  }
  return false;
}
console.log(election([true, false, true])); //true
console.log(election([false, false, true])); //false