<?php include '../view/header.php';?>
<main>

    <h1>Register Product</h1>
    <div id="main">
        <form action="." method="post" id="product_register_form">
	    <input type="hidden" name="action" value="register_product">

	    <label>Customer:</label>
	    <?php echo $customer_name; ?>
	    <br>

	    <label>Product:</label>
	    <select name="product_code">
	    <?php foreach ($products as $product) : ?>
	        <option value="<?php echo $product['productCode']; ?>">
		               <?php echo $product['name'];?>
		</option>
	    <?php endforeach; ?>
	    </select>
	    <br>
	    <input type="submit" value="Register Product">
    </div>
</main>
<?php include '../view/footer.php'; ?>
