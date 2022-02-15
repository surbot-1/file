if(isset($_POST['id']) && $_POST['id'] != '' )
{
    $id     = $_POST['id'];
    $select = $con->prepare("SELECT * FROM data WHERE id=?");
    $select->bind_param('s', $id);
    $select->execute();
    $result = $select->get_result();
    while($row = $result->fetch_assoc())
    {
        echo $row['column 1'] . "\t" . $row['column 2'] . "\n";
    }
}
