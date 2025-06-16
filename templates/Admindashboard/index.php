<div class="container bg-white p-5">
    <h2 class="text-center fw-bold mb-5">👨‍💻 Admin Dashboard</h2>

    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <div class="col">
                <div class="card shadow-lg border-light">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-book fa-3x"></i>
                        <h5 class="card-title mt-3 text-dark">Total Books</h5>
                        <p class="fs-1 fw-bold text-danger"><?= h($booksCount) ?></p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-lg border-light">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-user fa-3x"></i>
                        <h5 class="card-title mt-3">Total Suppliers</h5>
                        <p class="fs-1 fw-bold text-warning"><?= h($suppliersCount) ?></p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-lg border-light">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-dollar-sign fa-3x"></i>
                        <h5 class="card-title mt-3">Total Amount of Sales</h5>
                        <p class="fs-1 fw-bold text-success"><?= number_format($totalAmount, 2) ?></p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-lg border-light">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-cart-shopping fa-3x"></i>
                        <h5 class="card-title mt-3">Total Orders of Sales</h5>
                        <p class="fs-1 fw-bold text-danger"><?= h($totalOrdersCount) ?></p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-lg border-light">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-dollar-sign fa-3x"></i>
                        <h5 class="card-title mt-3">Today Sales</h5>
                        <p class="fs-1 fw-bold text-warning"><?= number_format($todaytotalAmount, 2) ?></p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-lg border-light">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-cart-shopping fa-3x"></i>
                        <h5 class="card-title mt-3">Today Orders</h5>
                        <p class="fs-1 fw-bold text-success"><?= h($ordersCount) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>