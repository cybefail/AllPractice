"use strict"

//canvas
let cvs = document.querySelector('#canvas');
let ctx = cvs.getContext('2d');

cvs.width = window.innerWidth;
cvs.height = window.innerHeight;

//пикчи
let ship = new Image();
let enemyImg1 = new Image();
let enemyImg2 = new Image();
let enemyImg3 = new Image();
let bulletImg = new Image();
let bg = new Image();

//пути к файлам
ship.src = 'img/FL_ship.png';
enemyImg1.src = 'img/Alien_purple1.png';
enemyImg2.src = 'img/Alien_pink2.png';
enemyImg3.src = 'img/Alien_blue3.png';
bulletImg.src = 'img/Bullet.png';
bg.src = 'img/BG.png';


//звучки
let shootSound = new Audio('audio/shoot(pluck).mp3');
let waveSound = new Audio('audio/NewWave(open hat).mp3');
let gameOverSound = new Audio('audio/GameOver(FX).mp3');

//функция: проигрывает звук
function playSound(sound){
    //если файл не найден -т браузер не упадёт
    sound.currentTime = 0;
    sound.play().catch(() => {});
}


//игрок
let xPos = cvs.width / 2 - 20;
let yPos = cvs.height - 80;

//пули
let bullets = [];

//враги
let enemies = [];
let wave = 1;


//очки/проигрыш
let score = 0;
let gameOver = false;
let gameOverPlayed = false;


//создание врагов
function spawnEnemies(){

    enemies = []; //очищает волну старых врагов

    for (let i = 0; i < 6 + wave; i++) {
        enemies.push({
            x: 60 + i * 80, //позиция по X
            y: 50, //старт сверху
            alive: true, //жив ли враг
            type: Math.floor(Math.random() * 3) //случайный спрайт
        });
    }

    playSound(waveSound); //звук новой волны
}

spawnEnemies();


//управление
document.addEventListener("keydown", function(e){

    if(gameOver) return; 

    if(e.key == 'ArrowLeft'){
        xPos -= 25; //движение влево
    }

    if(e.key == 'ArrowRight'){
        xPos += 25; //движение вправо
    }

    if(e.key == ' '){
        //создает пулю
        bullets.push({
            x: xPos + 18,
            y: yPos
        });

        playSound(shootSound); //звук выстрела
    }
});


//основной цикл
function draw(){

    //очищает экран
    ctx.clearRect(0, 0, cvs.width, cvs.height);

    //фон
    ctx.drawImage(bg, 0, 0, cvs.width, cvs.height);

    if(!gameOver){

        let aliveCount = 0; // считаем живых врагов

        // --- ВРАГИ ---
        for(let i = 0; i < enemies.length; i++){

            if(enemies[i].alive){

                aliveCount++;

                let img;
                if(enemies[i].type == 0) img = enemyImg1;
                if(enemies[i].type == 1) img = enemyImg2;
                if(enemies[i].type == 2) img = enemyImg3;

                //рисует врага
                ctx.drawImage(img, enemies[i].x, enemies[i].y, 40, 40);

                //движение вниз (чем больше wave — тем быстрее)
                enemies[i].y += 0.3 + wave * 0.1;

                //если враг дошёл до низа -> проигрыш
                if(enemies[i].y > cvs.height - 100){
                    gameOver = true;
                }
            }
        }

        //если всех убили -> новая волна
        if(aliveCount == 0){
            wave++;
            spawnEnemies();
        }

        //пули
        for(let i = 0; i < bullets.length; i++){

            bullets[i].y -= 7; // летит вверх

            //рисует пулю 
            ctx.drawImage(bulletImg, bullets[i].x, bullets[i].y, 4, 12);

            //проверка попадания
            for(let j = 0; j < enemies.length; j++){

                if(enemies[j].alive &&
                   bullets[i].x < enemies[j].x + 40 &&
                   bullets[i].x + 4 > enemies[j].x &&
                   bullets[i].y < enemies[j].y + 40 &&
                   bullets[i].y + 12 > enemies[j].y){

                    enemies[j].alive = false; // убили врага
                    bullets[i].y = -10;       // убрали пулю
                    score++;                 // +1 очко
                }
            }
        }

        //игрок
        ctx.drawImage(ship, xPos, yPos, 40, 40);
    }


    //текст
    ctx.fillStyle = "#fff";
    ctx.font = "20px Arial";

    ctx.fillText("Score: " + score, 20, 40);
    ctx.fillText("Wave: " + wave, 20, 70);


    //гейм овер
    if(gameOver){

        if(!gameOverPlayed){
            playSound(gameOverSound);
            gameOverPlayed = true;
        }

        ctx.font = "50px Arial";
        ctx.fillText("GAME OVER", cvs.width/2 - 150, cvs.height/2);

        ctx.font = "20px Arial";
        ctx.fillText("Нажми F5 чтобы начать заново", cvs.width/2 - 140, cvs.height/2 + 40);
    }

    //запускает следующий кадр
    requestAnimationFrame(draw);
}


//запуск игры
bg.onload = draw;