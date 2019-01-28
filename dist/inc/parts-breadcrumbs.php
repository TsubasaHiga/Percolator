<div class="l-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
    <span property="itemListElement" typeof="ListItem">
        <a property="item" typeof="WebPage" title="<?= BREADCRUMBS_TOP ?>" href="<?php echo SITEURL; ?>" class="home">
            <span property="name"><?= BREADCRUMBS_TOP ?></span>
        </a>
        <meta property="position" content="1">
    </span>
    <?php foreach ($page_relation_list as $page_name => $page_url) : ?>
    <span property="itemListElement" typeof="ListItem">
        <a property="item" typeof="WebPage" title="<?php echo $page_name; ?>" href="/<?php echo $page_url; ?>" class="post post-blog-archive">
            <span property="name"><?php echo $page_name; ?></span>
        </a>
        <meta property="position" content="<?php echo $i + 1 ?>">
    </span>
    <?php endforeach; ?>
</div>
