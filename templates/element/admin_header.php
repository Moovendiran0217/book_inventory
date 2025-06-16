<nav class="navbar navbar-expand-lg">

  <p class="display-5 ms-3 ms-lg-5 fw-semibold text-white"><span class="text-warning fw-bold">Zara</span> Books</p>

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
        <a class="nav-link text-white fw-semibold"
          href="<?= $this->url->build(['controller' => 'Admindashboard', 'action' => 'index']) ?>">
          <i class="fa-solid fa-gauge ms-1 me-2"></i>Dashboard
        </a>
      </li>

      <!-- Users Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          <i class="fa-solid fa-users me-2"></i>User Management
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="nav-link" 
              href="<?= $this->url->build(['controller' => 'Users', 'action' => 'view']) ?>">
              View All
            </a>
          </li>
          <li>
            <a class="nav-link" 
              href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'view', '?' => ['role' => 'admin']]) ?>">
              View Admin
            </a>
          </li>
          <li>
            <a class="nav-link" 
              href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'view', '?' => ['role' => 'user'] ]) ?>">
              View Users
            </a>
          </li>
          <li>
            <a class="nav-link" 
              href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'add']) ?>">
              Add User
            </a>
          </li> 
        </ul>
      </li>


      <!-- Books Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          <i class="fa-solid fa-book ms-1 me-2"></i>Books
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="nav-link" 
              href="<?= $this->url->build(['controller' => 'Books', 'action' => 'index']) ?>">
              View Books
            </a>
          </li>
          <li>
            <a class="nav-link" 
              href="<?= $this->url->build(['controller' => 'Books', 'action' => 'add']) ?>">
              Add Book
            </a>
          </li>
        </ul>
      </li>

      <!-- Suppliers Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          <i class="fa-solid fa-truck me-2"></i>Suppliers
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="nav-link" 
              href="<?= $this->url->build(['controller' => 'Suppliers', 'action' => 'index']) ?>">
              View Suppliers
            </a>
          </li>
          <li>
            <a class="nav-link" 
              href="<?= $this->url->build(['controller' => 'Suppliers', 'action' => 'add']) ?>">
              Add Supplier
            </a>
          </li>
        </ul>
      </li>

      <!-- Purchase Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          <i class="fa-solid fa-cart-shopping me-2"></i>Purchase
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="nav-link" 
              href="<?= $this->url->build(['controller' => 'Purchase', 'action' => 'index']) ?>">
              View Purchase
            </a>
          </li>
          <li>
            <a class="nav-link" 
              href="<?= $this->url->build(['controller' => 'Purchase', 'action' => 'add']) ?>">
              Add Purchase
            </a>
          </li>
        </ul>
      </li>

      <!-- Report Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          <i class="fas fa-file ms-1 me-2"></i>Reports
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="nav-link"
              href="<?= $this->url->build(['controller' => 'Report', 'action' => 'salesReport']) ?>">
              Sales Report
            </a>
          </li>
          <li>
            <a class="nav-link"
              href="<?= $this->url->build(['controller' => 'Report', 'action' => 'purchaseReport']) ?>">
              Purchase Report
            </a>
          </li>
        </ul>
      </li>

    </ul>
  </div>
  </div>
</nav>