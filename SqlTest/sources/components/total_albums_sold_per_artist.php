<?php
// Include the database connection file
require_once(__DIR__ . '/../database/db.php');
// Query definition
$query = "SELECT Artist, COUNT(Album) AS total_albums_sold
          FROM albums
          GROUP BY Artist";

// Prepare and execute the query
$stmt = $pdo->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- HTML to display results -->
<div class="card">
    <div class="card-header">
        Total Albums Sold per Artist
    </div>
    <div class="card-body">
        <div class="table-responsive"  style="max-height:300px; overflow-y: auto;">
            <table class="table table-bordered table-striped">
                <thead class="thead-light" style="position:sticky; top:0;">
                    <tr>
                        <th>Artist</th>
                        <th>Total Albums Sold</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $row): ?>
                        <tr>
                            <td><?php echo $row['Artist']; ?></td>
                            <td><?php echo $row['total_albums_sold']; ?></td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
