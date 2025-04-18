<?php

namespace LuzernTourismus\Hopply\Chatbot;

use LuzernTourismus\Hopply\Data\Log\Log;
use Nemundo\Com\Device\BrowserInformation;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Project\Config\ProjectConfigReader;

class Chatbot extends AbstractBase
{

    public $systemPrompt = '';

    public $prompt;

    public $model;

    private $client;


    public function __construct()
    {

        $apiKey = (new ProjectConfigReader())->getValue('open_ai_api_key');
        $this->client = \OpenAI::client($apiKey);

    }


    public function getAnswer()
    {

        $result = $this->client->chat()->create([
            'model' => $this->model,
            'messages' => [
                ['role' => 'developer', 'content' => $this->systemPrompt],
                ['role' => 'user', 'content' => $this->prompt],
            ],
        ]);

        //(new Debug())->write($result);

        $answer = $result['choices'][0]['message']['content'];

        $answer = (new Text($answer))
            ->replace('ß', 'ss')
            ->replace('ß', 'ss')
            ->getValue();

        $now = (new DateTime())->setNow();
        $browser = new BrowserInformation();

        $data = new Log();
        $data->date = $now->getDate();
        $data->time = $now->getTime();
        $data->browserAgent = $browser->getBrowserAgent();
        $data->ipAddress = $browser->getIpAddress();
        $data->prompt = $this->prompt;
        $data->answer = $answer;
        $data->languageModel =  $result['model'];
        $data->promptToken = $result->usage->promptTokens;
        $data->completionToken= $result->usage->completionTokens;
        $data->totalToken= $result->usage->totalTokens;
        $data->remainingToken=$result->meta()->tokenLimit->remaining;
        $data->save();

        return $answer;

    }


    public function getHtmlAnswer()
    {

        $answer = $this->getAnswer();

        $html = (new Html($answer))->getValue();

        return $html;

    }


    public function getModel()
    {

        $response = $this->client->models()->list();

        $list = [];
        foreach ($response->data as $result) {

            if ($result->object == 'model') {
                $list[] = $result->id;
            }

        }

        return $list;

    }

}