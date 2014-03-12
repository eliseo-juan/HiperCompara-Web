<?php
class connectDatabase
{
    public $con="";

    private function connect()
    {
        $this->con=mysqli_connect("localhost","hmi","imh","hmi");
    	// Check connection
		if (mysqli_connect_errno($this->con))
	  	{
	  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  	}
    }

    private function disconnect()
    {
    	mysqli_close($this->con);
    }
    
    public function getCategories()
    {
    	$this->connect();
    	$sql=mysqli_query($this->con, "SELECT * FROM category");
    	 while($row=mysqli_fetch_assoc($sql))
		{
			$output[]=$row;
		}
    	$this->disconnect();
    	return $output;
    }
    
    public function getSubCategories($category)
    {
    	$this->connect();
    	$sql=mysqli_query($this->con, "SELECT * FROM subcategory where category_id=".$category);
	    while($row=mysqli_fetch_assoc($sql))
		{
			$output[]=$row;
		}
    	$this->disconnect();
    	return $output;
    }
    
	public function getProducts($super,$search="",$subcat="")
	{	
    	$this->connect();
    	if(!empty($search))
    	{
	    	$cond=" and name LIKE '%$search%'";
    	}
    	else
    		$cond="";
			
		if(!empty($subcat))
    	{
	    	$cond.=" and subcategory_id=$subcat";
    	}

    		
    	$query="SELECT * FROM super_product 
    								   WHERE super_id=".$super;
    	$sql=mysqli_query($this->con, $query);
		while($row=mysqli_fetch_assoc($sql))
		{
			$product=$row["product_id"];
			$price=$row["price"];
			$query="SELECT name, brand_id, subcategory_id FROM product where id=".$product.$cond;
			$sql2=mysqli_query($this->con, $query);
			$row2=mysqli_fetch_assoc($sql2);
			
			if($row2&&empty($subcat)){
				$row["name"]=$row2["name"];
				$sql2=mysqli_query($this->con, "SELECT name FROM brand where id=".$row2["brand_id"]);
				$row2=mysqli_fetch_assoc($sql2);
				$row["brand_name"]=$row2["name"];
				$output[]=$row;
			}
			elseif($row2&&$row2[subcategory_id]==$subcat)
			{
				$row["name"]=$row2["name"];
				$sql2=mysqli_query($this->con, "SELECT name FROM brand where id=".$row2["brand_id"]);
				$row2=mysqli_fetch_assoc($sql2);
				$row["brand_name"]=$row2["name"];
				$output[]=$row;
			}
			
		}
    	$this->disconnect();
    	return $output;
    }
    
    public function getProduct($id,$super)
    {	
    	$this->connect();
    	$sql=mysqli_query($this->con, "SELECT * FROM super_product where super_id=".$super." and product_id=".$id);
    	$row=mysqli_fetch_assoc($sql);
    	$price==$row["price"];
    	$sql=mysqli_query($this->con, "SELECT * FROM product where id=".$super." and product_id=".$id);
		while($row=mysqli_fetch_assoc($sql))
		{
			$product=$row["product_id"];
			$price=$row["price"];
			$sql2=mysqli_query($this->con, "SELECT name FROM product where id=".$product);
			$output[]=$row;
		}
    	$this->disconnect();
    	return $sql;
    }
    
    public function setPrice($id_product,$id_super,$price){
    	$correct="Precio Actualizado";
    	try{
	    	$this->connect();
	    	$sql=mysqli_query($this->con,"UPDATE super_product SET price=".$price." where super_id=".$id_super." and product_id=".$id_product);
/* 	    	mysqli_fetch_assoc($sql); */
	    	$sql2=mysqli_query($this->con,"SELECT AVG(price) as avgPrice FROM super_product WHERE price>0.0 AND product_id=".$id_product);
			$row=mysqli_fetch_assoc($sql2);
			$sql=mysqli_query($this->con,"UPDATE product SET av_price=".$row['avgPrice']." where id=".$id_product);
			$this->disconnect();
    	}catch (Exception $ex){
    		$correct="Fallo al Actualizar";
    	}
    	return $correct;
    }
    
