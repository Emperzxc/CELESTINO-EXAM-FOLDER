<?php
// Function to count islands in a 2D binary matrix
function countIslands($matrix) {
    $rows = count($matrix); // Number of rows in the matrix
    $cols = count($matrix[0]); // Number of columns in the matrix
    $islandCount = 0; // Counter for the number of islands found

    // Depth-First Search (DFS) function to explore the island
    function dfs(&$matrix, $x, $y) {
        // Check if the current position is out of bounds or if it's water (0)
        if ($x < 0 || $y < 0 || $x >= count($matrix) || $y >= count($matrix[0]) || $matrix[$x][$y] == 0) {
            return;
        }

        $matrix[$x][$y] = 0; // Mark the current position as visited by setting it to 0

        // Define possible directions (up, down, left, right, and diagonals)
        $directions = [[-1, 0], [1, 0], [0, -1], [0, 1], [-1, -1], [-1, 1], [1, -1], [1, 1]];

        // Explore all directions recursively
        foreach ($directions as $direction) {
            dfs($matrix, $x + $direction[0], $y + $direction[1]);
        }
    }

    // Iterate through each cell in the matrix
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            // If the cell contains land (1), initiate DFS to explore the entire island
            if ($matrix[$i][$j] == 1) {
                $islandCount++; // Increment island count
                dfs($matrix, $i, $j); // Explore the island starting from this cell
            }
        }
    }

    return $islandCount; // Return the total number of islands found
}

// Function to visualize the matrix with 'X' for land and '~' for water
function visualizeMatrix($matrix) {
    return implode("\n", array_map(function($row) {
        return implode('', array_map(function($cell) {
            return $cell == 1 ? "X" : "~"; // Convert 1 to 'X' (land) and 0 to '~' (water)
        }, $row));
    }, $matrix));
}

// Test case
$matrix = [
    [1, 1, 1, 1],
    [0, 1, 1, 0],
    [0, 1, 0, 1],
    [1, 1, 0, 0]
];

// Output the number of islands found
echo "Number of islands: " . countIslands($matrix) . "\n";

// Output the matrix visualization for better understanding
echo "Matrix visualization:\n" . visualizeMatrix($matrix) . "\n";
?>