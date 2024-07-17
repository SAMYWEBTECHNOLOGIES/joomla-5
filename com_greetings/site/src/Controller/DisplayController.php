<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Greetings
 * @author     Ankit Jagetia <akjagetia@gmail.com>
 * @copyright  2024 Samy Web Technologies
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Samywebtechnologies\Component\Greetings\Site\Controller;

use Joomla\CMS\MVC\Factory\MVCFactoryInterface;

\defined('_JEXEC') or die;



/**
 * Display Component Controller
 *
 * @since  1.0.0
 */
class DisplayController extends \Joomla\CMS\MVC\Controller\BaseController
{
	public function __construct($config = array(), MVCFactoryInterface $factory = null, $app = null, $input = null)
	{
		parent::__construct($config, $factory, $app, $input);
	}

	public function display($cachable = false, $urlparams = false)
	{
		
		

		parent::display($cachable, $urlparams);
		return $this;
	}
}
