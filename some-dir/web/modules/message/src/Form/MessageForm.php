<?php
/**
 * @file
 * Contains \Drupal\message\Form\MessageForm.
 */
namespace Drupal\message\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
class MessageForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'message_form';
  }
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
  	$form['name'] = array(
      '#type' => 'textfield',
      '#title' => t('Full Name:'),
      '#required' => TRUE,
    );
    $form['email'] = array(
      '#type' => 'email',
      '#title' => t('Email Address:'),
      '#required' => TRUE,
    );
    $form['message'] = array(
      '#type' => 'textfield',
      '#title' => t('Message:'),
    );
    
    $form['findus'] = array (
      '#type' => 'select',
      '#title' => ('How Did You Find Us?'),
      '#options' => array(
        'Google' => t('Google'),
        'Advert' => t('Advert'),
		'newspaper' => t('Newspaper'),
      ),
    );
    $form['callback'] = array (
      '#type' => 'radios',
      '#title' => ('Require a call back?'),
      '#options' => array(
        'Yes' =>t('Yes'),
        'No' =>t('No')
      ),
    );
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Send'),
      '#button_type' => 'primary',
		
    );
    return $form;
  }
  /**
   * {@inheritdoc}
   */
    
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
   drupal_set_message($this->t('@can_name ,Your email has been sent!', array('@can_name' => $form_state->getValue('name'))));
    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message($key . ': ' . $value);
		
		
    }
   }
}

