<?php

namespace LuzernTourismus\Hopply\Content\SystemPrompt;

use LuzernTourismus\Hopply\Data\Osterei\OstereiReader;
use LuzernTourismus\Hopply\Data\SystemPrompt\SystemPromptReader;
use LuzernTourismus\Hopply\Parameter\OstereiParameter;
use LuzernTourismus\Hopply\Site\QrScanSite;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Content\View\AbstractContentAdmin;

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
                ->addText($systemPromptRow->systemPrompt)
                ->addYesNo($systemPromptRow->addOsterei);


            $row->addIconActionSite($this->getEditSite($systemPromptRow->id));
            //->addIconActionSite($this->getDeleteSite($easterEggRow->id));


        }

    }


}