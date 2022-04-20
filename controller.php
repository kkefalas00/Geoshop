<?php

	if(@$_GET["p"]=="")
	{
		$menu=3;
		include ("menu.php");
		include ("main.php");
	}
	
//signup
	
	if(@$_GET["p"]=="1")
	{
		$menu=3;
		include ("menu.php");
		include ("signup.php");
	}
	
//loginuser

	if(@$_GET["p"]=="2")
	{
		$menu=3;
		include ("menu.php");
		include ("loginuser.php");
	}
	
//mainuser
	
	if(@$_GET["p"]=="3")
	{
		
		$menu=2;
		include ("menu.php");
		include ("mainuser.php");
	}
	
//logout
	
	if(@$_GET["p"]=="4")
	{
		session_destroy();
		$menu=3;
		include ("menu.php");
		include ("main.php");
	}
	
//mainadmin

	if(@$_GET["p"]=="5")
	{
		if(@$_SESSION['admin']=='') {
			die();
		}
		$menu=1;
		include ("menu.php");
		include ("main.php");
	}
	
 //logout admin
 
	if(@$_GET["p"]=="6")
	{
		session_destroy();
		$menu=3;
		include ("menu.php");
		include ("main.php");
	}
	
  //login admin
  
  if(@$_GET["p"]=="7")
	{
		$menu=3;
		include ("menu.php");
		include ("loginadmin.php");
	}
	
  //create shop
  
   if(@$_GET["p"]=="8")
	{
		if(@$_SESSION['usid']=='') {
			die();
		}
		$menu=2;
		include ("menu.php");
		include ("createshop.php");
	}
	
  //user's profile
  
   if(@$_GET["p"]=="9")
	{
		if(@$_SESSION['usid']=='') {
			die();
		}
		$menu=2;
		include ("menu.php");
		include ("usersprofile.php");
	}
	
	//myshoplist
	
	if(@$_GET["p"]=="10")
	{
		if(@$_SESSION['usid']=='') {
			die();
		}
		$menu=2;
		include ("menu.php");
		include ("myshops.php");
	}
	
	//editmyshop
	
	if(@$_GET["p"]=="11" && @$_GET["shopid"]!="")
	{
		if(@$_SESSION['usid']=='') {
			die();
		}
		$menu=2;
		include ("menu.php");
		include ("editmyshop.php");
	}
	
	//list of admins
	
	if(@$_GET["p"]=="12")
	{
		if(@$_SESSION['admin']=='') {
			die();
		}
		$menu=1;
		include ("menu.php");
		include ("listofadmins.php");
	}
	
	//profile of admins
	
	if(@$_GET["p"]=="13")
	{
		if(@$_SESSION['admin']=='') {
			die();
		}
		$menu=1;
		include ("menu.php");
		include ("profofadmins.php");
	}
	
	//list of products
	
	if(@$_GET["p"]=="14")
	{
		if(@$_SESSION['admin']=='') {
			die();
		}
		$menu=1;
		include ("menu.php");
		include ("listofproducts.php");
	}
	
	//choose products to sell
	
	if(@$_GET["p"]=="15")
	{
		if(@$_SESSION['usid']=='') {
			die();
		}
		$menu=2;
		include ("menu.php");
		include ("choosemyproducts.php");
	}
	
	//Sign up as a customer
	
	if(@$_GET["p"]=="16")
	{
		$menu=3;
		include ("menu.php");
		include ("signupcustomer.php");
		
	}
	
	//Log in as a customer
	
	if(@$_GET["p"]=="17")
	{
		$menu=3;
		include ("menu.php");
		include ("logincustomer.php");
		
	}
	
	//main customer page
	
	if(@$_GET["p"]=="18")
	{
		if(@$_SESSION['cuid']=='') {
			die();
		}
		$menu=4;
		include ("menu.php");
		include ("maincustomer.php");
	}
	
	//logout customer
	
	if(@$_GET["p"]=="19")
	{	
		
		session_destroy();
		$menu=3;
		include ("menu.php");
		include ("main.php");
	}
	
	//profile customer
	
	if(@$_GET["p"]=="20")
	{	
		if(@$_SESSION['cuid']=='') {
			die();
		}
		$menu=4;
		include ("menu.php");
		include ("profcustomer.php");
	}
	
	//shop index
	
	if(@$_GET["p"]=="21")
	{
		if(@$_SESSION['cuid']=='' && @$_SESSION['usid']=='' && @$_SESSION['admin']==''  ) {
			$menu=5;
			include ("menu.php");
			include ("customerpage.php");
		}
		if(@$_SESSION['cuid']!='')
		{
			$menu=4;
			include ("menu.php");
			include ("shoppage.php");
		}
		
		if(@$_SESSION['usid']!='') {
		
			$menu=2;
			include ("menu.php");
			include ("shoppage.php");
		}
		
		if(@$_SESSION['admin']!='') {
			$menu=1;
			include ("menu.php");
			include ("shoppage.php");
		}
	}
	
	//my cart
	
	if(@$_GET["p"]=="22")
	{
		if(@$_SESSION['cuid']=='') {
			die();
		}
		else
		{
			$menu=4;
			include ("menu.php");
			include ("mycart.php");
		}
	}
	
	//see my orders
	
	if(@$_GET["p"]=="23")
	{
		if(@$_SESSION['usid']=='') {
			die();
		}
		$menu=2;
		include ("menu.php");
		include ("seemyorders.php");
	}
	
	//list of products
	
	if(@$_GET["p"]=="24")
	{
		if(@$_SESSION['admin']=='') {
			die();
		}
		$menu=1;
		include ("menu.php");
		include ("statistics.php");
	}
	
?>