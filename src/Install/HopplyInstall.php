<?php

namespace LuzernTourismus\Hopply\Install;

use LuzernTourismus\Hopply\Application\HopplyApplication;
use LuzernTourismus\Hopply\Data\HopplyModelCollection;
use LuzernTourismus\Hopply\Data\LargeLanguageModel\LargeLanguageModel;
use LuzernTourismus\Hopply\Data\Osterei\Osterei;
use LuzernTourismus\Hopply\Data\SystemPrompt\SystemPrompt;
use LuzernTourismus\Hopply\Script\CleanScript;
use LuzernTourismus\Hopply\Usergroup\HopplyUsergroup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\Application\ContentApplication;
use Nemundo\Core\Random\UniqueId;
use Nemundo\Core\Structure\ForLoop;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\User\Setup\UsergroupSetup;

class HopplyInstall extends AbstractInstall
{
    public function install()
    {

        (new ContentApplication())->installApp();

        (new ModelCollectionSetup())->addCollection(new HopplyModelCollection());
        (new UsergroupSetup())->addUsergroup(new HopplyUsergroup());
        (new ScriptSetup(new HopplyApplication()))
            ->addScript(new CleanScript());

        $loop = new ForLoop();
        $loop->minNumber = 1;
        $loop->maxNumber = 25;
        foreach ($loop->getData() as $number) {

            $data = new Osterei();
            $data->ignoreIfExists = true;
            $data->tipp = '';
            $data->nummer = $number;
            $data->gefunden = false;
            $data->uniqueId = (new UniqueId())->getUniqueId();
            $data->save();

        }


        /*$chatbot = new \LuzernTourismus\Hopply\Chatbot\Chatbot();
        foreach ($chatbot->getModel() as $modelName) {
            $data = new LargeLanguageModel();
            $data->ignoreIfExists = true;
            $data->largeLanguageModel = $modelName;
            $data->save();
        }*/

        $this
            ->addModel('gpt-4o')
            ->addModel('o3-mini')
            ->addModel('gpt-4o-mini');

        $this
            ->addSystemPrompt('pre-easter',false)
            ->addSystemPrompt('easter',true);

    }


    private function addModel($modelName)
    {

        $data = new LargeLanguageModel();
        $data->ignoreIfExists = true;
        $data->largeLanguageModel = $modelName;
        $data->save();

        return $this;

    }


    private function addSystemPrompt($short,$addOsterei)
    {

        $data = new SystemPrompt();
        $data->ignoreIfExists = true;
        $data->short = $short;
        $data->systemPrompt='';
        $data->addOsterei = $addOsterei;
        $data->save();

        return $this;

    }

}