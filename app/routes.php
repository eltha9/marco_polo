<?php

//HOME
$app->get('/', function($request, $response){
    
    $viewData=[];
    $data = $this->db->query('SELECT * FROM project')->fetchAll();

    $viewData['projects'] =$data;
    $viewData['style'] = "custom.css";
    $viewData['nav_color'] = "#0E0E0E";

    error_log(json_encode($viewData),0);

    return $this->view->render($response, './pages/home.twig', $viewData);

})->setName('home');

//contact
$app->get('/about', function($request, $response){
    
    $viewData=[];
    $viewData['style']= "about.css";
    $viewData['nav_color'] = "#0E0E0E";

    return $this->view->render($response, './pages/about.twig', $viewData);

})->setName('about');

//project

$app->get('/works/{name}', function($request, $response, $args){
    
    $name = str_replace("_" ," ",$args['name']);

    $data = $this->db->query('SELECT content FROM project_content WHERE name = "'.$name.'"')->fetch();
    $data = json_decode(file_get_contents('../web/assets'.$data->content));
    
    $viewData=[];
    $viewData['style']= 'works.css';
    $viewData['nav_color']= $data->nav_color;
    $viewData['content']= $data;
    

    return $this->view->render($response, './pages/works.twig', $viewData);

})->setName('works');

