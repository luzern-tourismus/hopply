<?php
namespace LuzernTourismus\Hopply\Content\SystemPrompt;
use Nemundo\Content\Type\AbstractContentItem;
class SystemPromptItem extends AbstractContentItem {
protected function loadItem() {
$this->contentType = new SystemPromptType();
}
protected function onDataRow() {
}
/**
* @return \Nemundo\Model\Row\AbstractModelDataRow
*/
public function getDataRow() {
return parent::getDataRow(); 
}
}