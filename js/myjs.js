
var map;
var marker;
var m;
var k;
var A=[];
$(document).ready(function(){
	
	
//Sign up users in database db_shop
 
$("#frm_signup").submit(function(event){
	
  event.preventDefault();
  
   $.post("api/api.php?q=1",$("#frm_signup").serialize(), function(res){
	   
		if(res=="true")
		{
		 $("#frm_signup").hide(1000);
		 $("#message").html("<div class='alert alert-success msgs'>New user is inserted<br><a href='index.php?p=2'>Go to login page</a></div>");
		}
		else
		{
		 $("#message").html("<div class='alert alert-danger msgd'>Error!Try again to sign up</div>");
		}
	});
});

//login users in database db_shop
  
$("#frm_login").submit(function(event){
  event.preventDefault();
	   $.post("api/api.php?q=2",$("#frm_login").serialize(), function(res){
		console.log(res);
		   
		if(res=="true")
		{
		 window.location.href='index.php?p=10';
		}
		else
		{
			$("#message").html("<div class='alert alert-danger msgd'>Error email or password</div>");
		}
		
	});
});



//login admins in database db_shop
	
$("#frm_loginadmin").submit(function(event){
  event.preventDefault();
	   $.post("api/api.php?q=3",$("#frm_loginadmin").serialize(), function(res){
		
		   
		if(res=="true")
		{
		 window.location.href='index.php?p=5';
		}
		else
		{
			$("#message").html("<div class='alert alert-danger msgd'>Error username or password</div>");
		}
		
	});
});



// create new shop
$("#frm_crtshop").submit(function(event){
	
  event.preventDefault();
  
   $.post("api/api.php?q=4",$("#frm_crtshop").serialize(), function(res){
	  
		if(res=="true")
		{
		 $(".r1").hide(1000);
		 $("#message").html("<div class='alert alert-success msgs'>New shop is inserted<br><a href='index.php?p=10'>Go to your shop's list</a></div>");
		}
		else
		{
		 $("#message").html("<div class='alert alert-danger msgd'>Error!Try again</div>");
		}
	});
});



//update user's profile

$("#frm_prof").submit(function(event){
	
	event.preventDefault();
	$.post("api/api.php?q=6",$("#frm_prof").serialize(),function(res){
		
				if(res=="ok")
				{
					$("#frm_prof").hide(1000);
					$("#message").html("<div class=\"alert alert-success msgs\">New user's data saved<br><a href='index.php?p=10'>Go to your shop's list</a></div>");
					
				}
				else
				{
					$("#message").html("<div class=\"alert alert-danger msgd\">Error during process</div>");
				}
			
		});
});

//update shop's profile

$("#frm_shop").submit(function(event){
	
	event.preventDefault();
	$.post("api/api.php?q=9",$("#frm_shop").serialize(),function(res){
		
				if(res=="ok")
				{
					$(".r1").hide(1000);
					$("#message").html("<div class=\"alert alert-success msgs\">New shop's data saved<br><a href='index.php?p=10'>Go to your list of your shops</a></div>");
					
				}
				else
				{
					$("#message").html("<div class=\"alert alert-danger msgd\">Error during process</div>");
				}
			
		});
});

//update admins's profile

$("#frm_adminprof").submit(function(event){
	
	event.preventDefault();
	$.post("api/api.php?q=14",$("#frm_adminprof").serialize(),function(res){
		
				if(res=="ok")
				{
					$("#frm_adminprof").hide(1000);
					$("#message").html("<div class=\"alert alert-success msgs\">New admin's data saved<br><a href='index.php?p=5'>Go to admin menu</a></div>");
					
				}
				else
				{
					$("#message").html("<div class=\"alert alert-danger msgd\">Error during process</div>");
				}
			
		});
});




$("#search1").keyup(function(){
		
		var s1=$(this).val().toLowerCase();
		$("#tt1 tr").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(s1) > -1)
    });
		
	
});


