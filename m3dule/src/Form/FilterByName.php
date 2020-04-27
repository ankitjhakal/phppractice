<?php
namespace Drupal\m3dule\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

class FilterByName extends FormBase {

  public function getFormId() {
    return 'resume_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['search'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Search'),
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];
    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $input = $form_state->getUserInput();
    $key = $input['search'];
    $url = Url::fromRoute('m3dule_movie', [], ['query' => ['word' => $key]]);
    $form_state->setRedirectUrl($url);
  }
}
?>
