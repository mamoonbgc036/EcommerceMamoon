
// 	$(function(){
// 		$('.btn-success').on('click',function(e){
// 			 e.preventDefault();
			 
// 	//getting image name, price and model for storing in localstorage

// 			var arry = $(this).parents('a').attr('href');
// 			var newArry = arry.split('=');
// 			var prodId = newArry[1];
// 			var imgArry = $(this).closest('#items').find('img').attr('src');
// 			var newImg = imgArry.split('/');
// 			var imgName = newImg[1];
// 			var model = $(this).parent().find('p').text();
// 			// var price = $(this).parent().find('h4').text();
// 			var prePrice = $(this).parent().find('span').text();
// 			var price = parseInt(prePrice);

// 	//storing image,price and model in localstorage

// 			if(localStorage.getItem(prodId)!=null){
// 				test = JSON.parse(localStorage.getItem(prodId));
// 				newQuantity = test[2];
// 				newQuantity++;
// 				var pus = JSON.stringify([imgName,model,newQuantity,price]);
// 				localStorage.setItem(prodId,pus);
// 			} else {
// 				var quantity = 1;
// 				var item = JSON.stringify([imgName,model,quantity,price]);
// 				localStorage.setItem(prodId,item);
// 				orderItems = [];
// 			}

// 			total++;
// 			$('#badge').html(total);
// 			show();
// 		});

// 		// show cart on mouseenter

// 		$('#cart').mouseenter(function(){
// 			var html = "";
// 			if (Object.keys(localStorage)!=null){
// 				html += '<tr><th>Name</th><th>Price</th><th>Qty</th><th>Total</th></tr>';
// 			var x = Object.keys(localStorage);
// 			var total = 0;
// 			$.each(x,function(key,value){
// 					if($.isNumeric(value)){
// 						var test = JSON.parse(localStorage.getItem(value));
// 					total += test[2]*test[3];
// 					 html += '<tr><td id="name">'+test[1]+'</td><td id="price">'+test[3]+'</td><td id="name">'+test[2]+'</td><td id="name">'+test[2]*test[3]+'</td></tr>';
// 					}
// 				})
// 			html += '<tr><td></td><td id="name">Total :</td><td></td><td id="price">'+total+'</td></tr>';
// 			html += '<tr><td id="name"><span onclick="clickMe();" class="btn btn-danger">&#10006</span></td><td></td><td></td><td id="price"><a class="btn btn-info" href="checkout.php">Checkout</a></td></tr>';
// 			$('.table').append(html);
// 			}
// 		});

// 		function show(){
// 			$('.cartDivitem').remove();
// 			let html = "";
// 			if (Object.keys(localStorage)!=null){
// 			var x = Object.keys(localStorage);
// 			var total = 0;
// 			$.each(x,function(key,value){
// 					if($.isNumeric(value)){
// 						var test = JSON.parse(localStorage.getItem(value));
// 					total += test[2]*test[3];
// 					 html += `<div class="cartDivitem">
// 					 <div class="imagePrice">
// 						 <img src="productImages/${test[0]}" alt="">
// 						 <div class="namePrice">
// 							 <h5>${test[1]}</h5>
// 							 <h5>$${test[3]}</h5>
// 							 <button id="remove">Remove</button>
// 						 </div>
// 					 </div>
// 					 <div class="updown">
// 						 <i class="fas fa-chevron-up"></i>
// 						 <p>${test[2]}</p>
// 						 <i class="fas fa-chevron-down"></i>
// 					 </div>
// 				 </div>`;
// 					}
// 				})
// 			html += `<h3 id="total">Your Total : $ 4748</h3>
// 			<button id="clear">CLEAR CART</button>`;
// 			$('.apnd').append(html);
// 			}
// 		};

// 		// show quantity shoped even refreshed
// 		if (Object.keys(localStorage).length){
// 			var x = Object.keys(localStorage);
// 			var total = 0;
// 			$.each(x,function(key,value){
// 				if($.isNumeric(value)){
// 					var test = JSON.parse(localStorage.getItem(value));
// 				total += test[2];
// 				}
// 			})
// 		} else {
// 			var total = "";
// 		}
// 		$('#badge').html(total);