$("#search2").keyup(function(){
		
		var s1=$(this).val().toLowerCase();
		$("#tt2 tr").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(s1) > -1)
		});
		
	
	});
	
$("#search4").keyup(function(){
		
		var s1=$(this).val().toLowerCase();
		$("#tt5 tr").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(s1) > -1)
		});
		
	
	});

$("#search5").keyup(function(){
		
		var s1=$(this).val().toLowerCase();
		$("#sr4 tr").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(s1) > -1)
    });
		
	
});	


$("#frm_crtproduct").submit(function(){
		event.preventDefault();
	
		  var fd = new FormData();
		  fd.append('primage', $('#primage')[0].files[0]);
		  fd.append('prdscr', $('#prdscr').val());
		  fd.append('prtitle', $('#prtitle').val());

			   $.ajax({
				   url: "api/api.php?q=16",
				   type: 'POST',
				   data: fd,
				   enctype: 'multipart/form-data',
				   success: function (res) {
					  console.log(res); 
					   
						if(res=="true")
						{
							$("#frm_crtproduct").hide(1000);
							$("#message").html("<div class=\"alert alert-success msgs\">New product is inserted</div>");
							
						}
						else
						{
							$("#message").html("<div class=\"alert alert-danger msgd\">Error during process</div>");
							
						}
						
				   },
				   cache: false,
				   contentType: false,
				   processData: false
			   });
			
	});
	
	
// add product to shop_product

$("#frm_product").submit(function(event){

  event.preventDefault();
  
   $.post("api/api.php?q=19",$("#frm_product").serialize(), function(res){
	
		if(res=="true")
		{
		
		 $("#message").html("<div class='alert alert-success msgs'>Your product is inserted to base</div>");
		 $("#message").hide(5000);
		 getShopproducts($("#shid").val());
		 $("#dsr").val("");
		 $("#price").val("");
		 
		
		}
		else
		{
		 $("#message").html("<div class='alert alert-danger msgd'>Error!Try again</div>");
		 $("#message").hide(5000);
		}
	});
});

	$('#prod').change(function(){
		var a=$("#prod").val();
		$("#prid").val(a);
	});
	
	
	
//Sign up customers in database db_shop
 
$("#frm_sgnupcustomer").submit(function(event){
	
  event.preventDefault();
  
   $.post("api/api.php?q=22",$("#frm_sgnupcustomer").serialize(), function(res){
	   
		if(res=="true")
		{
		 $("#frm_sgnupcustomer").hide(1000);
		 $("#message").html("<div class='alert alert-success msgs'>New user is inserted<br><a href='index.php?p=2'>Go to login page</a></div>");
		}
		else
		{
		 $("#message").html("<div class='alert alert-danger msgd'>Error!Try again to sign up</div>");
		}
	});
});	

//login customers in db_shop
$("#frm_lgncustomer").submit(function(event){
  event.preventDefault();
	   $.post("api/api.php?q=23",$("#frm_lgncustomer").serialize(), function(res){
		
		   
		if(res=="true")
		{
		 window.location.href='index.php?p=18';
		}
		else
		{
			$("#message").html("<div class='alert alert-danger msgd'>Error username or password</div>");
		}
		
	});
});


//update customer's profile

$("#frm_profcust").submit(function(event){
	
	event.preventDefault();
	$.post("api/api.php?q=25",$("#frm_profcust").serialize(),function(res){
		
				if(res=="ok")
				{
					$("#frm_profcust").hide(1000);
					$("#message").html("<div class=\"alert alert-success msgs\">Your new data is saved<br><a href='index.php?p=18'>Go to your main menu</a></div>");
					
				}
				else
				{
					$("#message").html("<div class=\"alert alert-danger msgd\">Error during process</div>");
				}
			
		});
});

