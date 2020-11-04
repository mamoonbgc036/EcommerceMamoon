//localStorage.clear();
	let total = 0;
	function cartDetails($btn){
		// getting price from the dom
		let price = $btn.parent().find('p').text();
		let newPrice = price.split(' ');
		
		// getting product name the dom
		let product = $btn.parent().find('h5').text();
		
		//getting images from the dom

		let image = $btn.parent().find('img').attr('src');
		let newImage = image.split('/');

		//getting productid from the dom
		let productId = $btn.parent('#cart').attr('class');
		
		return[productId,product,newImage[1],newPrice[1]];
	}

	$('.add').on('click',function(){
		let item = cartDetails($(this));
		storage.storeItem(item);
	})

	//cart icon click event
		$('.fa-cart-arrow-down').on('click',()=>{
			$('.apnd').append(UI.updateCart());
			$('.cartDiv').css('transform','translateX(0)');	
		})

		//cart close icon click event	
		$('.fa-window-close').click(()=>{
			$('.cartDiv').css('transform','translateX(100%)');	
		})

		//for add event handler to dynamic content
		let content = $(document.body);

		//fa-chevron-up icon click event
		content.on('click','.fa-chevron-up',function(){
			let id = $(this).parents('.updown').attr('id');
			let idPrice = id.split(',');
			//increase qty in localstorage
			storage.storeItem(idPrice);
			//update tag qty
			let qty = $(this).siblings('p').text();
			qty++;
			$(this).siblings('p').html(qty);
			//update tag total
			let total = $(this).parents().find('.amount').text();
			let intConvertedtotal = parseInt(total);
			let intConvertedprice = parseInt(idPrice[1]);
			let amount = intConvertedtotal+intConvertedprice;
			$(this).parents().find('.amount').html(amount);
		})

		//fa-chevron-down icon click event
		content.on('click','.fa-chevron-down',function(){
			let id = $(this).parents('.updown').attr('id');
			let idPrice = id.split(',');
			//increase qty in localstorage
			storage.deletItems('reduce',idPrice[0]);
			//update tag qty
			let qty = $(this).siblings('p').text();
			qty--;
			$(this).siblings('p').html(qty);
			//update tag total
			let total = $(this).parents().find('.amount').text();
			let intConvertedtotal = parseInt(total);
			let intConvertedprice = parseInt(idPrice[1]);
			let amount = intConvertedtotal-intConvertedprice;
			$(this).parents().find('.amount').html(amount);
		})

		content.on('click','#remove',function(){
			let id = $(this).parents('.cartDivitem').attr('id');
			storage.deletItems('deletItem',id);
		})

		content.on('click','#cleared',function(){
			storage.deletItems('delet','');
		})

	class UI{
		static updateCart(){
				$('#rdiv').remove();
				let html = '';
				let data = storage.storeTotal();
				let items = data[1];
				let total = 0;
				html += `<div id="rdiv">`;
				items.forEach(function(item){
				html +=	`<div id="${item[4]}" class="cartDivitem">
							<div class="imagePrice">
								<img src="productImages/${item[1]}" alt="">
								<div class="namePrice">
									<h5>${item[0]}</h5>
									<h6>$${item[3]}</h6>
									<button id="remove">Remove</button>
								</div>
							</div>
							<div id="${[item[4],item[3]]}" class="updown">
								<i class="fas fa-chevron-up"></i>
								<p>${item[2]}</p>
								<i class="fas fa-chevron-down"></i>
							</div>
						</div>`;
					total += item[3]*item[2];
				})

				html += `<h3 id="total">Your Total : $ <span class="amount">${total}</span></h3>
			 			<button class="btn btn-info" id="cleared">Clear Cart</button><a type="button" href="paymentForm.php?totalTk=${total}" id="btnaddress" class="btn btn-info">Proceed Checkout</a></div>`;
				return html;
			}
	}

	class storage{
		static storeItem(item){
			if(localStorage.getItem(item[0])!=null){
				let itemData = JSON.parse(localStorage.getItem(item[0]));
				let quantity = itemData[2];
				quantity++;
				 let pus = JSON.stringify([itemData[0],itemData[1],quantity,itemData[3]]);
				 localStorage.setItem(item[0],pus);
			} else{
				let quantity = 1;
				let itemsData = JSON.stringify([item[1],item[2],quantity,item[3]]);
				localStorage.setItem(item[0],itemsData);
			}
			total++;
			$('#badges').html(total);
		}

		static storeBulk(id,amount,data){
			let amountInt = parseInt(amount);
			if (localStorage.getItem(id)!=null) {
				let itemData = JSON.parse(localStorage.getItem(id));
				let quantity = itemData[2];
				let actualQuantity = quantity+amountInt;
				let pus = JSON.stringify([itemData[0],itemData[1],actualQuantity,itemData[3]]);
				localStorage.setItem(id,pus);
			} else {
				let datum = JSON.stringify([data[0],data[1],amountInt,data[2]]);
				localStorage.setItem(id,datum);
			}

			total = total+amountInt;
			$('#badges').html(total);
		}

		//return store total 
			static storeTotal() {
				let storeitemArray = [];
				let i = 0;
				if (Object.keys(localStorage).length){
					var x = Object.keys(localStorage);
					var total = 0;
					$.each(x,function(key,value){
						if($.isNumeric(value)){
							var test = JSON.parse(localStorage.getItem(value));
						total += test[2];
						storeitemArray[i] = [test[0],test[1],test[2],test[3],value];
							i++
						}
					})
				} else {
					var total = "";
				}
				return [total,storeitemArray];
			}

		//reduc,remove item or clear cart entirly
			static deletItems(instruction,value){
				if(instruction=='delet'){
					$('#rdiv').remove();
					total = 0;
					localStorage.clear();
				} else if(instruction=='deletItem'){
					let test = JSON.parse(localStorage.getItem(value));
					total = total-test[2];
					$('#'+value).remove();
					localStorage.removeItem(value);
				} else if(instruction=='reduce'){
					let test = JSON.parse(localStorage.getItem(value));
					let newQuantity = test[2];
					if(newQuantity==1){
						$('#'+value).remove();
						localStorage.removeItem(value);
						total--;
					} else{
						newQuantity--;
						total--;
						let pus = JSON.stringify([test[0],test[1],newQuantity,test[3]]);
						localStorage.setItem(value,pus);
					}
				}
				$('#badges').html(total);
			}
	}

	//search box
		$('#srcbox').keyup(function(){
			var txt = $(this).val();
			if(txt != ""){
				$.ajax({
					url:"search.php",
					method:"POST",
					data:{search:txt},
					dataType:"text",
					success:function(data){
						$('.result').html(data);
						 $('.result').fadeIn(300);
					}
				});
			} else{
				$('.result').fadeOut("slow");
				$('.result').html("");
			}
		});

		$('.fa-user').on('click',function(){
			let x = $('.fa-user ul li').css('visibility');
			if(x=='hidden'){
				$('.fa-user ul li').css('visibility','visible');
			}else{
				$('.fa-user ul li').css('visibility','hidden');
			}
		})

		$('.btn-danger').click(function(){
			 if(confirm("Are you sure you want to delete this?")){
			       let dat = $(this).closest('tr').find('#prodId').text();;
					$.ajax({
					 url:"test.php",
						method:"POST",
						data:"del="+dat,
						dataType:"text",
						success:function(res){
							$('#'+dat).remove();
						}
					})
			    }
			    else{
			        return false;
			    }
		})

		$('#bulkAdd').on('click',function(){
			let bulkAmount = $(this).siblings('input').val();
			let id = $(this).siblings('input').attr('id');
			let image = $(this).parents().find('#image').find('img').attr('src');
			let imageA = image.split('/');
			let name = $(this).parents().find('#details').find('h2').text();
			let nameA = name.split(':');
			let price = $(this).parents().find('#details').find('#price').text();
			let priceA = price.split('$');
			let data = [nameA[1],imageA[1],priceA[1]];
			storage.storeBulk(id,bulkAmount,data);
		})

		$('#checkout a').on('click',function(e){
			let name = $(this).parents().find('.name').find('input').val();
			let address = $(this).parents().find('.address').find('textarea').val();
			let phone = $(this).parents().find('.phone').find('input').val();
			if (phone && address && name) {
				let addressArray = [name,address,phone];
				let finalAddress = JSON.stringify(addressArray);
				localStorage.setItem('address',finalAddress);
			}else{
				e.preventDefault();
				$('#notice').html('All field should be filled up!!!')
			}
		})


	totals = storage.storeTotal();
	total = totals[0];
	$('#badges').html(total);

