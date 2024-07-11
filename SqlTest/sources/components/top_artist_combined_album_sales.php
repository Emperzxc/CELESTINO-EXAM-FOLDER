<?php
// Include the database connection file
require_once(__DIR__ . '/../database/db.php');
// Query definition
$query = "SELECT Artist, SUM(`2022 Sales`) AS combined_album_sales
          FROM albums
          GROUP BY Artist
          ORDER BY combined_album_sales DESC
          LIMIT 1";

// Prepare and execute the query
$stmt = $pdo->prepare($query);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!-- HTML to display result -->
<div class="card">
    <div class="card-header">
        Top Artist with the Most Combined Album Sales
    </div>
    <div class="card-body">
        <p class="card-text"><?php echo $row['Artist']; ?> has the highest combined album sales:<strong> ₱ <?php echo number_format($row['combined_album_sales'], 2); ?></strong></p>

    </div>
</div>
