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
public function save() {
$this->typeValueList->setModelValue($this->model->systemPrompt, $this->systemPrompt);
$this->typeValueList->setModelValue($this->model->short, $this->short);
$this->typeValueList->setModelValue($this->model->addOsterei, $this->addOsterei);
$id = parent::save();
return $id;
}
}