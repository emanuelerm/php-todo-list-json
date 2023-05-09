<?php 

$list = file_get_contents('./data.json');

$array_list = json_decode($list, true);

if(isset($_POST['element'])) {
    $el = [
        'element'=> $_POST['element'],
        'done'=> false
    ];
    array_push($array_list, $el);
    file_put_contents('./data.json', json_encode($array_list));

} elseif (isset($_POST['updateData'])) {
    $index = $_POST['updateData'];
    $array_list[$index]['done'] = !$array_list[$index]['done'];
    file_put_contents('./data.json', json_encode($array_list));

} elseif (isset($_POST['deletedData'])) {
    $index = $_POST['deletedData'];
    array_splice($array_list, $index, 1);
    file_put_contents('./data.json', json_encode($array_list));
}


header('Content-Type: application/json');

echo json_encode($array_list);