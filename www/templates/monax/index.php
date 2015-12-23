<?php defined("_JEXEC") or die("Вы не имеете права доступа к этой странице"); ?>
<?php
$templateparams = JFactory::getApplication()->getTemplate(true)->params;  // Получение доп. параметров шаблона

// Получение дополнительных параметров сайта
$site_slider_1 = $templateparams->get('site_slider_1');
$site_slider_1_text = $templateparams->get('site_slider_1_text');
$site_slider_1_season = $templateparams->get('site_slider_1_season');
$site_slider_1_link = $templateparams->get('site_slider_1_link');

$site_slider_2 = $templateparams->get('site_slider_2');
$site_slider_2_text = $templateparams->get('site_slider_2_text');
$site_slider_2_season = $templateparams->get('site_slider_2_season');
$site_slider_2_link = $templateparams->get('site_slider_2_link');

$site_slider_3 = $templateparams->get('site_slider_3');
$site_slider_3_text = $templateparams->get('site_slider_3_text');
$site_slider_3_season = $templateparams->get('site_slider_3_season');
$site_slider_3_link = $templateparams->get('site_slider_3_link');

$site_slider_4 = $templateparams->get('site_slider_4');
$site_slider_4_text = $templateparams->get('site_slider_4_text');
$site_slider_4_season = $templateparams->get('site_slider_4_season');
$site_slider_4_link = $templateparams->get('site_slider_4_link');

$site_phone_1 = $templateparams->get('site_phone_1');
$site_phone_2 = $templateparams->get('site_phone_2');

$site_soc_vk = $templateparams->get('site_soc_vk');
$site_soc_fb = $templateparams->get('site_soc_fb');
$site_soc_tw = $templateparams->get('site_soc_tw');
$site_soc_ig = $templateparams->get('site_soc_ig');

$doc = JFactory::getDocument();
$doc->addStyleSheet(JUri::base().'templates/'.$doc->template.'/css/vendor.css');
// Подключение скриптов шаблона
$doc->addScript(JUri::base().'templates/'.$doc->template.'/js/vendor/modernizr.js');
$doc->addScript(JUri::base().'templates/'.$doc->template.'/js/vendor.js');
$doc->addScript(JUri::base().'templates/'.$doc->template.'/js/main.js');

