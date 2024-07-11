<?php
// Include the database connection file
require_once(__DIR__ . '/../database/db.php');
// Query definition to fetch distinct years
$query_years = "
    SELECT DISTINCT YEAR(STR_TO_DATE(`Date Released`, '%y%m%d')) AS Year
    FROM albums
    ORDER BY Year DESC;
";

// Prepare and execute the query to get distinct years
$stmt_years = $pdo->prepare($query_years);
$stmt_years->execute();
$years = $stmt_years->fetchAll(PDO::FETCH_COLUMN);

// Loop through each year and fetch top 10 albums
foreach ($years as $year) {
    // Query definition for top 10 albums per year
    $query = "
        SELECT Album, `2022 Sales`
        FROM albums
        WHERE YEAR(STR_TO_DATE(`Date Released`, '%y%m%d')) = :year
        ORDER BY `2022 Sales` DESC
        LIMIT 10;
    ";

    // Prepare and execute the query for each year
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':year', $year, PDO::PARAM_INT);
    $stmt->execute();
    $results[$year] = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!-- HTML to display results -->
<div class="card">
    <div class="card-header">
        Top 10 Albums per Year Based on Sales
    </div>
    <div class="card-body">
        <?php foreach ($years as $year): ?>
            <div class="my-4">
                <h5><?php echo $year; ?></h5>
                <div class="table-responsive" style="max-height:300px; overflow-y: auto;">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light" style="position:sticky; top:0;">
                            <tr>
                                <th>Album</th>
                                <th>Sales</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($results[$year] as $row): ?>
                                <tr>
                                    <td><?php echo $row['Album']; ?></td>
                                    <td>₱ <?php echo number_format($row['2022 Sales'], 2); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
