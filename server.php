$process = $_POST['process'];
$log = "/logs/logs.txt";

if($process == 'update'){
    //execute mysqli update command and update table.
    $str = "Update on " . date('d/m/Y - H:i:s') . "\n";//add some text to the logs file (can be anything just to increase the logs.text size)
    file_put_content($log, $str, FILE_APPEND);//FILE_APPEND add string to the end of the file instead or replacing it's content
}
else if($process == 'insert'){
    //execute mysqli insert command and add new data to table.
    $str = "Added new data on" . date('d/m/Y - H:i:s') . "\n";
    file_put_content($log, $str, FILE_APPEND);
}
