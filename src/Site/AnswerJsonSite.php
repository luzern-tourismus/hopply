<?php

namespace LuzernTourismus\Hopply\Site;

use LuzernTourismus\Hopply\Chatbot\Chatbot;
use LuzernTourismus\Hopply\Data\Log\Log;
use LuzernTourismus\Hopply\Data\Osterei\OstereiReader;
use LuzernTourismus\Hopply\Data\SystemPrompt\SystemPromptReader;
use Nemundo\Com\Device\BrowserInformation;
use Nemundo\Core\Json\JsonText;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Web\Site\AbstractSite;

class AnswerJsonSite extends AbstractSite
{

    /**
     * @var AnswerJsonSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'answer-public';
        AnswerJsonSite::$site = $this;

    }

    public function loadContent()
    {

        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        header("HTTP/1.1 200 OK");


        $body = file_get_contents('php://input');

        $json = json_decode($body, true);


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

        $jsonText = (new JsonText())->addData($data)->getJson();*/

        $systemPrompt = '';

        //$systemPromptRequest = new SystemPromptRequest();
        //if ($systemPromptRequest->hasValue()) {

        if (isset($json['systemprompt'])) {

            $reader = new SystemPromptReader();
            $reader->filter->andEqual($reader->model->short, $json['systemprompt']);  // $systemPromptRequest->getValue());
            foreach ($reader->getData() as $systemPromptRow) {
                $systemPrompt = $systemPromptRow->systemPrompt;

                if ($systemPromptRow->addOsterei) {

                    $data = [];
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

                    $jsonText = (new JsonText())->addData($data)->getJson();

                    $systemPrompt = $systemPrompt . ' ' . $jsonText;

                }

            }

        }

        $promt = $json['question'];

        $chatbot = new Chatbot();
        $chatbot->model ='gpt-4o-mini';   // 'gpt-4.1-nano';  //  'gpt-4o-mini';   // 'gpt-4.1-mini';  // 'gpt-4o-mini';
        $chatbot->systemPrompt = $systemPrompt;
        $chatbot->prompt = $promt;
        $answer = $chatbot->getAnswer();

        $data = [];
        $data['answer'] = $answer;

        echo json_encode($data);




    }
}