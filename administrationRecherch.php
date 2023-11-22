<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="navigation">
        <ul>
            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="card-sharp"></ion-icon>
                    </span>
                    <span class="title">CIH BANK</span>
                </a>
            </li>

            <li>
                <a href="administration.php">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="title">Home</span>
                </a>
            </li>

            <li>
                <a href="administrationRecherch.php">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">Rechercher</span>
                </a>
            </li>

            <li>
                <a href="#ajouter">
                    <span class="icon">
                        <ion-icon name="add-circle-outline"></ion-icon>
                    </span>
                    <span class="title">Ajouter</span>
                </a>
            </li>

            <li>
                <a href="administrationDelete.php">
                    <span class="icon">
                        <ion-icon name="trash-outline"></ion-icon>
                    </span>
                    <span class="title">supprimer</span>
                </a>
            </li>


            <li>
                <a href="administrationUpdate.php">
                    <span class="icon">
                        <ion-icon name="cloud-upload-outline"></ion-icon>
                    </span>
                    <span class="title">update</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="settings-outline"></ion-icon>
                    </span>
                    <span class="title">Settings</span>
                </a>
            </li>

            <li>
                <a href="index.php">
                    <span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </span>
                    <span class="title">Sign Out</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

            <div class="search">
                <label>
                    <input type="text" placeholder="Search here">
                    <ion-icon name="search-outline"></ion-icon>
                </label>
            </div>

            <div class="user">
                <img src="assets/imgs/customer01.jpg" alt="">
            </div>
        </div>

        <!-- ======================= Cards ================== -->
        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers">1,504</div>
                    <div class="cardName">Daily Views</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">80</div>
                    <div class="cardName">Client</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="accessibility-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">284</div>
                    <div class="cardName">Transaction</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="swap-horizontal-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">$7,842</div>
                    <div class="cardName">Earning</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="cash-outline"></ion-icon>
                </div>
            </div>
        </div>

        <!-- ================ ajoute les client ================= -->
        <h1 id="ajouter">Rechercher</h1>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

            <div class="label">Rechercher</div>
            <input type="text" name="FirstName">
            <button class="submit" type="submit" name="submit">SELECT</button>

        </form>


        <!-- ================ Order Details List ================= -->
        <div id="details" class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Résultat </h2>
                    <a href="#" class="btn">View All</a>
                </div>
                <?php
                include("connect.php");
                if (isset($_POST["submit"])) {
                    $query = "SELECT *FROM client WHERE FirstName ='$_POST[FirstName]' ";
                    $result = mysqli_query($con, $query);
                    echo "<table border='1'>
                                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>FirstName</th>
                                <th>LastName</th>
                                <th>Email</th>
                                <th>telephone</th>
                                <th>Date de na</th>
                                <th>Address</th>
                                <th>Salary</th>
                            </tr>
                            </thead>

                                        ";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "
                             <tbody><tr>
                            <td>{$row['id']}</td>
                            <td>{$row['FirstName']}</td>
                            <td>{$row['LastName']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['tel']}</td>
                            <td>{$row['date_in']}</td>
                            <td>{$row['Address_C']}</td>
                            <td>1000DHs</td>
                           </tr>";
                    }

                    echo "</tbody></table>";
                    echo "RECORD SELECT :" . mysqli_affected_rows($con);

                }
                ?>




                <!-- =========== Scripts =========  -->
                <script src="assets/js/main.js"></script>

                <!-- ====== ionicons ======= -->
                <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
                <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>