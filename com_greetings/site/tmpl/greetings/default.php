<?php

/**
 * @version    CVS: 1.0.0
 * @package    Com_Greetings
 * @author     Ankit Jagetia <akjagetia@gmail.com>
 * @copyright  2024 Samy Web Technologies
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

use \Joomla\CMS\HTML\HTMLHelper;
use \Joomla\CMS\Factory;

HTMLHelper::_('bootstrap.tooltip');


$user       = Factory::getApplication()->getIdentity();
$userId     = $user->get('id');


?>
<div class="container-fluid">

	<?php foreach ($this->items as $i => $item) : ?>
		<div class="card w-75 mb-3">
			<div class="card-body">
				<h5 class="card-title"><?php echo $item->title ?></h5>
				<p class="card-text"><?php echo $item->message ?></p>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<div class="pagination">
	<?php echo $this->pagination->getPagesLinks(); ?>
</div>