<?php
/**
 * Created by PhpStorm.
 * User: paulc
 * Date: 20/3/2019
 * Time: 15:20
 */

?>

<?php

$resource = osc_reset_resources();
$image = osc_base_url() . $resource['s_path'] . $resource['pk_i_id'] . '.' . $resource['s_extension'];
$preferences = json_decode(osc_get_preference('social_share_active_links'));
?>
    <div class="social-share">
        <div class="effect jaques">
            <div class="buttons">
                <?php
                foreach ($preferences as $key => $value) {
                    switch ($key) {
                        case 'Facebook':
                            if ($value == 'on') {
                                ?>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode(osc_item_url()); ?>&t=<?php echo osc_item_title(); ?>"
                                   class="fb shareable"
                                   title="Facebook" target="_blank">
                                    <i class="icon-facebook" aria-hidden="true"></i>
                                </a>
                                <?php
                            }
                            break;
                        case 'Twitter':
                            if ($value == 'on') {
                                ?>
                                <a href="https://twitter.com/home?status=<?php echo rawurlencode(osc_item_url()); ?>&text=osc<?php echo osc_item_title(); ?>"
                                   class="tw shareable" title="Twitter"
                                   target="_blank">
                                    <i class="icon-twitter" aria-hidden="true"></i>
                                </a>
                                <?php
                            }
                            break;
                        case 'Whatsapp':
                            if ($value == 'on') {
                                ?>
                                <a href="https://api.whatsapp.com/send?text=<?php echo rawurlencode(osc_item_url()); ?>"
                                   class="wpp shareable"
                                   title="WhatsApp"
                                   target="_blank">
                                    <i class="icon-whatsapp" aria-hidden="true"></i>
                                </a>
                                <?php
                            }
                            break;
                        case 'Pinterest':
                            if ($value == 'on') {
                                ?>
                                <a href="https://pinterest.com/pin/create/button/?url=<?php echo rawurlencode(osc_item_url()); ?>&media=<?php echo rawurlencode($image) ?>&description=<?php echo $item['s_description'] ?>"
                                   class="pin shareable"
                                   title="Pinterest"
                                   target="_blank">
                                    <i class="icon-pinterest2" aria-hidden="true"></i>
                                </a>
                                <?php
                            }
                            break;
                    }
                }
                ?>
            </div>
        </div>
    </div>
<?php
