<?php

namespace LuzernTourismus\Hopply\Page;

use LuzernTourismus\Hopply\Com\Tab\HopplyTab;
use LuzernTourismus\Hopply\Data\Log\LogCount;
use LuzernTourismus\Hopply\Data\Log\LogReader;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Paragraph\Paragraph;

class LogPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new HopplyTab($layout);

        $p = new Paragraph($layout);
        $p->content = 'Total: '.(new LogCount())->getFormatCount();

        $table = new AdminTable($layout);

        $reader = new LogReader();

        $reader->addOrder($reader->model->id, SortOrder::DESCENDING);
        $reader->limit = 500;

        (new AdminTableHeader($table))
            ->addText($reader->model->date->label)
            ->addText($reader->model->time->label)
            ->addText($reader->model->ipAddress->label)
            ->addText($reader->model->browserAgent->label)
            ->addText($reader->model->prompt->label)
            ->addText($reader->model->answer->label)
            ->addText($reader->model->languageModel->label)
            ->addText($reader->model->promptToken->label)
            ->addText($reader->model->completionToken->label)
            ->addText($reader->model->totalToken->label)
            ->addText($reader->model->remainingToken->label)

        ;

        foreach ($reader->getData() as $logRow) {

            (new AdminTableRow($table))
                ->addText($logRow->date->getShortDateLeadingZeroFormat())
                ->addText($logRow->time->getTimeLeadingZero())
                ->addText($logRow->ipAddress)
                ->addText($logRow->browserAgent)
                ->addText($logRow->prompt)
                ->addText($logRow->answer)
                ->addText($logRow->languageModel)
                ->addText($logRow->promptToken)
                ->addText($logRow->completionToken)
                ->addText($logRow->totalToken)
                ->addText($logRow->remainingToken)

            ;

        }


        return parent::getContent();
    }
}