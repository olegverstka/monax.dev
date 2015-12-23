<?php 
/*
# ------------------------------------------------------------------------
# Extensions for Joomla 2.5.x - Joomla 3.x
# ------------------------------------------------------------------------
# Copyright (C) 2011-2014 Ext-Joom.com. All Rights Reserved.
# @license - PHP files are GNU/GPL V2.
# Author: Ext-Joom.com
# Websites:  http://www.ext-joom.com 
# Date modified: 08/04/2014 - 13:00
# ------------------------------------------------------------------------
*/

// no direct access
defined('_JEXEC') or die;
error_reporting(E_ALL & ~E_NOTICE);
//error_reporting(error_reporting() & ~E_NOTICE);
    
if (!file_exists(JPATH_SITE.'/components/com_jshopping/jshopping.php')){
    JError::raiseError(500,"Please install component \"joomshopping\"");
} 
	
require_once (JPATH_SITE.'/components/com_jshopping/lib/factory.php'); 
require_once (JPATH_SITE.'/components/com_jshopping/lib/functions.php');       

JSFactory::loadCssFiles();
JSFactory::loadLanguageFile();
$jshopConfig = JSFactory::getConfig();

$document 					= JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'modules/mod_ext_owl_carousel_jshopping_products/assets/css/owl.carousel.css');
$document->addStyleSheet(JURI::base() . 'modules/mod_ext_owl_carousel_jshopping_products/assets/css/owl.theme.css');

$moduleclass_sfx			= $params->get('moduleclass_sfx');
$ext_id 					= "mod_".$module->id;

// Load jQuery
//------------------------------------------------------------------------

$ext_jquery_ver				= $params->get('ext_jquery_ver', '1.9.1');
$ext_load_jquery			= (int)$params->get('ext_load_jquery', 1);
$ext_load_base				= (int)$params->get('ext_load_base', 1);

$ext_script = <<<SCRIPT


var jQ = false;
function initJQ() {
	if (typeof(jQuery) == 'undefined') {
		if (!jQ) {
			jQ = true;
			document.write('<scr' + 'ipt type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/$ext_jquery_ver/jquery.min.js"></scr' + 'ipt>');
		}
		setTimeout('initJQ()', 500);
	}
}
initJQ(); 
 
 if (jQuery) jQuery.noConflict();    
  
  
 

SCRIPT;

if ($ext_load_jquery  > 0) {
	$document->addScriptDeclaration($ext_script);		
}
if ($ext_load_base  > 0) { 
	$document->addCustomTag('<script type = "text/javascript" src = "'.JURI::root().'modules/mod_ext_owl_carousel_jshopping_products/assets/js/owl.carousel.min.js"></script>'); 	
}


// Options Owl Carousel - http://owlgraphic.com/owlcarousel/#customizing
//------------------------------------------------------------------------

//basic:
$ext_items 					= (int)$params->get('ext_items', 1);
$ext_navigation				= $params->get('ext_navigation', 'false');
$ext_pagination				= $params->get('ext_pagination', 'true');
$ext_paginationnumbers		= $params->get('ext_paginationnumbers', 'false');

//pro:
$ext_itemsdesktop			= $params->get('ext_itemsdesktop', 'false');
$ext_itemsdesktopsmall		= $params->get('ext_itemsdesktopsmall', 'false');
$ext_itemstablet			= $params->get('ext_itemstablet', 'false');
$ext_itemstabletsmall		= $params->get('ext_itemstabletsmall', 'false');
$ext_itemsmobile			= $params->get('ext_itemsmobile', 'false');
$ext_itemscustom			= $params->get('ext_itemscustom', 'false');
// Buy PRO version http://ext-joom.com/en/extensions.html





// JS
//------------------------------------------------------------------------
$show_image 			= (int)$params->get('show_image', 1);
$ext_label_prod			= (int)$params->get('ext_label_prod', 1);
$ext_short_desc			= (int)$params->get('ext_short_desc', 0);
$ext_product_price		= (int)$params->get('ext_product_price', 1);
$ext_review_mark		= (int)$params->get('ext_review_mark', 0);
$ext_count_commentar	= (int)$params->get('ext_count_commentar', 0);
$ext_item_detal			= (int)$params->get('ext_item_detal', 0);
$ext_buttom_text		= $params->get('ext_buttom_text', 'Detail');


$product = JTable::getInstance('product', 'jshop');
$cat_str = $params->get('catids',NULL); 

if (is_array($cat_str)) {    
    $cat_arr = array();
    foreach($cat_str as $key=>$curr){
        if (intval($curr)) $cat_arr[$key] = intval($curr);
    }  
} else {
		$cat_arr = array();
		if (intval($cat_str)) $cat_arr[] = intval($cat_str);
    }
	
$count 					= (int)$params->get('count_products', 10);
$label_id 				= $params->get('label_id');
$ext_products 			= (int)$params->get('ext_products', 0);
	
if( $ext_products == 0 ) { $last_prod = $product->getLastProducts($count, $cat_arr); }
if( $ext_products == 1 ) { $last_prod = $product->getTopRatingProducts($count, $cat_arr); }
if( $ext_products == 2 ) { $last_prod = $product->getBestSellers($count, $cat_arr); }
if( $ext_products == 3 ) { $last_prod = $product->getProductLabel($label_id, $count, $cat_arr); }
	
foreach($last_prod as $key=>$value){
	$last_prod[$key]->product_link = SEFLink('index.php?option=com_jshopping&controller=product&task=view&category_id='.$value->category_id.'&product_id='.$value->product_id, 1);
}
$noimage = "noimage.gif";

require JModuleHelper::getLayoutPath('mod_ext_owl_carousel_jshopping_products', $params->get('layout', 'default'));
echo JText::_(COP_JOOMLA);
?>