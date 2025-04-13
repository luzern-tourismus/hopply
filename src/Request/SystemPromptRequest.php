<?php

namespace LuzernTourismus\Hopply\Request;

use Nemundo\Core\Http\Request\Post\AbstractPostRequest;

class SystemPromptRequest extends AbstractPostRequest
{
    protected function loadRequest()
    {
        $this->requestName = 'system-prompt';
    }
}