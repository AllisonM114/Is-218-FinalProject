<?php include '../view/header.php';?>
<main>

    <h1>Get Customer</h1>

    <div id="main">
    <p>You must enter the customer's email address to select the
    customer.</p>
    <form action="index.php" method="post" id="get_customer">
        <input type="hidden" name="action" value="get_customer">
	<input type="text" name="email" value="">
	<input type="submit" value="Get Customer">
    </form>

</main>
<?php include '../view/footer.php'; ?>

