<?php 
class Products{

	public function addProduct()
	{
		$this->name = $this->secureinput($_POST['name']);
		$this->price = $this->secureinput($_POST['price']);
		$this->quantity = $this->secureinput($_POST['quantity']);
		$this->amount = $this->price * $this->quantity;

		if (!empty($this->name)&&!empty($this->price)&&!empty($this->quantity)) {
			@require 'Connect.php';
			$sql = "INSERT INTO `products` VALUES ('','$this->name','$this->price','$this->quantity',CURRENT_TIMESTAMP,".date('d').",".date('m').",".date('Y').",'$this->amount')";
			$result = $con->query($sql);
			if (!empty($result)) {
				echo "<span class='badge'>Successfully Added</span>";
			}
		}
		else
		{
			echo "<span class='badge'>All Field are Required</span>";
		}

	}

	public function secureinput($data)
	{
		$data = trim($data);
   		$data = stripslashes($data);
   		$data = htmlspecialchars($data);
   		return $data;
	}
}
$products = new Products;
