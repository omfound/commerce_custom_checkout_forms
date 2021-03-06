<?php

namespace Drupal\commerce_custom_checkout_forms\Form;

use Drupal\Core\Entity\EntityInterface;
use Drupal\inline_entity_form\Form\EntityInlineForm;

/**
 * Defines the inline form for product variations.
 */
class CheckoutFormInlineForm extends EntityInlineForm {

  /**
   * The loaded variation types.
   *
   * @var \Drupal\commerce_custom_checkout_forms\Entity\CheckotuFormTypeInterface[]
   */
  protected $checkoutFormTypes;

  /**
   * {@inheritdoc}
   */
  public function getEntityTypeLabels() {
    $labels = [
      'singular' => t('Checkout Form'),
      'plural' => t('Checkout Forms'),
    ];
    return $labels;
  }

  /**
   * {@inheritdoc}
   */
  public function getTableFields($bundles) {
    //$fields = parent::getTableFields($bundles); 
    $fields = [];
    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getEntityLabel(EntityInterface $entity) {
    return t('Checkout Form');
  }

  /**
   * Loads and returns a product variation type with the given ID.
   *
   * @param string $variation_type_id
   *   The variation type ID.
   *
   * @return \Drupal\commerce_product\Entity\ProductVariationTypeInterface
   *   The loaded product variation type.
   */
  protected function loadVariationType($type_id) {
    if (!isset($this->checkoutFormTypes[$type_id])) {
      $storage = $this->entityTypeManager->getStorage('checkout_form_type');
      $this->checkoutFormTypes[$type_id] = $storage->load($type_id);
    }

    return $this->checkoutFormTypes[$type_id];
  }
  public function save(EntityInterface $entity) {
    parent::save($entity);
  }
}
