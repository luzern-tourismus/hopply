<?php
namespace LuzernTourismus\Hopply\Data\Osterei;
class OstereiPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var OstereiModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new OstereiModel();
}
/**
* @return OstereiRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new OstereiRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}