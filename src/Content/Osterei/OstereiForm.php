<?php

namespace LuzernTourismus\Hopply\Content\Osterei;

use LuzernTourismus\Hopply\Data\Osterei\OstereiModel;
use LuzernTourismus\Hopply\Data\Osterei\OstereiReader;
use Nemundo\Admin\Com\ListBox\AdminLargeTextBox;
use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Content\Form\AbstractContentForm;
use OpenLuv\App\EasterEgg\Content\EasterEgg\EasterEggBuilder;
use OpenLuv\App\EasterEgg\Data\EasterEgg\EasterEggModel;
use OpenLuv\App\EasterEgg\Data\EasterEgg\EasterEggReader;

class OstereiForm extends AbstractContentForm
{


    /**
     * @var AdminTextBox
     */
    private $ort;

    /**
     * @var AdminLargeTextBox
     */
    private $tipp;

    public function getContent()
    {

        $model = new OstereiModel();

        $this->tipp = new AdminLargeTextBox($this);
        $this->tipp->label = $model->tipp->label;

        return parent::getContent();
    }


    protected function loadUpdateForm()
    {

        $easterEggRow = (new OstereiReader())->getRowById($this->dataId);

        $this->tipp->value = $easterEggRow->tipp;

    }


    protected function onSave()
    {

        $builder = new OstereiBuilder($this->dataId);
        $builder->tipp = $this->tipp->getValue();
        $builder->buildContent();

    }


}