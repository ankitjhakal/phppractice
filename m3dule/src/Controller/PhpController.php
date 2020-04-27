<?php
namespace Drupal\m3dule\Controller;
use Drupal\paragraphs\Entity\Paragraph;
use Drupal\node\Entity\Node;
use Drupal\node\NodeInterface;
use Drupal\Core\Controller\ControllerBase;
use \Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
  * This class contains functions for display page like actor listing,movielist.
*/
class PhpController extends ControllerBase {

  /**
     * This function is used to return movielist data array to twig file.
     * @return mixed
  */
  public function movie_list() {
    $form = $this->formBuilder()->getForm('Drupal\m3dule\Form\FilterByName');

    $form_rendered = \Drupal::service('renderer')->render($form);
    $movie = \Drupal::request()->query->get('word');
    // Query fired to fetch all node ids of movie content type.
    $bundle = 'movie';
    if($movie!=NULL) {
      // kint($movie);
      $query = \Drupal::entityQuery('node')
          ->condition('status', 1)
          ->condition('type', $bundle)
          ->condition('title', $movie, 'CONTAINS');
          // ->condition('field_paragraph', $movie, 'CONTAINS');
    // $or = $query->orConditionGroup();
    // $query->condition($or);
    }
    else {
      $query = \Drupal::entityQuery('node')
      ->condition('status', 1)
      ->condition('type', $bundle)
      ->sort('field_release_date', 'DESC');
    }
    $nids = $query->execute();
    if (empty($nids)) {
      $data = array("#markup" => "No Results Found");
      return $data;
    }
    else {
      // Load all nids through this fucntion.
      $nodes = entity_load_multiple('node', $nids);
      $items = array();
      $actor = array();
      // Foreach for fetching all fields data and stored in an array $items
      foreach($nodes as $node) {
        $mid = $node->id();
        $node_title = $node->title->value;
        $node_body = $node->get('body')->value;
        $date = $node->get('field_release_date')->value;
        $ratings = $node->field_ratings->getValue();
        $rating = $ratings[0]['rating'];
        $rating = $rating/20;
        $rating = $rating."/"."5";
        $node_image_fid = $node->get('field_movie_poster')->target_id;
        if (!is_null($node_image_fid)) {
          $image_entity = \Drupal\file\Entity\File::load($node_image_fid);
          $image_entity_url = $image_entity->url();
        }
        else {
          $image_entity_url = "/sites/default/files/default_images/obama.jpg";
        }
        // To access paragraph field using it's target id.
        $target_id = $node->get('field_paragraph')->target_id;
        $paragraph = Paragraph::load($target_id);
        $values = array();
        // Get all the values of node id from field actor.
        $array = $paragraph->field_actor->getValue();
        foreach($array as $value) {
          if(isset($value['target_id'])) {
            $values[] = $value['target_id'];
          }
        }
        $j = 0;
        $actor = array();
        $url = array();
        // Fetch actor name after loading a node and url to attach with actorname.
        foreach($values as $value) {
          $node_details = Node::load($value);
          $actor[$j]['name'] = $node_details->title->value;
          $actor[$j]['urls'] = '/movielist/node/'.$value;
          $j++;
        }
        $items[] = [
          'name' => $node_title,
          'url' => $image_entity_url,
          'desc' => $node_body,
          'date' => $date,
          'rating' => $rating,
          'cast' => $actor,
          'url_movie' => "/node/".$mid,
        ];
      }
      // Return an renderable array to display movie_list applying special theme for page.
      return array(
        '#theme' => 'movie_list',
        '#form' => $form_rendered,
        '#items' => $items,
        '#title' => 'our movies list',
      );
    }
  }
  /**
     * This function is used to return actor list data array.
     * @return mixed
  */
  public function actor_list() {
    // Query fired to fetch all node ids of movie content type.
    $bundle = 'actor';
    $query = \Drupal::entityQuery('node')
        ->condition('status', 1)
        ->condition('type', $bundle);
    $nids = $query->execute();
    $m_ids = array();
    // Fetched the recent movie node id of an actor which contains that actor nodeid.
    foreach($nids as $nid) {
      $bundle = 'movie';
      $query = \Drupal::entityQuery('node')
          ->condition('status', 1)
          ->condition('type', $bundle)
          ->condition('field_paragraph.entity:paragraph.field_actor.target_id',$nid)
          ->range(0, 1)
          ->sort('field_release_date', 'DESC');
      $m_ids[] = $query->execute();
    }
    if (empty($nids)) {
      $data = array("#markup" => "No Results Found");
    }
    else {
      $actor_nodes = entity_load_multiple('node', $nids);
      $items = array();
      // Foreach for fetching all fields data and stored in an array $items
      foreach($actor_nodes as $node) {
        $nid = $node->id();
        $node_title = $node->title->value;
        $node_body = $node->get('body')->value; //can use getString() getValue() instead of value
        $ratings = $node->field_rating->getValue();
        $rating = $ratings[0]['rating'];
        $rating = $rating/20;
        $rating = $rating."/"."5";
        $node_image_fid = $node->get('field_actor_image')->target_id;
        if(!is_null($node_image_fid)) {
          $image_entity = \Drupal\file\Entity\File::load($node_image_fid);
          $image_entity_url = $image_entity->url();
        }
        else {
          $image_entity_url = "/sites/default/files/default_images/obama.jpg";
        }
        $items[] = [
          'name' => $node_title,
          'url' => $image_entity_url,
          'desc' => $node_body,
          'ratings' => $rating,
          'actor_url' => "/movielist/node/".$nid,
        ];
      }
      // Added two columns of recent movie name with its url.
      $count=0;
      foreach($m_ids as $id) {
        foreach ($id as $value) {
          $node =  Node::load($value);
          $movie_title = $node->title->value;
          $items[$count]['recent_movie'] = $movie_title;
          $items[$count]['movie_url'] = "node/".$value;
          $count = $count+1;
        }
      }
    }
    // Return an renderable array applying unique theme for page.
    return array(
      '#theme' => 'actor_list',
      '#items' => $items,
      '#title' => 'our actor list',
    );
  }
  /**
     * This function is used to return list of movies of a particular actor.
     * @param  $type type of id       $node  id of a node.
     * @return mixed
  */
  public function actor_movieslist($type, NodeInterface $node) {
    // Fetch node id using id() function on object $node.
    $nid = $node->id();
    $node_details = Node::load($nid);
    $list_title = $node_details->title->value;
    $list_title = 'listed movies of '.$list_title;
    $bundle = 'movie';
    $query = \Drupal::entityQuery('node')
        ->condition('status', 1)
        ->condition('type', $bundle)
        ->condition('field_paragraph.entity:paragraph.field_actor.target_id',$nid)
        ->sort('field_release_date', 'DESC');
    $m_ids = $query->execute();
    if(empty($m_ids)) {
      $data = array("#markup" => "No Results Found");
    }
    else{
      $nodes = entity_load_multiple('node', $m_ids);
      $items = array();
      $actor = array();
      foreach($nodes as $node){
        $mid = $node->id();
        $node_title = $node->title->value;
        $node_image_fid = $node->get('field_movie_poster')->target_id;
        if(!is_null($node_image_fid)) {
          $image_entity = \Drupal\file\Entity\File::load($node_image_fid);
          $image_entity_url = $image_entity->url();
        }
        else {
          $image_entity_url = "/sites/default/files/default_images/obama.jpg";
        }
        $target_id = $node->get('field_paragraph')->target_id;
        $paragraph = Paragraph::load($target_id);
        $values = array();
        $array = $paragraph->field_actor->getValue();
        foreach($array as $value) {
          if(isset($value['target_id'])) {
            $values[] = $value['target_id'];
          }
        }
        $j = 0;
        $no = 0;
        $actor = array();
        $url = array();
        // Fetched costar name and role of actor in particular movie.
        foreach($values as $value) {
          $node_details = Node::load($value);
          /* If value of nid($value) of actor equal to $nid,will get role of that
             Actor in that movie.
          */
          if($value == $nid) {
            $roles = $paragraph->field_role->getValue();
            $actor_role = $roles[$no]['value'];
          }
          // Else fetched costar of movie with its id.
          else {
            $actor[$j]['name'] = $node_details->title->value;
            $actor[$j]['actor_id'] = $value;
            $j++;
          }
          $no++;
        }
        $items[] = [
          'movie_name' => $node_title,
          'image_path' => $image_entity_url,
          'actor_role' => $actor_role,
          'costars' => $actor,
          'movie_url' =>  $mid,
        ];
      }
      return array(
        '#theme' => 'actor_movies_list',
        '#items' => $items,
        '#title' => $list_title,
      );
    }
  }
  /**
     * This function is used to return JsonResponse to popup a box for costar.
     * @param  $movie=Null,$nid=Null Default parameters for movie and actor node id.
     * @return mixed
  */
  public function costar($movie=NULL, $nid=NULL) {
    $node = Node::load($movie);
    $target_id = $node->get('field_paragraph')->target_id;
    $paragraph = Paragraph::load($target_id);
    $values = array();
    $array = $paragraph->field_actor->getValue();
    foreach($array as $value) {
      if(isset($value['target_id'])) {
        $values[] = $value['target_id'];
      }
    }
    $no = 0;
    $actor = array();
    foreach($values as $value) {
      $node = Node::load($value);
      if($value == $nid) {
        $roles = $paragraph->field_role->getValue();
        $role = $roles[$no]['value'];
        $node_title = $node->title->value;
        $node_image_fid = $node->get('field_actor_image')->target_id;
        if(!is_null($node_image_fid)) {
          $image_entity = \Drupal\file\Entity\File::load($node_image_fid);
          $image_entity_url = $image_entity->url();
        }
        else {
          $image_entity_url = "/sites/default/files/default_images/obama.jpg";
        }
      }
      $no++;
    }
    $items = [
       'name' => $node_title,
       'image' => $image_entity_url,
       'role' => $role,
     ];
    return new JsonResponse($items);
  }
}
?>
