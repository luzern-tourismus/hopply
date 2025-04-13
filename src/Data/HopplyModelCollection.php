<?php
namespace LuzernTourismus\Hopply\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class HopplyModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \LuzernTourismus\Hopply\Data\LargeLanguageModel\LargeLanguageModelModel());
$this->addModel(new \LuzernTourismus\Hopply\Data\Osterei\OstereiModel());
$this->addModel(new \LuzernTourismus\Hopply\Data\SystemPrompt\SystemPromptModel());
}
}