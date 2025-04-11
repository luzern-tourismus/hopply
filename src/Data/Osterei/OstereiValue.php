<?php
namespace LuzernTourismus\Hopply\Data\Osterei;
class OstereiValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var OstereiModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new OstereiModel();
}
}