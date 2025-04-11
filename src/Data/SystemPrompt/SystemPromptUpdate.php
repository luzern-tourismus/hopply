<?php
namespace LuzernTourismus\Hopply\Data\SystemPrompt;
use Nemundo\Model\Data\AbstractModelUpdate;
class SystemPromptUpdate extends AbstractModelUpdate {
/**
* @var SystemPromptModel
*/
public $model;

/**
* @var string
*/
public $systemPrompt;

public function __construct() {
parent::__construct();
$this->model = new SystemPromptModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->systemPrompt, $this->systemPrompt);
parent::update();
}
}