
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sudoku Solver</title>
    <link rel="stylesheet" href="SudokuSolver.css">
</head>
<body>
    <div id="container">
        <h1 class = "padd">Sudoku Solver</h1>
        <table id="sudoku-board">

          <colgroup><col><col><col>
          <colgroup><col><col><col>
          <colgroup><col><col><col>
          <tbody>
           <tr> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td>
           <tr> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td>
           <tr> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td>
          <tbody>
           <tr> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td>
           <tr> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td>
           <tr> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td>
          <tbody>
           <tr> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td>
           <tr> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td>
           <tr> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td> <td contenteditable="true"></td>
        </table>
        <br>
        <div class="btns">
        <div>
          <button id="solve-button" onclick="solveSudoku()">Solve</button>
        </div>

        <div>
          <button id="clear-button" onclick="resetSudoku()">Reset</button>
        </div>
        <div>
            <button id="unsolve-button" onclick="unsolveSudoku()">Unsolve</button>
        </div>
        </div>
    </div>
</body>

<script>

document.getElementById("sudoku-board").addEventListener("input", function (event) {
            if (event.target && event.target.nodeName == "TD") {
                validateInput(event.target);
            }
            storeInitialValues();
        });

 document.getElementById("sudoku-board").addEventListener("keydown", function (event) {
    if (event.key === "ArrowRight" || event.key === "ArrowDown" || event.key === "ArrowLeft" || event.key === "ArrowUp") {
        event.preventDefault();
        moveFocusWithArrowKey(document.activeElement, event.key);
    }
});

        function validateInput(cell) {
            var value = cell.textContent.trim();

            if (/^[1-9]?$/.test(value)) {

                cell.textContent = value;

            } else {

                cell.textContent = '';
            }
        }

        function moveFocusToNextCell(currentCell) {
            var nextCell = currentCell.nextElementSibling;

            if (nextCell) {
                nextCell.focus();
                var range = document.createRange();
                var selection = window.getSelection();
                range.setStart(nextCell, nextCell.innerText.length);
                range.collapse(true);
                selection.removeAllRanges();
                selection.addRange(range);
              
            }
        }

        function moveFocusToPrevCell(currentCell) {
    var prevCell = currentCell.previousElementSibling;

           if (prevCell) {
               prevCell.focus();
               var range = document.createRange();
               var selection = window.getSelection();
               range.setStart(prevCell, prevCell.innerText.length);
               range.collapse(true);
               selection.removeAllRanges();
               selection.addRange(range);
    }
}
function moveFocusWithArrowKey(currentCell, arrowKey) {
    var rowIndex = currentCell.parentElement.rowIndex;
    var colIndex = currentCell.cellIndex;

    switch (arrowKey) {
        case "ArrowRight":
            moveFocusToNextCell(currentCell);
            break;
        case "ArrowDown":
            moveFocusToDownCell(rowIndex, colIndex);
            break;
        case "ArrowLeft":
            moveFocusToPrevCell(currentCell);
            break;
        case "ArrowUp":
            moveFocusToUpCell(rowIndex, colIndex);
            break;
        default:
            break;
    }
}

function moveFocusToDownCell(rowIndex, colIndex) {
    var nextRow = document.getElementById("sudoku-board").rows[rowIndex + 1];

    if (nextRow) {
        var cellBelow = nextRow.cells[colIndex];

        if (cellBelow) {
            cellBelow.focus();


        }
    }
}

function moveFocusToUpCell(rowIndex, colIndex) {
    var prevRow = document.getElementById("sudoku-board").rows[rowIndex - 1];

    if (prevRow) {
        var cellAbove = prevRow.cells[colIndex];

        if (cellAbove) {
            cellAbove.focus();

        }
    }
}

function moveFocusToLeftCell(rowIndex, colIndex) {
    var currentRow = document.getElementById("sudoku-board").rows[rowIndex];
    var prevCell = currentRow.cells[colIndex - 1];

    if (prevCell) {
        prevCell.focus();

    }
}

function moveFocusToRightCell(rowIndex, colIndex) {
    var currentRow = document.getElementById("sudoku-board").rows[rowIndex];
    var nextCell = currentRow.cells[colIndex + 1];

    if (nextCell) {
        nextCell.focus();

    }
}
        
        function getEnteredValues() {
            var enteredValues = [];
            var cells = document.querySelectorAll('#sudoku-board td[contenteditable="true"]');
            var boardSize = 9; 

            for (var i = 0; i < boardSize; i++) {
                var row = [];
                for (var j = 0; j < boardSize; j++) {
                    var cellIndex = i * boardSize + j;
                    var cell = cells[cellIndex];
                    row.push(parseInt(cell.textContent.trim(), 10) || 0);
                }
                enteredValues.push(row);
            }

            return enteredValues;
        }

        function solveSudoku() {
            var enteredValues = getEnteredValues();
            console.log('Entered Values:', enteredValues);
            $.ajax({
                type: "POST",
                url: "../server/SudokuAlgorithm.php",
                data: { 
                    enteredValues: enteredValues,
                    solveButton: true
                },
                success: function(response) {
                    // Handle the response from the PHP script
                    var solvedValues = JSON.parse(response);
                    console.log(solvedValues);
                    updateTable(solvedValues);
                }
            });
        }
        

        function resetSudoku() {
            var cells = document.querySelectorAll('#sudoku-board td[contenteditable="true"]');
            cells.forEach(function (cell) {
                cell.textContent = '';
            });
        }
        function updateTable(values) {
        var cells = document.querySelectorAll('#sudoku-board td[contenteditable="true"]');
        var boardSize = 9;

        for (var i = 0; i < boardSize; i++) {
            for (var j = 0; j < boardSize; j++) {
                var cellIndex = i * boardSize + j;
                var cell = cells[cellIndex];
                cell.textContent = values[i][j];
            }
            }
        }

        var initialValues;

        function storeInitialValues() {
            initialValues = getEnteredValues();
        }


        function unsolveSudoku() {
            if (initialValues) {
                var cells = document.querySelectorAll('#sudoku-board td[contenteditable="true"]');
                var boardSize = 9;

                for (var i = 0; i < boardSize; i++) {
                    for (var j = 0; j < boardSize; j++) {
                        var cellIndex = i * boardSize + j;
                        var cell = cells[cellIndex];
                        var initialValue = initialValues[i][j];
                        cell.textContent = initialValue !== 0 ? initialValue.toString() : '';
                    }
                }
            } else {
                console.log('Error: Initial values not stored.');
            }
        }
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 </html>
