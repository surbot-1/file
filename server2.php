if(isset($_POST['id']) && $_POST['id'] != '' && isset($_POST['size']) && $_POST['size'] != '')
{
    $id         = (string)$_POST['id'];
    $init_size  = (int)$_POST['count'];
    $size       = file_exists('logs/logs.txt') ? (int)filesize('logs/logs.txt') : 0;//$size is logs.txt size or 0 if logs.txt doesn't exist(not created yet).

    $select = $con->prepare("SELECT * FROM data WHERE id=?");
    $select->bind_param('s', $id);

    while(true){ //while(true) will loop indefinitely because condition true is always met
        if($init_size !== $size){
            $select->execute();
            $result = $select->get_result();
            while($row = $result->fetch_assoc())
            {
                $data['rows'][] = array(
                                  "column 1" => $row['column 1'],
                                  "column 2" => $row['column 2'],
                                  );

            }
            $data['size'] = $size;
            echo json_encode($data);
            break; //break the loop when condition ($init_size != $size) is met which indicates that database has been updated or new data has been added to it.
        }
        else{
            clearstatcache(); //clears the chached filesize of log.txt
            $size = file_exists('logs/logs.txt') ? (int)filesize('logs/logs.txt') : 0;
            usleep(100000) //sleep for 100 ms
        }
    }
}
