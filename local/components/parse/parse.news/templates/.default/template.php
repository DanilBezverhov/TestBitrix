<? foreach ($arResult as $index => $newsItem): ?>
    
    <div class="col-lg-4 col-sm-6 mb-4">
        <div class="portfolio-item">
        <a class="portfolio-link text-decoration-none" href="/local/components/parse/parse.news/article.php?url=<?= urlencode($newsItem['DESCRIP']) ?>">
        <div class="portfolio-hover">
                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                </div>
                <img class="img-fluid" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/portfolio/<?= (($index % 6) + 1) ?>.jpg" alt="..." />
            </a>
            <div class="portfolio-caption">
                <div class="portfolio-caption-heading"><?= htmlspecialchars($newsItem['TITLE']) ?></div>
                <div class="portfolio-caption-subheading text-muted"><?= htmlspecialchars($newsItem['LINK']) ?></div>
            </div>
        </div>
    </div>
<? endforeach; ?>
