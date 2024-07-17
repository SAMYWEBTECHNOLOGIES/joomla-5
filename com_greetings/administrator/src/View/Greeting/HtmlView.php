<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Greetings
 * @author     Ankit Jagetia <akjagetia@gmail.com>
 * @copyright  2024 Samy Web Technologies
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Samywebtechnologies\Component\Greetings\Administrator\View\Greeting;
// No direct access
defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use \Joomla\CMS\Toolbar\ToolbarHelper;
use \Joomla\CMS\Factory;
use \Joomla\CMS\Language\Text;


class HtmlView extends BaseHtmlView
{
    protected $state;

	protected $item;

	protected $form;


    public function display($tpl=null){

        $this->state= $this->get('State');
        $this->item  = $this->get('Item');
		$this->form  = $this->get('Form');


        $this->addToolbar();
		
		parent::display($tpl);

    }

    public function addToolbar(){
        
        Factory::getApplication()->input->set('hidemainmenu', true);
		$isNew = ($this->item->id == 0);

        ToolbarHelper::title(Text::_('COM_GREETINGS_TITLE_GREETING'), "generic");
        ToolbarHelper::save('greeting.apply', 'JTOOLBAR_APPLY');
        ToolbarHelper::save('greeting.save', 'JTOOLBAR_SAVE');

        if ($isNew)
		{
			ToolbarHelper::cancel('greeting.cancel', 'JTOOLBAR_CANCEL');
		}
		else
		{
			ToolbarHelper::cancel('greeting.cancel', 'JTOOLBAR_CLOSE');
		}
    }
}