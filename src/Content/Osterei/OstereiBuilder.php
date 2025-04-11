<?php

namespace LuzernTourismus\Hopply\Content\Osterei;

use LuzernTourismus\Hopply\Data\Osterei\Osterei;
use LuzernTourismus\Hopply\Data\Osterei\OstereiReader;
use LuzernTourismus\Hopply\Data\Osterei\OstereiUpdate;
use Nemundo\Content\Type\AbstractContentBuilder;
use Nemundo\Core\Random\UniqueId;
use Nemundo\Db\Sql\Order\SortOrder;


class OstereiBuilder extends AbstractContentBuilder
{

    public $tipp;

    //public $nummer;

    protected function loadBuilder()
    {
        $this->contentType = new OstereiType();
    }

    protected function onCreate()
    {

        $nummer = 0;

        $reader = new OstereiReader();
        $reader->addOrder($reader->model->nummer, SortOrder::DESCENDING);
        $reader->limit = 1;
        foreach ($reader->getData() as $ostereiRow) {
            $nummer = $ostereiRow->nummer;
        }

        $nummer++;

        $data = new Osterei();
        $data->tipp = $this->tipp;
        $data->nummer = $nummer;  // $this->nummer;
        $data->gefunden = false;
        $data->uniqueId = (new UniqueId())->getUniqueId();
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {

        $update = new OstereiUpdate();
        $update->tipp = $this->tipp;
        $update->updateById($this->dataId);

    }
}