<?php

namespace LuzernTourismus\Hopply\Site;

use LuzernTourismus\Hopply\Chatbot\Chatbot;
use LuzernTourismus\Hopply\Data\Osterei\OstereiReader;
use LuzernTourismus\Hopply\Data\SystemPrompt\SystemPromptReader;
use LuzernTourismus\Hopply\Request\SystemPromptRequest;
use Nemundo\Core\Json\JsonText;
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
            $reader->filter->andEqual($reader->model->short,$json['systemprompt']);  // $systemPromptRequest->getValue());
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


        $chatbot = new Chatbot();
        $chatbot->model ='gpt-4.1-mini';  // 'gpt-4o-mini';
        $chatbot->systemPrompt = $systemPrompt;

        /*
         *  Uncaught OpenAI\Exceptions\ErrorException: Rate limit reached for gpt-4o-mini in organization org-lN17y6DNUjlyfiY6tuQzM27Z on requests per day (RPD): Limit 10000, Used 10000, Requested 1. Please try again in 8.64s. Visit https://platform.openai.com/account/rate-limits to learn more. in /home/luzernco/public_html/data_luzern_com/vendor/openai-php/client/src/Transporters/HttpTransporter.php:133 Stack trace: #0 /home/luzernco/public_html/data_luzern
         *
         *
        'Du bist "Hopply" und bist der Osterhase der Stadt Luzern.
Du hast Osternester/Ostereier in der Stadt Luzern versteckt. 
Du bist noch bschäftigt mit dem verstecken der Ostereier. Ab Donnerstag kannst du Tipps geben.';
*/


        /*
        Aber


Du wünsccht immer viel Spass bei der Suche oder etwas ähnliches.
Schreibe nie ein Doppel s, sondern immer ss. 

Daten für die Osternester/Ostereier:

- im feld "tipp" ist ein tipp, den du geben kannst oder auch nicht
- im feld "gefunden" ist vermekt, ob das osternest schon gefunden ist
- im feld "gefunden_date_time" ist der zeitpunkt als es gefunden wurde, wurde es gefunden gibst du das datum und uhrzeit an. das datum gibst du in deutschem datums format an. die uhrzeit ohne sekunden.
- gib jeweils nur für ein osternest auskunft oder tipps
- falls ein osternest gefunden wurde, dann gibst du kein tipp mehr

' . $jsonText;*/

        $chatbot->prompt = $json['question'];

        $data = [];
        $data['answer'] = $chatbot->getAnswer();

        echo json_encode($data);

    }
}