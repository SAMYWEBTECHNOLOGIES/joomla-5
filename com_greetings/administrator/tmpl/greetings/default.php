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
use \Joomla\CMS\Uri\Uri;
use \Joomla\CMS\Router\Route;
use \Joomla\CMS\Layout\LayoutHelper;
use \Joomla\CMS\Language\Text;
use Joomla\CMS\Session\Session;

HTMLHelper::_('bootstrap.tooltip');


$user      = Factory::getApplication()->getIdentity();
$userId    = $user->get('id');
$listOrder = $this->state->get('list.ordering');
$listDirn  = $this->state->get('list.direction');

$listOrder=  "a.ordering";
if($listOrder=="a.ordering"){
    $saveOrdering =1;
}

if (!empty($saveOrdering))
{
	$saveOrderingUrl = 'index.php?option=com_greetings&task=greetings.saveOrdering&tmpl=component&' . Session::getFormToken() . '=1';
	HTMLHelper::_('draggablelist.draggable');
}

?>

<form action="<?php echo Route::_('index.php?option=com_greetings&view=greetings'); ?>" method="post"  name="adminForm" id="adminForm">

<div class="row">
    <div class="col-md-12">
        <div id="j-main-container" class="j-main-container">
            <?php echo LayoutHelper::render('joomla.searchtools.default', array('view' => $this)); ?>
            <div class="clearfix"></div>
            <table class="table table-striped" id="greetingList">
                <thead>
                    <tr>
                        <th class="w-1 text-center">
                            <input type="checkbox" autocomplete="off" class="form-check-input" name="checkall-toggle" value="" title="<?php echo Text::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)"/>
                        </th>
                    <?php if (isset($this->items[0]->ordering)): ?>
					    <th scope="col" class="w-1 text-center d-none d-md-table-cell">
					            <?php echo HTMLHelper::_('searchtools.sort', '', 'a.ordering', $listDirn, $listOrder, null, 'asc', 'JGRID_HEADING_ORDERING', 'icon-menu-2'); ?>
					    </th>
					<?php endif; ?>
                        
                        <th  scope="col" class="w-1 text-center">
						    <?php echo HTMLHelper::_('searchtools.sort', 'JSTATUS', 'a.state', $listDirn, $listOrder); ?>
					    </th>

                        <th class='left'>
							<?php echo Text::_( 'COM_GREETINGS_GREETINGS_TITLE'); ?>
						</th>
                        <th class=''>
							<?php echo Text::_( 'COM_GREETINGS_GREETINGS_MESSAGE'); ?>
						</th>

                        <th scope="col" class="w-3 d-none d-lg-table-cell" >
						    <?php echo HTMLHelper::_('searchtools.sort',  'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>					
                        </th>
					</tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="10">
							<?php echo $this->pagination->getListFooter(); ?>
						</td>
                    </tr>
                </tfoot>

                <tbody
                    <?php if (!empty($saveOrdering)) :?>
                        class="js-draggable" 
                        data-url="<?php echo $saveOrderingUrl; ?>" 
                        data-direction="<?php echo strtolower($listDirn); ?>" 
                    <?php endif; ?>>
                    <?php if ($this->items){ ?>
                    <?php foreach($this->items as $k => $item):
                                $ordering   = ($listOrder == 'a.ordering');
                            ?>
                                <tr  class="row<?php echo $k % 2; ?>" data-draggable-group='1' data-transition>

                                    <td class ="text-center">
                                        <?php echo HTMLHelper::_('grid.id', $k, $item->id); ?>
                                    </td>

                                    <td class="text-center d-none d-md-table-cell">
							            <?php
							            $iconClass = '';
							            if (!$saveOrdering){
								            $iconClass = ' inactive" title="' . Text::_('JORDERINGDISABLED');
							            }							
                                        ?>							
                                        <span class="sortable-handler<?php echo $iconClass ?>">
							                <span class="icon-ellipsis-v" aria-hidden="true"></span>
							            </span>
							            <?php if ( $saveOrdering) : ?>
							            <input type="text" name="order[]" size="5" value="<?php echo $item->ordering; ?>" class="width-20 text-area-order hidden">
								        <?php endif; ?>
							        </td>

                                    <td class="text-center">
								        <?php echo HTMLHelper::_('jgrid.published', $item->state, $k, 'greetings.', 1, 'cb'); ?>
							        </td>
                                    <td>
                                        <a href="<?php echo Route::_('index.php?option=com_greetings&view=greeting&layout=edit&id='.(int) $item->id); ?>">
									        <?php echo $this->escape($item->title); ?>
									    </a>
                                    </td>
                                    <td>
                                        <?php 
                                        if (strlen($item->message) > 50) {
                                            $truncated_string = substr($item->message, 0, 50) . "...";
                                        } else {
                                            $truncated_string = $item->message;
                                        }
                                        echo  $truncated_string; ?>
                                    </td>
                                    <td class="d-none d-lg-table-cell">
							            <?php echo $item->id; ?>
							        </td>
                                </tr>
                        
                    <?php endforeach; ?>

                    <?php }else{?>
                        <tr>
                        <td colspan="10">
                            <div class="alert alert-info text-center" role="alert">
                            <?php  echo Text::_('COM_GREETINGS_NO_RECORD_FOUND')?>
                        </div>
						</td>
                    </tr>
                       
                    <?php }?>
               
                    
                </tbody>
            </table>
                <input type="hidden" name="task" value=""/>
				<input type="hidden" name="boxchecked" value="0"/>
				<input type="hidden" name="list[fullorder]" value="<?php echo $listOrder; ?> <?php echo $listDirn; ?>"/>
				<?php echo HTMLHelper::_('form.token'); ?>
        </div>
    </div>
    </div>
</form>