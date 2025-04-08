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
?>

<div id="custom-popup-overlay" class="custom-popup-overlay" style="display: none;">
    <div id="custom-popup" class="custom-popup<?php echo $moduleclass_sfx; ?>" 
         style="width: <?php echo $popup_width; ?>px; 
                height: <?php echo $popup_height; ?>; 
                background-color: <?php echo $popup_background; ?>; 
                border-radius: <?php echo $popup_border_radius; ?>px;">
        
        <?php if ($show_close_button) : ?>
        <div class="custom-popup-close" onclick="CustomPopup.close();">×</div>
        <?php endif; ?>
        
        <?php if ($popup_title) : ?>
        <div class="custom-popup-header">
            <h3><?php echo $popup_title; ?></h3>
        </div>
        <?php endif; ?>
        
        <div class="custom-popup-content">
            <?php if ($popup_image) : ?>
            <div class="custom-popup-image">
                <img src="<?php echo $popup_image; ?>" alt="<?php echo $popup_title; ?>" />
            </div>
            <?php endif; ?>
            
            <div class="custom-popup-text">
                <?php echo $popup_content; ?>
            </div>
        </div>
        
        <!-- Crédito ao criador 
        <div class="custom-popup-credit" style="font-size:10px; text-align:center; margin-top:10px; opacity:0.6;">
            Desenvolvido por <a href="https://github.com/leocostadeveloper" target="_blank">@leocostadeveloper</a>
        </div>
        -->
    </div>
</div>