<?php
namespace LuzernTourismus\Hopply\Content\SystemPrompt;
use Nemundo\Content\View\AbstractContentView;
class SystemPromptView extends AbstractContentView {
protected function loadView() {
$this->viewName='default';
$this->viewId = 'fb2cdb26-c496-4878-bea7-cf45622efc0b';
$this->defaultView = true;
}
public function getContent() {
return parent::getContent();
}
}