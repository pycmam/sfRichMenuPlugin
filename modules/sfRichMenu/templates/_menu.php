<?php
/**
 * Шаблон генератора меню
 *
 * @author  Rustam Miniahmetov <pycmam@gmail.com>
 *
 * @param array items
 * @param array|Doctrine_Record $params
 */

$params = isset($params) ? $params : array();
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

                <?php
                if (substr($item['route'], 0, 4) == 'http') {
                    echo link_to($name, $item['route'], $item['link_attributes']->getRawValue());
                } else {
                    echo link_to($name, str_replace('&amp;', '&', $item['route']), $params, $item['link_attributes']->getRawValue());
                }
                ?>

                <?php if ($item['submenu']): ?>
                <ul class="submenu">
                    <?php include_component('sfRichMenu', 'menu', array('menu' => $item['submenu'])) ?>
                </ul>
                <?php endif ?>
            </li>
        <?php endif ?>
    <?php endforeach ?>
<?php endif ?>
