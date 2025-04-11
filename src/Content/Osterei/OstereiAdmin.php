<?php

namespace LuzernTourismus\Hopply\Content\Osterei;

use chillerlan\QRCode\QRCode;
use LuzernTourismus\Hopply\Data\Osterei\OstereiReader;
use LuzernTourismus\Hopply\Parameter\OstereiParameter;
use LuzernTourismus\Hopply\Site\QrScanSite;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Content\View\AbstractContentAdmin;
use Nemundo\Html\Image\Img;


class OstereiAdmin extends AbstractContentAdmin
{

    protected function onIndex()
    {

        $table = new AdminTable($this);

        $reader = new OstereiReader();

        (new AdminTableHeader($table))
            ->addText($reader->model->nummer->label)
            ->addText($reader->model->tipp->label)
            ->addText($reader->model->gefunden->label)
            ->addText($reader->model->gefundenDateTime->label)
            ->addEmpty(3);


        foreach ($reader->getData() as $easterEggRow) {

            $row = new AdminTableRow($table);


            $row
                ->addText($easterEggRow->nummer)
                ->addText($easterEggRow->tipp)
                ->addYesNo($easterEggRow->gefunden)
                ->addText($easterEggRow->gefundenDateTime->getShortDateTimeLeadingZeroFormat())
                ->addIconActionSite($this->getEditSite($easterEggRow->id))
                ->addIconActionSite($this->getDeleteSite($easterEggRow->id));

            $site = clone(QrScanSite::$site);
            $site->addParameter(new OstereiParameter($easterEggRow->uniqueId));

            $data = $site->getUrlWithDomain();   //   'https://www.srf.ch/';  // 'otpauth://totp/test?secret=B3JX4VCVJDVNXNZ5&issuer=chillerlan.net';


            $row->addHyperlink($data);

// quick and simple:
            //echo '<img src="'.(new QRCode)->render($data).'" alt="QR Code" />';

            $img = new Img($row);
            $img->src = (new QrCode)->render($data);
            $img->width = 300;


        }

    }


}