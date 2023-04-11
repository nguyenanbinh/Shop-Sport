$(document).ready(function () {
	//lấy cart or khởi tạo cart
	if (JSON.parse(localStorage.getItem('cart'))) {
		cart = JSON.parse(localStorage.getItem('cart'));
	} else {
		var cart = [];
	};
	if(cart.length){
		count = countItem(cart);
		$('.count_item_pr').text('('+count+')');
	}
	//add sự kiện add cart
	$('b').click(function (e) {
		e.preventDefault();
		var product = { key: "value", key1: "value" };
		var product = {
			id: $(this).attr('data-id'),
			name: $(this).attr('data-name'),
			price: $(this).attr('data-price'),
			quantity: 1
		};

		if (cart.length) { // giỏ hàng có spham
			console.log('add cart exist');
			//add sp vào giỏ hàng
			cart = addToCart(cart, product);
			localStorage.setItem('cart', JSON.stringify(cart));
		} else { // giỏ hàng chưa có spham
			console.log('cart empty');
			cart.push(product); // add spham vào giỏ hàng
			//lưu giỏ hàng vào localstorage
			localStorage.setItem('cart', JSON.stringify(cart));
		}

		count = countItem(cart);
		$('.count_item_pr').text('('+count+')');
		console.log(count);
	});
	$(document).on('change','.cart-quantity-input', (function () {
		var quantity = $(this).val();
		var product_id = $(this).attr('data-id');
		cart = updateProductQuantity(cart, product_id, quantity);
		console.log(cart);
		localStorage.setItem('cart', JSON.stringify(cart));
		location.reload();
		showCart() ;
	}));
	$(document).on('click', '#remove', function() {
		if( ! confirm("Do you really want to do this?") ){
            e.preventDefault(); // ! => don't want to do this
        } else {
			var key = $(this).attr('key');
			console.log(key);
			var product_id = $(this).attr('data-id');
			var cart = JSON.parse(localStorage.getItem('cart'));
			// console.log(cart[key]);
			deleteFromCart(cart,product_id);// Gio hang sau khi xoa
			// delete cart[key];
			localStorage.setItem('cart', JSON.stringify(cart));
			showCart();
        }
		
	});
	// $("#remove").click(function() {
	// 	var key = $(this).attr('key');
	// 	console.log(key);
	// 	cart = JSON.parse(localStorage.getItem('cart'));
	// 	console.log(cart);
	// 	cart[key] = null;
	// 	localStorage.setItem('cart', JSON.stringify(cart));
	// 	// console.log(localStorage.removeItem(cart(key)));
	// 	showCart();
	// 	// You got the pid. Continue by removing this pid from your cart
	// });
	// $(document).on('delete','span', (function () {
	// 	var id = $(this).attr('data-id');
	// 	$('span').remove('id');
	// 	console.log(cart);
	// 	localStorage.setItem('cart', JSON.stringify(cart));
	// 	showCart() ;
	// }));
});

function countItem(cart){
	var count = cart.length;
	// for(var i = 0; i < cart.length; i++)
	// { 
    // if(cart[i] == 2) 
	//  count++;
	//  
	// }
	// console.log(cart.length);
	return count;
}

// add spham vào giỏ hàng
function addToCart(cart, product) {
	var index = checkProductExist(cart, product.id);
	console.log('found ' + index);
	if (index === false) {
		cart.push(product);
		// localStorage.setItem('cart', JSON.stringify(cart));
	} else {
		cart[index]['quantity'] += 1 ;
		// localStorage.setItem('cart', JSON.stringify(cart));

	}
	// if(index !== false){
	// 	cart.splice(index,1);
	// }
	return cart;
}

//kiểm tra spham đã được add vào giỏ hàng chưa
function checkProductExist(cart, product_id) {
	console.log('cart length ' + cart.length);
	for (var i = 0; i < cart.length; i++) {
		console.log('id product ' + cart[i]['id']);
		if (cart[i]['id'] == product_id) {
			console.log('vi tri ');
			return i;
		} else {
			continue;
		}
	};
	return false;
}

function showCart() {
	var cart = JSON.parse(localStorage.getItem('cart')); 
	if (cart.length) {
		var html = '';
		var total = 0;
		$.each(cart, function(key,item){
			html += '<tr>'+
							'<td class="cart_product">'+
								'<a href=""><img src="" alt=""></a>'+
							'</td>'+
							'<td class="cart_description">'+
								'<h4><a href="">'+item.name+'</a></h4>'+
							'</td>'+
							'<td class="cart_price">'+
								'<p>'+'$'+ formatCurrency(item.price) +'</p>'+
							'</td>'+
							'<td class="cart_quantity">'+
								'<div class="cart_quantity_button">'+
									'<input class="cart-quantity-input" type="text" name="quantity" data-id="'+item.id+'" value="'+item.quantity+'" autocomplete="off" size="2">'+
								'</div>'+
							'</td>'+
							'<td class="cart_total">'+
								'<p class="cart_total_price">$'+(item.price*item.quantity)+'</p>'+
							'</td>'+
							'<td class="cart_delete">'+			'<a key="'+key+'" id="remove" data-id="'+item.id+'" class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>'+
							'</td>'+
						'</tr>';
				total += parseInt(item.price*item.quantity);
		});
		$('tbody').html('');
		$('tbody').append(html);
		console.log(total);
		$('.total').text('$'+formatCurrency(total.toString()));
		// $('.total').input('$'+formatCurrency(total.toString()));
	}
}

function deleteFromCart(cart, product_id){
	var index = checkProductExist(cart,product_id);
	cart.splice(index,1)
	return cart;
}

function updateProductQuantity(cart, product_id, quantity) {
	var index = checkProductExist(cart, product_id);
	cart[index]['quantity'] = quantity;
	return cart;
}
/*Format currency*/
function formatCurrency(number) {
	if(number != null){
	var n = number.split("").reverse().join("");
	var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
	return n2.split("").reverse().join('');
	}
}

