<?php
    $conn = mysqli_connect("localhost","root","","webbanhang");

    $record_per_page= 5;
    $page='';
    $output = '';

    if( isset($_POST["page"]) ){

        $page = $_POST["page"];
    }
    else{
        $page = 1;
    }

    $start_from = ($page - 1)* $record_per_page;

    $query = "SELECT * FROM nguoi_dung LIMIT $start_from, $record_per_page";

    $result = mysqli_query($conn, $query);

    $output .= "
        <table class='table-danh-sach'>
            <tr>
                <th>Ma Nguoi Dung</th>
                <th>Ten Nguoi Dung</th>
            </tr>
    ";
    while( $row = mysqli_fetch_array( $result )){

        $output .= '
            <tr>
                <td>'.$row['MA_ND'].'</td>
                <td>'.$row['TEN_ND'].'</td>
            </tr>
        ';
    }
    $output .= "</table><br/><nav><br/><ul class='pagination'>";

    $page_query = "SELECT * FROM nguoi_dung";
    $page_result = mysqli_query( $conn, $page_query);
    $total_records = mysqli_num_rows($page_result);
    $total_pages = ceil( $total_records/ $record_per_page);

    for($i = 1; $i <= $total_pages ; $i++){

        if( $i == $page){
            $output .= "<li class='page-item pagination-clicked'><a class='page-link'  id='".$i."'>".$i."</a></li>";
        }else{
            $output .= "<li class='page-item'><a class='page-link'  id='".$i."'>".$i."</a></li>";
        }
      
    } 

    echo $output;
?>
