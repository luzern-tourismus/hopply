<?php

require "config.php";

(new \LuzernTourismus\Hopply\WebComponent\WebComponentSetup())
    ->installCom('ltag-map.js')
    ->installCom('hopply-chatbot.js')
    ->installCom('hopply-chatbot.css')
    ->installCom('hopply-wait.svg');
