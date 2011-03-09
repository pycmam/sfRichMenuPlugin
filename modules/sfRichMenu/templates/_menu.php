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

<?php if(count($items)): ?>
    <?php foreach($items as $item): ?>
        <?php if ($item): ?>
            <?php echo tag('li', $item['attributes']->getRawValue(), true) ?>
                <?php include_partial('sfRichMenu/menu_item', array('item' => $item, 'params' => $params)); ?>
            </li>
        <?php endif ?>
    <?php endforeach ?>
<?php endif ?>
