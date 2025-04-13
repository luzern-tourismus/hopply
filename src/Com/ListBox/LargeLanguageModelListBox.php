<?php

namespace LuzernTourismus\Hopply\Com\ListBox;

use LuzernTourismus\Hopply\Data\LargeLanguageModel\LargeLanguageModelReader;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class LargeLanguageModelListBox extends AdminListBox
{
    public function getContent()
    {
        $this->label = 'Large Language Model';

        $reader = new LargeLanguageModelReader();
        $reader->addOrder($reader->model->largeLanguageModel);
        foreach ($reader->getData() as $languageModelRow) {
            $this->addItem($languageModelRow->largeLanguageModel,$languageModelRow->largeLanguageModel);
        }


        return parent::getContent();
    }
}