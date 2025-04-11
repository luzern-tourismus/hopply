<?php
namespace LuzernTourismus\Hopply\Content\Osterei;
use Nemundo\Content\Type\AbstractContentItem;
class OstereiItem extends AbstractContentItem {
protected function loadItem() {
$this->contentType = new OstereiType();
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