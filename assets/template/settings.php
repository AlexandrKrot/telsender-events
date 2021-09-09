<?php
/** @var TYPE_NAME $token */
/** @var TYPE_NAME $default_token */

?>
<div id="telsenderevent">
    <form action="options.php" method="post" >
    <h2>Telsender Event page</h2>
    <?=wp_nonce_field('update-options');?>

    <div>
        <label>
            <input type="text" value="<?=$token;?>" name="ts_event_token"
                   placeholder="<?=$default_token;?>" style="width:75%;"/>
            <span>Telegram token bot</span></label>
    </div>

    <fieldset>
        <legend>Login Failed</legend>
        <label><input value="1" <?=checked( $login_failed );?> name="ts_event_login_failed" type="checkbox"/><span>Enabled</span></label>
        <div>
            <label><input type="text" value="<?=$login_failed_chat_id?>" name="ts_event_login_failed_chat_id" placeholder="<?=$default_chat_id;?>"/><span> Send Chat id</span></label>
        </div>
    </fieldset>

    <fieldset>
        <legend>Login success</legend>
        <label><input value="1" <?=checked( $login_success );?> name="ts_event_login_success" type="checkbox"/><span>Enabled</span></label>
        <div>
            <label><input type="text" value="" name="ts_event_login_success_chat_id" placeholder="<?=$login_success_chat_id;?>"/><span> Send Chat id</span></label>
        </div>
    </fieldset>

    <?php if (is_array($interception_list_val)): ?>
        <fieldset>
            <legend>Post interception</legend>
            <label><input value="1" <?=checked( $interception_post );?> name="ts_event_interception_post" type="checkbox"/><span>Enabled</span></label>
            <div>
                <label>
                    <input type="text" value="<?=$interception_post_chat_id?>" name="ts_event_interception_post_chat_id"
                           placeholder="<?=$default_chat_id;?>"/><span> Send Chat id</span>
                </label>
            </div>

            <div class="utm_list_wrap">
                <?php foreach ($interception_list_val as $key => $inter): ?>
                    <div class="utm_list">
                        <input type="text" value="<?=$inter['param'];?>" name="ts_event_interception_list_param[]"
                               placeholder="interception params"/>
                        <input type="text" value="<?=$inter['value'];?>" name="ts_event_interception_list_value[]"
                               placeholder="interception params value"/>
                        <input type="text" value="<?=$inter['title'];?>" name="ts_event_interception_list_title[]" placeholder="Title message"/>
                        <button type="button" class="add">+</button>
                        <button type="button" class="remove">&times</button>
                    </div>
                <?php endforeach; ?>
            </div>
        </fieldset>
    <?php endif; ?>


    <fieldset disabled>
        <div class="disabled">
        <legend> Utm </legend>

        <label><input value="1" <?=checked( $utm );?> name="ts_event_utm" type="checkbox"/><span>Enabled</span></label>
        <div>
            <label><input type="text" value="<?=$utm_chat_id?>" name="ts_event_utm_chat_id"
                          placeholder="<?=$default_chat_id;?>"/><span> Send Chat id</span></label>
        </div>
        <div class="utm_list_wrap">
            <?php if (is_array($utm_list_val)): ?>
                <?php  foreach ($utm_list_val as $key => $utm) : ?>
                    <div class="utm_list">
                        <input type="text" value="<?= $utm['source']?>" name="ts_event_utm_list_param[]" placeholder="utm params"/><input
                            type="text" value="<?=$utm['value']?>" name="ts_event_utm_list_value[]" placeholder="utm params value"/>
                        <button type="button" class="add">+</button>
                        <button type="button" class="remove">&times</button>
                    </div>
                <?php endforeach; ?>
            <?php endif;?>
        </div>
        </div>
    </fieldset>


    <fieldset>
        <legend>Woocommerce Add To Cart</legend>
        <label><input value="1" <?=checked( $wc_add_to_cart );?> checked="" name="ts_event_wc_add_to_cart" type="checkbox"/><span>Enabled</span></label>
        <div>
            <label><input type="text" value="<?=$wc_add_to_cart_chat_id;?>" name="ts_event_wc_add_to_cart_chat_id" placeholder="<?=$default_chat_id?>"/><span> Send Chat id</span></label>
        </div>
    </fieldset>


    <fieldset>
        <legend>Search bots</legend>
        <label><input value="1" <?=checked(  $bots );?> name="ts_event_bots" type="checkbox"/><span>Enabled</span></label>
        <div class="bot_list_wrap">
            <div class="bots_list"><select multiple="multiple" name="ts_event_bot_list_value[]"
                                           placeholder="Bot params">
                    <?php foreach ($searchBots as $botValue =>$botName): ?>
                        <option <?= selected($bots_list_val,$botValue) ?> value="<?=$botValue?>"> <?=$botName?> </option>
                    <?php endforeach; ?>
                    <option selected value="">Other</option>
                </select>
            </div>
            <div class="other_bots">
                <input type="text" placeholder="Other bots" name="otherbots" value="<?=$otherbots;?>"/>
            </div>
        </div>
    </fieldset>

    <input type="hidden" name="action" value="update"/><input type="hidden" name="page_options" value="
        ts_event_token,
        ts_event_login_failed,
        ts_event_wc_add_to_cart,
        ts_event_wc_add_to_cart_chat_id,
        ts_event_login_success,
        ts_event_utm,
        ts_event_utm_chat_id,
        ts_event_login_failed_chat_id,
        ts_event_utm_list_param,
        ts_event_utm_list_value,
        ts_event_interception_post,
        ts_event_interception_post_chat_id,
        ts_event_interception_list_value,
        ts_event_interception_list_title,
        ts_event_interception_list_param,
        ts_event_bot_list_value,
        ts_event_bots,
        otherbots,
        ts_event_login_success_chat_id"/>

    <button class="button-primary" type="submit">Save</button>
    </form>
</div>

