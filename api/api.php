<?php
include "connect.php";
// sign up as a user
if($_GET["q"]==1)
{
	
		$mypassword=md5($_POST['pwd']); 
		$sql="insert into user(adid,ademail,adpass,adlname,adfname) 
		values(NULL,'$_POST[email]','$mypassword','$_POST[lnm]','$_POST[fnm]')"; 
		
		if(mysqli_query($db,$sql))
		{
			echo "true";
			
		}
		else
		{
			echo "error";
		}
}


//login users in database db_shop
 
if($_GET['q']==2)
{
	$mypassword=md5($_POST['pwd']); 
	$sql="select * from user where ademail='$_POST[email]' and adpass='$mypassword'";
		
	$q=mysqli_query($db,$sql);
		
	if(mysqli_num_rows($q)>0)
	{
		$r=mysqli_fetch_assoc($q);
		$_SESSION['usid']=$r['adid'];
		echo "true";
			
	}
	else
	{
		echo "false";
	};
}

//login admin in database db_shop
 
if($_GET['q']==3)
{
	$mypassword=md5($_POST['pwd']); 
	//$mypassword=($_POST['pwd']);
	$sql="select * from admin where username='$_POST[usr]' and ps='$mypassword'";
		
	$q=mysqli_query($db,$sql);
		
	if(mysqli_num_rows($q)>0)
	{
		$r=mysqli_fetch_assoc($q);
		$_SESSION['admin']=$r['id'];
		echo "true";
			
	}
	else
	{
		echo "false";
	};
}


//create new shop

if($_GET['q']==4)
	
{
	$sql="insert into shop(sid,description,vsaddress,fullname,phone,lat,lng,adid) 
	values(NULL,'$_POST[dscr]','$_POST[shopadr]','$_POST[sh_name]','$_POST[ph]','$_POST[lat]','$_POST[lng]','$_SESSION[usid]')"; 
	
	if(mysqli_query($db,$sql))
		{
			echo "true";
			
		}
		else
		{
			echo "error";
		}
	
}


//Get user's data
	
	
	if($_GET['q']==5)
	{
		$sql="select * from user where adid='$_SESSION[usid]'";
						
		$q=mysqli_query($db,$sql);
		while($r=mysqli_fetch_assoc($q))
		{
			echo json_encode($r);
		}
	}
	
//update user's data

	if($_GET['q']==6)
	{
		if($_POST['pwd']=='')
		{
		
			$sql="update user set ademail='$_POST[email]', adlname='$_POST[lnm]', adfname='$_POST[fnm]' where adid='$_SESSION[usid]'";
		}
		else
		{
			$mypassword=md5($_POST['pwd']); 
		
			$sql="update user set adpass='$mypassword',ademail='$_POST[email]',adlname='$_POST[lnm]',adfname='$_POST[fnm]' where adid='$_SESSION[usid]'";
		}
		if(mysqli_query($db,$sql))
		{
			echo "ok";
		}
		else
		{
			echo "error";
		}
	}
	
//Get my shops

if($_GET['q']==7)
	{
		$sql="select * from shop where adid='$_SESSION[usid]' ";
						
		$q=mysqli_query($db,$sql);
		$A=[];
		while($r=mysqli_fetch_assoc($q))
		{
			$A[]=$r;
		}
		
			echo json_encode($A);

	}

//get shopdata
if($_GET['q']==8)
	{
		$sql="select * from shop where sid='$_GET[shopid]'";
					
		$q=mysqli_query($db,$sql);
		
		$r=mysqli_fetch_assoc($q);
		
			echo json_encode($r);

	}
	
//update shop's data

if($_GET['q']==9)
	{
		$sql="update shop set fullname='$_POST[fnm]', vsaddress='$_POST[adr]', phone='$_POST[ph]', lat='$_POST[lat]',lng='$_POST[lng]' where sid='$_POST[shopid]'";	
		
		if(mysqli_query($db,$sql))
		{
			echo "ok";
		}
		else
		{
			echo "error";
		}
	}
	
//fetch all the shops in map

if($_GET['q']==10)
{	
	$sql="select * from shop";
	
	$q=mysqli_query($db,$sql);
		$A=[];
		while($r=mysqli_fetch_assoc($q))
		{
			$A[]=$r;
		}
		
		echo json_encode($A);

}
//Get list of admins

