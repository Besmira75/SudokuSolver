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

?>