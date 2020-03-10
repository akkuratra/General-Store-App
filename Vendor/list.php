<?php
    $jsondata=file_get_contents("list.json");
    $json=json_decode($jsondata,true);
    $output= "<ul>";
    foreach($json['Items'] as $item){
        $output .= "<h4>".$item['Title']."</h4>";
        $output .= "<li>Description: ".$item['Description']."</li>";
        $output .= "<li>Price: ".$item['Price']."</li>";
    }
    $output .="</ul>";
    echo $output;
?>
