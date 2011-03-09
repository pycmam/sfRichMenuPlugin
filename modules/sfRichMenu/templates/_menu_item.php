<?php
/**
 * Пункт меню
 *
 * @param array item
 * @param array|Doctrine_Record $params
 */

use_helper('I18N');

$name = __($item['name']);
if (preg_match_all('/\%%([\w\/]+)\%%/', $item['name'], $matches)) {
    foreach ($matches[1] as $match) {
        $name = str_replace('%%'.$match.'%%', get_partial($match), $name);
    }
}
?>

<?php echo link_to($name, $item['route'], $params->getRawValue(), $item['link_attributes']->getRawValue()) ?>

<?php if ($item['submenu']): ?>
<ul class="submenu">
    <?php include_component('sfRichMenu', 'menu', array('menu' => $item['submenu'])) ?>
</ul>
<?php endif ?>
