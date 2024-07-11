<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Album Sales Visualizations</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">

    <h1 class="my-4">MySQL Exam - Album Sales Visualizations</h1>

    <div class="my-4" >
        <?php include __DIR__ .'/sources/components/albums_by_artist.php'; ?>
    </div>
    <div class="my-4">
        <?php include __DIR__ . '/sources/components/total_albums_sold_per_artist.php';?>
    </div>

    <hr>

    <div class="my-4">
        <?php include __DIR__ .'/sources/components/combined_album_sales_per_artist.php'; ?>
    </div>

    <hr>

    <div class="my-4">
        <?php include __DIR__ .'/sources/components/top_artist_combined_album_sales.php'; ?>
    </div>

    <hr>

    <div class="my-4">
        <?php include __DIR__ .'/sources/components/top_10_albums_per_year.php'; ?>
    </div>

    <hr>



</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>