//Add to cart
$("#frm_addtocart").submit(function(event){
	
  event.preventDefault();
  
   $.post("api/api.php?q=27",$("#frm_addtocart").serialize(), function(res){
	  
	  
		if(res=="true")
		{
		$("#message1").show();	
		 $("#message1").html("<div class='alert alert-success msgs'>Your product is inserted</div>");
		 $("#message1").hide(4000);
		}
		else
		{
		 $("#message1").html("<div class='alert alert-danger msgd'>Error!Try again</div>");
		}
	});
});

	$("#clearq").click(function(){
			$("#q").val("");
		});
	

// add to orders

$("#frm_addtoorder").submit(function(event){
	
  event.preventDefault();
  
   $.post("api/api.php?q=30",$("#frm_addtoorder").serialize(), function(res){
	   
		if(res=="true")
		{
		 $("#message3").html("<div class='alert alert-success msgs'>Your order is inserted to base</div>");
		 $("#message3").hide(5000);
		 getMycart();
		 
		}
		else
		{
		 $("#message3").html("<div class='alert alert-danger msgd'>Error!Try again</div>");
		 $("#message3").hide(5000);
		}
	});
});

//update order confirm

$("#checkorder").click(function(event){
	x1=$("#ordid5").val();
	x2=$("#sid5").val();
	event.preventDefault();
	$.get("api/api.php?q=33&ordid5="+x1,function(res){
		
				if(res=="ok")
				{
					$("#message").html("<div class=\"alert alert-success msgs\">New data saved</div>");
					getMyorders(x2);
				}
				else
				{
					$("#message").html("<div class=\"alert alert-danger msgd\">Error during process</div>");
				}
			
		});
});



	$("#title").change(function(){
	for(i=0;i<A.length;i++)
		{
			A[i].remove();
		}
	A=[];
	
	t1=$("#title").val();
		$.get("api/api.php?q=36&ttl="+t1,function(res){
		console.log(res);	
		var js=JSON.parse(res);
			for ( var i=0;i<js.length;i++)
			{
				 var m=L.marker([js[i].lat/1, js[i].lng/1],{ title:js[i].fullname, shopid:js[i].sid });
					m.on("click",showpopup);
					m.addTo(map);
					A.push(m);
			
			}
	 });
	 
	 
	});
	

});


function showMap() {


 map = L.map('map');
 map.locate({setView: true, maxZoom: 18});

 
 L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1Ijoia2trMTk5MCIsImEiOiJjbDAwcnIyM3cwOXdhM2RydDZnejNndWl6In0.j9AMl44IWLPryzTV1iuqOg'
}).addTo(map);

map.on("locationfound",onlocationfound);
map.on("click",clickmap);
  
}

function showMap2() {


	map = L.map('map').setView([38.247543717666, 21.73650826668782], 13);;
	 
	 L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		maxZoom: 18,
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1,
		accessToken: 'pk.eyJ1Ijoia2trMTk5MCIsImEiOiJjbDAwcnIyM3cwOXdhM2RydDZnejNndWl6In0.j9AMl44IWLPryzTV1iuqOg'
	}).addTo(map);

	//map.on("locationfound",onlocationfound);
	//map.on("click",clickmap);

	$.get("api/api.php?q=10",function(res){
		
		var js=JSON.parse(res);
		for(i=0;i<js.length;i++)
			{
			 
			 var m=L.marker([js[i].lat/1, js[i].lng/1],{ title:js[i].fullname, shopid:js[i].sid });
			 m.on("click",showpopup);
			 m.addTo(map);
			 A.push(m);
			}
			
		});
  
}
 
function showpopup(e)
{
	var html="<b>Shop Title:"+this.options.title+"</b><br><b>Shop id:"+this.options.shopid+"</b><br><a href='index.php?p=21&shopid="+this.options.shopid+"'>See Details</a>";
	 L.popup()
       .setLatLng(e.latlng)
       .setContent(html)
       .addTo(map);
	
	
}

function onlocationfound(e)
{
marker = L.marker(e.latlng).addTo(map); 	

$("#lat").val(e.latlng.lat);
$("#lng").val(e.latlng.lng);
	
}

