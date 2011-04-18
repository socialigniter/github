<h2 class="content_title"><img src="<?= $modules_assets ?>github_32.png"> Github</h2>
<ul class="content_navigation">
	<?= navigation_list_btn('home/github', 'Recent') ?>
	<?= navigation_list_btn('home/github/custom', 'Custom') ?>
	<?php if ($logged_user_level_id <= 2) echo navigation_list_btn('home/github/manage', 'Manage', $this->uri->segment(4)) ?>
</ul>