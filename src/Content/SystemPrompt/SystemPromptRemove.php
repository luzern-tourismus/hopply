<?php
namespace LuzernTourismus\Hopply\Content\SystemPrompt;
use Nemundo\Content\Type\AbstractContentRemove;
class SystemPromptRemove extends AbstractContentRemove {
protected function loadRemove() {
$this->contentType = new SystemPromptType();
}
protected function onDelete() {
}
}