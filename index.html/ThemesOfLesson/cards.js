const template = document.querySelector('#template')
const content = template.content
const cards =  document.querySelector('.cards')

const card = template.cloneNode(true)
card.querySelector('h2').textContent = 'Статья о рыбах';
card.querySelector('img').src = 'image.jpg';
card.querySelector('p').textContent = 'Содержание статьи о рыбах';
card.querySelector('button').addEventListener = 'click',
function(){
    card.remove();
}
cards.appendChild(card)
