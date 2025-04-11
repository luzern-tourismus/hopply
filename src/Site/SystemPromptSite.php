<?php

namespace LuzernTourismus\Hopply\Site;

use LuzernTourismus\Hopply\Page\SystemPromptPage;
use Nemundo\Web\Site\AbstractSite;

class SystemPromptSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'System Prompt';
        $this->url = 'system-prompt';
    }

    public function loadContent()
    {
        (new SystemPromptPage())->render();
    }
}