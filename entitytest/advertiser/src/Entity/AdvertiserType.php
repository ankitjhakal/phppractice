<?php
namespace Drupal\advertiser\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Config\Entity\ConfigEntityBundleBase;
/**
 * Advertiser Type
 *
 * @ConfigEntityType(
 *   id = "advertiser_type",
 *   label = @Translation("Advertiser Type"),
 *   bundle_of = "advertiser",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid",
 *   },
 *   config_prefix = "advertiser_type",
 *   config_export = {
 *     "id",
 *     "label",
 *   },
 *   handlers = {
 *     "form" = {
 *       "default" = "Drupal\advertiser\Form\AdvertiserTypeEntityForm",
 *       "add" = "Drupal\advertiser\Form\AdvertiserTypeEntityForm",
 *       "edit" = "Drupal\advertiser\Form\AdvertiserTypeEntityForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     },
 *   },
 *   admin_permission = "administer site configuration",
 *   links = {
 *     "canonical" = "/admin/structure/advertiser_type/{advertiser_type}",
 *     "add-form" = "/admin/structure/advertiser_type/add",
 *     "edit-form" = "/admin/structure/advertiser_type/{advertiser_type}/edit",
 *     "delete-form" = "/admin/structure/advertiser_type/{advertiser_type}/delete",
 *     "collection" = "/admin/structure/advertiser_type",
 *   }
 * )
 */
class AdvertiserType extends ConfigEntityBundleBase  {
// class Advertiser extends ContentEntityBase implements ContentEntityInterface {
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

    // Standard field, used as unique if primary index.
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the Advertiser entity.'))
      ->setReadOnly(TRUE);

    // Standard field, unique outside of the scope of the current project.
    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(t('UUID'))
      ->setDescription(t('The UUID of the Advertiser entity.'))
      ->setReadOnly(TRUE);
    $fields['label'] = BaseFieldDefinition::create('label')
      ->setLabel(t('LABEL'))
      ->setDescription(t('The LABEL of the Advertiser entity.'))
      ->setReadOnly(TRUE);

    return $fields;
  }
}
?>
