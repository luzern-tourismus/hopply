<?php

namespace LuzernTourismus\Hopply\Site\Json;

use LuzernTourismus\Hopply\Chatbot\Chatbot;
use LuzernTourismus\Hopply\Data\Osterei\OstereiCount;
use LuzernTourismus\Hopply\Data\Osterei\OstereiReader;
use LuzernTourismus\Hopply\Data\SystemPrompt\SystemPromptReader;
use Nemundo\Core\Json\JsonText;
use Nemundo\Web\Site\AbstractSite;

class EggCounterJsonSite extends AbstractSite
{

    /**
     * @var AnswerJsonSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'egg-count';
        EggCounterJsonSite::$site = $this;

    }

    public function loadContent()
    {

        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        header("HTTP/1.1 200 OK");


        //$body = file_get_contents('php://input');

        //$json = json_decode($body, true);


        $count = new OstereiCount();
        $total = $count->getCount();

        $count = new OstereiCount();
        $count->filter->andEqual($count->model->gefunden,true);
        $gefunden = $count->getCount();

        $data = [];
        $data['gefunden'] = $gefunden;
        $data['total'] = $total;

        echo json_encode($data);

        /*
        $data=[];
        $reader = new OstereiReader();
        $reader->addRandomOrder();
        foreach ($reader->getData() as $ostereiRow) {

            $row = [];
            //$row[$reader->model->nummer->fieldName] = $ostereiRow->nummer;
            $row[$reader->model->tipp->fieldName] = $ostereiRow->tipp;
            $row[$reader->model->gefunden->fieldName] = $ostereiRow->gefunden;
            $row[$reader->model->gefundenDateTime->fieldName] = $ostereiRow->gefundenDateTime->getIsoDateTime();

            $data[] = $row;

        }



        $data = [];
        $data['answer'] = $answer;

        echo json_encode($data);*/




    }
}