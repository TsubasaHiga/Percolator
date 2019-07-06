<header class="l-header">
    <div class="l-header__inner">
        <a class="l-logo" href="<?= SITEROOT; ?>">
        <?php if ($PAGENAME === 'top') : ?>
    <h1 class="l-logo__image">logo</h1>
        <?php else : ?>
    <p class="l-logo__image">logo</p>
        <?php endif; ?>
</a>
        <nav class='l-nav'>
            <ul class="l-nav__list">
                <li class="l-nav__item">
                    <a class="l-nav__link" href="<?= SITEROOT; ?>hoge1/">nav2</a>
                </li>
            </ul>
        </nav>
    </div>
    <button class="l-hmb" aria-label="メニューボタン"><span></span></button>
    <div class="l-bg"></div>
</header>
