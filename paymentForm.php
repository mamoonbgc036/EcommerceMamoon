<?php
include_once("inc/header.php");
?>
	<?php if(!empty($successMessage)) { ?>
<div id="success-message"><?php echo $successMessage; ?></div>
<?php  } ?>
<div id="error-message" class="text-center bg-waring"></div>

<div id="stripe">
    <form id="frmStripePayment" action="charge.php" method="post">
        <h3 class="text-center text-light">Pay With Stripe</h3>
    <div class="field-row">
        <label>Card Holder Name</label> <span id="card-holder-name-info"
            class="info"></span><br> <input type="text" id="name"
            name="name" class="demoInputBox">
    </div>
    <div class="field-row">
        <label>Email</label> <span id="email-info" class="info"></span><br>
        <input type="text" id="email" name="email" class="demoInputBox">
    </div>
    <div class="field-row">
        <label>Card Number</label> <span id="card-number-info"
            class="info"></span><br> <input type="text" id="card-number"
            name="card-number" class="demoInputBox">
    </div>
    <div class="field-row">
        <div class="contact-row column-right">
            <label>Expiry Month / Year</label> <span id="userEmail-info"
                class="info"></span><br> <select name="month" id="month"
                class="demoSelectBox">
                <option value="08">08</option>
                <option value="09">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select> <select name="year" id="year"
                class="demoSelectBox">
                <option value="18">2018</option>
                <option value="19">2019</option>
                <option value="20">2020</option>
                <option value="21">2021</option>
                <option value="22">2022</option>
                <option value="23">2023</option>
                <option value="24">2024</option>
                <option value="25">2025</option>
                <option value="26">2026</option>
                <option value="27">2027</option>
                <option value="28">2028</option>
                <option value="29">2029</option>
                <option value="30">2030</option>
            </select>
        </div>
        <div class="contact-row cvv-box">
            <label>CVC</label> <span id="cvv-info" class="info"></span><br>
            <input type="text" name="cvc" id="cvc"
                class="demoInputBox cvv-input">
        </div>
    </div>
    <div>
    <input type="submit" name="pay_now" value="Pay $<?=$_GET['totalTk']?>"
            id="submit-btn" class="btn btn-success btnAction mt-1">
    </div>
    <!-- <input type='hidden' name='amount' value='0.5'> <input type='hidden'
        name='currency_code' value='USD'> <input type='hidden'
        name='item_name' value='Test Product'> <input type='hidden'
        name='item_number' value='PHPPOTEG#1'> -->
</form>
</div>
<?php
include_once("inc/footer.php");
?>