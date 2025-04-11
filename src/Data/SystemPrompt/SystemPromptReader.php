<?php
namespace LuzernTourismus\Hopply\Data\SystemPrompt;
class SystemPromptReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var SystemPromptModel
*/
public $model;

public function __construct() {
$this->model = new SystemPromptModel();
parent::__construct();
}
/**
* @return SystemPromptRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return SystemPromptRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return SystemPromptRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new SystemPromptRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}