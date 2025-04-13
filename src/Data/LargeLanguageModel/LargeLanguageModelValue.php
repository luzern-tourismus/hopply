<?php
namespace LuzernTourismus\Hopply\Data\LargeLanguageModel;
class LargeLanguageModelValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var LargeLanguageModelModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LargeLanguageModelModel();
}
}