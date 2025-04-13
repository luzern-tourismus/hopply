<?php
namespace LuzernTourismus\Hopply\Data\LargeLanguageModel;
class LargeLanguageModelPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var LargeLanguageModelModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LargeLanguageModelModel();
}
/**
* @return LargeLanguageModelRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new LargeLanguageModelRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}