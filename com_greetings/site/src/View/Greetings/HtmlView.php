<?php

/**
 * @version    CVS: 1.0.0
 * @package    Com_Greetings
 * @author     Ankit Jagetia <akjagetia@gmail.com>
 * @copyright  2024 Samy Web Technologies
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Samywebtechnologies\Component\Greetings\Site\View\Greetings;
// No direct access
defined('_JEXEC') or die;

use \Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use \Joomla\CMS\Factory;
use \Joomla\CMS\Language\Text;

/**
 * View class for a list of Greetings.
 *
 * @since  1.0.0
 */
class HtmlView extends BaseHtmlView
{
	protected $items;

	protected $pagination;

	protected $state;


	/**
	 * Display the view
	 *
	 * @param   string  $tpl  Template name
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public function display($tpl = null)
	{	
		$app = Factory::getApplication();

		$this->state        = $this->get('State');
		$this->items        = $this->get('Items');
		$this->pagination   = $this->get('Pagination');
		$this->filterForm = $this->get('FilterForm');
		$this->activeFilters = $this->get('ActiveFilters');   

		parent::display($tpl);
	}

    public function getState($state)
	{
		return isset($this->state->{$state}) ? $this->state->{$state} : false;
	}

}