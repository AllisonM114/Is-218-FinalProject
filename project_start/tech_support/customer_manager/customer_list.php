<?php include '../view/header.php';?>
<main>

    <h1>Customer Search</h1>

    <div id="main">
        <!-- Customer Search --!>
	<form action="index.php" method="post">
	    <input type="hidden" name="action" 
	        value="search_customers">
	    <label>Last Name:</label>
	    <input type="text" name="last_name" 
	        value="<?php echo htmlspecialchars($last_name);?>">
	    <input type="submit" value="Search">
	</form>

	<!-- display a table of customer results -->
	<table>
	    <tr>
	        <th>Name</th>
		<th>Email Address</th>
		<th>City</th>
		<th>&nbsp;</th>
            </tr>
	    <?php foreach ($customers as $customer) : ?>
	    <tr>
	        <td><?php echo $customer['firstName'] . " " .
		$customer['lastName']; ?></td>
		<td><?php echo $customer['email']; ?></td>
		<td><?php echo $customer['city']; ?></td>
		
		<td><form action="." method="post">
		    <input type="hidden" name="action"
		        value="display_customer_results">
		    <input type="hidden" name="customer_id"
		        value="<?php echo $customer['customerID']; ?>">
		    <input type="submit" value="Select">
		</form></td>
            </tr>
	    <?php endforeach; ?>
	</table>
    </div>

</main>
<?php include '../view/footer.php'; ?>
