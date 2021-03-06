
var puzzle = document.getElementById('puzzle');
var lungime = prompt("Please enter the perfect number", "");


    while( lungime < 3 || lungime == null || lungime == ""){
    prompt("User cancelled the prompt. Try again, with a bigger number");
    lungime = prompt("Please enter the perfect number", "");
    }
scramble();

solve();

$("#scramble").click(function () {
    scramble();
});


puzzle.addEventListener('click', function (e) {
        puzzle.className = 'animate';
        shiftCell(e.target);

});


function solve() {

    puzzle.innerHTML = '';

    var n = 1;
    for (var i = 0; i < lungime; i++) {
        for (var j = 0; j < lungime; j++) {
            $cell = $("<span></span>");
            $cell.attr('id', 'load-' + i + '-' + j);
            $cell.css("left", (j * 80 + j + 1) + 'px');
            $cell.css("top", (i * 80 + i + 1) + 'px');
            if (n <= lungime * lungime - 1) {
                $cell.addClass('number');
                $cell.addClass((i % 2 == 0 && j % 2 > 0 || i % 2 > 0 && j % 2 == 0) ? 'dark' : 'light');
                $cell.text($cell.innerHTML = (n++).toString());

            } else {
                $cell.addClass('empty');
            }

            $('#puzzle').append($cell);
        }
    }
}

function verify() {
        var a=1;
    if(getCell(lungime,lungime) != null){
        return;
    }
    for(var i=0;i<lungime;i++){
        for(var j=0;j<lungime;j++){
            console.log(getCell(i,j).innerHTML);
           if(a <= lungime*lungime && getCell(i,j).className != 'empty' && getCell(i,j).innerHTML != a.toString()){
              return;
           }
           a++;

        }
    }

  if(confirm("Congratulation, ou did it :) \n Do you want to scramble? ")){
        scramble();
  }
}

function shiftCell(load) {


    // Checks if selected load has number
    if (load.className != 'empty') {


        var emptyCell = getEmptyAdiacentCell(load);


        if (emptyCell) {

            var tmp = {style: load.style.cssText, id: load.id};


            load.style.cssText = emptyCell.style.cssText;
            load.id = emptyCell.id;


            emptyCell.style.cssText = tmp.style;
            emptyCell.id = tmp.id;
            verify();


        }
    }
}

function getCell(row, col) {

    return document.getElementById('load-' + row + '-' + col);

}

function getEmptyAdiacentCell(load) {
    var adiacent = getAdiacentCells(load);

    // Searches for empty load
    for (var i = 0; i < adiacent.length; i++) {
        if (adiacent[i].className == 'empty') {
            return adiacent[i];
        }
    }


    return false;

}

function getAdiacentCells(load) {

    var id = load.id.split('-');
    var row = parseInt(id[1]);
    var col = parseInt(id[2]);

    var adiacent = [];


    if (row < lungime) {
        if (getCell(row + 1, col) != null) {
            adiacent.push(getCell(row + 1, col));
        }

    }
    if (row > 0) {
        if (getCell(row - 1, col) != null) {
            adiacent.push(getCell(row - 1, col));
        }
    }
    if (col < lungime) {
        if (getCell(row, col + 1) != null) {
            adiacent.push(getCell(row, col + 1));
        }
    }
    if (col > 0) {
        if (getCell(row, col - 1) != null) {
            adiacent.push(getCell(row, col - 1));
        }
    }

    return adiacent;

}


function scramble() {
    puzzle.removeAttribute('class');


    var previousCell;
    var i = 1;
    var interval = setInterval(function () {
        if (i <= 100) {
            var adiacent = getAdiacentCells(getEmptyCell());
            if (previousCell) {
                for (var j = adiacent.length - 1; j >= 0; j--) {
                    if (adiacent[j].innerHTML == previousCell.innerHTML) {
                        adiacent.splice(j, 1);
                    }
                }
            }
            // Gets random adiacent load and memorizes it for the next iteration
            previousCell = adiacent[rand(0, adiacent.length - 1)];
            shiftCell(previousCell);
            i++;
        } else {
            clearInterval(interval);

        }
    }, lungime);

}

function getEmptyCell() {

    return puzzle.querySelector('.empty');

}

function rand(from, to) {

    return Math.floor(Math.random() * (to - from + 1)) + from;

}



































