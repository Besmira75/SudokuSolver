<?php




function findEmptyCell($board) {
    for ($row = 0; $row < 9; $row++) {
        for ($col = 0; $col < 9; $col++) {
            if ($board[$row][$col] == 0) {
                return [$row, $col];
            }
        }
    }

    // If no empty cell is found, the board is solved
    return false;
}

function isValidMove($board, $row, $col, $num) {
    // Check if the number is not in the same row or column
    for ($i = 0; $i < 9; $i++) {
        if ($board[$row][$i] == $num || $board[$i][$col] == $num) {
            return false;
        }
    }

    // Check if the number is not in the same 3x3 box
    $boxRow = floor($row / 3) * 3;
    $boxCol = floor($col / 3) * 3;

    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            if ($board[$boxRow + $i][$boxCol + $j] == $num) {
                return false;
            }
        }
    }

    // If the number is not in the same row, column, or box, it's a valid move
    return true;
}


function solveSudoku(&$board) {
    $emptyCell = findEmptyCell($board);

    if (!$emptyCell) {
        // No empty cells, the board is solved
        return true;
    }

    list($row, $col) = $emptyCell;

    for ($num = 1; $num <= 9; $num++) {
        if (isValidMove($board, $row, $col, $num)) {
            // Try placing the number in the empty cell
            $board[$row][$col] = $num;

            // Recursively try to solve the board
            if (solveSudoku($board)) {
                return true;
            }

            // If placing the number didn't lead to a solution, backtrack
            $board[$row][$col] = 0;
        }
    }

    // No valid number found for this cell, backtrack to the previous cell
    return false;
}

if (isset($_POST['solveButton']) && isset($_POST['enteredValues'])) {
    $enteredValues = $_POST['enteredValues'];

    // Ensure $enteredValues is a 9x9 2D array
    if (is_array($enteredValues) && count($enteredValues) == 9 && count($enteredValues[0]) == 9) {
        // Create a copy of the board for reference
        $originalBoard = $enteredValues;

        // Solve the Sudoku board
        if (solveSudoku($enteredValues)) {
            // Output the solved board as JSON
            echo json_encode($enteredValues);
        } else {
            echo json_encode(['error' => 'No solution found.']);
        }
    } else {
        echo json_encode(['error' => 'Invalid input. Please provide a valid 9x9 Sudoku board.']);
    }
}

?>