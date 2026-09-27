<?php
include "db.php";
session_start();

if (!isset($_SESSION['name'])) {

    header("Location:login.php");
    exit;

}

if (isset($_POST['add'])) {

    $pname=$_POST['pname'];
    $category=$_POST['category'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $brand=$_POST['brand'];
    $description=$_POST['description'];
    $sql=$conn->prepare("insert into products(pname,category,price,quantity,brand,description)values(?,?,?,?,?,?)");
    $sql->bind_param('ssiiss',$pname,$category,$price,$quantity,$brand,$description);
    if($sql->execute()){
        echo " Record inserted successully";
    }
}

if(isset($_POST['update'])){

    $pid=$_POST['pid'];
    $pname=$_POST['pname'];
    $category=$_POST['category'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $brand=$_POST['brand'];
    $description=$_POST['description'];
    $sql=$conn->prepare("update products set pname=?,category=?,price=?,quantity=?,brand=?,description=? where pid=?");
    $sql->bind_param('ssiissi',$pname,$category,$price,$quantity,$brand,$description,$pid);
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
        <!-- Required meta tags -->
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
            <!-- place navbar here -->
        </header>
        <main>

        <div
            class="container mt-4"
        >

        <h2>Hello <?php echo $_SESSION['name']; ?></h2>

        <hr>

        <h3>Add Products</h3>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input
                    type="text"
                    class="form-control"
                    name="pname"
                    id=""
                    aria-describedby="helpId"
                    placeholder=""
                />
               
            </div>
            

            <div class="mb-3">
                <label for="" class="form-label">Category</label>
                <input
                    type="text"
                    class="form-control"
                    name="category"
                    id=""
                    aria-describedby="helpId"
                    placeholder=""
                />
               
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <input
                    type="number"
                    class="form-control"
                    name="price"
                    id=""
                    aria-describedby="helpId"
                    placeholder=""
                />
               
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Quantity</label>
                <input
                    type="number"
                    class="form-control"
                    name="quantity"
                    id=""
                    aria-describedby="helpId"
                    placeholder=""
                />
                
            </div>


            <div class="mb-3">
                <label for="" class="form-label">Brand</label>
                <input
                    type="text"
                    class="form-control"
                    name="brand"
                    id=""
                    aria-describedby="helpId"
                    placeholder=""
                />
                
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <input
                    type="text"
                    class="form-control"
                    name="description"
                    id=""
                    aria-describedby="helpId"
                    placeholder=""
                />
                
            </div>
            
            <button
                type="submit"
                name="add"
                class="btn btn-primary"
            >
                Add
            </button>
            

        </form>

        <hr>

        <h3>All Products</h3>
        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Brand</th>
                <th>Description</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

            <?php while($row=$result->fetch_assoc()) { ?>

            <tr>

            <td>
                <?php echo $row['pid']; ?>
            </td>

            <td>
                <form action="" method="POST">
                    <input type="hidden" name="pid" value="<?php echo $row['pid'];?>">
                    <input type="text" name="pname" value="<?php echo $row['pname'];?>"class="form-control">
                
            </td>

            <td>
                 <input type="text" name="category" value="<?php echo $row['category'];?>"class="form-control">
            </td>
            <td>
                 <input type="number" name="price" value="<?php echo $row['price'];?>"class="form-control">
            </td>
            <td>
                 <input type="number" name="quantity" value="<?php echo $row['quantity'];?>"class="form-control">
            </td>

             <td>
                 <input type="text" name="brand" value="<?php echo $row['brand'];?>"class="form-control">
            </td>

             <td>
                 <input type="text" name="description" value="<?php echo $row['description'];?>"class="form-control">
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
                      <input type="hidden" name="pid" value="<?php echo $row['pid'];?>">
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


        <a href="logout.php" class="btn btn-danger">
        Logout
    </a>
        
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
