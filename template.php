<?php
// Simple template: set $pageTitle and $bodyClass before including, and provide $content (HTML string)
if (!isset($pageTitle)) {
		$pageTitle = 'Kelly Bootstrap Template';
}
if (!isset($bodyClass)) {
		$bodyClass = '';
}
// Try to use a configured base URL (recommended). If not present, fall back to a computed one.
if (file_exists(__DIR__ . '/config.php')) {
	// config.php defines $baseUrl and normalizes it (no trailing slash except for root)
	include __DIR__ . '/config.php';
}

if (!isset($baseUrl) || $baseUrl === null) {
	// Fallback: compute path from document root to project directory
	$computed = str_replace('\\', '/', str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR__));
	$computed = $computed ?: '/';
	// Ensure leading slash
	if ($computed !== '/' && $computed[0] !== '/') {
		$computed = '/' . $computed;
	}
	// Remove trailing slash unless root
	if ($computed !== '/') {
		$computed = rtrim($computed, '/');
	}
	$baseUrl = $computed;
}

// Final normalization: ensure $baseUrl is at least '/'
if (!$baseUrl) {
	$baseUrl = '/';
}

// Ensure session is started so we can show auth links in the header
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
	<meta name="description" content="">
	<meta name="keywords" content="">

		<!-- Favicons -->
		<link href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/assets/img/favicon.png" rel="icon">
		<link href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com" rel="preconnect">
	<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

		<!-- Vendor CSS Files -->
		<link href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
		<link href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/assets/vendor/aos/aos.css" rel="stylesheet">
		<link href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
		<link href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

		<!-- Main CSS File -->
		<link href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/assets/css/main.css" rel="stylesheet">

</head>

<body class="<?php echo htmlspecialchars($bodyClass, ENT_QUOTES, 'UTF-8'); ?>">

	<header id="header" class="header d-flex align-items-center light-background sticky-top">
		<div class="container-fluid position-relative d-flex align-items-center justify-content-between">

			<a href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/index.html" class="logo d-flex align-items-center me-auto me-xl-0">
				<!-- Uncomment the line below if you also wish to use an image logo -->
				<!-- <img src="assets/img/logo.png" alt=""> -->
				<h4 class="sitename">Global Harmony Hub</h4>
			</a>

			<nav id="navmenu" class="navmenu">
					<ul>
					  <?php if (!empty($_SESSION['user_email'])): ?>
						  <li><a href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/Views/home.php">Home</a></li>
						  <li><a href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/about.php">About</a></li>
						  <li class="dropdown"><a href="#"><span>Formations</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
							<ul>
								<li><a href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/Views/formation/list.php">List</a></li>
								<li><a href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/formation/applytotheformation/1">Apply to the formation</a></li>
								<li><a href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/Views/formation/details.php?id=1">Details</a></li>
							</ul>
						  </li>
						  <li><a href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/resume.html">Resume</a></li>
						  <li><a href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/services.html">Services</a></li>
						  <li><a href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/portfolio.html">Portfolio</a></li>
						<li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
							<ul>
								<li><a href="#">Dropdown 1</a></li>
								<li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
									<ul>
										<li><a href="#">Deep Dropdown 1</a></li>
										<li><a href="#">Deep Dropdown 2</a></li>
										<li><a href="#">Deep Dropdown 3</a></li>
										<li><a href="#">Deep Dropdown 4</a></li>
										<li><a href="#">Deep Dropdown 5</a></li>
									</ul>
								</li>
								<li><a href="#">Dropdown 2</a></li>
								<li><a href="#">Dropdown 3</a></li>
								<li><a href="#">Dropdown 4</a></li>
							</ul>
						</li>
						<li><a href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/contact.html">Contact</a></li>
						<?php if (!empty($_SESSION['is_admin']) && (int)$_SESSION['is_admin'] === 1): ?>
							<li><a class="btn btn-sm btn-outline-primary" href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/backoffice/index.html">Admin</a></li>
						<?php endif; ?>
						<li><a href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/Views/account.php">Account</a></li>
						<li><a href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/Controllers/UserController.php?action=logout">Logout</a></li>
					  <?php else: ?>
						  
						  <li><a href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/Views/login.php">Login</a></li>
						  <li><a href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/Views/register.php">Register</a></li>
					  <?php endif; ?>
					</ul>
				<i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
			</nav>

			<div class="header-social-links">
				<a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
				<a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
				<a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
				<a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
			</div>

		</div>
	</header>

	<main class="main">

<?php
// Page content goes here (set by the including page)
echo $content ?? '';
?>

	</main>

		<footer id="footer" class="footer light-background">

		<div class="container">
			<div class="copyright text-center ">
				<p>© <span>Copyright</span> <strong class="px-1 sitename">Kelly</strong> <span>All Rights Reserved<br></span></p>
			</div>
			<div class="social-links d-flex justify-content-center">
				<a href=""><i class="bi bi-twitter-x"></i></a>
				<a href=""><i class="bi bi-facebook"></i></a>
				<a href=""><i class="bi bi-instagram"></i></a>
				<a href=""><i class="bi bi-linkedin"></i></a>
			</div>
		<div class="credits">
				<!-- All the links in the footer should remain intact. -->
				<!-- You can delete the links only if you've purchased the pro version. -->
				<!-- Licensing information: https://bootstrapmade.com/license/ -->
				<!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
				Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
			</div>
		</div>

	</footer>

	<!-- Scroll Top -->
	<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	<!-- Preloader -->
	<div id="preloader"></div>

		<!-- Vendor JS Files -->
		<script src="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/assets/vendor/php-email-form/validate.js"></script>
		<script src="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/assets/vendor/aos/aos.js"></script>
		<script src="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/assets/vendor/waypoints/noframework.waypoints.js"></script>
		<script src="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/assets/vendor/purecounter/purecounter_vanilla.js"></script>
		<script src="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
		<script src="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
		<script src="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
		<script src="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

		<!-- Main JS File -->
		<script src="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/assets/js/main.js"></script>

	</body>

</html>
