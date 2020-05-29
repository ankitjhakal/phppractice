<?php
namespace Drupal\m3dule\Plugin\Block;
use \Symfony\Component\HttpFoundation\Response;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Routing;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;
/**
 * Provides a 'List config' Block.
 *
 * @Block(
 *   id = "list_config_block",
 *   admin_label = @Translation("List Config block"),
 *   category = @Translation("List Config World"),
 * )
 */
class Blockplace extends BlockBase {  /**
   * {@inheritdoc}
   */
  public function listshow() {
    $config = \Drupal::config('m3dule.settings');
    $fid = $config->get('image');
    $image_entity = \Drupal\file\Entity\File::load($fid[0]);
    $image_entity_url = $image_entity->url();
    $items=array();
    $items[] = [
      'title' => $config->get('title'),
      'url' =>   $image_entity_url,
      'desc' => $config->get('description'),
     ];
    return array(
     'theme' => 'list',
     'items' => $items,
     'title' => 'Configuration',
    );
  }
  /**
   * [build description]
   * @return [type] [description]
   */
  public function build() {
    $data = $this->listshow();
    return  array(
      '#theme' => $data['theme'],
      '#items' => $data['items'],
      '#title' => $data['title'],
      '#cache' => [
        'max-age' => 0,
      ]
    );
  }
}
