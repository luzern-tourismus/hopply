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
use Nemundo\Db\Sql\Field\CountField;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Paragraph\Paragraph;

class StatistikPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new HopplyTab($layout);

        $table = new AdminTable($layout);

        $reader = new LogReader();

        $reader
            ->addGroup($reader->model->date)
            ->addOrder($reader->model->date);
            //->addOrder($reader->model->id, SortOrder::DESCENDING);
        //$reader->limit = 500;

        $count = new CountField($reader);

        (new AdminTableHeader($table))
            ->addText($reader->model->date->label)
            ->addText('Anzahl Anfragen');

        foreach ($reader->getData() as $logRow) {

            (new AdminTableRow($table))
                ->addText($logRow->date->getShortDateLeadingZeroFormat())
                ->addText($logRow->getModelValue($count));

        }

        return parent::getContent();
    }
}