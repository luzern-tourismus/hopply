<?php
namespace LuzernTourismus\Hopply\Data\SystemPrompt;
use Nemundo\Model\Id\AbstractModelIdValue;
class SystemPromptId extends AbstractModelIdValue {
/**
* @var SystemPromptModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SystemPromptModel();
}
}