<?php

namespace Samywebtechnologies\Module\RandomGreetings\Site\Helper;
use Exception;
use Joomla\CMS\Factory;

class RandomGreetingsHelper
{

    public static function getRandomMessage()
    {
        $db = Factory::getDbo();
        try {
        $query = $db->getQuery(true);
        $query->select('*')
            ->from($db->quoteName('#__greetings'))
            ->order('RAND()')
            ->setLimit(1); // Limit to one random row
        $db->setQuery($query);
        $result = $db->loadObject();
        if ($result) {
           return $result;
        } 
        return false;
    
        } catch (Exception $e) {
            return false;
        }
    }
}