// 		$('#smain').mouseenter(function(){
// 			$.ajax({
// 				url:"search.php",
// 				method:"POST",
// 				data:{brandName:true},
// 				success:function(data){
// 					$('#test').append(data);
// 				}
// 			});
// 		});
// show();
// 		$('#maincat h2').mouseenter(function(){
// 			$.ajax({
// 				url:"search.php",
// 				method:"POST",
// 				data:{category:true},
// 				success:function(data){
// 					$('.category').append(data);
// 				}
// 			});
// 		});

// 		function clickMe(){
// 			$('.table tr').remove();
// 		}

// 		//Search box

// 		$('#srcbox').keyup(function(){
// 			var txt = $(this).val();
// 			$.ajax({
// 				url:"search.php",
// 				method:"POST",
// 				data:{search:txt},
// 				dataType:"text",
// 				success:function(data){
// 					$('.result').html(data);
// 				}
// 			});
// 		});
// 		$('.fa-cart-arrow-down').on('click',()=>{
// 			$('.cartDiv').css('transform','translateX(0)');	
// 		})

// 		$('.fa-window-close').click(()=>{
// 			$('.cartDiv').css('transform','translateX(100%)');	
// 		})
			
// })


//localStorage.clear();

		// event add to cart
//catch add to cart btn clicked
//catch product id ,image,price
//store to local storage
//increase the cart number


		//event clicked on cart icon
//update the cart div
//make the cart visible

		//event quantity up down
//catch the click
//increase the cart qty both side
//update localstorage


$(function(){
		let total = 0;
		//catch client clicked product details from html
		function cartDetails($btn){
			//generating product id
			let arry = $btn.parents('a').attr('href');
			let newArry = arry.split('=');
			let prodId = newArry[1];
			//generating imageName
			let imgArry = $btn.closest('#items').find('img').attr('src');
			let newImg = imgArry.split('/');
			let imgName = newImg[1];
			//generating model
			let model = $btn.parent().find('p').text();
			//generating price
			let prePrice = $btn.parent().find('span').text();
			let price = parseInt(prePrice);
			return [prodId,imgName,model,price];
		}
		//add cart button click event
		$('.btn-success').click(function(e){	
				e.preventDefault();
				let items = cartDetails($(this));
				Storage.storeCartitem(items);						
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
			Storage.storeCartitem(idPrice[0]);
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
			Storage.deletItems('reduce',idPrice[0]);
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
			Storage.deletItems('deletItem',id);
		})

		content.on('click','#clear',function(){
			Storage.deletItems('delet','');
		})
		  

		class UI{
			static updateCart(){
				$('#rdiv').remove();
				let html = '';
				let data = Storage.storeTotal();
				let items = data[1];
				let total = 0;
				html += `<div id="rdiv">`;
				items.forEach(function(item){
				html +=	`<div id="${item[4]}" class="cartDivitem">
							<div class="imagePrice">
								<img src="productImages/${item[0]}" alt="">
								<div class="namePrice">
									<h5>${item[1]}</h5>
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
			 			<button id="clear">CLEAR CART</button></div>`;
				return html;
			}
		}

		class Storage{
			//save item to store when clicked
			static storeCartitem(items){
				let prodId = ($.isArray(items)) ? items[0] : items;
				if(localStorage.getItem(prodId)!=null){
						let test = JSON.parse(localStorage.getItem(prodId));
						let newQuantity = test[2];
						newQuantity++;
						let pus = JSON.stringify([test[0],test[1],newQuantity,test[3]]);
						localStorage.setItem(prodId,pus);
					} else {
						let quantity = 1;
						let item = JSON.stringify([items[1],items[2],quantity,items[3]]);
						localStorage.setItem(prodId,item);
					}
					total++
					$('#badge').html(total);
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
				$('#badge').html(total);
			}
		}
		//attached store total to the cart;
		let totals = Storage.storeTotal();
		total = totals[0];
		$('#badge').html(total);
})






