<?php
namespace LuzernTourismus\Hopply\Data\LargeLanguageModel;
class LargeLanguageModelReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var LargeLanguageModelModel
*/
public $model;

public function __construct() {
$this->model = new LargeLanguageModelModel();
parent::__construct();
}
/**
* @return LargeLanguageModelRow[]
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
* @return LargeLanguageModelRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return LargeLanguageModelRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new LargeLanguageModelRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}