<?php
namespace LuzernTourismus\Hopply\Data\LargeLanguageModel;
use Nemundo\Model\Id\AbstractModelIdValue;
class LargeLanguageModelId extends AbstractModelIdValue {
/**
* @var LargeLanguageModelModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LargeLanguageModelModel();
}
}