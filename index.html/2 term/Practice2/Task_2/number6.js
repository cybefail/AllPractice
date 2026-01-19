let first = 5;
let plus = 2;
let finalgoal = 250; 
let sum = 0;
let days = 0;
while (sum < finalgoal) {
    days += + 1;
    let today = first + (days - 1) * plus;
    sum += today;
}
console.log(days);