<?php

namespace Drupal\commerce_custom_checkout_forms\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Checkout form edit forms.
 *
 * @ingroup commerce_custom_checkout_forms
 */
class CheckoutFormForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\commerce_custom_checkout_forms\Entity\CheckoutForm */
    $form = parent::buildForm($form, $form_state);

    $entity = $this->entity;

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = &$this->entity;

    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Checkout form.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Checkout form.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.checkout_form.canonical', ['checkout_form' => $entity->id()]);
  }

}
