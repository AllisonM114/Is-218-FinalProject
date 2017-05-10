<?php include '../view/header.php';?>
<main>

    <h1>Add/Update Customer</h1>
    <form action="index.php" method="post" id="add_update_customer_form">
        <input type="hidden" name="action" value="add_update_customer">

    <label>First Name:</label>
    <input type="text" name="first_name" />
    <?php echo $fields->getField('first_name')->getHTML; ?>
    <br>

    <label>Last Name:</label>
    <input type="text" name="last_name" />
    <?php echo $fields->getField('last_name')->getHTML; ?>
    <br>

    <label>Address:</label>
    <input type="text" name="address" />
    <?php echo $fields->getField('address')->getHTML; ?>
    <br>

    <label>City:</label>
    <input type="text" name="city" />
    <?php echo $fields->getField('city')->getHTML; ?>
    <br>

    <label>State:</label>
    <input type="text" name="state" />
    <?php echo $fields->getField('state')->getHTML; ?>
    <br>    

    <label>Postal Code:</label>
    <input type="text" name="postal_code" />
    <?php echo $fields->getField('postal_code')->getHTML; ?>
    <br>

    <label>Country_Code:</label>
    <select name="country_code">
        <?php foreach ($countries as $country) :?>
	    <option value="<?php echo $country['countryCode'];?>"
	    <?php if($country_code == $country['countryCode']) {
	        echo "selected='selected'";
	    }
	    </option>
	<?php endforeach; ?>
    </select>
    <br>

    <label>Phone:</label>
    <input type="text" name="phone" />
    <?php echo $fields->getField('phone')->getHTML; ?>
    <br>

    <label>Email:</label>
    <input type="text" name="email" />
    <?php echo $fields->getField('email')->getHTML; ?>
    <br>

    <label>Password:</label>
    <input type="text" name="password" />
    <?php echo $fields->getField('password')->getHTML; ?>
    <br>

    <label>&nbsp</label>
    <input type="submit" value="<?php echo $button_text ?>">
    <br>
    </form>

    <p class="last_paragraph">
        <a href="index.php?action=list_customers">Search Customers</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>
