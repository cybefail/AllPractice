var assortmentData = [
  {
    inStock: true,
    isHit: false
  },
  {
    inStock: false,
    isHit: false
  },
  {
    inStock: true,
    isHit: true
  },
  {
    inStock: true,
    isHit: false
  },
  {
    inStock: false,
    isHit: false
  }
];

function updateCards(data) {
  const cards = document.querySelectorAll('.good'); //находит все карточки товаров на странице
  
  //проверяет какое количество карточек совпадает с данными
  if (cards.length !== data.length) {
    console.warn('Количество карточек на странице не совпадает с данными');
    return;
  }
  //проходит по всем элементам данных и карточкам одновременно
  data.forEach((item, index) => {
    const card = cards[index];
    
    //убирает все возможные классы состояний
    card.classList.remove('good--available', 'good--unavailable', 'good--hit');
    
    //добавляет нужный класс в зависимости от состояния
    if (item.inStock) {
      card.classList.add('good--available');
      
      //если товар в наличии И хит — добавляем класс хита
      if (item.isHit) {
        card.classList.add('good--hit');
      }
    } else {
      card.classList.add('good--unavailable');
      //если нет в наличии — хит уже не показываем
    }
  });
}

//вызов функции с данными
updateCards(assortmentData);



/* Техническое задание

Мяу! На сайте магазина мороженого надо отображать актуальное состояние товаров: «в наличии», «нет в наличии», «хит».

Данные по продуктам хранятся в массиве с объектами assortmentData, каждый объект соответствует одному товару и содержит свойства:

- inStock. Если значение true — мороженое в наличии, если false — товара в наличии нет.
- isHit. Если значение true — мороженое самое популярное среди покупателей.

Каждому состоянию товара соответствует специальный класс:

Товар в наличии — good--available.
Недоступный товар — good--unavailable.
Хит продаж — good--hit.

Оформи код в виде функции updateCards, которая принимает на вход массив с данными. Вызови её, передав assortmentData.

*/
