<?php 
    $pdo = new PDO('sqlite:my_database.db');
    $output = array('error' => false);
    try {
        $name = $_POST['name'];
        $stmt = $pdo->prepare("select * from products where name like :name");
        $stmt->execute(array(':name' => $name));
        $output['data'] = $stmt->fetch();
    } catch (PDOException $e) {
        $output['error'] = true;
		$output['message'] = $e->getMessage();
    }

        echo json_encode($output);
?>