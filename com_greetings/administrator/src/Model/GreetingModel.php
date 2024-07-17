<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Greetings
 * @author     Ankit Jagetia <akjagetia@gmail.com>
 * @copyright  2024 Samy Web Technologies
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Samywebtechnologies\Component\Greetings\Administrator\Model;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Model\AdminModel;

// No direct access.
defined('_JEXEC') or die;



class GreetingModel extends AdminModel
{


    public function getTable($type = 'Greeting', $prefix = 'Administrator', $config = array())
	{
		return parent::getTable($type, $prefix, $config);
	}


    public function getForm($data=array(), $loadData=true)
    {
        
        $form = $this->loadForm(
                    'com_greetings.greeting', 
                    'greeting',
                     array(
                        'control' => 'jform',
                        'load_data' => $loadData 
                     )
                );

        if(!empty($form)){
            return $form;
        }
        return false;
    }


    protected function loadFormData(){

        // Checking the data in the session first

        $data = Factory::getApplication()->getUserState('com_greetings.edit.greeting.data', array());
        
        if(empty($data)){

            $data= $this->getItem();
        }

        return $data;
    }

    // 
    protected function prepareTable($table){
        jimport('joomla.filter.output');

		if (empty($table->id))
		{
			// Set ordering to the last item if not set
			if ($table->ordering === '')
			{
				$db = $this->getDbo();
				$db->setQuery('SELECT MAX(ordering) FROM #__greetings');
				$max             = $db->loadResult();
				$table->ordering = $max + 1;
			}
		}
    }

}