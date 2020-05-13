<?php
namespace Drupal\m3dule\Form;
use Drupal\Core\Database\Database;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;
/**
 * Defines a form that configures forms module settings.
 */
class TestForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'm3dule_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'm3dule.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('m3dule.settings');
    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your title'),
      '#default_value' => $config->get('title'),
    ];
    $form['description'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your Description'),
      '#default_value' => $config->get('description'),
    ];
    $form['my_file'] = [
      '#type' => 'managed_file',
      '#title' => 'my file',
      '#name' => 'my_custom_file',
      '#description' => $this->t('my file description'),
      '#default_value' => $config->get('my_file'),
      '#upload_location' => 'public://profile-pictures',
      '#upload_validators' => array(
          'file_validate_extensions' => array('gif png jpg jpeg'),
          // 'file_validate_size' => array(25600000),
      ),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $form_file = $form_state->getValue('my_file', 0);
    if (isset($form_file[0]) && !empty($form_file[0])) {
      $file = File::load($form_file[0]);
      $file->setPermanent();
      $file->save();
      $image_entity = \Drupal\file\Entity\File::load($form_file[0]);
      $image_entity_url = $image_entity->url();
      // Add to file usage calculation.
      // \Drupal::service('file.usage')->add;
    }
    else {
      $image_entity_url = "/sites/default/files/default_images/obama.png";
    }
    db_insert('form_list')
      ->fields(array(
        'title' => $form_state->getValue('title'),
        'description' => $form_state->getValue('description'),
        'image' => $image_entity_url,
    ))
    ->execute();

    $this->config('m3dule.settings')
      ->set('title', $form_state->getValue('title'))
      ->set('description', $form_state->getValue('description'))
      ->set('image', $form_state->getValue('my_file'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
