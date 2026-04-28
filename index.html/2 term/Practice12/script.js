//базовый класс ячейки
class TextCell {
  constructor(text) {
    this.text = String(text).split("\n"); // массив строк
  }

  minWidth() {
    return this.text.reduce((max, line) => Math.max(max, line.length), 0);
  }

  minHeight() {
    return this.text.length;
  }

  draw(width, height) {
    const result = [];
    for (let i = 0; i < height; i++) {
      const line = this.text[i] || "";
      result.push(line.padEnd(width)); // выравнивание по левому краю по умолчанию
    }
    return result;
  }
}

//наслед

// Подчёркнутая ячейка (только снизу)
class UnderlinedCell extends TextCell {
  constructor(text) {
    super(text);
  }

  draw(width, height) {
    const lines = super.draw(width, height - 1); // оставляем место для подчёркивания
    lines.push("-".repeat(width)); // добавляем линию подчёркивания
    return lines;
  }

  minHeight() {
    return super.minHeight() + 1; // +1 на линию подчёркивания
  }
}

// Ячейка, выровненная по правому краю
class RTextCell extends TextCell {
  constructor(text) {
    super(text);
  }

  draw(width, height) {
    const result = [];
    for (let i = 0; i < height; i++) {
      const line = this.text[i] || "";
      result.push(line.padStart(width)); // выравнивание по правому краю
    }
    return result;
  }
}

// Ячейка с подчёркиванием сверху и снизу (для заголовка)
class TopBottomUnderlinedCell extends TextCell {
  constructor(text) {
    super(text);
  }

  minHeight() {
    return super.minHeight() + 2; // +1 сверху, +1 снизу
  }

  draw(width, height) {
    const contentLines = super.draw(width, height - 2);
    const result = ["-".repeat(width), ...contentLines, "-".repeat(width)];
    return result;
  }
}

// Ячейка в рамке (для самой высокой горы)
class BorderedCell extends TextCell {
  constructor(text) {
    super(text);
  }

  minWidth() {
    return super.minWidth() + 2; // +2 на вертикальные линии
  }

  minHeight() {
    return super.minHeight() + 2; // +2 на горизонтальные линии
  }

  draw(width, height) {
    const innerWidth = width - 2;
    const innerHeight = height - 2;

    const content = super.draw(innerWidth, innerHeight);

    const result = [];
    result.push("┏" + "━".repeat(innerWidth) + "┓"); // верхняя граница

    for (let line of content) {
      result.push("┃" + line + "┃"); // боковые границы
    }

    result.push("┗" + "━".repeat(innerWidth) + "┛"); // нижняя граница

    return result;
  }
}

//вспомогательные функции
//rowHeights - возвращает массив с минимальными высотами строк
function rowHeights(rows) {
  return rows.map(row => 
    row.reduce((max, cell) => Math.max(max, cell.minHeight()), 0)
  );
}

//colWidths - возвращает массив с минимальными ширинами колонок
function colWidths(rows) {
  const widthCount = rows[0].length;
  const widths = Array(widthCount).fill(0);

  for (let row of rows) {
    for (let i = 0; i < row.length; i++) {
      widths[i] = Math.max(widths[i], row[i].minWidth());
    }
  }
  return widths;
}

//drawRow - рисует строку целиком (то есть один ряд таблицы)
function drawRow(row, rowHeight, colWidths) {
  const blocks = row.map((cell, i) => 
    cell.draw(colWidths[i], rowHeight)
  );

  const result = [];
  for (let line = 0; line < rowHeight; line++) {
    const lineParts = blocks.map(block => block[line]);
    result.push(lineParts.join(" "));
  }
  return result;
}

//создает табличку 
function drawTable(rows) {
  const heights = rowHeights(rows);
  const widths = colWidths(rows);

  const tableRows = [];

  for (let i = 0; i < rows.length; i++) {
    tableRows.push(...drawRow(rows[i], heights[i], widths));
  }

  return tableRows.join("\n");
}

//основ функция

function dataTable(data) {
  const rows = [];

  // Заголовок
  const header = [
    new TopBottomUnderlinedCell("name"),
    new TopBottomUnderlinedCell("height"),
    new TopBottomUnderlinedCell("country")
  ];
  rows.push(header);

  // Находим максимальную высоту
  const maxHeight = Math.max(...data.map(m => m.height));

  // Данные
  for (let mountain of data) {
    const isMax = mountain.height === maxHeight;

    const row = [
      isMax ? new BorderedCell(mountain.name) : new TextCell(mountain.name),
      new RTextCell(mountain.height),                    // выравнивание по правому краю
      new TextCell(mountain.country)
    ];

    rows.push(row);
  }

  return rows;
}

//Входные данные
const MOUNTAINS = [
  {name: "Kilimanjaro", height: 5895, country: "Tanzania"},
  {name: "Everest",     height: 8848, country: "Nepal"},
  {name: "Mount Fuji",  height: 3776, country: "Japan"},
  {name: "Mont Blanc",  height: 4808, country: "Italy/France"},
  {name: "Vaalserberg", height: 323,  country: "Netherlands"},
  {name: "Denali",      height: 6168, country: "United States"},
  {name: "Popocatepetl",height: 5465, country: "Mexico"}
];

const rows = dataTable(MOUNTAINS);
console.log(drawTable(rows));