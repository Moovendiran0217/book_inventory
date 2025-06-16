<nav class="navbar navbar-expand-lg">

  <p class="display-5 ms-3 ms-lg-5 fw-semibold text-white"><span class=" text-warning fw-bold">Zara</span> Books</p>

  <button class="navbar-toggler bg-white ms-auto me-2" type="button" data-bs-toggle="collapse"
    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
    aria-label="Toggle navigation">
    <i class="fa-solid fa-bars text-dark"></i>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <!-- Navigation menu links -->
    <ul class="navbar-nav ms-3 ms-lg-auto me-5">
      
      <?php $user = $this->request->getAttribute('identity'); ?>
      <!-- User Dropdown -->    
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          <i class="fas fa-user me-1 ms-1"></i>
          <?= h($user ? $user->get('username') : 'Guest'); ?>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="nav-link"
              href="<?= $this->url->build(['controller' => 'users', 'action' => 'logout']) ?>">
              <i class="fas fa-sign-out ms-3 me-2"></i>Logout
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white fw-semibold" href="<?= $this->url->build(['action' => 'index']) ?>">
          <i class="fa-solid fa-book me-2 ms-1"></i>Books
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white fw-semibold" href="<?= $this->url->build(['action' => 'viewCart']) ?>">
          <i class="fa-solid fa-cart-shopping me-2"></i>My Cart
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white fw-semibold" href="<?= $this->url->build(['action' => 'allInvoices']) ?>">
          <i class="fas fa-file-invoice me-2 ms-1"></i>My Orders
        </a>
      </li>

    </ul>
  </div>
</nav>