<?php

//HOME
$app->get('/', function($request, $response){
    
    $viewData=[];
    $data = $this->db->query('SELECT * FROM project')->fetchAll();

    $viewData['projects'] =$data;
    $viewData['style'] = "custom.css";
    $viewData['nav_color'] = "#0E0E0E";

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
    if(!$data){
        throw new \Slim\Exception\NotFoundException($request, $response);
    }
    $data = json_decode(file_get_contents('../web/assets'.$data->content));
    
    
    $viewData=[];
    $viewData['style']= 'works.css';
    $viewData['nav_color']= $data->nav_color;
    $viewData['content']= $data;
    

    return $this->view->render($response, './pages/works.twig', $viewData);

})->setName('works');

//mail
$app->get('/mail', function($request, $response){
    
    $post_data = $request->getQueryParams();

    error_log(json_encode($post_data),0);
    $transport = new Swift_SendmailTransport('/usr/sbin/sendmail -bs');

    $mailer = new Swift_Mailer($transport);

    // Create a message
    $message = (new Swift_Message('Wonderful Subject'))
    ->setFrom([$post_data['mail'] => 'the website'])
    ->setTo(['delachaumealban@gmail.com'])
    ->setBody($post_data['txt'])
    ;

    // Send the message
    $result = $mailer->send($message);

});
