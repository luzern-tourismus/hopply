<?php
namespace LuzernTourismus\Hopply\Data\LargeLanguageModel;
class LargeLanguageModelBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var LargeLanguageModelModel
*/
protected $model;

/**
* @var string
*/
public $largeLanguageModel;

public function __construct() {
parent::__construct();
$this->model = new LargeLanguageModelModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->largeLanguageModel, $this->largeLanguageModel);
$id = parent::save();
return $id;
}
}