if($_GET['q']==11)
	{
		$sql="select * from admin ";
						
		$q=mysqli_query($db,$sql);
		$A=[];
		while($r=mysqli_fetch_assoc($q))
		{
			$A[]=$r;
		}
		
			echo json_encode($A);

	}

//delete admin
	
	if($_GET['q']==12)
	{
		$sql="delete from admin where id='$_GET[idadmin]'";
		
		if(mysqli_query($db,$sql))
		{
			echo "true";
		}
		else
		{
			echo "error";
		}
	}
	
//Get admin data 

if($_GET['q']==13)
	{
		$sql="select * from admin where id='$_SESSION[admin]'";
						
		$q=mysqli_query($db,$sql);
		
		$r=mysqli_fetch_assoc($q);
		
			echo json_encode($r);

	}
	
//update admins's data

	if($_GET['q']==14)
	{
		if($_POST['pwd']=='')
		{
		
			$sql="update admin set username='$_POST[usr]' where id='$_SESSION[admin]'";
		}
		else
		{
			$mypassword=md5($_POST['pwd']); 
		
			$sql="update admin set ps='$mypassword',username='$_POST[usr]' where id='$_SESSION[admin]'";
		}
		if(mysqli_query($db,$sql))
		{
			echo "ok";
		}
		else
		{
			echo "error";
		}
	}
	
//Get myproducts

if($_GET['q']==15)
	{
		$sql="select * from product ";
						
		$q=mysqli_query($db,$sql);
		$A=[];
		while($r=mysqli_fetch_assoc($q))
		{
			$A[]=$r;
		}
		
			echo json_encode($A);

	}
	
//Create new product

if($_GET['q']==16)
	
{
	$fn=rand(1000,9999).rand(1000,9999).rand(1000,9999).$_FILES['primage']['name'];
	if(move_uploaded_file($_FILES['primage']['tmp_name'],"../uploads/$fn"))
	{
	$sql="insert into product(prid,prtitle,prdescr,primg) 
		  values (NULL,'$_POST[prtitle]','$_POST[prdscr]','$fn')"; 
	
	if(mysqli_query($db,$sql))
		{
			echo "true";
			
		}
		else
		{
			echo "error";
		}
	}
	else
	{
		echo "error";
	}
}

//delete product
	
	if($_GET['q']==17)
	{
		$sql="delete from product where prid='$_GET[prid]'";
		
		if(mysqli_query($db,$sql))
		{
			echo "true";
		}
		else
		{
			echo "error";
		}
	}
	
//get all products
	

if($_GET['q']==18)
	{
		$sql="select * from product";
						
		$q=mysqli_query($db,$sql);
		$A=[];
		while($r=mysqli_fetch_assoc($q))
		{
			$A[]=$r;
		}
		
			echo json_encode($A);

	}
	
//insert into shop_products
if($_GET['q']==19)
	
{
	$sql="insert into shop_product(id,sid,prid,price,prdesc) 
	values(NULL,'$_POST[shopid]','$_POST[prid]','$_POST[price]','$_POST[dsr]')"; 
	
	if(mysqli_query($db,$sql))
		{
			echo "true";
			
		}
		else
		{
			echo "error";
		}
	
}

if($_GET['q']==20)
	{
		$sql="select * from product,shop_product where product.prid=shop_product.prid and shop_product.sid='$_GET[shopid]'";
						
		$q=mysqli_query($db,$sql);
		$A=[];
		while($r=mysqli_fetch_assoc($q))
		{
			$A[]=$r;
		}
		
			echo json_encode($A);

	}
	
//delete myproduct
	
	if($_GET['q']==21)
	{
		$sql="delete from shop_product where prid='$_GET[prid]'";
		
		if(mysqli_query($db,$sql))
		{
			echo "true";
		}
		else
		{
			echo "error";
		}
	}
	
//sign up as a customer
	if($_GET["q"]==22)
{
	
		$sql="insert into customer(cuid,cuemail,caddress,afm,fncustomer,cphone)
		values(NULL,'$_POST[email]','$_POST[adr]','$_POST[afm]','$_POST[fnm]','$_POST[ph]')"; 
		
		if(mysqli_query($db,$sql))
		{
			echo "true";
			
		}
		else
		{
			echo "error";
		}
}

//login customers in db_shop
 
