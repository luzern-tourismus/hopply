<?php

namespace LuzernTourismus\Hopply\Request;

use Nemundo\Core\Http\Request\Post\AbstractPostRequest;

class PromptRequest extends AbstractPostRequest
{
    protected function loadRequest()
    {
        $this->requestName = 'prompt';
    }
}