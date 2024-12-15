<?php
// Define paths for resources
$photosPath = "photos/food_images/";
$cssPath = "css_files/product.css";
$uploadsDir = __DIR__ . "/uploads/";
$result = "";

// Ensure uploads directory exists
if (!is_dir($uploadsDir)) {
    mkdir($uploadsDir, 0777, true);
}

// Create PHP array of products with explicit image paths
$products = [
    ['id' => 1, 'name' => 'Classic Burger', 'price' => 40, 'path' => 'classic burger.jpg'],
    ['id' => 2, 'name' => 'Another Burger', 'price' => 75, 'path' => 'anotherBurger.jpg'],
    ['id' => 3, 'name' => 'Yet Another Burger', 'price' => 100, 'path' => 'Yet Another Burger.jpg'],
    ['id' => 4, 'name' => 'Chicken Burger', 'price' => 40, 'path' => 'Chicken Burger.jpg'],
    ['id' => 5, 'name' => 'Mixed Tortia', 'price' => 60, 'path' => 'tortia.jpg'],
    ['id' => 6, 'name' => 'Trible Taco', 'price' => 60, 'path' => 'Taco.jpg'],
    ['id' => 7, 'name' => 'Home Pizza', 'price' => 40, 'path' => 'HomePizza.jpg'],
    ['id' => 8, 'name' => 'Classic Pizza', 'price' => 65, 'path' => 'ClassicPizza.jpg'],
    ['id' => 9, 'name' => 'Italic Pizza', 'price' => 70, 'path' => 'italicpizza.jpg'],
    ['id' => 10, 'name' => 'Napilion Pizza', 'price' => 70, 'path' => 'Napilion Pizza.jpg'],
];

// Save product to file
if (isset($_POST['productDetails'])) {
    $productDetails = $_POST['productDetails'];
    $fileIndex = count(glob($uploadsDir . '*.txt')) + 1;
    $fileName = $uploadsDir . "product_$fileIndex.txt";
    $file = fopen($fileName, 'w');
    fwrite($file, $productDetails);
    fclose($file);
    $result = "Product details saved to $fileName.";
}

// Handle file comparison
if (isset($_POST['compareFiles'])) {
    $file1 = $_POST['file1'];
    $file2 = $_POST['file2'];

    if (file_exists($file1) && file_exists($file2)) {
        $handle1 = fopen($file1, 'r');
        $handle2 = fopen($file2, 'r');

        $content1 = fread($handle1, filesize($file1));
        $content2 = fread($handle2, filesize($file2));

        fclose($handle1);
        fclose($handle2);

        $result = ($content1 === $content2) ? "The files are the same." : "The files are different.";
    } else {
        $result = "One or both files do not exist.";
    }
}

// Handle file deletion
if (isset($_POST['deleteAllFiles'])) {
    foreach (glob($uploadsDir . '*.txt') as $file) {
        unlink($file);
    }
    $result = "All files have been deleted.";
}

$uploadedFiles = glob($uploadsDir . '*.txt');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= $cssPath ?>">
    <title>Food Menu</title>
</head>
<body style="background-image: url('<?= $photosPath ?>GoldBorderWallpaper.jpg');">
    <h1>Food Menu</h1>
    <div class="food">
        <?php foreach ($products as $product): ?>
            <div class="item">
                <img src="<?= $photosPath . $product['path'] ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                <div class="tooltip">
                    <?= htmlspecialchars($product['name']) ?>, Price: <?= $product['price'] ?>₪
                </div>
                <form method="POST">
                    <input type="hidden" name="productDetails" value="ID: <?= $product['id'] ?>, Name: <?= htmlspecialchars($product['name']) ?>, Price: <?= $product['price'] ?>">
                    <button type="submit">Save Product</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <h2>Compare Files</h2>
    <form method="POST">
        <label for="file1">File 1:</label>
        <select name="file1" required>
            <option value="">Select file</option>
            <?php foreach ($uploadedFiles as $file): ?>
                <option value="<?= $file ?>"><?= basename($file) ?></option>
            <?php endforeach; ?>
        </select>

        <label for="file2">File 2:</label>
        <select name="file2" required>
            <option value="">Select file</option>
            <?php foreach ($uploadedFiles as $file): ?>
                <option value="<?= $file ?>"><?= basename($file) ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="compareFiles">Compare</button>
    </form>

    <h2>Delete All Files</h2>
    <form method="POST">
        <button type="submit" name="deleteAllFiles" onclick="return confirm('Are you sure you want to delete all files?');">Delete All Files</button>
    </form>

    <?php if ($result): ?>
        <script>alert("<?= $result ?>");</script>
    <?php endif; ?>
</body>
</html>
