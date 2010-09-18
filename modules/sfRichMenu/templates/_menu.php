<?php
/**
 * Шаблон генератора меню
 *
 * @author  Rustam Miniahmetov <pycmam@gmail.com>
 *
 * @param array items
 * @param array|Doctrine_Record $params
 */

if (!isset($params)) {
    $params = array();
}
if (is_object($params) && $params instanceof sfOutputEscaper) {
    $params = $params->getRawValue();
}
?>

<?php use_helper('I18N') ?>

<?php if(count($items)): ?>
    <?php foreach($items as $item): ?>
        <?php if ($item): ?>
            <?php echo tag('li', $item['attributes']->getRawValue(), true) ?>
                <?php
                    $name = __($item['name']);
                    if (preg_match_all('/\%%([\w\/]+)\%%/', $item['name'], $matches)) {
                        foreach ($matches[1] as $match) {
                            $name = str_replace('%%'.$match.'%%', get_partial($match), $name);
                        }
                    }
                ?>
                <?php echo link_to($name, $item['route'], $params, $item['link_attributes']->getRawValue()) ?>
            </li>
        <?php endif ?>
    <?php endforeach ?>
<?php endif ?>
