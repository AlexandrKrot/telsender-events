<?php

use pechenki\TelsenderEvent\src\FormHelper;
use pechenki\TelsenderEvent\src\Html;

echo '<div id="telsenderevent">';
echo FormHelper::Begin(['action' => 'options.php', 'method' => 'post']);
echo Html::tag('h2', 'Telsender Event page');
wp_nonce_field('update-options');

// Login Failed input
echo Html::tag('div', FormHelper::input(['type' => 'text', 'value' => $token, 'name' => 'ts_event_token', 'placeholder' => $default_token, 'style' => 'width:75%;'], 'Telegram token bot'));

/**
 * Login Failed
 */
$field_login_failed = FormHelper::checkbox(['value' => '1', 'checked' => $login_failed, 'name' => 'ts_event_login_failed'], 'Enabled');
$field_login_failed .= Html::tag('div', FormHelper::input(['type' => 'text', 'value' => $login_failed_chat_id, 'name' => 'ts_event_login_failed_chat_id', 'placeholder' => $default_chat_id], ' Send Chat id'));

$field_login_faile_legend = Html::tag('legend', 'Login Failed');
echo Html::tag('fieldset', $field_login_faile_legend . $field_login_failed);

/**
 * Login success
 */
$field_login_success = FormHelper::checkbox(['value' => '1', 'checked' => $login_success, 'name' => 'ts_event_login_success'], 'Enabled');
$field_login_success .= Html::tag('div', FormHelper::input(['type' => 'text', 'value' => $login_success_chat_id, 'name' => 'ts_event_login_success_chat_id', 'placeholder' => $default_chat_id], ' Send Chat id'));

$field_login_fsuccess_legend = Html::tag('legend', 'Login success');
echo Html::tag('fieldset', $field_login_fsuccess_legend . $field_login_success);
/**
 * Post interception
 */
$interception_post = FormHelper::checkbox(['value' => '1', 'checked' => $interception_post, 'name' => 'ts_event_interception_post'], 'Enabled');
$interception_post .= Html::tag('div', FormHelper::input(['type' => 'text', 'value' => $interception_post_chat_id, 'name' => 'ts_event_interception_post_chat_id', 'placeholder' => $default_chat_id], ' Send Chat id'));


$interception_listfinish = '';
if (is_array($interception_list_val)) {
    foreach ($interception_list_val as $key => $inter) {


        $inter_list = FormHelper::input(['type' => 'text', 'value' => $inter['param'], 'name' => 'ts_event_interception_list_param[]', 'placeholder' => 'interception params']);
        $inter_list .= FormHelper::input(['type' => 'text', 'value' => $inter['value'], 'name' => 'ts_event_interception_list_value[]', 'placeholder' => 'interception params value']);
        $inter_list .= FormHelper::input(['type' => 'text', 'value' => $inter['title'], 'name' => 'ts_event_interception_list_title[]', 'placeholder' => 'Title message']);
        if ($key == 0) {

            $inter_list .= Html::tag('button', '+', ['type' => 'button', 'class' => 'add']);
        }

        $inter_list .= Html::tag('button', '&times', ['type' => 'button', 'class' => 'remove']);
        $interception_listfinish .= Html::tag('div', $inter_list, ['class' => 'utm_list']);
    }
}

$interception_post .= Html::tag('div', $interception_listfinish, ['class' => 'utm_list_wrap']);

$field_interception_post_legend = Html::tag('legend', 'Post interception ');
echo Html::tag('fieldset', $field_interception_post_legend . $interception_post);


/**
 * Utm
 */
$field_utm = FormHelper::checkbox(['value' => '1', 'checked' => $utm, 'name' => 'ts_event_utm'], 'Enabled');
$field_utm .= Html::tag('div', FormHelper::input(['type' => 'text', 'value' => $utm_chat_id, 'name' => 'ts_event_utm_chat_id', 'placeholder' => $default_chat_id], ' Send Chat id'));


$utm_listfinish = '';
if (is_array($utm_list_val)) {
    foreach ($utm_list_val as $key => $utm) {

        $utm_list = FormHelper::input(['type' => 'text', 'value' => $utm['source'], 'name' => 'ts_event_utm_list_param[]', 'placeholder' => 'utm params']);
        $utm_list .= FormHelper::input(['type' => 'text', 'value' => $utm['value'], 'name' => 'ts_event_utm_list_value[]', 'placeholder' => 'utm params value']);
        if ($key == 0) {

            $utm_list .= Html::tag('button', '+', ['type' => 'button', 'class' => 'add']);
        }

        $utm_list .= Html::tag('button', '&times', ['type' => 'button', 'class' => 'remove']);
        $utm_listfinish .= Html::tag('div', $utm_list, ['class' => 'utm_list']);
    }
}

$field_utm .= Html::tag('div', $utm_listfinish, ['class' => 'utm_list_wrap']);

$field_utm_legend = Html::tag('legend', 'Utm ');
echo Html::tag('fieldset', $field_utm_legend . $field_utm, ['class' => 'disabled']);


/**
 * Woocommerce Add To Cart
 */
$field_wc_add_to_cart_failed = FormHelper::checkbox(['value' => '1', 'checked' => $wc_add_to_cart, 'name' => 'ts_event_wc_add_to_cart'], 'Enabled');
$field_wc_add_to_cart_failed .= Html::tag('div', FormHelper::input(['type' => 'text', 'value' => $wc_add_to_cart_chat_id, 'name' => 'ts_event_wc_add_to_cart_chat_id', 'placeholder' => $default_chat_id], ' Send Chat id'));

$field_wc_add_to_cart_failed_legend = Html::tag('legend', 'Woocommerce Add To Cart');
echo Html::tag('fieldset', $field_wc_add_to_cart_failed_legend . $field_wc_add_to_cart_failed);


/**
 * Search Bots detected
 */

$field_bots = FormHelper::checkbox(['value' => '1', 'checked' => $bots, 'name' => 'ts_event_bots'], 'Enabled');
//$field_bots .= Html::tag('div', FormHelper::input(['type' => 'text', 'value' => $utm_chat_id, 'name' => 'ts_event_utm_chat_id','placeholder'=>$default_chat_id], ' Send Chat id'));


$bots_listfinish = '';

$bot_list = FormHelper::select($searchBots, ['multiple' => "multiple", 'value' => $bots_list_val, 'name' => 'ts_event_bot_list_value[]', 'placeholder' => 'Bot params']);



$bots_listfinish .= Html::tag('div', $bot_list, ['class' => 'bots_list']);
$bots_listfinish .= Html::tag('div', FormHelper::input(['type' => 'text','placeholder'=>'Other bots','name'=>'otherbots','value'=>$otherbots]), ['class' => 'other_bots']);


$field_bots .= Html::tag('div', $bots_listfinish, ['class' => 'bot_list_wrap']);

$field_bots_legend = Html::tag('legend', 'Search bots ');
echo Html::tag('fieldset', $field_bots_legend . $field_bots, []);


// Woocommerce Add To Cart
//echo Html::tag('div', FormHelper::checkbox(['value' => '1', 'checked' => $wc_add_to_cart, 'name' => 'ts_event_wc_add_to_cart'], 'Woocommerce Add To Cart '));

// System Add To Cart
echo FormHelper::input(['type' => 'hidden', 'name' => 'action', 'value' => 'update']);

echo FormHelper::input(['type' => 'hidden', 'name' => 'page_options', 'value' => '
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
ts_event_login_success_chat_id'
]);


echo FormHelper::submit('Save', ['class' => 'button-primary']);

echo FormHelper::end();

echo '</div>';