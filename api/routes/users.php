<?php
use Phalcon\Http\Response;

//Retrieves robots based on primary key
$app->get('/users/find/{name}', function($name) use ($app) {

    $phql = "SELECT * FROM Users WHERE firstname LIKE  :name:";
    $users = $app->modelsManager->executeQuery($phql, array(
        'name' => '%'.$name.'%'
    ));

    $data = array();
    foreach($users as $user){
        $data[] =  array(
            'id' => $user->id,
            'name' => $user->firstname.' '.$user->lastname
        );
    }

    //Create a response
    $response = new Response();

    if ($data == false) {
        $response->setJsonContent(array('status' => 'NOT-FOUND'));
    } else {
        $response->setJsonContent(array(
            'status' => 'FOUND',
            'data'   => $data
        ));
    }

    return $response;
});
