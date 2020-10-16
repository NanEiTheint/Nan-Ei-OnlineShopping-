$(document).ready(function () {
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
	})
})