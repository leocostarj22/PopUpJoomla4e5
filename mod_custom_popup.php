<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom_popup
 *
 * @copyright   Copyright (C) 2025 @leocostadeveloper. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      @leocostadeveloper
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

// Load required JS and CSS
$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
$wa->registerAndUseStyle('mod_custom_popup', 'modules/mod_custom_popup/assets/css/popup.css');
$wa->registerAndUseScript('mod_custom_popup', 'modules/mod_custom_popup/assets/js/popup.js');

// Get module parameters
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
$popup_title = $params->get('popup_title', '');
$popup_content = $params->get('popup_content', '');
$popup_image = $params->get('popup_image', '');
$popup_width = $params->get('popup_width', 500);
$popup_height = $params->get('popup_height', 'auto');
$popup_delay = $params->get('popup_delay', 2000);
$show_once = $params->get('show_once', 1);
$show_close_button = $params->get('show_close_button', 1);
$popup_background = $params->get('popup_background', '#ffffff');
$popup_opacity = $params->get('popup_opacity', 0.9);
$popup_border_radius = $params->get('popup_border_radius', 8);
$cookie_duration = $params->get('cookie_duration', 7);

// Add inline JS
$inline_js = "
document.addEventListener('DOMContentLoaded', function() {
    CustomPopup.init({
        delay: " . $popup_delay . ",
        showOnce: " . $show_once . ",
        cookieDuration: " . $cookie_duration . "
    });
});
";

$wa->addInlineScript($inline_js);

require ModuleHelper::getLayoutPath('mod_custom_popup', $params->get('layout', 'default'));