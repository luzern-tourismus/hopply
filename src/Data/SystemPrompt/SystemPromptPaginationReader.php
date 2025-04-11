<?php
namespace LuzernTourismus\Hopply\Data\SystemPrompt;
class SystemPromptPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var SystemPromptModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SystemPromptModel();
}
/**
* @return SystemPromptRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new SystemPromptRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}