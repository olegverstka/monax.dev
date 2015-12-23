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
?>

<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery("#owl_example_<?php echo $ext_id;?>").owlCarousel({
		items : <?php echo $ext_items; ?>,
		itemsCustom : <?php echo $ext_itemscustom; ?>,
		itemsDesktop : <?php echo $ext_itemsdesktop; ?>,
		itemsDesktopSmall : <?php echo $ext_itemsdesktopsmall; ?>,
		itemsTablet : <?php echo $ext_itemstablet; ?>,
		itemsTabletSmall : <?php echo $ext_itemstabletsmall; ?>,
		itemsMobile : <?php echo $ext_itemsmobile; ?>,

		navigation : <?php echo $ext_navigation; ?>,
		pagination : <?php echo $ext_pagination; ?>,		
		paginationNumbers : <?php echo $ext_paginationnumbers; ?>	
		
		
	});
	
  
});
</script>


<div class="mod_ext_owl_carousel_jshopping_products <?php echo $moduleclass_sfx ?>">	
	<div id="owl_example_<?php echo $ext_id; ?>" class="owl-carousel owl-theme" >
		<?php foreach($last_prod as $curr){ ?>	
				<div class="ext-item-wrap">
				    <div class="block_item">
						<div class="item_name">
						   <span><a href="<?php print $curr->product_link?>"><?php print $curr->name?></a></span>
						</div>
				   
					   <?php if ($show_image) { ?>
						<div class="item_image">
							
							<?php if ($curr->label_id AND $ext_label_prod > 0){?>
								<div class="product_label">
									<?php if ($curr->_label_image){?>
										<img src="<?php print $curr->_label_image?>" alt="<?php print htmlspecialchars($curr->_label_name)?>" />
									<?php }else{?>
										<span class="label_name"><?php print $curr->_label_name;?></span>
									<?php }?>
								</div>
							<?php }?>
							<span>
								<a href="<?php print $curr->product_link?>"><img src = "<?php print $jshopConfig->image_product_live_path?>/<?php if ($curr->product_thumb_image) print $curr->product_thumb_image; else print $noimage?>" alt="" /></a>
							</span>
						</div>
					   <?php } ?>
					   
					   <?php if ($curr->_display_price AND $ext_product_price > 0){?>
						<div class="item_price">
						   <?php print formatprice($curr->product_price);?>
						</div>
						<?php } ?>
					   
						<?php if ($ext_short_desc > 0 AND $curr->short_description) { ?>
						<div class="short_description">
							<?php print $curr->short_description?>
						</div>
						<?php } ?>
						
						<?php if ($ext_review_mark > 0) { ?>
						<div class="review_mark">
							<?php print showMarkStar($curr->average_rating);?>
						</div>
						<?php } ?>
						
						<?php if ($ext_count_commentar > 0) { ?>
						<div class="count_commentar">
							<?php print sprintf(_JSHOP_X_COMENTAR, $curr->reviews_count);?>
						</div>				
						<?php } ?>
						<?php if ($ext_item_detal > 0) { ?>
						<div class="item_detal">
						   <a href="<?php print $curr->product_link?>"><?php echo $ext_buttom_text; ?></a>
						</div>
						<?php } ?>
				    </div>
				</div>	
		<?php } ?>
	</div>	
	<div style="clear:both;"></div>
</div>