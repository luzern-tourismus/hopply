<?php
namespace LuzernTourismus\Hopply\Data\LargeLanguageModel;
class LargeLanguageModelRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var LargeLanguageModelModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $largeLanguageModel;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->largeLanguageModel = $this->getModelValue($model->largeLanguageModel);
}
}