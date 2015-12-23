<?php
/**
* @version      2.0.6 28.04.2014
* @author       Brooksus
* @package      Jshopping
* @copyright    Copyright (C) 2013 brooksite.ru. All rights reserved.
* @license      The MIT License (MIT)
*/

defined('_JEXEC') or die('Restricted access');
error_reporting(E_ALL & ~E_NOTICE); 

if (!file_exists(JPATH_SITE.'/components/com_jshopping/jshopping.php')){
    JError::raiseError(500,"Please install component \"joomshopping\"");
}

jimport('joomla.application.component.model');

require_once (JPATH_SITE.'/components/com_jshopping/lib/factory.php'); 
require_once (JPATH_SITE.'/components/com_jshopping/lib/functions.php');

JSFactory::loadCssFiles();
JSFactory::loadLanguageFile();
$jshopConfig = JSFactory::getConfig();
JModelLegacy::addIncludePath(JPATH_SITE.'/components/com_jshopping/models');
$cart = JModelLegacy::getInstance('cart', 'jshop');
$cart->load("cart");
$product = JTable::getInstance('product', 'jshop');
//PARAMS
$add_jq = $params->get('add_jq',1);
$add_jq_noconflict = $params->get('add_jq_noconflict',1);
$auto_add_jq = $params->get('auto_add_jq',1);
$add_jq_migrate = $params->get('add_jq_migrate',1);
$highlight_attr = $params->get('highlight_attr',1);
$show_added_to_cart = $params->get('show_added_to_cart',1);
$mod_lib = $params->get('mod_lib',0);
////Add Style Script
$document = JFactory::getDocument(); 
$document->addStyleSheet(JURI::base().'modules/mod_jshopping_cart_ajax_mini/css/style-ajax.css');
$document->addStyleSheet(JURI::base().'modules/mod_jshopping_cart_ajax_mini/css/default.css');
if ($add_jq=='2'){
$document->addScript(JURI::base().'modules/mod_jshopping_cart_ajax_mini/js/jquery-1.6.2.min.js');
}
if ($auto_add_jq=='1'){
$document->addScript(JURI::base().'modules/mod_jshopping_cart_ajax_mini/js/autoadd_jq.js');
}
if ($add_jq_migrate=="2")
{
$document->addScript(JURI::base().'modules/mod_jshopping_cart_ajax_mini/js/jquery-migrate-1.2.1.min.js');
}
if ($add_jq_noconflict=='2' && $auto_add_jq!='1'){
$document->addScript(JURI::base().'modules/mod_jshopping_cart_ajax_mini/js/jquery-noconflict.js');
}
//Highlight
if ($highlight_attr=='1') {
$document->addStyleSheet(JURI::base().'modules/mod_jshopping_cart_ajax_mini/css/highlight.css');
$document->addScript(JURI::base().'modules/mod_jshopping_cart_ajax_mini/js/highlight.js');
}
//Mini Modal
if ($mod_lib=='0'){
$document->addStyleSheet(JURI::base().'modules/mod_jshopping_cart_ajax_mini/css/jqmodal.css');
$document->addScript(JURI::base().'modules/mod_jshopping_cart_ajax_mini/js/jqmodal.js');
}
if ($mod_lib=='1'){
JHTML::_('behavior.modal');	
$document->addStyleSheet(JURI::base().'modules/mod_jshopping_cart_ajax_mini/css/sqzymodal.css');
}
//AJAX
$document->addScript(JURI::base().'modules/mod_jshopping_cart_ajax_mini/js/ajax.js');
require(JModuleHelper::getLayoutPath('mod_jshopping_cart_ajax_mini')); ?>