    public function getTotalPrice($array){
    	$this->connect();
    	$sql=mysqli_query($this->con,"SELECT id FROM super");
    	$output[0]=-1;
    	$output[1]=-1;
    	$output[2]=-1;
    	$super_name[0]="";
    	$super_name[1]="";
    	$super_name[2]="";
		$super_latitude[0]=0;
		$super_latitude[1]=0;
		$super_latitude[2]=0;
		$super_longitude[0]=0;
		$super_longitude[1]=0;
		$super_longitude[2]=0;
    	$es_valido=true;
    	while($row=mysqli_fetch_assoc($sql)){
    		$price=0;
    		for($i=0;$i<sizeof($array);$i=$i+1){
    			$sql2=mysqli_query($this->con,"SELECT price FROM super_product WHERE super_id='".$row["id"]."' and product_id='".$array[$i]."'");
    			$row2=mysqli_fetch_assoc($sql2);
    			if ($row2["price"]==""){
    				$es_valido=false;
    				break;
    			}
    			$price=$price+$row2["price"];
    		}
    		
    		if ($es_valido==true){
	    		if($output[0]<0 || $output[0]>$price){
	    			$sql2=mysqli_query($this->con,"SELECT name,latitude,longitude FROM super WHERE id='".$row["id"]."'");
    				$row2=mysqli_fetch_assoc($sql2);
	    			if ($output[0]<0){
	    				$output[0]=$price;
	    				$super_name[0]=$row2["name"];
					$super_latitude[0]=$row2["latitude"];
					$super_longitude[0]=$row2["longitude"];
	    			}else{
	    				$output[2]=$output[1];
	    				$output[1]=$output[0];
	    				$output[0]=$price;
	    				$super_name[2]=$super_name[1];
	    				$super_name[1]=$super_name[0];
	    				$super_name[0]=$row2["name"];
					$super_latitude[2]=$super_latitude[1];
	    				$super_latitude[1]=$super_latitude[0];
	    				$super_latitude[0]=$row2["latitude"];
					$super_longitude[2]=$super_longitude[1];
	    				$super_longitude[1]=$super_longitude[0];
	    				$super_longitude[0]=$row2["longitude"];
	    			}
	    		}else if($output[1]<0 || $output[1]>$price){
	    			$sql2=mysqli_query($this->con,"SELECT name,latitude,longitude FROM super WHERE id='".$row["id"]."'");
    				$row2=mysqli_fetch_assoc($sql2);
	    			if ($output[1]<0){
	    				$output[1]=$price;
	    				$super_name[1]=$row2["name"];
					$super_latitude[1]=$row2["latitude"];
					$super_longitude[1]=$row2["longitude"];
	    			}else{
	    				$output[2]=$output[1];
	    				$output[1]=$price;
	    				$super_name[2]=$super_name[1];
	    				$super_name[1]=$row2["name"];
					$super_latitude[2]=$super_latitude[1];
	    				$super_latitude[1]=$row2["latitude"];
					$super_longitude[2]=$super_longitude[1];
	    				$super_longitude[1]=$row2["longitude"];
	    			}
	    		}else if($output[2]<0 || $output[2]>$price){
	    			$sql2=mysqli_query($this->con,"SELECT name,latitude,longitude FROM super WHERE id='".$row["id"]."'");
    				$row2=mysqli_fetch_assoc($sql2);
	    			/*if ($output[2]<0){
	    				$output[2]=$price;
	    			}else{
	    				$output[2]=$price;
	    			}*/
    				$output[2]=$price;
    				$super_name[2]=$row2["name"];
				$super_latitude[2]=$row2["latitude"];
				$super_longitude[2]=$row2["longitude"];
	    		}
    		}
    	}
    	$this->disconnect();
    	$valores[0]=$output;
    	$valores[1]=$super_name;
		$valores[2]=$super_latitude;
		$valores[3]=$super_longitude;
    	return $valores;
    }
    
    public function getAllProduct(){
    	$this->connect();
    	$sql=mysqli_query($this->con,"SELECT id, name, brand_id FROM product");
    	while($row=mysqli_fetch_assoc($sql))
		{
			$sql2=mysqli_query($this->con, "SELECT name FROM brand where id=".$row["brand_id"]);
			$row2=mysqli_fetch_assoc($sql2);
			$row["brand_name"]=$row2["name"];
			$output[]=$row;
		}
    	$this->disconnect();
    	return $output;
    }
    
    public function addProduct($name, $brand_id, $category_id, $subcategory_id, $description, $image, $unit, $unit_type_id){
    	$correc="Producto insertado con exito.";
    	try{
    		$this->connect();
    		$sql=mysqli_query($this->con,"INSERT INTO product (name,brand_id,category_id,subcategory_id,av_price,description,image,units,unit_type_id) VALUES ('".$name."',".$brand_id.",".$category_id.",".$subcategory_id.",0,'".$desription."','".$image."',".$unit.",".$unit_type_id.")");
    		$this->disconnect();
    	}catch (Exception $ex){
    		$correc="Fallo al insertar el producto.";	
    	}
    	return $correc;
    }
    
	public function getBrand()
    {
    	$this->connect();
    	$sql=mysqli_query($this->con, "SELECT id, name FROM brand");
    	 while($row=mysqli_fetch_assoc($sql))
		{
			$output[]=$row;
		}
    	$this->disconnect();
    	return $output;
    }
    
