<?php
/**
 * Табы
 *
 * @author  Rustam Miniahmetov <pycmam@gmail.com>
 *
 * @param array items
 * @param array|Doctrine_Record $params
 */

$params = isset($params) ? $params : array();
?>

<?php use_helper('I18N'); ?>

<?php if(count($items)): ?>
    <?php foreach($items as $item): ?>
        <?php if ($item): ?>

            <div class="<?php echo join(' ', array_values($item['attributes']->getRawValue())); ?>"><div class="cmi_body"><div class="cmi_left"><div class="cmi_right">

            <?php
                $name = __($item['name']);
                if (preg_match_all('/\%%([\w\/]+)\%%/', $item['name'], $matches)) {
                    foreach ($matches[1] as $match) {
                        $name = str_replace('%%'.$match.'%%', get_partial($match), $name);
                    }
                }

                if (substr($item['route'], 0, 4) == 'http') {
                    echo link_to(image_tag($item['image'])."\n".$name, $item['route'], $item['attributes']->getRawValue());
                } else {
                    echo link_to(image_tag($item['image'])."\n".$name, $item['route'], $params, $item['attributes']->getRawValue());
                }
            ?>

            </div></div></div></div>

        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>
