<?php

namespace LuzernTourismus\Hopply\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class OstereiParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'osterei';
    }
}