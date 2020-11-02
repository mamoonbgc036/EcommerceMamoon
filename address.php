<?php
include_once("inc/header.php");
?>
<div id="register" class="card my-2">
	<h2 class="text-center">Shipping Address..</h2>
    <p id="notice" class="text-center bg-warning"></p>
	<form action="insert.php" method="POST">
       <input type="hidden" name="token" value="<?=$_GET['token']?>">
        <div class="name">
            <label>
                Your Name:
            </label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
        </div>
        <div class="address">
            <label>
                Shipping Address:
            </label>
            <textarea type="text" id="address" class="form-control" name="address" placeholder="Enter your shipping address"></textarea>
        </div>
        <div class="phone">
            <label>
                Phone No:
            </label>
            <input type="text" id="phone" class="form-control" name="phones" placeholder="Enter Your Phone No.">
        </div>
        <input type="Submit" name="submit" value="submit">
    </form >
</div>
<?php
include_once("inc/footer.php");
?>