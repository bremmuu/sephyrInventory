<?php
session_start();
include __DIR__ . '/../db/db_connect.php';
include __DIR__ . '/../components/header.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: /public/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/assets/blueTumn.png">
    <title>sephyrStocks</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<?php include __DIR__ . '/components/header.php'; ?>

<div id="messageBox"></div> <!-- Message display box -->

<div class="container">

    <section class="form-section">
        <h3>Add Product</h3>
        <form id="addProductForm">
            <input type="text" name="name" placeholder="Name" required>
            <input type="number" name="quantity" placeholder="Quantity" required>
            <input type="number" step="0.01" name="price" placeholder="Price" required>
            <button type="submit">Add</button>
        </form>
    </section>

    <br>

    <section class="form-section">
        <h3>Update Product</h3>
        <form id="updateProductForm">
            <input type="number" name="id" placeholder="ID" required>
            <input type="text" name="name" placeholder="Name" required>
            <input type="number" name="quantity" placeholder="Quantity" required>
            <input type="number" step="0.01" name="price" placeholder="Price" required>
            <button type="submit">Update</button>
        </form>
    </section>

    <br>

    <section class="form-section">
        <h3>Delete Product</h3>
        <form id="deleteProductForm">
            <input type="number" name="id" placeholder="ID" required>
            <button type="submit">Delete</button>
        </form>
    </section>

    <br>

    <section class="inventory">
        <h3>Inventory List</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody id="inventoryTableBody">
                <?php include __DIR__ . '/actions/fetch_inventory.php'; ?>
            </tbody>
        </table>
    </section>
</div>

<script src="/js/main.js"></script>

<?php include __DIR__ . '/components/footer.php'; ?>

</body>
</html>
