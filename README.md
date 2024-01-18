# ![image](https://github.com/d3shira/SudokuSolver/assets/121398589/d0174e45-f14a-4cc6-8c90-ecac7e22a412)

![Static Badge](https://img.shields.io/badge/version-1.0.0-7fa6ee) ![Static Badge](https://img.shields.io/badge/algorithm-backtracking-D17FEE) ![Static Badge](https://img.shields.io/badge/deployment-infinityfree-76DD6A) ![Static Badge](https://img.shields.io/badge/project_management-JiraSoftware-blue)





## Basic Overview
This is a straightforward Sudoku Solver program developed by utilizing the backtracking algorithm to solve Sudoku puzzles of varying difficulty levels. The solver allows users to input their incomplete Sudoku puzzles, and by clicking the “Solve” button, it solves the grid. Additionally, the program features a difficulty level system, which categorizes puzzles based on the number of initial inputs provided by the user.
### Languages used:
##### **Client side**:
 - HTML
 - JavaScript
##### **Server side**
 - PHP
  
 ### Visualization:
 ![image](https://github.com/d3shira/SudokuSolver/assets/121398589/accb0030-9dfd-4856-842c-260d0a4fcb2b)


## Program Features:

### Buttons:
- **Solve Button:** Once users input values into the Sudoku grid, clicking the 'Solve' button triggers the backtracking algorithm to complete the puzzle. Simultaneously, the solved grid is displayed. The user's initial input values are saved in the corresponding difficulty level files.
  
- **Reset Button:** The 'Reset' button clears the entire grid, providing a clean slate for solving another puzzle.
  
- **Unsolve Button:** The 'Unsolve' button allows users to reverse the solving process. It removes the solved portions of the Sudoku grid without affecting the original user inputs.

### Input Validations:
- Only values between 1-9 can be entered.
- If any other character besides 1-9 is entered, an alert is displayed.
- If the same number is entered more than once in the same row, column, or subgrid, an alert is displayed.

### Difficulty Level Files:
The program categorizes puzzles into difficulty levels based on the number of user inputs:
- Hard: 0-25 user inputs
- Medium: 25 - 35 user inputs
- Easy: 35+ user inputs

## Installation and Usage:
If you want to directly access the Sudoku Solver click the following link http://sudokusolver.free.nf

If you want to install the code on your computer and open it in your local host, follow these instructions:
### Requirements:
- XAMPP
- Visual Studio Code or another suitable code editor
- GitHub Desktop (optional)

### Steps:
1. Clone the repository
2. Save the cloned repo as a folder in the htdocs folder on your computer.
3. Go to your web browser and type: http://localhost/SudokuSolver/client/LandingPage.html
4. The program should be running! Click the ‘Start’ button to continue using the Sudoku Solver.


## Program Logic:
The backtracking algorithm is utilized for solving Sudoku puzzles. The file `SudokuAlgorithm.php`, contains the implementation details.
1. **Sudoku Solver Logic:**
   - Utilizes a backtracking algorithm to solve Sudoku puzzles efficiently.
   - Finds empty cells and iteratively attempts valid number placements.

2. **Functions:**
   - `findEmptyCell`: Locates the first empty cell on the board.
   - `isValidMove`: Validates if placing a number in a cell is allowed.
   - `solveSudoku`: Recursively solves the Sudoku board using backtracking.
   - `difficultyLevel`: Determines the puzzle difficulty based on filled cells.
   - `isValidSudokuBoard`: Checks the overall validity of the Sudoku board.
   - `isValidSet`: Ensures a set (row, column, or grid) contains no duplicates.

3. **Usage:**
   - Accepts a 9x9 Sudoku board via a POST request.
   - Validates input, determines difficulty, and outputs the solved board.
## Deployment
Deployment done using *infinityfree* 
http://sudokusolver.free.nf


## Testing Files:
Link to testing sheets [here](https://docs.google.com/spreadsheets/d/1UjiG2AFpxs_I1kot3p6F1NK48ja2KWx9nzgjj6g2ac4/edit?usp=sharing)

## Contributors:
#### Work tracking and management was done using **[Jira Software](https://student-deshirarandobrava1.atlassian.net/jira/software/projects/SS/boards/2/timeline)**
- [Deshira Randobrava](https://github.com/d3shira) - Technical Project Manager

### Backend Team:
- [Blert Osmani](https://github.com/BlertOsmani) - Backend Lead
- [Besmira Berisha](https://github.com/Besmira75) - Backend Member + Tester
- [Dafina Sadiku](https://github.com/dafiinaa) - Backend Member + QA Lead
- [Astrit Krasniqi](https://github.com/astritkrasniqi1) - Backend Member

### Frontend Team:
- [Dafina Balaj](https://github.com/dafinabalaj) - Frontend Lead
- [Anjeza Gashi](https://github.com/anjezagashi) - Frontend Member + Tester
- [Blerta Azemi](https://github.com/bl3rt4) - Frontend Member + Tester
- [Blina Retkoceri](https://github.com/blinaretkoceri) - Frontend Member
- [Diart Maraj](https://github.com/diartmaraj) - Frontend Member
