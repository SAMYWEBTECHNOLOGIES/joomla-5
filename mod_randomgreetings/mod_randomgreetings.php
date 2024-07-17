<?php

// No direct access to this file
defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Samywebtechnologies\Module\RandomGreetings\Site\Helper\RandomGreetingsHelper;

$messageData  = RandomGreetingsHelper::getRandomMessage();

if($messageData){
    $title= $messageData->title;
    $message= $messageData->message;
}else{
    $title='';
    $message='';
}
require ModuleHelper::getLayoutPath('mod_randomgreetings', $params->get('layout', 'default'));