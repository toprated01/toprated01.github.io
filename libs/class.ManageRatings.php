<?php
	class ManageRatings{
		protected $link;
		protected $db_host = 'localhost';
		protected $db_name = 'swotanalysis';
		protected $db_user = 'root';
		protected $db_pass = '';

		function __construct(){
			try{
				$this->link = new PDO("mysql:host=$this->db_host;dbname=$this->db_name",$this->db_user,$this->db_pass);
				return $this->link;
			}
			catch(PDOException $e)
			{
				return $e->getMessage;
			}
		}
		
		function getItems($id = null){
			if(isset($id)){
				$query = $this->link->query("SELECT * FROM posts WHERE pid = '$id' ORDER BY uploadtime DESC");
			}
			else
			{
				$query = $this->link->query("SELECT * FROM posts ORDER BY uploadtime DESC");
			}
			$rowCount = $query->rowCount();
			if($rowCount >= 1)
			{
				$result = $query->fetchAll();
			}
			else
			{
				$result = 0;
			}
			return $result;
		}
		
		function insertRatings($id,$rating,$total_rating,$total_rates,$ip_address){
			$query = $this->link->query("UPDATE posts
			SET rating = '$rating',
			total_rating = '$total_rating',
			total_rates = '$total_rates',
			ip_address = CONCAT(ip_address,',$ip_address') WHERE pid = '$id'");

			$rowCount = $query->rowCount();
			return $rowCount;
		}
	}
?>