$menu = JFactory::getApplication()->getMenu();
$activePage = $menu->getActive()->id;
$defaultPage = $menu->getDefault()->id;
?>
<!doctype html>
<html class="no-js" lang="">
	<head>
		<jdoc:include type="head" />
	</head>
	<body>
		<!--[if lt IE 8]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
		
		<?php if ($this->countModules( 'position-0' )) : ?>
			<div id="auth" class="modal">
				<h2>Авторизоваться</h2>
				<div class="modal_content">
					<p>Для авторизации на сайте заполните поля!</p>
					<jdoc:include type="modules" name="position-0" />
				</div>
			</div>
		<?php endif; ?>

		<div class="wrapper">

			<header class="header">
				<div class="head-top clearfix">
					<div class="wrap-sity left">
						<select class="select" name="sity" id="">
							<option value="">Михайловка</option>
							<option value="">Волгоград</option>
						</select>
					</div>
					<div class="right">
						<a class="auth fancy" href="#auth"><i></i>Войти</a>
						<!-- <a class="cart" href="#"><i></i>Корзина <span>0 руб.</span></a> -->
						<jdoc:include type="modules" name="position-1" />
					</div>
				</div><!-- .head-top -->
				<div class="head-center clearfix">
					<div class="advantages">
						<p class="delivery"><i></i>Бесплатная доставка</p>
						<p class="pickup"><i></i>Самовывоз из магазинов</p>
					</div>
					<div class="logo">
						<a href="/">
							<img src="<?php echo JUri::base().'templates/'. $doc->template; ?>/img/logo.png" alt="Логотип сайта">
						</a>
					</div>
					<div class="wrap-phone">
						<p><?php echo $site_phone_1; ?> / <?php echo $site_phone_2; ?></p>
					</div>
					<div class="search">
						<jdoc:include type="modules" name="position-2" />
					</div>
				</div><!-- .head-center -->
				<nav class="main-menu clearfix">
					<jdoc:include type="modules" name="position-3" />
				</nav><!-- .main-menu -->
			</header><!-- .header-->

			<main class="content">
				<?php if($activePage != $defaultPage): //если не главная страница?>
					<div class="wisiwig">
						<jdoc:include type="component" />
					</div>
				<?php else: // если главная страница?>
					<div class="wrap-slider">
						<ul class="bxSlider">
							<?php if($site_slider_1): ?>
								<li>
									<?php if($site_slider_1): ?>
										<img src="<?php echo $site_slider_1; ?>" alt="">
									<?php endif; ?>
									<div class="year-collection">
										<?php if($site_slider_1_text): ?>
											<p><?php echo $site_slider_1_text; ?><br/><?php echo $site_slider_1_season; ?></p>
										<?php endif; ?>
										<?php if($site_slider_1_link): ?>
											<a href="<?php echo $site_slider_1_link; ?>" class="btn">Перейти к покупкам</a>
										<?php endif; ?>
									</div>
								</li>
							<?php endif; ?>
							<?php if($site_slider_2): ?>
								<li>
									<?php if($site_slider_2): ?>
										<img src="<?php echo $site_slider_2; ?>" alt="">
									<?php endif; ?>
									<div class="year-collection">
										<?php if($site_slider_2_text): ?>
											<p><?php echo $site_slider_2_text; ?><br/><?php echo $site_slider_2_season; ?></p>
										<?php endif; ?>
										<?php if($site_slider_2_link): ?>
											<a href="<?php echo $site_slider_2_link; ?>" class="btn">Перейти к покупкам</a>
										<?php endif; ?>
									</div>
								</li>
							<?php endif; ?>
							<?php if($site_slider_3): ?>
								<li>
									<?php if($site_slider_3): ?>
										<img src="<?php echo $site_slider_3; ?>" alt="">
									<?php endif; ?>
									<div class="year-collection">
										<?php if($site_slider_3_text): ?>
											<p><?php echo $site_slider_3_text; ?><br/><?php echo $site_slider_3_season; ?></p>
										<?php endif; ?>
										<?php if($site_slider_3_link): ?>
											<a href="<?php echo $site_slider_3_link; ?>" class="btn">Перейти к покупкам</a>
										<?php endif; ?>
									</div>
								</li>
							<?php endif; ?>
							<?php if($site_slider_4): ?>
								<li>
									<?php if($site_slider_4): ?>
										<img src="<?php echo $site_slider_4; ?>" alt="">
									<?php endif; ?>
									<div class="year-collection">
										<?php if($site_slider_4_text): ?>
											<p><?php echo $site_slider_1_text; ?><br/><?php echo $site_slider_4_season; ?></p>
										<?php endif; ?>
										<?php if($site_slider_4_link): ?>
											<a href="<?php echo $site_slider_4_link; ?>" class="btn">Перейти к покупкам</a>
										<?php endif; ?>
									</div>
								</li>
							<?php endif; ?>
						</ul>
					</div><!-- .wrap-slider -->
					<?php if($doc->countModules('position-8')) :?>
						<h1>Хиты продаж</h1>
						<div class="wrap-hit">
							<!-- <ul class="hitSlider clearfix">
								<li>
									<a href="#">
										<img src="<?php echo JUri::base().'templates/'. $doc->template; ?>/img/hit-slide-1.jpg" alt="">
										<span class="name">Юбка</span>
										<span class="price">1599 руб.</span>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?php echo JUri::base().'templates/'. $doc->template; ?>/img/hit-slide-2.jpg" alt="">
										<span class="name">Блузка</span>
										<span class="price">1 399 руб.</span>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?php echo JUri::base().'templates/'. $doc->template; ?>/img/hit-slide-3.jpg" alt="">
										<span class="name">Юбка</span>
										<span class="price">2 599 руб.</span>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?php echo JUri::base().'templates/'. $doc->template; ?>/img/hit-slide-5.jpg" alt="">
										<span class="name">Футболка</span>
										<span class="price">999 руб.</span>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?php echo JUri::base().'templates/'. $doc->template; ?>/img/hit-slide-4.jpg" alt="">
										<span class="name">Жакет</span>
										<span class="price">3 599 руб.</span>
									</a>
								</li>
							</ul> -->
							<jdoc:include type="modules" name="position-8" />
						</div><!-- .wrap-hit -->
					<?php endif; ?>
					<?php if($doc->countModules('position-7')) :?>
						<div class="banners clearfix">
							<jdoc:include type="modules" name="position-7" />
						</div><!-- .banners -->
					<?php endif; ?>
				<?php endif; ?>
			</main><!-- .content -->

		</div><!-- .wrapper -->

		<footer class="footer">
			<div class="footer_top clearfix">
				<div class="left">
					<div class="foot_top clearfix">
						<div class="contact">
							<jdoc:include type="modules" name="position-4" />
							<div class="soc-menu">
								<ul class="clearfix">
									<?php if($site_soc_vk): ?>
										<li><a class="vk" target="_blank" href="<?php echo $site_soc_vk; ?>">В контакте</a></li>
									<?php endif; ?>
									<?php if($site_soc_fb): ?>
										<li><a class="fb" target="_blank" href="<?php echo $site_soc_fb; ?>">Facebook</a></li>
									<?php endif; ?>
									<?php if($site_soc_tw): ?>
										<li><a class="tw" target="_blank" href="<?php echo $site_soc_tw; ?>">Twitter</a></li>
									<?php endif; ?>
									<?php if($site_soc_ig): ?>
										<li><a class="ig" target="_blank" href="<?php echo $site_soc_ig; ?>">Inctagram</a></li>
									<?php endif; ?>
								</ul>
							</div>
						</div><!-- .contact -->
						<div class="foot_menu">
							<jdoc:include type="modules" name="position-5" />
						</div>
					</div><!-- .foot_top -->
					<div class="foot_bottom">
						<img src="<?php echo JUri::base().'templates/'. $doc->template; ?>/img/visa.jpg" alt="">
						<img src="<?php echo JUri::base().'templates/'. $doc->template; ?>/img/master.jpg" alt="">
						<img src="<?php echo JUri::base().'templates/'. $doc->template; ?>/img/maestro.jpg" alt="">
					</div><!-- .foot_bottom -->
				</div><!-- .left -->
				<div class="right">
					<div class="wrap-subscribe">
						<jdoc:include type="modules" name="position-6" />
					</div>
				</div><!-- .right -->
			</div><!-- .footer_top -->
			<div class="footer_bottom">
				<p class="copy">2003-20015 &#169; Monaxx.ru</p>
			</div>
		</footer><!-- .footer -->
		
		<div class="loader">
			<div class="loader_inner"></div>
		</div>

	</body>
</html>