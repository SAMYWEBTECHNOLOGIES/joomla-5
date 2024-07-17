<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Greetings
 * @author     Ankit Jagetia <akjagetia@gmail.com>
 * @copyright  2024 Samy Web Technologies
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

 use \Joomla\CMS\HTML\HTMLHelper;
 use \Joomla\CMS\Factory;
 use \Joomla\CMS\Uri\Uri;
 use \Joomla\CMS\Router\Route;
 use \Joomla\CMS\Language\Text;

// No direct access
defined('_JEXEC') or die;


$webassests = $this->document->getWebAssetManager();
$webassests->useScript('keepalive')
	->useScript('form.validate');
HTMLHelper::_('bootstrap.tooltip');

?>

<form 
    action="<?php echo Route::_('index.php?option=com_greetings&layout=edit&id=' . (int) $this->item->id); ?>"
    method="post" 
    enctype="multipart/form-data"
    name="adminForm"
    id="greeting-form" 
    class="form-validate form-horizontal"
>
    <div class="row-fluid">
        <legend>
            <?php echo Text::_('COM_GREETINGS_FIELDSET_GREETING'); ?>
        </legend>
        <?php echo $this->form->renderField('title'); ?>
    </div>
    <?php echo HTMLHelper::_('uitab.startTabSet', 'myTab', array('active' => 'greeting')); ?>
	<?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'greeting', Text::_('COM_GREETINGS_TAB_GREETING', true)); ?>
	<div class="row-fluid row">
		<div class="col-md-9 form-horizontal">			
				<?php echo $this->form->renderField('message'); ?>
		</div>
        <div class="col-md-3 form-horizontal">			
				<?php echo $this->form->renderField('state'); ?>
		</div>

	</div>
	<?php echo HTMLHelper::_('uitab.endTab'); ?>
    <?php echo HTMLHelper::_('uitab.endTabSet'); ?>
    
    <input type="hidden" name="jform[id]" value="<?php echo isset($this->item->id) ? $this->item->id : ''; ?>" />
    <input type="hidden" name="task" value=""/>
	<?php echo HTMLHelper::_('form.token'); ?>
</form>