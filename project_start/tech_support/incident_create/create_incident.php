<?php include '../view/header.php';?>
<main>

    <h1>Create Incident</h1>
    <div id="main">
    <form action="." method="post" id="create_incident_form">
        <input type="hidden" name="action" value="create_incident_form">

    <label>Customer:</label>
    <?php echo $customer['firstName'] . " " . $customer['lastName']; ?>
    <br>

    <label>Product:</label>
    <select name="productID">
    <?php foreach ($products as $product) : ?>
        <option value="<?php echo $product['productID']; ?>">
	               <?php echo $product['name']; ?>
	</option>
    <?php endforeach; ?>
    </select>
    <br>

    <label>Title:</label>
    <input type="text" name="title">
    <br>

    <label>Description:</label>
    <textarea name="description" rows="4" columns="36"</textarea>
    <br>

    <input type="submit" value="Create Incident">
    </form>
    </div>

</main>
<?php include '../view/footer.php'; ?>

