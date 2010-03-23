<?php
/**
 * Шаблон генератора меню
 *
 * @author  Rustam Miniahmetov <pycmam@gmail.com>
 *
 * @param array items
 */
?>

<?php use_helper('I18N') ?>

<?php if(count($items)): ?>
    <?php foreach($items as $item): ?>
        <?php if ($item): ?>
            <?php echo tag('li', $item['attributes']->getRawValue(), true) ?>
                <?php
                    $name = $item['name'];
                    if (preg_match_all('/\%%([\w\/]+)\%%/', $item['name'], $matches)) {
                        foreach ($matches[1] as $match) {
                            $name = str_replace('%%'.$match.'%%', get_partial($match), $name);
                        }
                    }
                ?>
                <?php echo link_to(__($name), $item['route']) ?>
            </li>
        <?php endif ?>
    <?php endforeach ?>
<?php endif ?>
