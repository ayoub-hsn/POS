<?php 
    //ini_set('max_execution_time', '100');
    $products = file_get_contents('https://sedki.xyz/get_products');
    $products = json_decode($products);
    $pdo = new PDO('sqlite:my_database.db');
    $output = array('error' => false);
        try {
            $stmt1 = $pdo->prepare("delete from products");
            $stmt1->execute();
            foreach ($products as $pdts) {
                $stmt = $pdo->prepare("insert into products(id,name,price) values(:id,:name,:price)");
                $stmt->execute(array(':id'  =>$pdts->var_id,':name' => $pdts->name,':price' => $pdts->price));
            //$output['data'] = $stmt->fetch();
            }
            session_start();
            $_SESSION['flash_message'] = "Les Produit sont ajoutés Acec Succés";
            } catch (PDOException $e) {
                $output['error'] = true;
                $output['message'] = $e->getMessage();
            }
    
            header( "Location: index.php" );
   

?>