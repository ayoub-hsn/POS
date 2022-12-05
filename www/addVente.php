<?php 

$pdo = new PDO('sqlite:my_database.db');
$output = array('error' => false);
try {
    $prodts = $_POST['prdts'];
    $stmt = $pdo->prepare("insert into ventes(products,date) values(:prts,:date)");
    $stmt->execute(array(':prts' => $prodts,':date' => date("Y-m-d h:i:sa")));
    $output['data'] = $stmt->fetch();
} catch (PDOException $e) {
    $output['error'] = true;
    $output['message'] = $e->getMessage();
}

    echo json_encode($output);
?> 