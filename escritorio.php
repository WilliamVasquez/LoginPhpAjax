<?php
	require_once 'auth.php';
	require_once 'database.php';
	require_once 'inc/header.php'; 
?>
    <?php if(!empty($message)): ?>
		<?= $message ?>
	<?php endif; ?>
<?php 
    require_once 'inc/modals.php';
    require_once 'inc/footer.php'; 
?>