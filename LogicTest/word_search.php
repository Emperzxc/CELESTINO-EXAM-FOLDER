<?php
function findWordIndices($words, $target) {
    $indices = [];
    $targetLower = strtolower($target); // Convert target to lowercase for case-insensitive comparison
    
    // Iterate through each word in the list
    foreach ($words as $index => $word) {
        // Convert each word to lowercase for case-insensitive comparison
        $wordLower = strtolower($word);
        
        // Check if the word contains the target
        if (strpos($wordLower, $targetLower) !== false) {
            $indices[] = $index; // Add the index to the result
        }
    }
    
    return $indices;
}

// Test case
$words = ["I", "TWO", "FORTY", "THREE", 'JEN', "TWO", "tWo", "Two"];
$target = "TWO";
$result = findWordIndices($words, $target);

// Output the result
echo "TARGET = \"$target\"\n";
echo "OUTPUT = INDEX " . implode(" and INDEX ", $result) . "\n";
?>
