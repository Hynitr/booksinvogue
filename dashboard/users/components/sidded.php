<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div style="position:fixed" class="fixx bg-menu-theme">
        <div class="app-brand demo">
            <a href="./" class="app-brand-link">
                <span class="app-brand-logo demo">

                </span>
                <span class="app-brand-text demo menu-text fw-bolder ms-2">Books In Vogue</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
                <a href="./" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>

            <!-- Layouts -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Books Corner</span>
            </li>

            <li class="menu-item">
                <a href="./bookshelf" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-collection"></i>
                    <div data-i18n="book">My Bookshelf</div>
                </a>
            </li>


            <li class="menu-item">
                <a href="./books" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-book"></i>
                    <div data-i18n="book">Buy a new book</div>
                </a>
            </li>

            <li class="menu-item">
                <a href="#" class="menu-link" data-bs-toggle="modal" data-bs-target="#modalupgrade">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Authentications">Publish your own book</div>
                </a>

            </li>
            <li class="menu-item">
                <a href="./wishlist" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-cart"></i>
                    <div data-i18n="Authentications">My Wishlist</div>
                </a>

            </li>

            <!-- Components -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Transactions</span></li>
            <!-- Cards -->
            <li class="menu-item">
                <a href="./transactions" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-dollar"></i>
                    <div data-i18n="Basic">My Transactions</div>
                </a>
            </li>

            <!-- Forms & Tables -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Profile &amp;
                    Settings</span></li>
            <!-- Forms -->
            <li class="menu-item">
                <a href="./profile" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-detail"></i>
                    <div data-i18n="Form Elements">My Profile</div>
                </a>

            </li>
            <!-- Tables -->
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-support"></i>
                    <div data-i18n="Tables">Support</div>
                </a>
            </li>

            <li class="menu-item">
                <a href="./logout" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-lock"></i>
                    <div data-i18n="Tables">Logout</div>
                </a>
            </li>

        </ul>
    </div>

</aside>
<!-- Modal -->
<div class="modal fade" id="modalupgrade" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Publish your own book</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <p>You are about to upgrade your account and become an author. </p>
                    <p>You previous transaction history, wallet balance and reading history will remain same </p>
                    <p>With an author account, you can upload you own books and earn royalties</p>
                    <p id="note" class="fw-bold text-danger">Will you love to proceed?</p>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="button" id="upgrd" class="btn btn-primary">Continue</button>
            </div>
        </div>
    </div>
</div>