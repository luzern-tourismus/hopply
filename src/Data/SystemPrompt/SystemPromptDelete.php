<?php
namespace LuzernTourismus\Hopply\Data\SystemPrompt;
class SystemPromptDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var SystemPromptModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SystemPromptModel();
}
}