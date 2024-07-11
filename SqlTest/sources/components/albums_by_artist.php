<?php
// Include the database connection file
require_once(__DIR__ . '/../database/db.php');

// Default to an empty string if no artist is searched yet
$searchedArtist = isset($_GET['artist']) ? $_GET['artist'] : '';

// Initialize results array
$results = [];

// Display a message if no artist name is entered
if (empty($searchedArtist)) {
    $message = "Enter an artist name to display album details.";
} else {
    // Query definition
    $query = "SELECT Album, `2022 Sales`
              FROM albums
              WHERE Artist LIKE CONCAT('%', :artist, '%')";

    // Prepare and execute the query
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':artist', $searchedArtist, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!-- HTML to display results -->
<div class="card">
    <div class="card-header">
        <?php if (isset($message)): ?>
            <?php echo htmlspecialchars($message); ?>
        <?php else: ?>
            Albums by "<?php echo htmlspecialchars($searchedArtist); ?>"
        <?php endif; ?>
    </div>
    <div class="card-body">
        <!-- Form for searching artist -->
        <form method="GET" class="form-inline mb-4">
            <div class="form-group mr-2">
                <label for="artistInput" class="sr-only">Artist Name</label>
                <input type="text" class="form-control" id="artistInput" name="artist" placeholder="Enter Artist Name" value="<?php echo htmlspecialchars($searchedArtist); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <!-- Display albums -->
        <?php if (!empty($results)): ?>
            <div class="table-responsive" style="max-height:300px; overflow-y: auto;">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light" style="position:sticky; top:0;">
                        <tr>
                            <th>Album</th>
                            <th>2022 Sales</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $row): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['Album']); ?></td>
                                <td>₱ <?php echo number_format($row['2022 Sales'], 2); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>
