<?php
namespace LuzernTourismus\Hopply\Data\SystemPrompt;
class SystemPromptCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var SystemPromptModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SystemPromptModel();
}
}