function clickmap(e)
{
marker.remove();
marker = L.marker(e.latlng).addTo(map); 
$("#lat").val(e.latlng.lat);
$("#lng").val(e.latlng.lng);
		
}

function setActive(a)
{
	
	 $("#a"+a).addClass("active"); 
	
}

function getuserprofile()
{
	$.get("api/api.php?q=5",function(res){
		
		var js=JSON.parse(res);
		
		$("#fname").val(js.adfname);
		$("#lname").val(js.adlname);
		$("#pwd").val("");
		$("#email").val(js.ademail);
	
	});

}

function getMyshops()


{
	
	$.get("api/api.php?q=7",function(res){
		
		var js=JSON.parse(res);	
		var html1="";
			html1+="<table class='table table-hover tb1'>";
			html1+="<tr><th>Shop name</th><th>Shop address</th><th>Shop phone</th><th>Edit shop</th><th>Choose product</th><tbody id=tt1></tr>";
			
				for(i=0;i<js.length;i++)
					
					{
						html1+="<tr><td>"+js[i].fullname+"</td><td>"+js[i].vsaddress+"</td>";
						html1+="<td>"+js[i].phone+"</td><td><a href='index.php?p=11&shopid="+js[i].sid+"'><span class='glyphicon glyphicon-edit' style='margin-left:20px;';></span></a></td><td><a href='index.php?p=15&shopid="+js[i].sid+"'><span class='glyphicon glyphicon-pencil' style='margin-left:35px;';></span></a></td></tr>";
						
						html1+="<tr><td><a href='index.php?p=23&shopid="+js[i].sid+"'><button>Orders</button></a></td></tr>";
					}
			html1+="</tbody></table>";
			

			
			$("#shops").html(html1);
			
	});
}



function getShopdata(id)
{
	$.get("api/api.php?q=8&shopid="+id,function(res){
		console.log(res);
		var js=JSON.parse(res);
		
		
		$("#fnm").val(js.fullname);
		$("#phone").val(js.phone);
		$("#address").val(js.vsaddress);
		$("#lat").val(js.lat);
		$("#lng").val(js.lng);
		
	
	marker.remove();
	marker = L.marker([js.lat,js.lng]).addTo(map); 	
	

	});

}



function getMyadmins()


{
	
	$.get("api/api.php?q=11",function(res){
		
		var js=JSON.parse(res);	
		var html1="";
			html1+="<table class='table table-hover tb1'>";
			html1+="<tr><th>Admin id</th><th>Username</th><th>Edit</th></tr>";
			
				for(i=0;i<js.length;i++)
					
					{
						html1+="<tr><td>"+js[i].id+"</td><td>"+js[i].username+"</td><td><a onclick='$(\"#idadmin\").val("+js[i].id+");$(\"#myModal\").modal(\"show\");'><span class='glyphicon glyphicon-trash'style='margin-left:5px;'></span></a></td></tr>";
						
					}
			html1+="</table>";
			

			
			$("#listadmins").html(html1);
			
	});
}


function deladmin()
{
	
	x=$("#idadmin").val();
	$.get("api/api.php?q=12&idadmin="+x,function(res){
		if(res=="true")
				{
					$("#message").html("<div class=\"alert alert-success msgd\">Admin with id : "+x+" is deleted</div>");
					getMyadmins();
					$("#message").hide(4000);
				}
				else
				{
					$("#message").html("<div class=\"alert alert-danger msgd\">Error during process</div>");
					$("#message").hide(4000);
				}
				
		
	});
	
}

function deleteproduct()
{
	
	
	x=$("#prid").val();
	
	if(x!="")
	{
	
		$.get("api/api.php?q=17&prid="+x,function(res){
			if(res=="true")
					{
						$("#message1").html("<div class=\"alert alert-success msgd\">Product with id : "+x+" is deleted</div>");
						$("#message1").hide(4000);
						getMyproducts();
						
					}
					else
					{
						$("#message1").html("<div class=\"alert alert-danger msgd\">Error during process</div>");
						$("#message1").hide(4000);
					}
			
		});
	}
	
}



