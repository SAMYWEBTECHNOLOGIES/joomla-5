<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Greetings
 * @author     Ankit Jagetia <akjagetia@gmail.com>
 * @copyright  2024 Samy Web Technologies
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Samywebtechnologies\Component\Greetings\Administrator\Table;
// No direct access
defined('_JEXEC') or die;

use \Joomla\CMS\Table\Table as Table;
use \Joomla\Database\DatabaseDriver;


/**
 * Greeting table
 *
 * @since 1.0.0
 */
class GreetingTable extends Table 
{

	public function __construct(DatabaseDriver $db)
	{
		$this->typeAlias = 'com_greetings.greeting';
		parent::__construct('#__greetings', 'id', $db);
		$this->setColumnAlias('published', 'state');
		
	}

}