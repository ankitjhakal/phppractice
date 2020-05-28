<?php
namespace Drupal\m3dule\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;

class DataController extends ControllerBase {
  public function listshow() {
    $config = \Drupal::config('m3dule.settings');
    // kint($config);
    $fid = $config->get('image');
    if ($config->get('image')!=null) {
      $image_entity = \Drupal\file\Entity\File::load($fid[0]);
      $image_entity_url = $image_entity->url();
    }
    else {
      $image_entity_url = "/sites/default/files/default_images/obama.png";
    }
    $items=array();
    $items[] = [
       'title' => $config->get('title'),
       'url' =>   $image_entity_url,
       'desc' => $config->get('description'),
     ];

   // kint($items);
   return array(
     '#theme' => 'list',
     '#items' => $items,
     '#title' => 'our config form list',
   );

    // $database = \Drupal::database();
    // $query = $database->query("SELECT * FROM `form_list` ");
    // $result = $query->fetchAll();
    // $items = array();
    // foreach($result as $value) {
    //   $items[] = [
    //     'title' => $value->title,
    //     'url' => $value->image,
    //     'desc' => $value->description,
    //   ];
    // }
    // // kint($items);
    // return array(
    //   '#theme' => 'list',
    //   '#items' => $items,
    //   '#title' => 'our config form list',
    // );
  }
}
