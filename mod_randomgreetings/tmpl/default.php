
<?php
// No direct access to this file

use Joomla\CMS\Language\Text;

defined('_JEXEC') or die;


?>

<div class="container">

<?php if($title || $message){ ?>
    <div>
        <h4> <?php echo $title ?></h4>
        <div><?php echo $message ?></div>
    </div>

<?php }else{?>

    <div> <?php echo Text::_('MOD_RANDOM_GREETING_NO_RECORD_FOUND')?></div>
<?php } ?>

</div>