function getAdmindata()
{
	$.get("api/api.php?q=13",function(res){
		
		var js=JSON.parse(res);
	
		$("#usr").val(js.username);
		$("#pwd").val("");
		
	});

}

function getMyproducts()
{
	$.get("api/api.php?q=15",function(res){
		
		var js=JSON.parse(res);	
		var html1="";
			html1+="<table class='table table-hover tb1'>";
			html1+="<tr><th>Product title</th><th>Product description</th><th>Product image</th><th>Delete product</th><tbody id=tt2></tr>";
			
				for(i=0;i<js.length;i++)
					
					{
						html1+="<tr><td>"+js[i].prtitle+"</td><td>"+js[i].prdescr+"</td><td><img src='uploads/"+js[i].primg+"' width=80px></td><td><a onclick='$(\"#prid\").val("+js[i].prid+");$(\"#myModal2\").modal(\"show\");'><span class='glyphicon glyphicon-trash'style='margin-left:10px;'></span></a></td></tr>";
						
					}
			html1+="</tbody></table>";
			html1+="<button id=bt2 onclick=modalshow()>Create new product</button>";
		
			$("#listprod").html(html1);
	
	});
}

	
function modalshow()
{
	$('#myModal1').modal('show');
	
}


function getallprod()
{
	 $.get("api/api.php?q=18",function(res){
			 var js=JSON.parse(res);
			 var s="";
			s+="<select class='form-control' id='prod' name='prod'>";
			s+="<option selected disabled>Choose your product</option>";
			 for (var i=0;i<js.length;i++)
			{	
				s+="<option value="+js[i].prid+">"+js[i].prtitle+"</option>";
				
			}
			s+="</select>";
			$("#d1").html(s);
	 });
	
}

function getShopproducts(id)


{
	
	$.get("api/api.php?q=20&shopid="+id,function(res){
		
		var js=JSON.parse(res);
		var html1="";
			html1+="<h2>Your shop's products :</h2>";
			html1+="<table class='table table-hover tb1'>";
			html1+="<tr><th>Product title</th><th>Product description</th><th>Product price</th><th>Delete</th></tr>";
			
				for(i=0;i<js.length;i++)
					
					{
						html1+="<tr><td>"+js[i].prtitle+"</td><td>"+js[i].prdesc+"</td><td>"+Number(js[i].price).toFixed(2)+" €</td><td><a onclick='$(\"#prid\").val("+js[i].prid+");$(\"#myModal4\").modal(\"show\");'><span class='glyphicon glyphicon-trash'style='margin-left:10px;'></span></a></td></tr>";
						
					}
			html1+="</table>";
			

			
			$("#myprod").html(html1);
			
	});
}
	
function delprod()
{
	
	
	x=$("#prid").val();
	
	if(x!="")
	{
	
		$.get("api/api.php?q=21&prid="+x,function(res){
			if(res=="true")
					{
						$("#message1").html("<div class=\"alert alert-success msgd\">Product with id : "+x+" is deleted</div>");
						$("#message1").hide(5000);
						getShopproducts(document.getElementById("shid").value);
						
						
					}
					else
					{
						$("#message1").html("<div class=\"alert alert-danger msgd\">Error during process</div>");
						$("#message1").hide(5000);
					}
			
		});
	}
	
}

function delprod1()
{
	
	
	x=$("#sid1").val();
	
	
	if(x!="")
	{
	
		$.get("api/api.php?q=29&sid1="+x,function(res){
			if(res=="true")
					{
						$("#message1").html("<div class=\"alert alert-success msgd\">Product is deleted</div>");
						$("#message1").hide(5000);
						getMycart();
						
						
					}
					else
					{
						$("#message1").html("<div class=\"alert alert-danger msgd\">Error during process</div>");
						$("#message1").hide(5000);
					}
			
		});
	}
	
}	

