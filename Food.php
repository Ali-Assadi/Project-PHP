`<?php
// Define paths for resources
$photosPath = "photos/food_images/";
$uploadsDir = __DIR__ . "/uploads/";
$result = "";

// Ensure uploads directory exists
if (!is_dir($uploadsDir)) {
    mkdir($uploadsDir, 0777, true);
}

// Create PHP array of products with explicit image paths and stock
$products = [
    ['id' => 1, 'name' => 'Classic Burger', 'price' => 40, 'stock' => 5, 'path' => 'classic burger.jpg'],
    ['id' => 2, 'name' => 'Another Burger', 'price' => 75, 'stock' => 3, 'path' => 'anotherBurger.jpg'],
    ['id' => 3, 'name' => 'Yet Another Burger', 'price' => 100, 'stock' => 7, 'path' => 'Yet Another Burger.jpg'],
    ['id' => 4, 'name' => 'Chicken Burger', 'price' => 40, 'stock' => 8, 'path' => 'Chicken Burger.jpg'],
    ['id' => 5, 'name' => 'Mixed Tortia', 'price' => 60, 'stock' => 10, 'path' => 'tortia.jpg'],
    ['id' => 6, 'name' => 'Trible Taco', 'price' => 60, 'stock' => 4, 'path' => 'Taco.jpg'],
    ['id' => 7, 'name' => 'Home Pizza', 'price' => 40, 'stock' => 2, 'path' => 'HomePizza.jpg'],
    ['id' => 8, 'name' => 'Classic Pizza', 'price' => 65, 'stock' => 6, 'path' => 'ClassicPizza.jpg'],
    ['id' => 9, 'name' => 'Italic Pizza', 'price' => 70, 'stock' => 0, 'path' => 'italicpizza.jpg'],
    ['id' => 10, 'name' => 'Napilion Pizza', 'price' => 70, 'stock' => 9, 'path' => 'Napilion Pizza.jpg'],
    ['id' => 11, 'name' => 'Shawrma', 'price' => 50, 'stock' => 5, 'path' => 'shawrma.jpg'],
    ['id' => 12, 'name' => 'Baget', 'price' => 40, 'stock' => 4, 'path' => 'baget1.jpg'],
    ['id' => 13, 'name' => 'Diet meal 1', 'price' => 45, 'stock' => 6, 'path' => 'Diet1.jpg'],
    ['id' => 14, 'name' => 'Diet meal 2', 'price' => 45, 'stock' => 7, 'path' => 'diet2.jpg'],
    ['id' => 15, 'name' => 'Diet meal 3', 'price' => 45, 'stock' => 3, 'path' => 'Diet3.jpg'],
    ['id' => 16, 'name' => 'Fatosh Salad', 'price' => 30, 'stock' => 8, 'path' => 'fatosh.jpg'],
    ['id' => 17, 'name' => 'Arabic Salad', 'price' => 20, 'stock' => 5, 'path' => 'ArabicSalad.jpg'],
    ['id' => 18, 'name' => 'Tabola', 'price' => 30, 'stock' => 6, 'path' => 'tabola.jpg'],
];

// Save product details with quantity
if (isset($_POST['productDetails'], $_POST['quantity'])) {
    $productDetails = $_POST['productDetails'];
    $quantity = (int)$_POST['quantity'];
    $fileIndex = count(glob($uploadsDir . '*.txt')) + 1;
    $fileName = $uploadsDir . "product_$fileIndex.txt";
    $file = fopen($fileName, 'w');
    fwrite($file, $productDetails . ", Quantity: $quantity");
    fclose($file);
    $result = "Product details saved to $fileName.";
}

// File comparison logic
if (isset($_POST['compareFiles'])) {
    $file1 = $_POST['file1'];
    $file2 = $_POST['file2'];

    if (file_exists($file1) && file_exists($file2)) {
        $content1 = file_get_contents($file1);
        $content2 = file_get_contents($file2);
        $result = ($content1 === $content2) ? "The files are the same." : "The files are different.";
    } else {
        $result = "One or both files do not exist.";
    }
}

// Delete all uploaded files
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
    <title>Food Menu</title>
    <style>
        /* General Flexbox Layout for Food, Drinks, Ice-Cream */
        .food,
        .drink,
        .ice-cream {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
            margin-top: 20px;
        }

/* Styling Each Item Container */
.item {
    position: relative;
    background-color: rgba(0, 0, 0, 0.7); /* Slight transparency */
    border-radius: 10px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    width: 200px;
    height: 400px;
    text-align: center;
    padding: 20px 10px; /* Increase padding to give space for tooltip */
    transition: transform 0.3s ease;
    backdrop-filter: blur(10px); /* Adding blur effect behind the items */
}

/* Adjust image styling (optional) */
img {
    width: 180px;
    height: 180px;
    object-fit: cover;
    border-radius: 10%;
    filter: grayscale(40%);
    transition: transform 0.7s ease, filter 0.7s ease;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
}

img:hover {
    transform: scale(0.95);
    filter: grayscale(0%);
}

/* Tooltip Styling */
.tooltip {
    position: absolute;
    bottom: 10px; /* Adjust position to ensure tooltip doesn't go below the item */
    left: 50%;
    transform: translateX(-50%);
    background-color: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 5px;
    border-radius: 5px;
    white-space: nowrap;
    z-index: 999;
    visibility: hidden;
    opacity: 0;
    transition: opacity 0.3s, visibility 0s 0.3s;
    border: 1px solid rgb(172, 156, 120);
}
.item:hover .tooltip {
    visibility: visible;
    opacity: 1;
    transition-delay: 0s;
}

        /* Form and Button Styling */
        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

/* Modern look for the select element */
select {
    padding: 10px;
    width: 50%; /* Adjust width as needed */
    border-radius: 5px;
    border: 1px solid #ccc;
    background-color: #f0f0f0; /* Light background color */
    color: #333; /* Text color */
    font-size: 16px;
    transition: background-color 0.3s, border-color 0.3s;
}

/* Change border color on focus */
select:focus {
    border-color: #5c5c5c; /* Darker border color on focus */
    background-color: #e8e8e8; /* Slightly darker background */
}

/* Increased margin between select and button */
form select {
    margin-bottom: 15px; /* Adjust the space between select and button */
}

/* Styling the button for modern design */
button {
    cursor: pointer;
    background: linear-gradient(-135deg, rgb(46, 42, 28), rgb(82, 74, 61));
    color: white;
    border: none;
    padding: 12px 20px;
    font-size: 16px;
    transition: background-color 0.3s ease, transform 0.2s ease;
    width: 50%; /* Same width as select for consistency */
}

button:hover {
    background: linear-gradient(-135deg, rgb(46, 42, 28), rgb(82, 74, 61));
    transform: scale(1.05);
}

/* For the submit button specifically */
button[type="submit"] {
    background: linear-gradient(-135deg, rgb(46, 42, 28), rgb(82, 74, 61));
    padding: 12px 20px;
}

button[type="submit"]:hover {
    background: linear-gradient(-135deg, rgb(46, 42, 28), rgb(82, 74, 61));
    transform: scale(1.05);
}



        /* Page Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('photos/food_images/GoldBorderWallpaper.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
            text-align: center;
        }

        h1 {
            font-size: 2.5em;
            margin-top: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        h2 {
            font-size: 1.8em;
            margin-top: 40px;
            color: #ccc;
        }

        label {
            margin-top: 10px;
            font-size: 16px;
        }

        select {
            margin-top: 5px;
        }

        #result {
            margin-top: 20px;
            font-size: 18px;
            color: #f4f4f4;
        }

        input[type="text"] {
            padding: 10px;
            width: 40%;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin: 10px 0;
        }

        input[type="submit"] {
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Food Menu</h1>
    <div class="food">
        <?php foreach ($products as $product): ?>
            <div class="item">
                <img src="<?= $photosPath . $product['path'] ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                <div class="tooltip">
                    <?= htmlspecialchars($product['name']) ?>, Price: <?= $product['price'] ?>₪<br>
                    Stock: <?= $product['stock'] ?>
                </div>
                <?php if ($product['stock'] > 0): ?>
                    <form method="POST">
                        <input type="hidden" name="productDetails" value="ID: <?= $product['id'] ?>, Name: <?= htmlspecialchars($product['name']) ?>, Price: <?= $product['price'] ?>">
                        <label for="quantity_<?= $product['id'] ?>">Quantity:</label>
                        <select name="quantity" id="quantity_<?= $product['id'] ?>">
                            <?php for ($i = 1; $i <= $product['stock']; $i++): ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                        <button type="submit">Save Product</button>
                    </form>
                <?php else: ?>
                    <p style="color: red;">Out of stock</p>
                <?php endif; ?>
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