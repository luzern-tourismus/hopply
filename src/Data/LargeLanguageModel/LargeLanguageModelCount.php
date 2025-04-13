<?php
namespace LuzernTourismus\Hopply\Data\LargeLanguageModel;
class LargeLanguageModelCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var LargeLanguageModelModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LargeLanguageModelModel();
}
}