<?php
function shortestWordLength($string) {
    // Split the string into an array of words
    $words = explode(' ', $string);
    
    // Use array_map to get the length of each word and then find the minimum length
    $lengths = array_map('strlen', $words);
    
    return min($lengths);
}

// Test cases
echo "Input: 'TRUE FRIENDS ARE ME AND YOU'" . "\n";
echo "Output: " . shortestWordLength('TRUE FRIENDS ARE ME AND YOU') . " - BECAUSE THE SHORTEST WORD IS 'ME'" . "\n\n";

echo "Input: 'I AM THE LEGENDARY VILLAIN'" . "\n";
echo "Output: " . shortestWordLength('I AM THE LEGENDARY VILLAIN') . " - BECAUSE THE SHORTEST WORD IS 'I'" . "\n";
?>
