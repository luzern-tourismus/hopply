<?php

namespace LuzernTourismus\Hopply\Content\SystemPrompt;

use Nemundo\Content\Type\AbstractContentType;

class SystemPromptType extends AbstractContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'SystemPrompt';
        $this->typeId = 'db13ef97-6369-4076-b8e3-0752c63df4e8';
        $this->formClassList[] = SystemPromptForm::class;
        $this->viewClassList[] = SystemPromptView::class;
        $this->itemClass = SystemPromptItem::class;
        $this->adminClass= SystemPromptAdmin::class;
    }
}