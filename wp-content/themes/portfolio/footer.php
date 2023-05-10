<footer class="footer">
	<ul class="footer__links">
		<?php foreach(portfolio_get_menu('footer') as $link): ?>
			<li class="footer__link">
				<a href="<?= $link->href; ?>" class="footer__url"><?= $link->label; ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
	<p class="footer__copyright">© <?= get_bloginfo('name'); ?> <time datetime="2023">2023</time></p>
</footer>
</body>
</html>