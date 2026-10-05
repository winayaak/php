<?php
include "db.php";
session_start();



if (isset($_POST['add'])) {

    $pname=$_POST['pname'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $supplier=$_POST['supplier'];
    $sql=$conn->prepare("insert into products(pname,price,quantity,supplier)values(?,?,?,?)");
    $sql->bind_param('siis',$pname,$price,$quantity,$supplier);
    if($sql->execute()){
        echo " Record inserted successully";
    }
}

if(isset($_POST['update'])){

    $pid=$_POST['pid'];
    $pname=$_POST['pname'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $supplier=$_POST['supplier'];
    $sql=$conn->prepare("update products set pname=?,price=?,quantity=?,supplier=? where pid=?");
    $sql->bind_param('siisi',$pname,$price,$quantity,$supplier,$pid);
    if($sql->execute()){
        echo "Record updated successfully";
    }
}

if(isset($_POST['delete'])){

    $pid=$_POST['pid'];
    $sql=$conn->prepare("delete from products where pid=?");
    $sql->bind_param('i',$pid);
    if ($sql->execute()) {
        echo " Record deleted";
    }
}

$result=$conn->query("select * from products");

?>
<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Management</title>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>

        <header>

            <nav
                class="navbar navbar-expand-sm navbar-light bg-success"
            >
                <div class="container">

                    <a class="navbar-brand" href="#">
                        <h2>Hello</h2>
                    </a>

                    <button
                        class="navbar-toggler d-lg-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId"
                        aria-controls="collapsibleNavId"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="collapsibleNavId">

                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">

                            <li class="nav-item">
                                <a
                                    class="nav-link active"
                                    href="#"
                                    aria-current="page"
                                >
                                    Home
                                    <span class="visually-hidden">(current)</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>

                            <li class="nav-item dropdown">

                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="dropdownId"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    Dropdown
                                </a>

                                <div
                                    class="dropdown-menu"
                                    aria-labelledby="dropdownId"
                                >

                                    <a class="dropdown-item" href="#">
                                        Action 1
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        Action 2
                                    </a>

                                </div>

                            </li>

                        </ul>

                        <a
                            name=""
                            id=""
                            class="btn btn-primary"
                            href="pdf.php"
                            role="button"
                        >
                            Pdf
                        </a>

                        <a
                            name=""
                            id=""
                            class="btn btn-danger m-1"
                            href="logout.php"
                            role="button"
                        >
                            logout
                        </a>

                    </div>

                </div>

            </nav>

        </header>


        <main>

        <div class="container mt-4">


        <!-- ================= ADD PRODUCTS ================= -->

        <div class="card shadow mb-5">

            <div class="card-header bg-success text-white">

                <h3 class="mb-0">
                    Add Products
                </h3>

            </div>


            <div class="card-body">

                <form action="" method="POST">

                    <div class="mb-3">

                        <label
                            for=""
                            class="form-label fw-bold"
                        >
                            Name
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            name="pname"
                            id=""
                            placeholder="Enter product name"
                        />

                    </div>


                    <div class="mb-3">

                        <label
                            for=""
                            class="form-label fw-bold"
                        >
                            Price
                        </label>

                        <input
                            type="number"
                            class="form-control"
                            name="price"
                            id=""
                            placeholder="Enter price"
                        />

                    </div>


                    <div class="mb-3">

                        <label
                            for=""
                            class="form-label fw-bold"
                        >
                            Quantity
                        </label>

                        <input
                            type="number"
                            class="form-control"
                            name="quantity"
                            id=""
                            placeholder="Enter quantity"
                        />

                    </div>


                    <div class="mb-3">

                        <label
                            for=""
                            class="form-label fw-bold"
                        >
                            Supplier
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            name="supplier"
                            id=""
                            placeholder="Enter supplier name"
                        />

                    </div>


                    <button
                        type="submit"
                        name="add"
                        class="btn btn-success"
                    >
                        Add
                    </button>

                </form>

            </div>

        </div>



        <!-- ================= ALL PRODUCTS ================= -->

        <div class="card shadow mb-5">

            <div class="card-header bg-success text-white">

                <h3 class="mb-0">
                    All Products
                </h3>

            </div>


            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle shadow-sm">

                        <tr class="table-success">

                            <th>Id</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Supplier</th>
                            <th>Action</th>
                            <th>Action</th>

                        </tr>


                        <?php while($row=$result->fetch_assoc()) { ?>

                        <tr>

                            <td>
                                <?php echo $row['pid']; ?>
                            </td>


                            <td>

                                <form action="" method="POST">

                                    <input
                                        type="hidden"
                                        name="pid"
                                        value="<?php echo $row['pid'];?>"
                                    >

                                    <input
                                        type="text"
                                        name="pname"
                                        value="<?php echo $row['pname'];?>"
                                        class="form-control"
                                    >

                            </td>


                            <td>

                                <input
                                    type="number"
                                    name="price"
                                    value="<?php echo $row['price'];?>"
                                    class="form-control"
                                >

                            </td>


                            <td>

                                <input
                                    type="number"
                                    name="quantity"
                                    value="<?php echo $row['quantity'];?>"
                                    class="form-control"
                                >

                            </td>


                            <td>

                                <input
                                    type="text"
                                    name="supplier"
                                    value="<?php echo $row['supplier'];?>"
                                    class="form-control"
                                >

                            </td>


                            <td>

                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                    name="update"
                                >
                                    Update
                                </button>

                                </form>

                            </td>


                            <td>

                                <form action="" method="POST">

                                    <input
                                        type="hidden"
                                        name="pid"
                                        value="<?php echo $row['pid'];?>"
                                    >

                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                        name="delete"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                        <?php
                        }
                        ?>

                    </table>

                </div>

            </div>

        </div>


        </div>

        </main>


        <footer>
            <!-- place footer here -->
        </footer>


        <!-- Bootstrap JavaScript Bundle -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYWJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>

    </body>
</html>