<?php
namespace LuzernTourismus\Hopply\Data\SystemPrompt;
class SystemPrompt extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var SystemPromptModel
*/
protected $model;

/**
* @var string
*/
public $systemPrompt;

public function __construct() {
parent::__construct();
$this->model = new SystemPromptModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->systemPrompt, $this->systemPrompt);
$id = parent::save();
return $id;
}
}