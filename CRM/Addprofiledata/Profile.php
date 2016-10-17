<?php

/**
 * Class for Profile processing ILGA Europe
 *
 * @author Erik Hommel (CiviCooP) <erik.hommel@civicoop.org>
 * @date 11 Oct 2016
 * @license AGPL-3.0
 */
class CRM_Addprofiledata_Profile {

  private $_stayInformedProfileId = NULL;

  /**
   * CRM_Addprofiledata_Profile constructor.
   */
  function __construct() {
    $this->_stayInformedProfileId = 12;
  }

  /**
   * Method to implement the buildForm hook
   *
   * @param $formName
   * @param $form
   */
  public function buildForm($formName, &$form) {
    if ($formName == 'CRM_Profile_Form_Edit') {
      $gid = $form->getVar('_gid');
      if ($gid == $this->_stayInformedProfileId) {
        $tagGroup = $form->getVar('_tagGroup');
        $groupElement = $form->getElement('group');
        foreach ($groupElement->_elements as $elementId => &$element) {
          if (!empty($tagGroup['group'][$element->_attributes['id']]['description'])) {
            $element->_text = $element->_text . ' <br/><span class="description">(' . $tagGroup['group'][$element->_attributes['id']]['description'] . ')</span><br/>';
          }
        }
      }
    }
  }
}