<?php
namespace LuzernTourismus\Hopply\Data\LargeLanguageModel;
use Nemundo\Model\Data\AbstractModelUpdate;
class LargeLanguageModelUpdate extends AbstractModelUpdate {
/**
* @var LargeLanguageModelModel
*/
public $model;

/**
* @var string
*/
public $largeLanguageModel;

public function __construct() {
parent::__construct();
$this->model = new LargeLanguageModelModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->largeLanguageModel, $this->largeLanguageModel);
parent::update();
}
}