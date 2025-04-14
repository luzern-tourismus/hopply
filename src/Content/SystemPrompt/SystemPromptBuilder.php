<?php

namespace LuzernTourismus\Hopply\Content\SystemPrompt;

use LuzernTourismus\Hopply\Data\SystemPrompt\SystemPromptUpdate;
use Nemundo\Content\Type\AbstractContentBuilder;

class SystemPromptBuilder extends AbstractContentBuilder
{



    public $systemPrompt;

    protected function loadBuilder()
    {
        $this->contentType = new SystemPromptType();
    }

    protected function onCreate()
    {
    }

    protected function onUpdate()
    {

        $update = new SystemPromptUpdate();
        $update->systemPrompt=$this->systemPrompt;
        $update->updateById($this->dataId);

    }
}