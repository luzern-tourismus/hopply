<?php
namespace LuzernTourismus\Hopply\Data\Log;
class LogValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var LogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogModel();
}
}