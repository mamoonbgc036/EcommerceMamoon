
	$(function(){
		$('.btn-success').on('click',function(e){
			 e.preventDefault();
			 
	//getting image name, price and model for storing in localstorage

			var arry = $(this).parents('a').attr('href');
			var newArry = arry.split('=');
			var prodId = newArry[1];
			var imgArry = $(this).closest('#items').find('img').attr('src');
			var newImg = imgArry.split('/');
			var imgName = newImg[1];
			var model = $(this).parent().find('p').text();
			// var price = $(this).parent().find('h4').text();
			var prePrice = $(this).parent().find('span').text();
			var price = parseInt(prePrice);

	//storing image,price and model in localstorage

			if(localStorage.getItem(prodId)!=null){
				test = JSON.parse(localStorage.getItem(prodId));
				newQuantity = test[2];
				newQuantity++;
				var pus = JSON.stringify([imgName,model,newQuantity,price]);
				localStorage.setItem(prodId,pus);
			} else {
				var quantity = 1;
				var item = JSON.stringify([imgName,model,quantity,price]);
				localStorage.setItem(prodId,item);
				orderItems = [];
			}

			total++;
			$('#badge').html(total);
		});

		// show cart on mouseenter

		$('#cart').mouseenter(function(){
			var html = "";
			if (Object.keys(localStorage)!=null){
				html += '<tr><th>Name</th><th>Price</th><th>Qty</th><th>Total</th></tr>';
			var x = Object.keys(localStorage);
			var total = 0;
			$.each(x,function(key,value){
					if($.isNumeric(value)){
						var test = JSON.parse(localStorage.getItem(value));
					total += test[2]*test[3];
					 html += '<tr><td id="name">'+test[1]+'</td><td id="price">'+test[3]+'</td><td id="name">'+test[2]+'</td><td id="name">'+test[2]*test[3]+'</td></tr>';
					}
				})
			html += '<tr><td></td><td id="name">Total :</td><td></td><td id="price">'+total+'</td></tr>';
			html += '<tr><td id="name"><span onclick="clickMe();" class="btn btn-danger">&#10006</span></td><td></td><td></td><td id="price"><a class="btn btn-info" href="checkout.php">Checkout</a></td></tr>';
			$('.table').append(html);
			}
		});

		// show quantity shoped even refreshed
		if (Object.keys(localStorage).length){
			var x = Object.keys(localStorage);
			var total = 0;
			$.each(x,function(key,value){
				if($.isNumeric(value)){
					var test = JSON.parse(localStorage.getItem(value));
				total += test[2];
				}
			})
		} else {
			var total = "";
		}
		$('#badge').html(total);

		$('#smain').mouseenter(function(){
			$.ajax({
				url:"search.php",
				method:"POST",
				data:{brandName:true},
				success:function(data){
					$('#test').append(data);
				}
			});
		});

		$('#maincat h2').mouseenter(function(){
			$.ajax({
				url:"search.php",
				method:"POST",
				data:{category:true},
				success:function(data){
					$('.category').append(data);
				}
			});
		});
})

function clickMe(){
	$('.table tr').remove();
}

//localStorage.clear();

//Search box

$(function(){
	$('#srcbox').keyup(function(){
		var txt = $(this).val();
		$.ajax({
			url:"search.php",
			method:"POST",
			data:{search:txt},
			dataType:"text",
			success:function(data){
				$('.result').html(data);
			}
		});
	});
})