<?php
namespace LuzernTourismus\Hopply\Data\SystemPrompt;
class SystemPromptRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var SystemPromptModel
*/
public $model;

/**
* @var string
*/
public $id;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->systemPrompt = $this->getModelValue($model->systemPrompt);
$this->short = $this->getModelValue($model->short);
$this->addOsterei = boolval($this->getModelValue($model->addOsterei));
}
}