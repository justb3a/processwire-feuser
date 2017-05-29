<?php namespace ProcessWire;

/**
 * Class FeUser
 */
class FeUserConfig extends ModuleConfig {

  /**
   * array Default config values
   */
  public function getDefaults() {
    return array(
      'redirectAfterLogin' => null,
      'redirectAfterLogout' => null,
      'userRole' => array(),
      'profileFields' => array(),
      'mailfrom' => 'noreply@server.com',
      'messageRegister' => "Please click the following link to confirm your registration: %link%",
      'periodOfValidity' => 5,
    );
  }

  /**
   * Get available roles
   *
   * @return array
   */
  public function getAvailableRoles() {
    $availableRoles = array();
    foreach ($this->roles as $role) {
      if (in_array($role->name, array('guest', 'superuser'))) continue;
      $availableRoles[] = $role->name;
    }

    return $availableRoles;
  }


  /**
   * Retrieves the list of config input fields
   * Implementation of the ConfigurableModule interface
   *
   * @return InputfieldWrapper
   */
  public function getInputfields() {
    // get inputfields
    $inputfields = parent::getInputfields();

    $field = $this->modules->get('InputfieldPageListSelect');
    $field->name = 'redirectAfterLogin';
    $field->label = __('Page to rediret to after login');
    $field->columnWidth = 50;
    $inputfields->add($field);

    $field = $this->modules->get('InputfieldPageListSelect');
    $field->name = 'redirectAfterLogout';
    $field->label = __('Page to rediret to after logout');
    $field->columnWidth = 50;
    $inputfields->add($field);

    $field = $this->modules->get('InputfieldSelect');
    $field->label = __('User Role');
    $field->attr('name', 'userRole');
    $field->columnWidth = 50;
    $field->required = true;
    foreach ($this->getAvailableRoles() as $role) $field->addOption($role, $role);
    $inputfields->add($field);

    $field = $this->modules->get('InputfieldAsmSelect');
    $field->label = __('Profile Fields');
    $field->attr('name', 'profileFields');
    $field->columnWidth = 50;
    $field->required = true;
    foreach ($this->fields as $f) $field->addOption($f->name, $f->name);
    $inputfields->add($field);

    $field = $this->modules->get('InputfieldText');
    $field->name = 'mailfrom';
    $field->label = __('E-Mail From Address');
    $field->description = __('Sender Address');
    $field->columnWidth = 50;
    $inputfields->add($field);

    $field = $this->modules->get('InputfieldTextarea');
    $field->name = 'messageRegister';
    $field->label = __('Register E-Mail Message');
    $field->description = __('Use %fieldName% as placeholder, for example %email%');
    $field->rows = 8;
    $field->columnWidth = 50;
    $inputfields->add($field);

    // periodOfValidity field
    $field = $this->modules->get('InputfieldInteger');
    $field->name = 'periodOfValidity';
    $field->label = __('Period of Validity');
    $field->description = __('Number of days confirmation links are valid.');
    $field->columnWidth = 50;
    $inputfields->add($field);

    return $inputfields;
  }

}
