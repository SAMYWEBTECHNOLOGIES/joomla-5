<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Greetings
 * @author     Ankit Jagetia <akjagetia@gmail.com>
 * @copyright  2024 Samy Web Technologies
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Samywebtechnologies\Component\Greetings\Administrator\View\Greetings;
// No direct access
defined('_JEXEC') or die;

use \Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use \Samywebtechnologies\Component\Greetings\Administrator\Helper\GreetingsHelper;
use \Joomla\CMS\Toolbar\Toolbar;
use \Joomla\CMS\Toolbar\ToolbarHelper;
use \Joomla\CMS\Language\Text;
use \Joomla\Component\Content\Administrator\Extension\ContentComponent;
use \Joomla\CMS\Form\Form;
use \Joomla\CMS\HTML\Helpers\Sidebar;

class HtmlView extends BaseHtmlView
{
    protected $items;

	protected $pagination;

	protected $state;
  


    public function display($tpl=null)
    {
        $this->state = $this->get('State');
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');
		$this->filterForm = $this->get('FilterForm');
		$this->activeFilters = $this->get('ActiveFilters');   


        $this->addToolbar();

		$this->sidebar = Sidebar::render();
		parent::display($tpl);
    }

    protected function addToolBar(){
       
        ToolbarHelper::title(Text::_('COM_GREETINGS_TITLE_GREETINGS'), "generic");

        $toolbar = Toolbar::getInstance('toolbar');

        $formPath = JPATH_COMPONENT_ADMINISTRATOR . '/src/View/Greetings';

        if(file_exists($formPath)){
            $toolbar->addNew('greeting.add');

        }

        if (isset($this->items[0]->state))
			{
				$toolbar->publish('greetings.publish')->listCheck(true);
				$toolbar->unpublish('greetings.unpublish')->listCheck(true);
			}
	    if (isset($this->items[0]))
			{
				// If this component does not use state then show a direct delete button as we can not trash
				$toolbar->delete('greetings.delete')
				        ->text('JTOOLBAR_DELETE')
				        ->message('JGLOBAL_CONFIRM_DELETE')
				        ->listCheck(true);
			}

        Sidebar::setAction('index.php?option=com_greetings&view=greetings');

    }

    public function getState($state)
	{
		return isset($this->state->{$state}) ? $this->state->{$state} : false;
	}
}