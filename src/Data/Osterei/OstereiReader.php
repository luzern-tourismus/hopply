<?php
namespace LuzernTourismus\Hopply\Data\Osterei;
class OstereiReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var OstereiModel
*/
public $model;

public function __construct() {
$this->model = new OstereiModel();
parent::__construct();
}
/**
* @return OstereiRow[]
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
* @return OstereiRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return OstereiRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new OstereiRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}