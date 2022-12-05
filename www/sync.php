<?php 

    $id = $_POST['id'];
    $web_page_to_send = "http://127.0.0.1:8000/api/TestFile";

    $file_name = "caisses/".$id.".json";

    $post_request = array(
        "sender" => "TheAmplituhedron",
        "file" => curl_file_create($file_name) // for php 5.5+
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $web_page_to_send);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_request);
    $result = curl_exec($ch);
    curl_close($ch);
    //echo "<br><br>Result: ".$result;

    //$strJsonFileContents = file_get_contents("caisses/".$id.".json");
    //echo $file_name;

?>