// STRIPE PAYMENT

function cardValidation () {
    var valid = true;
    var name = $('#name').val();
    var email = $('#email').val();
    var cardNumber = $('#card-number').val();
    var month = $('#month').val();
    var year = $('#year').val();
    var cvc = $('#cvc').val();

    $("#error-message").html("").hide();

    if (name.trim() == "") {
        valid = false;
    }
    if (email.trim() == "") {
    	   valid = false;
    }
    if (cardNumber.trim() == "") {
    	   valid = false;
    }

    if (month.trim() == "") {
    	    valid = false;
    }
    if (year.trim() == "") {
        valid = false;
    }
    if (cvc.trim() == "") {
        valid = false;
    }

    if(valid == false) {
        $("#error-message").html("All Fields are required").show();
    }

    return valid;
}
//set your publishable key
Stripe.setPublishableKey("pk_test_BEZPOoj0mbz3DdyDROvntjL100X5WKpEvn");

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $("#submit-btn").show();
        $( "#loader" ).css("display", "none");
        //display the errors on the form
        $("#error-message").html(response.error.message).show();
    } else {
        //get token id
        var token = response['id'];
        //insert the token into the form
        $("#frmStripePayment").append("<input type='hidden' id='token' name='token' value='" + token + "' />");

        //TAKE BTN VALUE OF CHARGE FORM
        let totalTk  = $('.btnAction').val();
        let name = $('#name').val();



        $("#frmStripePayment").append("<input type='hidden' name='totalTk' value='" + totalTk + "' />");

        let datum = totals[1];

        datum.push(name);

        datum.push(token);

        //console.log(datum);

        let data = JSON.stringify(datum);

		$.ajax({
			url : "test.php",
			method : "POST",
			data : {fdata : data},
			dataType : "text",
			success:function(e){
				alert(e);
			}
		})        

        //submit form to the server
        $("#frmStripePayment").submit();
    }
}

$('.btnAction').on('click',function(e){
	e.preventDefault();
	var valid = cardValidation();
    if(valid == true) {
        $("#submit-btn").hide();
        $( "#loader" ).css("display", "inline-block");
        Stripe.createToken({
            number: $('#card-number').val(),
            cvc: $('#cvc').val(),
            exp_month: $('#month').val(),
            exp_year: $('#year').val()
        }, stripeResponseHandler);

        //submit from callback
        return false;
    }
})
