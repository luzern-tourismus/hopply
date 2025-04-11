<?php
namespace LuzernTourismus\Hopply\Data\SystemPrompt;
class SystemPromptValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var SystemPromptModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SystemPromptModel();
}
}