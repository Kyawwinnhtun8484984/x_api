<?php
// example of how to use basic selector to retrieve HTML contents
include('simple_html_dom.php');
header('Content-Type: application/json');

$uri;
$pg;
$dataArray=[];

$url = $_GET['url'];

    if (!empty($url)) {
            $videos = file_get_html($url); 
          foreach($videos->find('div[class=mozaique]') as $v){
          foreach($v->find('p[class=title]') as $i){
          foreach($i->find('a') as $element){
              $uri = $element->href;
              $html = file_get_html('https://www.xvideos.com'.$uri);
$json =[];
$duration;

foreach($html->find('div[id=html5video_base]') as $e){
    foreach($html->find('h2.page-title') as $title)
    foreach($title->find('span.duration') as $del)
    $del->outertext = '';
    foreach($title->find('span.video-hd-mark') as $dell)
    $dell->outertext = '';
    
    foreach($html->find('strong.nb-views-number') as $vv)
    $view = $vv-> innertext;
 
    foreach($e->find('img') as $element)
      $thum_links = $element->src;
  
     foreach($e->find('a') as $element){
         $link = $element->href;
        if (strpos($link, '3gp') !== false) {
            $link = $link;
         }}
  
    $json = array(
      'title' => strip_tags($title),
      'thumb' => $thum_links,
      'link' => $link,
      'view' => $view);
    
  } 
  
          }
            array_push($dataArray,$json);
     }
              }

          

 $result = json_encode($dataArray,JSON_PRETTY_PRINT);
      echo $result; 
    }
   
?>