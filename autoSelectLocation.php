<?php 

require_once './DAL/PDOConnection.php';


if(isset($_GET['term'])){
	$return_arr = array();
	
		$pdo = Database::DB();
		$stmt = $pdo->prepare('select *
		from location
		where location
		like :term');
		$stmt->execute(array('term' => '%'.$_GET['term'].'%'));
		foreach ($stmt as $result)
		{
			$result['value'] = $result['location'];
			$result['label'] = "{$result['location']}";
			$matches[] = $result;
			}
}
		$matches = array_slice($matches, 0, 5);
		print json_encode($matches);