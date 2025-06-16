<aside class="bg-dark text-white p-5">
  <nav class="nav flex-sm-row flex-md-column">

    <h4 class="mb-4 w-100">Admin Panel</h4>

    <!-- Dashboard Link -->
    <div class="d-flex align-items-center">
      <i class="fa-solid fa-gauge"></i>
      <?= $this->Html->link('Dashboard', ['controller' => 'Admindashboard', 'action' => 'index'], ['class' => 'nav-link text-white']) ?>
    </div>
    
    <!-- Books Dropdown -->
    <div class="dropdown d-flex align-items-center">
      <i class="fa-solid fa-book"></i>
      <a class="text-white nav-link dropdown-toggle ms-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Books Details</a>   
      <div class="dropdown-menu" aria-labelledby="booksDropdown">
        <?= $this->Html->link('View Books', ['controller' => 'Books', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
        <?= $this->Html->link('Add New Book', ['controller' => 'Books', 'action' => 'add'], ['class' => 'dropdown-item']) ?>
      </div>
    </div>

    <!-- Suppliers Dropdown -->
    <div class="dropdown d-flex align-items-center">
      <i class="fa-solid fa-user"></i>
      <a class="text-white nav-link dropdown-toggle ms-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Suppliers Details</a>
      <div class="dropdown-menu" aria-labelledby="suppliersDropdown">
        <?= $this->Html->link('View Suppliers', ['controller' => 'Suppliers', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
        <?= $this->Html->link('Add Supplier', ['controller' => 'Suppliers', 'action' => 'add'], ['class' => 'dropdown-item']) ?>
      </div>
    </div>

    <!-- Purchase Dropdown -->
    <div class="dropdown d-flex align-items-center">
      <i class="fa-solid fa-cart-shopping"></i>
      <a class="text-white nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Purchase Details</a>
      <div class="dropdown-menu" aria-labelledby="suppliersDropdown">
        <?= $this->Html->link('View Purchase', ['controller' => 'Purchase', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
        <?= $this->Html->link('Add Purchase', ['controller' => 'Purchase', 'action' => 'add'], ['class' => 'dropdown-item']) ?>
      </div>
    </div>

    <!-- Report Dropdown -->
    <div class="dropdown d-flex align-items-center">
      <i class="fas fa-file"></i>
      <a class="text-white nav-link dropdown-toggle ms-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Reports</a>
      <div class="dropdown-menu" aria-labelledby="suppliersDropdown">
        <?= $this->Html->link('Sales Report', ['controller' => 'Admindashboard', 'action' => 'salesReport'], ['class' => 'dropdown-item']) ?>
        <?= $this->Html->link('Purchase Report', ['controller' => 'Admindashboard', 'action' => 'purchaseReport'], ['class' => 'dropdown-item']) ?>
      </div>
    </div>

    <div class="d-flex align-items-center">
      <i class="fas fa-sign-out"></i>
      <?= $this->Html->link('Logout', ['controller' => 'users', 'action' => 'logout'], ['class' => 'nav-link text-white']) ?>
    </div>

  </nav>
</aside>