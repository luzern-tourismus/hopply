<?php

namespace LuzernTourismus\Hopply\Content\SystemPrompt;

use LuzernTourismus\Hopply\Data\SystemPrompt\SystemPromptReader;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Content\View\AbstractContentAdmin;
use Nemundo\Core\Type\Text\Html;

class SystemPromptAdmin extends AbstractContentAdmin
{

    protected function onIndex()
    {

        $table = new AdminTable($this);

        $reader = new SystemPromptReader();
        $reader->addOrder($reader->model->short);

        (new AdminTableHeader($table))
            ->addText($reader->model->short->label)
            ->addText($reader->model->systemPrompt->label)
            ->addText($reader->model->addOsterei->label)
            ->addEmpty(3);


        foreach ($reader->getData() as $systemPromptRow) {

            $row = new AdminTableRow($table);


            $row
                ->addText($systemPromptRow->short)
                ->addText((new Html($systemPromptRow->systemPrompt))->getValue())
                ->addYesNo($systemPromptRow->addOsterei);


            $row->addIconActionSite($this->getEditSite($systemPromptRow->id));
            //->addIconActionSite($this->getDeleteSite($easterEggRow->id));


        }

    }


}