console.log('1 задание');
let daysOfWeek = {
'понедельник': 'monday',
'вторник': 'tuesday',
'среда': 'wednesday',
'четверг': 'thursday',
'пятница': 'friday',
'суббота': 'saturday',
'воскресенье': 'sunday'
};

function translate(word, dictionary) {
  let translation = dictionary[word];
  return `${word} по-английски: ${translation}`;
}
console.log(translate('понедельник', daysOfWeek));


console.log('2 задание');
let getStatistics = function (players) {
  //подсчет общего количества голов в команде
  let totalGoals = 0;
  for (let player of players) {
    totalGoals += player.goals;
  }
  //+ каждому игроку два новых поля
  for (let player of players) {
    //коэффициент полезности
    player.coefficient = player.goals * 2 + player.passes;
    //процент от командных голов
    if (totalGoals === 0) {
      player.percent = 0;
    } else {
      player.percent = Math.round((player.goals * 100) / totalGoals);
    }
  }
  return players;
};
let team = [
  { name: "Месси",   goals: 14, passes: 11 },
  { name: "Роналду", goals: 25, passes: 3  },
];

console.log(getStatistics(team));

console.log('3 задание');
let materialPrice = {
  'wood':  1000,
  'stone': 1500,
  'brick': 2000
};
let house = {
  rooms: 10,
  floors: 5,
  material: 'wood',
  coefficient: 10.5,
  calculateSquare: function () {
    return this.rooms * this.coefficient * this.floors;
  },
  calculatePrice: function () {
    let square = this.calculateSquare();
    let pricePerMeter = materialPrice[this.material];
    return square * pricePerMeter;
  }
};
console.log(house.calculateSquare());   //10 * 10.5 * 5 = 525