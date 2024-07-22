<?php
include('includes/header.php');
include('includes/navbar.php');

require('admin/config/config.php');

// Get the search query from the form
$searchQuery = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';

$sql = "SELECT * FROM products WHERE title LIKE '%$searchQuery%' OR description LIKE '%$searchQuery%'";
$result = $conn->query($sql);

?>


<body>
    <div class="container">
        <h1>Search Results</h1>
        <?php
        if ($result->num_rows > 0) {
            echo "<ul class='list-group'>";
            while($row = $result->fetch_assoc()) {
                echo "<li class='list-group-item'>";
                echo "<h5>" . $row['title'] . "</h5>";
                echo "<p>" . $row['description'] . "</p>";
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No results found for '<strong>" . htmlspecialchars($searchQuery) . "</strong>'</p>";
        }
        ?>
    </div>
    <script src="path/to/your/bootstrap.bundle.js"></script>
</body>
</html>

<?php
$conn->close();
include('includes/footer.php');
?>