if($_GET['q']==23)
{
	
	$sql="select * from customer where cuemail='$_POST[email]' and fncustomer='$_POST[fnm]'";
		
	$q=mysqli_query($db,$sql);
		
	if(mysqli_num_rows($q)>0)
	{
		$r=mysqli_fetch_assoc($q);
		$_SESSION['cuid']=$r['cuid'];
		echo "true";
			
	}
	else
	{
		echo "false";
	};
}

//Get customer's data
	
	
	if($_GET['q']==24)
	{
		$sql="select * from customer where cuid='$_SESSION[cuid]'";
						
		$q=mysqli_query($db,$sql);
		while($r=mysqli_fetch_assoc($q))
		{
			echo json_encode($r);
		}
	}
	
//Update customer's data

	if($_GET['q']==25)
	{
		$sql="update customer set fncustomer='$_POST[fnm]', caddress='$_POST[adr]', cphone='$_POST[ph]', cuemail='$_POST[email]',afm='$_POST[afm]' where cuid='$_SESSION[cuid]'";	
		
		if(mysqli_query($db,$sql))
		{
			echo "ok";
		}
		else
		{
			echo "error";
		}
	}
	
//Get my shops products
	if($_GET['q']==26)
	{
		$sql="select * from shop,product,shop_product where product.prid=shop_product.prid and shop_product.sid=shop.sid and shop.sid='$_GET[shopid]'";
						
		$q=mysqli_query($db,$sql);
		$A=[];
		while($r=mysqli_fetch_assoc($q))
		{
			$A[]=$r;
		}
		
			echo json_encode($A);

	}
	
	
//insert into kalathi
if($_GET['q']==27)
	
{
	$a=session_id();
	$sql="insert into kalathi(idk,ids,prid,price,q,sid) 
	values(NULL,'$a','$_POST[prid]','$_POST[pric]','$_POST[q]','$_POST[shopid]')"; 
	
	if(mysqli_query($db,$sql))
		{
			echo "true";
			
		}
		else
		{
			echo "error";
		}
	
}


//Get kalathi data
	
	
	if($_GET['q']==28)
	{
		$a=session_id();
		$sql="select * from kalathi where ids='$a'";	
		$q=mysqli_query($db,$sql);
		$A=[];
		
		while($r=mysqli_fetch_assoc($q))
		{
			$A[]=$r;
		}
		
			echo json_encode($A);
		
	}
	
//delete myproduct from mycart
	
	if($_GET['q']==29)
	{
		$sql="delete from kalathi where idk='$_GET[sid1]'";
		
		if(mysqli_query($db,$sql))
		{
			echo "true";
		}
		else
		{
			echo "error";
		}
	}
	
//insert to orders

if($_GET['q']==30)
{
	
	$d=date('Y-m-d H:i:s');
	$sql="insert into orders(ordid,orddate,cuid,conf) 
	values(NULL,'$d','$_SESSION[cuid]',0)"; 
	
	mysqli_query($db,$sql);
    $orderid=mysqli_insert_id($db);
	
	$sum=0;
	
	$s1="Select * from kalathi where ids='".session_id()."'";
	
	$q1=mysqli_query($db,$s1);
	while($r1=mysqli_fetch_array($q1))
	{
		
		$sql="insert into orders_product(prid,ordid,quan) 
		values('$r1[prid]','$orderid','$r1[q]')"; 
		
		mysqli_query($db,$sql);
		$s0=$r1["q"]*$r1["price"];
		
		$sum+=$s0;
		$sid=$r1["sid"];
		
	}
	
	if(@$sid!=""){

	$sql="update orders set sid='$sid',ordsum='$sum' where ordid='$orderid'"; 
	
	mysqli_query($db,$sql);
		
	mysqli_query($db,"delete from kalathi where ids='".session_id()."'");
	echo "true";
	
	}
	
}

//GetShoporders

if($_GET['q']==31)
	{
		$sql="select * from orders where orders.sid='$_GET[shopid]' and conf='0'";
						
		$q=mysqli_query($db,$sql);
		$A=[];
		while($r=mysqli_fetch_assoc($q))
		{
			$A[]=$r;
		}
		
			echo json_encode($A);
		
		
	}

//SeeTheorder

if($_GET['q']==32)
	{
		$sql="select * from orders,orders_product,shop_product where 
		orders.ordid=orders_product.ordid and orders.sid=shop_product.sid and 
		orders_product.prid=shop_product.prid 
		and orders_product.ordid='$_GET[ordid5]'";
						
		$q=mysqli_query($db,$sql);
		$A=[];
		while ($r=mysqli_fetch_array($q))
		{
			$A[]=$r;
		}
		echo json_encode($A);
		
		
		
	}

