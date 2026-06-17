<?php

	include('config.php');

	$id=$_GET['id'];
	$type=$_GET['type'];

	if($type=='services')
	{
		$rs="delete  from services where id=$id";
		$result=mysqli_query($conn,$rs);
		if($result)
		{
			header("location:add-services.php");
		}
		else
		{
			header("location:add-services.php");
		}
	}

	elseif($type=='teams')
	{
		$rs="delete  from teams where id=$id";
		$result=mysqli_query($conn,$rs);
		if($result)
		{
			header("Location:teams-details.php");
		}
		else
		{
			header("Location:teams-details.php");
		}
	}

	elseif($type=='configuration')
	{
		$rs="delete  from configuration where id=$id";
		$result=mysqli_query($conn,$rs);
		if($result)
		{
			header("Location:configuration-details.php");
		}
		else
		{
			header("Location:configuration-details.php");
		}
	}

	elseif($type=='enquiry')
	{
		$rs="delete  from enquiry where id=$id";
		$result=mysqli_query($conn,$rs);
		if($result)
		{
			header("Location:enquiry-details.php");
		}
		else
		{
			header("Location:enquiry-details.php");
		}
	}


	elseif($type=='menu')
	{
		$rs="delete  from menus where id=$id";
		$result=mysqli_query($conn,$rs);
		if($result)
		{
			header("Location:menu-details.php");
		}
		else
		{
			header("Location:menu-details.php");
		}
	}

	elseif($type=='submenu')
	{
		$rs="delete  from submenus where id=$id";
		$result=mysqli_query($conn,$rs);
		if($result)
		{
			header("Location:submenu-details.php");
		}
		else
		{
			header("Location:submenu-details.php");
		}
	}

	elseif($type=='products')
	{
		$rs="delete  from products where id=$id";
		$result=mysqli_query($conn,$rs);
		if($result)
		{
			header("Location:products-details.php");
		}
		else
		{
			header("Location:products-details.php");
		}
	}

	elseif($type=='banners')
	{
		$rs="delete  from banners where id=$id";
		$result=mysqli_query($conn,$rs);
		if($result)
		{
			header("Location:banners-details.php");
		}
		else
		{
			header("Location:banners-details.php");
		}
	}


	elseif($type=='category')
	{
		$rs="delete  from category where id=$id";
		$result=mysqli_query($conn,$rs);
		if($result)
		{
			header("Location:category-details.php");
		}
		else
		{
			header("Location:category-details.php");
		}
	}

	elseif($type=='blog')
	{
		$rs="delete  from blogs where id=$id";
		$result=mysqli_query($conn,$rs);
		if($result)
		{
			header("Location:blogs-details.php");
		}
		else
		{
			header("Location:blogs-details.php");
		}
	}


	elseif($type=='training')
	{
		$rs="delete  from training where id=$id";
		$result=mysqli_query($conn,$rs);
		if($result)
		{
			header("Location:training-details.php");
		}
		else
		{
			header("Location:training-details.php");
		}
	}

	elseif($type=='donation')
	{
		$rs="delete  from donation where id=$id";
		$result=mysqli_query($conn,$rs);
		if($result)
		{
			header("Location:subscribe-details.php");
		}
		else
		{
			header("Location:subscribe-details.php");
		}
	}

	elseif($type=='comment')
	{
		$rs="delete  from comment where id=$id";
		$result=mysqli_query($conn,$rs);
		if($result)
		{
			header("Location:comment-details.php");
		}
		else
		{
			header("Location:comment-details.php");
		}
	}

	elseif($type=='admission'){
		$rs="delete  from admission_form where id=$id";
		$result=mysqli_query($conn,$rs);
		if($result){
			header("Location:admission-form-details.php");
		}
		else{
			header("Location:admission-form-details.php");
		}
	}

?>