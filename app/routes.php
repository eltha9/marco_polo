<?php

//HOME
$app->get('/', function($request, $response){
    
    $viewData=[];
    $data = $this->db->query('SELECT * FROM project')->fetchAll();

    $viewData['projects'] =$data;
    $viewData['style'] = "custom.css";
    error_log(json_encode($viewData),0);

    return $this->view->render($response, './pages/home.twig', $viewData);

})->setName('home');

//contact
$app->get('/about', function($request, $response){
    
    $viewData=[];
    return $this->view->render($response, './pages/contact.twig');

})->setName('about');

//project

$app->get('/works/{name}', function($request, $response, $args){
    
    $viewData=[];
    return $this->view->render($response, './pages/works.twig');

})->setName('works');