//Update confirm order

	if($_GET['q']==33)
	{
		$sql="update orders set conf='1' where orders.ordid='$_GET[ordid5]'";	
		
		if(mysqli_query($db,$sql))
		{
			echo "ok";
		}
		else
		{
			echo "error";
		}
	}
	
//Statistics

	if($_GET['q']==34)
	{
		$A=[];
		
		//αριθμός παραγγελιών
		
		$sql1="select count(*) as c1 from shop";	
		$q1=mysqli_query($db,$sql1);
		$r1=mysqli_fetch_assoc($q1);
		$A["c1"]=$r1["c1"];
		
		//αριθμός προιόντων
		
		$sql2="select count(*) as c2 from product";	
		$q2=mysqli_query($db,$sql2);
		$r2=mysqli_fetch_assoc($q2);
		$A["c2"]=$r2["c2"];	
		
		//αριθμός παραγγελιών
		
		$sql3="select count(*) as c3 from orders";	
		$q3=mysqli_query($db,$sql3);
		$r3=mysqli_fetch_assoc($q3);
		$A["c3"]=$r3["c3"];	
		
		//Συνολικός τζίρος παραγγελιών
			
		$sql4="select sum(ordsum) as c4 from orders";	
		$q4=mysqli_query($db,$sql4);
		$r4=mysqli_fetch_assoc($q4);
		$A["c4"]=$r4["c4"];
		
		//Τζίρος ανά κατάστημα
			
		$sql5="select sum(ordsum) as c5 from orders group by orders.sid";	
		$q5=mysqli_query($db,$sql5);
		$r5=mysqli_fetch_assoc($q5);
		$A["c5"]=$r5["c5"];
			
		//Τζίρος ανά πελάτη
		
		$sql6="select sum(ordsum) as c6 from customer,orders where customer.cuid=orders.cuid";	
		$q6=mysqli_query($db,$sql6);
		$r6=mysqli_fetch_assoc($q6);
		$A["c6"]=$r6["c6"];

		//Παραγγελίες ανά πελάτη
		
		$sql7="select count(*) as c7 from customer,orders where customer.cuid=orders.cuid";	
		$q7=mysqli_query($db,$sql7);
		$r7=mysqli_fetch_assoc($q7);
		$A["c7"]=$r7["c7"];
		
		//Μέσος όρος συνολ
		
		$sql8="select avg(ordsum) as c8 from orders";	
		$q8=mysqli_query($db,$sql8);
		$r8=mysqli_fetch_assoc($q8);
		$A["c8"]=$r8["c8"];
			
		
			echo json_encode($A);
		
		
	}
	
//Getallproducts

if($_GET['q']==35)
	{
		$sql="select * from product";
						
		$q=mysqli_query($db,$sql);
		$A=[];
		while($r=mysqli_fetch_assoc($q))
		{
			$A[]=$r;
		}
		
			echo json_encode($A);
		
		
	}
	
//Getnewproducts after the search

		if($_GET['q']==36)
	{
		$sql="select * from product,shop,shop_product where product.prid=shop_product.prid and shop.sid=shop_product.sid and  product.prid='$_GET[ttl]' and shop_product.prid='$_GET[ttl]'";
						
		$q=mysqli_query($db,$sql);
		$A=[];
		while($r=mysqli_fetch_assoc($q))
		{
			$A[]=$r;
		}
		
			echo json_encode($A);

	}

//Get customer page
	if($_GET['q']==37)
	{
		$sql="select * from shop where shop.sid='$_GET[shopid]'";
						
		$q=mysqli_query($db,$sql);
		$A=[];
		while($r=mysqli_fetch_assoc($q))
		{
			$A[]=$r;
		}
		
			echo json_encode($A);

	}	
//
//Get my shops products
	if($_GET['q']==38)
	{
		$sql="select * from shop,product,shop_product where product.prid=shop_product.prid and shop_product.sid=shop.sid and shop.sid='$_GET[shopid]'";
						
		$q=mysqli_query($db,$sql);
		$A=[];
		while($r=mysqli_fetch_assoc($q))
		{
			$A[]=$r;
		}
		
			echo json_encode($A);

	}
	
	
?>