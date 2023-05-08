<?php 

$list = file_get_contents('./data.json');

$array_list = json_decode($list, true);

if(!empty($_POST['data'])) {
    $el = [
        'element'=> $_POST['element'],
        'done'=> $_POST['done']
    ];
    array_push($array_list, $el);

    file_put_contents('./data.json', json_encode($array_list));
}

header('Content-Type: application/json');

echo json_encode($array_list);