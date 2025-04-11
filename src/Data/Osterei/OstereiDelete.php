<?php
namespace LuzernTourismus\Hopply\Data\Osterei;
class OstereiDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var OstereiModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new OstereiModel();
}
}