function getCustprofile()
{
	$.get("api/api.php?q=24",function(res){
		
		var js=JSON.parse(res);
	
		$("#fnm").val(js.fncustomer);
		$("#email").val(js.cuemail);
		$("#ph").val(js.cphone);
		$("#adr").val(js.caddress);
		$("#afm").val(js.afm);
	});

}

function getShopallproducts(id)


{
	
	$.get("api/api.php?q=26&shopid="+id,function(res){
		
		var js=JSON.parse(res);
		var html1="";
			html1+="<h2>Welcome to "+js[0].fullname+"</h2>";
			html1+="<table class='table table-hover tb1'>";
			html1+="<tr><th>Product description</th><th>Product title</th><th>Product image</th><th>Product price €</th><th>Add to cart</th><tbody id=sr1></tr>";
			
				for(i=0;i<js.length;i++)
					
					{
					html1+="<tr><td>"+js[i].prdesc+"</td><td>"+js[i].prtitle+"</td><td><img src='uploads/"+js[i].primg+"' width=80px></td><td>"+Number(js[i].price).toFixed(2)+" €</td><td><a onclick='$(\"#prid\").val("+js[i].prid+");$(\"#myModal5\").modal(\"show\");$(\"#pric\").val("+Number(js[i].price).toFixed(2)+");'><span class='glyphicon glyphicon-new-window'style='margin-left:10px;'></span></a></td></tr>";
						
					}
			html1+="</tbody></table>";
			

			
			$("#s1").html(html1);
			
	});
}


function getMycart()

{
	$.get("api/api.php?q=28",function(res){
		
		var js=JSON.parse(res);	
		if(js.length>0)
		{
		var sum=0;
		var html1="";
			html1+="<table class='table table-hover tb1'>";
			html1+="<tr><th>Product id</th><th>Product price €</th><th>Quantity</th><th>Delete product</th><tbody id=tt6></tr>";
			   
				for(i=0;i<js.length;i++)
					
					{
						html1+="<tr><td>"+js[i].prid+"</td><td>"+Number(js[i].price).toFixed(2)+" €</td><td>"+js[i].q+"</td><td><a onclick='$(\"#sid1\").val("+js[i].idk+");$(\"#myModal5\").modal(\"show\");'><span class='glyphicon glyphicon-trash'style='margin-left:35px;'></span></a></td></tr>";
						sum+=Number(js[i].price*js[i].q).toFixed(2)/1;
						
						
					}
			html1+="</tbody></table>";
			html1+="<a onclick='$(\"#myModal6\").modal(\"show\");'><button>Checkout</button></a>";
			$("#s2").html(html1);
			$("#sum").val(sum);
		}
		else
		{
			$("#s2").html("<div class=\"alert alert-danger msgd\">No products in your cart</div>");
		}
 });
	
}

function getMyorders(id)


{
	
	$.get("api/api.php?q=31&shopid="+id,function(res){
		
		var js=JSON.parse(res);
		var html1="";
			html1+="<table class='table table-hover tb1'>";
			html1+="<tr><th>Order date</th><th>Total €</th><th>See the order</th><th>Confirm</th><tbody id=tt5></tr>";
			
				for(i=0;i<js.length;i++)
					
					{
						html1+="<tr><td>"+js[i].orddate+"</td><td>"+Number(js[i].ordsum).toFixed(2)+" €</td><td><a onclick='$(\"#sid5\").val("+js[i].sid+");$(\"#ordid5\").val("+js[i].ordid+");$(\"#myModal7\").modal(\"show\");seeTheorder();'<span class='glyphicon glyphicon-new-window'style='margin-left:30px;'></span></a></td><td>"+js[i].conf+"</td></tr>";
						
					}
			html1+="</tbody></table>";
			

			
			$("#myorders").html(html1);
			
	});
}

