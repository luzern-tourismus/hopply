<?php
namespace LuzernTourismus\Hopply\Data\LargeLanguageModel;
class LargeLanguageModelDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var LargeLanguageModelModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LargeLanguageModelModel();
}
}