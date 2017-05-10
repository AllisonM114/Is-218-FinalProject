<?php include '../view/header.php';?>
<main>

    <h1>Add/Update Customer</h1>
    <form action="index.php" method="post" id="add_update_customer_form">
        <input type="hidden" name="action" value="add_update_customer">

    <label>First Name:</label>
    <input type="text" name="first_name" />
    <br>

    <label>Last Name:</label>
    <input type="text" name="last_name" />
    <br>

    <label>Address:</label>
    <input type="text" name="address" />
    <br>

    <label>City:</label>
    <input type="text" name="city" />
    <br>

    <label>State:</label>
    <input type="text" name="state" />
    <br>    

    <label>Postal Code:</label>
    <input type="text" name="postal_code" />
    <br>

    <label>Country_Code:</label>
    <input type="text" name="country_code" />
    <br>

    <label>Phone:</label>
    <input type="text" name="phone" />
    <br>

    <label>Email:</label>
    <input type="text" name="email" />
    <br>

    <label>Password:</label>
    <input type="text" name="password" />
    <br>

    </form>

    <p class="last_paragraph">
        <a href="index.php?action=list_customers">Search Customers</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>
