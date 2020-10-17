$(document).ready(function () {

	cartNoti();
	showData();
	//alert("OK");

	$(".normal").show();
	$(".searhwork").hide();

	$(".searchbtn").click(function()
	{
		//alert("hi");
		$(".normal").hide();
		$(".searhwork").show();
		//$("body").css("background-color", "yellow");


	})
	$(".leftarrow").click(function()
	{
		$(".normal").show();
		$(".searhwork").hide();
		
	})


	$(".btnViewDetail").click(function()
	{
		//alert("Hi");
		//console.log("Hello");
		var photo=$(this).data('photo');
		var name=$(this).data('name');
		var brand=$(this).data('brand');
		var category=$(this).data('category');
		var price=$(this).data('price');
		var discount=$(this).data('discount');
		var description=$(this).data('description');
		//console.log(photo);

		$(".dphoto").attr('src',"backend/"+photo);
		$(".dname").html(`<b>Name: </b>`+name);
		$(".dbrand").html(`<b>Brand: </b>`+brand);
		$(".dcategory").html(`<b>Category: </b>`+category);
		$(".dprice").html(`<b>Price: </b>`+price);
		$(".ddiscount").html(`<b>Discount: </b>`+discount);
		$(".ddescription").html(`<b>Description: </b>`+description);

	})
	$(".btnAddToCart").click(function()
	{
		//alert("OK");
		var id=$(this).data('id');
		var photo=$(this).data('photo');
		var name=$(this).data('name');
		var price=$(this).data('price');
		var discount=$(this).data('discount');
		var pqty=parseInt($("#qty").val());
		//console.log(typeof(pqty));

		var qty=1;
		if(pqty)
		{
			//alert(pqty);
			qty=pqty;
		}
		//console.log(qty);

		var product={
			id:id,
			photo:photo,
			name:name,
			price:price,
			discount:discount,
			qty:qty
		}
			//console.log(product);

		var shop=localStorage.getItem("Heinshop");
		var shopArr=[];
		if(shopArr==null)
		{

			shopArr=Array();
		}
		else
		{
			shopArr=JSON.parse(shop);
		}
		var flag=false;
		$.each(shopArr,function(i,v)
		{
			//console.log(i);
			if(id==v.id)
			{
				//alert("OK");
				flag=true;
				if(!pqty)
				{
					v.qty++;

				}
				else 
				{
					v.qty+=pqty;
					
				}
				
			}
		})
		if(flag==false)
		{
			//alert("OK");
			shopArr.push(product);
		}
		var shopString=JSON.stringify(shopArr);
		localStorage.setItem("Heinshop", shopString);
		cartNoti();
	})

	function cartNoti()
	{
		//alert("Ol");
		$('#noti').attr('data-count',0);
		var shop=localStorage.getItem("Heinshop");
		var shopArr=JSON.parse(shop);
		if(shopArr!=null)
		{
			//alert("OK");
			var count=shopArr.length;
			//alert(count);
			$('#noti').attr('data-count',count);
		}


	}
	function showData()
	{
		//alert("OK");
		var shop=localStorage.getItem("Heinshop");
		var shopArr=JSON.parse(shop);
		var html="";
		//console.log(shopArr);
		var total=0
		$.each(shopArr,function(i,v)
		{
			//console.log(shopArr);

			html+=`<tr>
						<td class="text-center">${i+1}</td>
						<td class="text-center"><img src="backend/${v.photo}" class="img-fluid" width="80px"></td>
						<td class="text-center">${v.name}</td>
						<td class="text-center">${v.price}</td>
						<td class="text-center"><a class="px-3 btn text-success descrease" data-id="${i}">-</a>${v.qty}
						<a class="px-3 btn text-info increase" data-id="${i}"">+</a></td>
						<td class="text-right">${v.qty*v.price}</td>
					</tr>
					`;
			total+=v.price*v.qty;
		})
		html+=`<tr>
					<td colspan="5">Total</td>
					<td class="text-right total">${total}</td>
				</tr>`;
		$("#total").val(total);
		$('tbody').html(html);
	}

	$("tbody").on("click",".increase",function()
	{
		//alert("OK");
		var id=$(this).data("id");
		console.log(id);
		var shop=localStorage.getItem("Heinshop");
		var shopArr=JSON.parse(shop);
		$.each(shopArr,function(i,v)
		{
			if(id==i)
			{
				v.qty++;
			}
		})
		var shopString=JSON.stringify(shopArr);
		localStorage.setItem("Heinshop",shopString);
		showData();
		cartNoti();
	})
	$("tbody").on("click",".descrease",function()
	{
		//alert("OK");
		var id=$(this).data("id");
		//console.log(id);
		var shop=localStorage.getItem("Heinshop");
		var shopArr=JSON.parse(shop);
		$.each(shopArr,function(i,v)
		{
			if(id==i)
			{
				v.qty--;
				if(v.qty<=0)
				{
					//v.qty=0;
					shopArr.splice(i,1);
				}
			}
		})
		var shopString=JSON.stringify(shopArr);
		localStorage.setItem("Heinshop",shopString);
		showData();
		cartNoti();
	})
	$(".buyNow").click(function()
	{
		//alert("OK");
		var note=$(".note").val();
		var total=$("#total").val();
		//console.log(note,total);
		var shop=localStorage.getItem("Heinshop");
		var shopArr=JSON.parse(shop);

		$.post("order.php",{shopArr:shopArr,totalPrice:total,note:note},function(response)
		{
			if(response)
			{
				console.log(shopArr,total,note);
				localStorage.clear();
				showData();
				location.href="ordersuccess.php";
			}
		})
	})
})