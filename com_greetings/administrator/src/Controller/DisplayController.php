<?php

/**
 * @version    1.0.0
 * @package    Com_Greetings
 * @author     Ankit Jagetia <akjagetia@gmail.com>
 * @copyright  2024 Samy Web Technologies
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Samywebtechnologies\Component\Greetings\Administrator\Controller;

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Router\Route;

/**
 * Greetings master display controller.
 *
 * @since  1.0.0
 */
class DisplayController extends BaseController
{

	protected $default_view = 'greetings';


	public function display($cachable = false, $urlparams = array())
	{
		return parent::display();
	}
}
