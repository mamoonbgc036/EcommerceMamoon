<?php
include_once("inc/header.php");
?>
<div id="register" class="card my-2">
	<h2 class="text-center">Shipping Address..</h2>
	<form action="insert.php" method="POST" class="form-group">
        <div class="first">
            <label>
                Your Name:
            </label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
        </div>
        <div class="last">
            <label>
                Shipping Address:
            </label>
            <textarea type="text" id="address" class="form-control" name="address" placeholder="Enter your shipping address"></textarea>
        </div>
        <div class="phone">
            <label>
                Phone No:
            </label>
            <input type="text" id="phone" class="form-control" name="phone" placeholder="Enter Your Phone No.">
        </div>
        <div>
            <input type="submit" id="order" class="btn btn-info my-2" value="submit" name="submit">
        </div>
    </form>
</div>
<?php
include_once("inc/footer.php");
?>