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
?>