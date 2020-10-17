$(document).ready(function()
  {
    

    $(".btnDeletecategory").click(function()
      {
        var id=$(this).data("id");
        var ans=confirm("Are you sure to delete this row!");
        if(ans)
        {
          $.post("category_delete.php",{category_id:id});
        }
      })

    $(".btnDeleteitem").click(function()
    {
      var ans=confirm("Are you sure to delete!");

      if (ans) 
      {
        var id=$(this).data("id");
        //console.log(id);
        $.post("item_delete.php",{item_id:id});
      }
      
    })

    $(".btnDeletesub").click(function()
      {
        var id=$(this).data("id");
        var ans=confirm("Are you sure to delete this row!");
        if(ans)
        {
          $.post("subcategory_delete.php",{subcat_id:id});
        }
      })

    $(".btnDeletebrand").click(function()
      {
        var id=$(this).data("id");
        //console.log(id);
        var ans=confirm("Are you sure to delete this row!");
        if(ans)
        {
          $.post("brand_delete.php",{brand_id:id});
        }
      })
    $(".btnOrderConfirm").click(function()
    {
      var ans=confirm("Are you sure to confirm this order!");

      if (ans) 
      {
        var id=$(this).data("id");
        console.log(id);
        $.post("confirm.php",{order_id:id});
      }
      
    })
    $(".btnOrderCancel").click(function()
    {
      var ans=confirm("Are you sure to cancel this order!");

      if (ans) 
      {
        var id=$(this).data("id");
        console.log(id);
        $.post("cancel.php",{order_id:id});
      }
      
    })

  })