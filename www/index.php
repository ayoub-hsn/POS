<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    
    <title>POS - SEDKI PARFUM</title>
    <style type="text/css">
        .bod{
            background-color: #E8E8E8; 
        }
        .vl {
            border-left: 6px solid green;
            height: 500px;
            position: absolute;
            left: 50%;
            margin-top: 50px;
            margin-left: 100px;
            top: 0;
        }
        .my-custom-scrollbar {
            position: relative;
            height: 200px;
            overflow: auto;
            }
            .table-wrapper-scroll-y {
            display: block;
            }
    </style>
</head>
<body class="bod">
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
            <div class="card mt-5">
                <div class="card-header bg-secondary text-light">
                    Liste Caisse
                </div>
                <div class="card-body">
    
                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        
                        <table class="table table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Caisse</th>
                            <th scope="col">Date</th>
                            <th scope="col">Actions</th>
                            
                            </tr>
                        </thead>
                        <tbody>
        
                        <?php 
                            $pdo = new PDO('sqlite:my_database.db');
                            $stmt = $pdo->prepare("select * from caisses");
                            $stmt->execute();
                            $result =$stmt->fetchAll();
                            foreach($result as $row)
                            {
                                echo"<tr>";
                                echo"<th scope='row'>{$row['id']}</th>";
                                echo"<td>caisse {$row['id']}</td>";
                                echo"<td>{$row['date']}</td>";
                                echo"<td>";
                                echo"    <button onclick='async({$row['id']})' class='btn btn-primary btn-sm'>Sync</button>";
                                echo"    <button class='btn btn-info btn-sm ml-3'>Check</button>";
                                echo"</td>";
                            
                            }
                        ?>
                            
                        </tbody>
                        </table>
        
                    </div>
                </div>
            </div>

            </div>
            <div class="col-2">
                <div class="vl"></div>
            </div>
            <div class="col-4">
                <div class="text-center mt-5">
                    <a type="button" href="addProducts.php" id="close_register" title="Clôturer la caisse" class="btn btn-primary btn-flat m-6 btn-xs m-5">
                            <strong>Get Products</strong>
                    </a>
                </div>
                <h3 class="text-center"><a href="./Pos.php">Ouvrir la caisse</a></h3>
            </div>
        </div>
    </div>
    <?php
if(isset($_SESSION['flash_message'])) {

    $message = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
    
    
    ?>
     <script type="text/javascript">
        var msg = "<?php echo $message; ?>"
        toastr.options = {
                timeOut: 3000,
                extendedTimeOut: 0,
                 fadeOut: 200,
                 fadeOut: 200
                };
             toastr.success(msg);
    </script> 
    <?php
}

    
?>
    <script src="./public/css/pos.js"></script>
    <script src="./public/css/vendor.js"></script>
    <script src="./public/css/fr.js"></script>
    <script src="./public/css/jquery-3.6.0.min.js"></script>
	<script src="./public/css/functions.js"></script>
<!-- <script src="./public/css/common.js"></script> -->
    <script src="./public/css/app.js"></script>
    <script src="./public/css/help-tour.js"></script>
    <script src="./public/css/documents_and_note.js"></script>

<!-- TODO -->

	<script src="./public/css/pos.js"></script>
	<script src="./public/css/printer.js"></script>
	<script src="./public/css/product.js"></script>
	<script src="./public/css/opening_stock.js"></script>
</body>
</html>




