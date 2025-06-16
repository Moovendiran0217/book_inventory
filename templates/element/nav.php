<aside class="mb-4 bg-dark rounded-3 text-white p-5">
  <nav class="nav flex-sm-row flex-md-column">

    <h4 class="mb-4 w-100">User Panel</h4>

    <!-- Dashboard Link -->
    <div class="d-flex align-items-center">
      <i class="fa-solid fa-book"></i>
      <?= $this->Html->link('Books', ['controller' => 'Userdashboard', 'action' => 'index'], ['class' => 'nav-link text-white']) ?>
    </div>

    <div class="d-flex align-items-center">
      <i class="fa-solid fa-cart-shopping"></i>
      <?= $this->Html->link('My Cart', ['controller' => 'Userdashboard', 'action' => 'viewCart'], ['class' => 'nav-link text-white']) ?>
    </div>

    <div class="d-flex align-items-center">
      <i class="fas fa-file-invoice"></i>
      <?= $this->Html->link('All Invoices', ['controller' => 'Userdashboard', 'action' => 'allInvoices'], ['class' => 'nav-link text-white']) ?>
    </div>

    <div class="d-flex align-items-center">
      <i class="fas fa-sign-out"></i>
      <?= $this->Html->link('Logout', ['controller' => 'users', 'action' => 'logout'], ['class' => 'nav-link text-white']) ?>
    </div>
    
  </nav>
</aside>