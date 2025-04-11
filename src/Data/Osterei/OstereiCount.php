<?php
namespace LuzernTourismus\Hopply\Data\Osterei;
class OstereiCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var OstereiModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new OstereiModel();
}
}