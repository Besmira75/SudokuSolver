
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
        });

        function validateInput(cell) {
            var value = cell.innerText.trim();

            if (/^[1-9]?$/.test(value)) {

                cell.innerText = value;
                moveFocusToNextCell(cell);

            } else {

                cell.innerText = '';
            }
        }

        function moveFocusToNextCell(currentCell) {
            var nextCell = currentCell.nextElementSibling;

            if (nextCell) {
                var range = document.createRange();
                var selection = window.getSelection();

                range.setStart(nextCell, 0);
                range.collapse(true);

                selection.removeAllRanges();
                selection.addRange(range);
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
                url: "sudokusolver.php",
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

        function unsolveSudoku(){
            
        }
</script>
 </html>
