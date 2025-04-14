<?php

namespace LuzernTourismus\Hopply\Content\SystemPrompt;

use LuzernTourismus\Hopply\Data\SystemPrompt\SystemPromptModel;
use LuzernTourismus\Hopply\Data\SystemPrompt\SystemPromptReader;
use Nemundo\Admin\Com\ListBox\AdminLargeTextBox;
use Nemundo\Content\Form\AbstractContentForm;

class SystemPromptForm extends AbstractContentForm
{

    /**
     * @var AdminLargeTextBox
     */
    public $systemPrompt;

    public function getContent()
    {

        $model = new SystemPromptModel();

        $this->systemPrompt = new AdminLargeTextBox($this);
        $this->systemPrompt->label = $model->systemPrompt->label;

        return parent::getContent();
    }


    protected function loadUpdateForm()
    {

        $systemPromptRow = (new SystemPromptReader())->getRowById($this->dataId);
        $this->systemPrompt->value = $systemPromptRow->systemPrompt;

    }


    protected function onSave()
    {

        $builder = new SystemPromptBuilder($this->dataId);
        $builder->systemPrompt=$this->systemPrompt->getValue();
        $builder->buildContent();

    }
}