<?php
        $pdo = new PDO('sqlite:my_database.db');
        $output = array('error' => false);
        try {
            $mainArr = array('local_id' => $_POST['local_id']);
            $stmt = $pdo->prepare("select * from ventes");
            $stmt->execute();
            $result =$stmt->fetchAll();
            foreach($result as $row)
        {       
            $arr = array();
            $arr['id'] = $row["id"];
            $arr['products'] = json_decode($row["products"]);
            $arr['date'] = $row["date"];
            array_push($mainArr,$arr);    
        }
            $stmt2 = $pdo->prepare("insert into caisses(date) values(:date)");
            $stmt2->execute(array(':date' => date("Y-m-d h:i:sa")));

            $nameFile = "caisses/".$pdo->lastInsertId().".json";

            $myfile = fopen($nameFile, "a") or die("Unable to open file!");
            $txt = json_encode(array('data' => $mainArr));
            fwrite($myfile, "\n". $txt);
            fclose($myfile);

            session_start();
            $_SESSION['flash_message'] = "Fichier est crée avec succes";

            // $stmt = $pdo->prepare("delete from ventes");
            // $stmt->execute();
        //$output['data'] = "Le fichier à été crée avec succés";

        } catch (PDOException $e) {
            $output['error'] = true;
            $output['message'] = $e->getMessage();
        }
        
        
        header( "Location: index.php" );
        //echo json_encode($output);
?>