function seeTheorder()
{
	
	
	
	x1=$("#ordid5").val();
	
	if(x1!="")
	{
	
		$.get("api/api.php?q=32&ordid5="+x1,function(res){
			var js=JSON.parse(res);
		    var html1="";
				html1+="<table class='table table-hover tb1'>";
				html1+="<tr><th>Product price €</th><th>Quantity</th></tr><tbody id=tt7>";
			
				for(i=0;i<js.length;i++)
					
					{
						html1+="<tr><td>"+Number(js[i].price).toFixed(2)+" €</td><td>"+Number(js[i].quan).toFixed(2)+"</td></tr>";
						
					}
			html1+="</tbody></table>";
			

			
			$("#dd8").html(html1);
		});
	}
	
}

function getStatistics()

{
	
		$.get("api/api.php?q=34",function(res){
			
			
			var js=JSON.parse(res);
			
		    var html1="";
				html1+="<table class='table table-hover tb1'>";
				html1+="<tr><th>Num of shops</th><th>Num of products</th><th>Num of orders</th><th>Total revenue €</th><th>Average of total €</th><th>Revenue/shop €</th><th>Revenue/customer € </th><th>Orders/customer</th></tr><tbody id=tt9>";
			
				
						html1+="<tr><td>"+Number(js.c1)+"</td><td>"+Number(js.c2)+"</td><td>"+Number(js.c3)+"</td><td>"+Number(js.c4).toFixed(2)+" €</td><td>"+Number(js.c8).toFixed(2)+" €</td><td>"+Number(js.c5).toFixed(2)+" €</td><td>"+Number(js.c6).toFixed(2)+" €</td><td>"+Number(js.c7)+"</td></tr>";
					
					
				
			html1+="</tbody></table>";

			
			$("#stats").html(html1);
		});
		
}

function getAllpr()
{
	 $.get("api/api.php?q=35",function(res){
			 var js=JSON.parse(res);
			 s="<option></option>";
			 for (var i=0;i<js.length;i++)
			{
			s=s+"<option value='"+js[i].prid+"'>"+js[i].prtitle+"</option>";
			}
			$("#title").html(s);
	 });
	
}



function delcart()
{
	
	
	$.get("api/api.php?q=37",function(res){
		if(res=="true")
				{
					$("#message2").html("<div class=\"alert alert-success msgd\">No products in your cart</div>");
					$("#message2").hide(4000);
				}
				else
				{
					$("#message2").html("<div class=\"alert alert-danger msgd\">Error during process</div>");
					$("#message2").hide(4000);
				}
				
		
	});
	
}


function customerpage(id)


{
	
	$.get("api/api.php?q=37&shopid="+id,function(res){
		
		var js=JSON.parse(res);
		var html1="";
			html1+="<h2>Welcome to "+js[0].fullname+"</h2>";
			html1+="<table class='table table-hover tb1'>";
			html1+="<tr><th>Shop name</th><th>Shop phone</th><th>Shop address</th><tbody id=sr4></tr>";
			
				for(i=0;i<js.length;i++)
					
					{
					html1+="<tr><td>"+js[i].fullname+"</td><td>"+js[i].phone+"</td><td>"+js[i].vsaddress+"</td></tr>";
						
					}
			html1+="</tbody></table>";
			

			
			$("#page").html(html1);
			
	});
}


function getShopr(id)


{
	
	$.get("api/api.php?q=38&shopid="+id,function(res){
		
		var js=JSON.parse(res);
		var html1="";
			html1+="<h2>Shop products</h2>";
			html1+="<table class='table table-hover tb1'>";
			html1+="<tr><th>Product description</th><th>Product title</th><th>Product image</th><th>Product price €</th><tbody id=sr1></tr>";
			
				for(i=0;i<js.length;i++)
					
					{
					html1+="<tr><td>"+js[i].prdesc+"</td><td>"+js[i].prtitle+"</td><td><img src='uploads/"+js[i].primg+"' width=80px></td><td>"+Number(js[i].price).toFixed(2)+" €</td></tr>";
						
					}
			html1+="</tbody></table>";
			

			
			$("#page2").html(html1);
			
	});
}
	