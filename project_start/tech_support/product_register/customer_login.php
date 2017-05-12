<?php include '../view/header.php';?>
<main>

    <h1>Customer Login</h1>
    <div id="main">
        <p>You must log in before you can register a product.</p>
	<form action="." method="post" id="customer_login_form">
	    <input type="hidden" name="action" value="get_customer">

	    <label>Email:</label>
	    <input type="input" name="email" value="" />
	    <br>

	    <label>Password:</label>
	    <input type="input" name="password" value="" />
	    <br>

	    <label>&nbsp;</label>
	    <input type="submit" value="Login" />
	    <br>
        </form>
</main>
<?php include '../view/footer.php'; ?>
