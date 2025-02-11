<section class="page-section bg-light" id="team">  
    <div class="container">  
        <div class="text-center">  
            <h2 class="section-heading text-uppercase">Наш коллектив</h2>  
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>  
        </div>  
        <div class="row">  
            <?php foreach ($arResult  as $key => $member): ?>  
                <div class="col-lg-4">  
                    <div class="team-member">  
                    <?php   
                         
                        $imageIndex = ($key % 3) + 1;  
                        ?> 
                        <?php if (!empty($member['PREVIEW_PICTURE'])): ?>  
                            <img class="mx-auto rounded-circle" src="<?= CFile::GetPath($member['PREVIEW_PICTURE']) ?>" alt="<?= htmlspecialchars($member['NAME']) ?>" />  
                        <?php else: ?>  
                            <img class="mx-auto rounded-circle" src="<?=SITE_TEMPLATE_PATH?>/assets/img/team/<?= $imageIndex ?>.jpg" alt="default" />  
                        <?php endif; ?>  
                        <h4><?= htmlspecialchars($member['NAME']) ?></h4>  
                        <p class="text-muted"><?= htmlspecialchars($member['PREVIEW_TEXT']) ?></p>  
                        
                        <?php if (!empty($member['PROPERTY_TWITTER_VALUE'])): ?>  
                            <a class="btn btn-dark btn-social mx-2" href="<?= htmlspecialchars($member['PROPERTY_TWITTER_VALUE']) ?>" aria-label="<?= htmlspecialchars($member['NAME']) ?> Twitter Profile"><i class="fab fa-twitter"></i></a>  
                        <?php endif; ?>  
                        <?php if (!empty($member['PROPERTY_FACEBOOK_VALUE'])): ?>  
                            <a class="btn btn-dark btn-social mx-2" href="<?= htmlspecialchars($member['PROPERTY_FACEBOOK_VALUE']) ?>" aria-label="<?= htmlspecialchars($member['NAME']) ?> Facebook Profile"><i class="fab fa-facebook-f"></i></a>  
                        <?php endif; ?>  
                        <?php if (!empty($member['PROPERTY_LINKEDIN_VALUE'])): ?>  
                            <a class="btn btn-dark btn-social mx-2" href="<?= htmlspecialchars($member['PROPERTY_LINKEDIN_VALUE']) ?>" aria-label="<?= htmlspecialchars($member['NAME']) ?> LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>  
                        <?php endif; ?>  
                    </div>  
                </div>  
            <?php endforeach; ?>  
        </div>  
        <div class="row">  
            <div class="col-lg-8 mx-auto text-center">  
                <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>  
            </div>  
        </div>  
    </div>  
</section>  