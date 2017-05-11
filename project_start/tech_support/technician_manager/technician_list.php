<?php include '../view/header.php';?>
<main>

<h1>Technician List</h1>

<div id="main">
    <!-- display a table of products -->
    <table>
        <tr>
	    <th>Name</th>
	    <th>Email</th>
	    <th>Phone</th>
	    <th>Password</th>
	    <th>&nbsp;</th>
	</tr>
	<?php foreach ($technicians as $technician) : ?>
	<tr>
	    <td><?php echo $technician->getFullName(); ?></td>
	    <td><?php echo $technician->email; ?></td>
	    <td><?php echo $technician->phone; ?></td>
	    <td><?php echo $technician->password; ?></td>
	    <td><form action="." method="post">
	        <input type="hidden" name="action"
		    value="delete_technician">
		<input type="hidden" name="technician_id"
		    value="<?php echo $technician->techID; ?>">
		<input type="submit" value="Delete">
	    </form></td>
	</tr>
	<?php endforeach; ?>
    </table>
    <p><a href="?action=show_add_form">Add Technician</a></p>
</div>

</main>
<?php include '../view/footer.php'; ?>