	public function addOffert($product_id, $init_data, $end_data, $porCent, $super_id){
    	$correc="Producto insertado con exito.";
    	try{
    		$this->connect();
    		$sql=mysqli_query($this->con,"SELECT price FROM super_product WHERE product_id=".$product_id." and super_id=".$super_id."");
    		$row=mysqli_fetch_assoc($sql);
    		$price=$row['price']-$row['price']*$porCent/100;
    		$price=round($price,2);
    		$sql=mysqli_query($this->con,"INSERT INTO offer (product_id,super_id, percentage, new_price,start_date,end_date) VALUES (".$product_id.",".$super_id.",".$porCent.",".$price.",'".$init_data."','".$end_data."')");
    		$this->disconnect();
    	}catch (Exception $ex){
    		$correc="Fallo al insertar el producto.";	
    	}
    	return $correc;
    }
    
	public function getUnitType()
    {
    	$this->connect();
    	$sql=mysqli_query($this->con, "SELECT id, name FROM unit_type");
    	 while($row=mysqli_fetch_assoc($sql))
		{
			$output[]=$row;
		}
    	$this->disconnect();
    	return $output;
    }
    
	public function getOffert($super)
	{	
    	$this->connect();
    	$sql=mysqli_query($this->con, "SELECT * FROM offer WHERE super_id=".$super);
		while($row=mysqli_fetch_assoc($sql))
		{
			$product=$row["product_id"];
			$sql2=mysqli_query($this->con, "SELECT name, brand_id FROM product where id=".$product);
			$row2=mysqli_fetch_assoc($sql2);
			$row["name_product"]=$row2["name"];
			$sql2=mysqli_query($this->con, "SELECT name FROM brand where id=".$row2["brand_id"]);
			$row2=mysqli_fetch_assoc($sql2);
			$row["name_brand"]=$row2["name"];	
			$output[]=$row;
		}
    	$this->disconnect();
    	return $output;
    }
    
	public function addSuperMarket($Nombre, $Login, $Password, $Pais, $Ciudad, $CP, $Direccion, $Latitud, $Longitud){
    	$correc=-1;
    	try{
    		$this->connect();
    		$sql2=mysqli_query($this->con, "SELECT id FROM super WHERE login = '".$Login."'");
    		$id=mysqli_fetch_assoc($sql2);
    		if($id['id']!=""){$correc=-1;}
    		elseif($id['id']==""){
    			$sql=mysqli_query($this->con,"INSERT INTO super (login,name,password,country,city,postcode,address,latitude,longitude,icon_name) VALUES ('".$Login."', '".$Nombre."', '".$Password."', '".$Pais."', '".$Ciudad."', ".$CP.", '".$Direccion."', ".$Latitud.", ".$Longitud.", '')");
    			$sql2=mysqli_query($this->con, "SELECT id FROM super WHERE login = '".$Login."'");
    			$id=mysqli_fetch_assoc($sql2);
    			$correc=$id['id'];
   			}
    		$this->disconnect();
    	}catch (Exception $ex){
    		$correc="Fallo al insertar el producto.";	
    	}
    	return $correc;
    }
    
    public function getSuperMarket($Login, $Password){
    	$correct="";
    	$this->connect();
    	$sql=mysqli_query($this->con, "SELECT id, name FROM super WHERE login = '".$Login."' and password = '".$Password."'");
    	$id=mysqli_fetch_assoc($sql);
    	$this->disconnect();
    	if ($id['name']=="Administrador"){
    		$correct="admin";
    	}else{
    		$correct=$id['id'];
    	}
    	return $correct;
    }
    
    public function getProductsWithOutSuper($super_id){
    	$this->connect();
    	$output="";
    	$sql=mysqli_query($this->con, "SELECT * FROM product where id NOT IN(SELECT product_id FROM super_product sp WHERE sp.super_id=".$super_id.")");
    	while($row=mysqli_fetch_assoc($sql))
		{
			$sql2=mysqli_query($this->con, "SELECT name FROM brand where id=".$row["brand_id"]);
			$row2=mysqli_fetch_assoc($sql2);
			
			if($row2){
				$row["brand_name"]=$row2["name"];
			}
			$output[]=$row;
		}
    	$this->disconnect();
    	return $output;
    }
    
    public function addProductSuper($product,$super){
    	$correc=-1;
    	try{
    		$this->connect();
    		$sql=mysqli_query($this->con, "SELECT super_id FROM super_product WHERE super_id = ".$super." AND product_id = ".$product);
    		$id=mysqli_fetch_assoc($sql);
    		if($id['super_id']!=""){$correc=-1;}
    		elseif($id['id']==""){
    			$sql=mysqli_query($this->con,"INSERT INTO super_product (super_id,product_id,price) VALUES (".$super.", ".$product.", 0)");
    			$sql2=mysqli_query($this->con, "SELECT super_id FROM super_product WHERE super_id = ".$super." AND product_id = ".$product);
    			$id=mysqli_fetch_assoc($sql2);
    			$correc=$id['id'];
   			}
    		$this->disconnect();
    	}catch (Exception $ex){
    		$correc="Fallo al insertar el producto.";	
    	}
    	return $correc;
    }
}
?>