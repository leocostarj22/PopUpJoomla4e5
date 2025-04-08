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

/**
 * Helper class for Custom Popup module
 *
 * @since  1.0.0
 * @author @leocostadeveloper
 */
class ModCustomPopupHelper
{
    /**
     * Método para verificar se o popup deve ser exibido com base em regras adicionais
     *
     * @param   \Joomla\Registry\Registry  $params  Parâmetros do módulo
     *
     * @return  boolean
     */
    public static function shouldDisplayPopup($params)
    {
        // Sempre exibir por padrão
        $shouldDisplay = true;
        
        // Futuramente podem ser adicionadas regras adicionais aqui:
        // - Verificar grupos de usuários
        // - Verificar exibição em dispositivos específicos
        // - Verificar tempo desde a última visita
        // - Etc.
        
        return $shouldDisplay;
    }
    
    /**
     * Gera um ID único para o popup baseado no ID do módulo
     *
     * @param   int  $moduleId  ID do módulo
     *
     * @return  string
     */
    public static function getUniqueId($moduleId)
    {
        return 'custom-popup-' . $moduleId;
    }
}