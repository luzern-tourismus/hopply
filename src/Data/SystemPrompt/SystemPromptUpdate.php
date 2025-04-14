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

/**
* @var string
*/
public $short;

/**
* @var bool
*/
public $addOsterei;

public function __construct() {
parent::__construct();
$this->model = new SystemPromptModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->systemPrompt, $this->systemPrompt);
$this->typeValueList->setModelValue($this->model->short, $this->short);
$this->typeValueList->setModelValue($this->model->addOsterei, $this->addOsterei);
parent::update();
}
}