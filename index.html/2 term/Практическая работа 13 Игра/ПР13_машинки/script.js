"use strict"

class Road{
    constructor(image, y){
        this.x = 0;
        this.y = y;
        this.image = new Image();
        this.image.src = image;

        let obj = this;

        this.image.addEventListener('load', function(){
            obj.loaded = true;
        })
    }
    update(road){
        this.y += speed;
        if(this.y > window.innerHeight){
            this.y = road.y - cvs.height + speed;
        }
    }
}

class Car{
    constructor(image, x, y, isPlayer){
        this.x = x;
        this.y = y;
        this.loaded = false;
        this.dead = false;
        this.isPlayer = isPlayer;
        this.image = new Image();
        this.image.src = image;
        let obj = this;
        this.image.addEventListener('load', function(){
            obj.loaded = true;
        })
    }
    update(){
        if(!this.isPlayer){
            this.y += speed;
        }
    }
    move(v, d){
        if(v == 'x'){
            d *= 2;
            this.x += d;
            if(this.x + this.image.width * scale > cvs.width){
                this.x -= d;
            }
            if(this.x < 0){
                this.x = 0;
            }
        }else{
            this.y += d;
            if(this.y + this.image.height * scale > cvs.height){
                this.y -= d;
            }
            if(this.y < 0){
                this.y = 0;
            }
        }
    }
    collide(car){
        let hit = false;
        if(this.y < car.y + car.image.height * scale && this.y + this.image.height * scale > car.y){
            if(this.x + this.image.width * scale > car.x && this.x < car.x + car.image.width * scale){
                hit = true;
            }
        }
    }

}

let cvs = document.querySelector('#canvas');
let ctx = cvs.getContext('2d');

let speed = 4;
const UPDATE_TIME = 1000 / 60;
let timer = null;
let scale = 0.5;

resize();

window.addEventListener('resize', resize);
window.addEventListener('keydown', function(e){
    keyDown(e);
});

let objects = [];

let roads =[
    new Road('images/road.jpg', 0),
    new Road('images/road.jpg', cvs.height)
]

let player = new Car('images/car.png', cvs.width/2, cvs.height/2, true);

start();

function start(){
    timer = setInterval(update, UPDATE_TIME);
}

function stop(){
    clearInterval(timer);
    timer = null;
}

function update(){
    roads[0].update(roads[1]);
    roads[1].update(roads[0]);

    if(randomInteger(0, 10000) > 9900){
        objects.push(new Car('images/car_red.png', randomInteger(30, cvs.width - 50),
    randomInteger(250, 400) * -1, false));
    }

    player.update();

    let isDead = false;
    for(let i = 0; i < objects.length; i++){
        objects[i].update();
        if(objects[i].dead){
            isDead = true;
        }
    }
    if(isDead){
        objects.shift();
    }

     for(let i = 0; i < objects.length; i++){
        let hit = player.collide(objects[i]);

        if(hit){
            alert('ДТП!');
            stop();
            player.dead = true;
            break;
        }
     }

    draw();
}

function draw(){
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    for(let i = 0; i < roads.length; i++){
        ctx.drawImage
        (
            roads[i].image,
            0,
            0,
            roads[i].image.width,
            roads[i].image.height,
            roads[i].x,
            roads[i].y,
            canvas.width,
            canvas.height,
        );
    }
    drawCar(player);
    for(let i = 0; i < objects.length; i++){
        drawCar(objects[i]);
    }
}

function drawCar(car){
    ctx.drawImage(
        car.image, 0, 0, car.image.width, car.image.height, car.x, car.y, car.image.width*scale, car.image.height*scale
    );
}

function keyDown(e){
    switch(e.key){
        case 'ArrowLeft':
            player.move('x', -speed);
            break;
        case 'ArrowRight':
            player.move('x', speed);
            break;
        case 'ArrowUp':
            player.move('y', -speed);
            break;
        case 'ArrowDown':
            player.move('y', speed);
            break;
        case 'Esc':
            if(timer == null){
                start();
            }else{
                stop();
            }
            break;
    }
}

function resize(){
    canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
}

function randomInteger(min, max){
    let rand = min - 0.5 + Math.random() * (max - min + 1);
    return rand;
}