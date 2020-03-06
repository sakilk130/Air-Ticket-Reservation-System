<?php
    session_start();
    if(!isset($_SESSION['loggedinuser']))
	{
		header("Location:Login.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/udashboard.css" />
  </head>
  <body>
  <?php
  $err_from = '';
  $from = '';
  $err_to = '';
  $to = '';
  $err_select = '';
  $err_date = '';
  $date = '';
  $has_err=false;
  if (isset($_POST['submit'])) {
      if ($_POST['from'] == 'NULL') 
      {
          $err_from = '*Please Select';
          $has_err=true;
      } 
      else 
      {
          $from = $_POST['from'];
      }
      if ($_POST['to'] == 'NULL') 
      {
          $err_to = '*Please Select';
          $has_err=true;

      } 
      else 
      {
          if ($_POST['from'] === $_POST['to']) 
          {
              $err_select = '*Error Select';
              $has_err=true;
          } 
          else 
          {
              $to = $_POST['to'];
          }
      }
      if (empty($_POST['date'])) 
      {
          $err_date = '*Date Required';
          $has_err=true;
      } 
      else 
      {
          $date = $_POST['date'];
      }
      if(!$has_err)
      {
        header("Location:usearchresult.php");
      }

  }

  if(isset($_POST['submit2'])){
  session_start();
  if (isset($_SESSION['username']))
  {
    unset($_SESSION['username']);
  }
  session_destroy();
  header("location:Login.php");
  exit();
  }
  ?>
    <section id="navbar">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
          <!-- Brand -->
          <a class="navbar-brand" href="/Mid-Project/index.php"
            >Bangladesh Airlines</a
          >

          <!-- Links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="udashboard.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
          </ul>
          <!-- Dropdown -->
          <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbardrop"
                  data-toggle="dropdown"
                >
                  Hi,<?php echo $_SESSION['loggedinuser'];?>
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="ubookflight.php">Booking</a>
                  <a class="dropdown-item" href="unotice.php">Notice</a>
                  <a class="dropdown-item" href="uchangepassword.php"
                    >Change Password</a
                  >
                  <a class="dropdown-item" href="usettings.php">Settings</a>
                  <form action="" method="post">
                  <input class ="dropdown-item" type="submit" name="submit2" value="Logout">
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </section>
    <table>
      <tr>
        <td>
          <section id="search-flight">
            <div class="container-fluid">
              <div class="login p-l-55 p-r-55 p-t-65 p-b-50">
                <form action="" class="login-form" method="post">
                  <span class="login-form-title">Search Flight</span>
                  <br />
                  <span>From</span><br />
                  <select name="from" id="" class="login-input">
                    <option value="NULL">---</option>
                    <option value="Dhaka" <?php if ($from == 'Dhaka') {
                        echo 'selected';
                    } ?>>DHAKA</option>
                    <option value="Chittagong" <?php if ($from == 'Chittagong') {
                        echo 'selected';
                    } ?>>CHITTAGONG</option>
                    <option value="Cox's Bazar"  <?php if (
                        $from == "Cox's Bazar"
                    ) {
                        echo 'selected';
                    } ?>>COX'S BAZAR</option>
                    <option value="Rajshahi" <?php if ($from == 'Rajshahi') {
                        echo 'selected';
                    } ?>>RAJSHAHI</option>
                  </select>
                  <span style="color:red"><?php echo $err_from; ?></span>
                  <br />
                  <span>To</span> <br />
                  <select name="to" id="" class="login-input">
                    <option value="NULL">---</option>
                    <option value="Dhaka" <?php if ($to == 'Dhaka') {
                        echo 'selected';
                    } ?>>DHAKA</option>
                    <option value="Chittagong" <?php if ($to == 'Chittagong') {
                        echo 'selected';
                    } ?>>CHITTAGONG</option>
                    <option value="Cox's Bazar"  <?php if (
                        $to == "Cox's Bazar"
                    ) {
                        echo 'selected';
                    } ?>>COX'S BAZAR</option>
                    <option value="Rajshahi" <?php if ($to == 'Rajshahi') {
                        echo 'selected';
                    } ?>>RAJSHAHI</option>
                  </select>
                  <span style="color:red"><?php echo $err_to; ?></span>
                  <span style="color:red"><?php echo $err_select; ?></span>
                  <br />
                  <span>Date</span><br />
                  <input class="login-input" type="date" name="date" value="<?php echo $date; ?>" /><br />
                  <span style="color:red"><?php echo $err_date; ?></span>
                  <input type="submit" class="login-form-btn" name="submit" value="Search">
                  
                </form>
              </div>
            </div>
          </section>
        </td>
        <td>
          <section id="slider">
            <div class="slide-changer">
              <div
                id="carouselExampleControls"
                class="carousel slide"
                data-ride="carousel"
              >
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img
                      class="d-block w-100 cimage"
                      src="/Mid-Project/image/airline.jpg"
                      alt="First slide"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      class="d-block w-100 cimage"
                      src="/Mid-Project/image/airline2.jpg"
                      alt="Second slide"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      class="d-block w-100 cimage"
                      src="/Mid-Project/image/airline3.jpg"
                      alt="Third slide"
                    />
                  </div>
                </div>
                <a
                  class="carousel-control-prev"
                  href="#carouselExampleControls"
                  role="button"
                  data-slide="prev"
                >
                  <span
                    class="carousel-control-prev-icon"
                    aria-hidden="true"
                  ></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a
                  class="carousel-control-next"
                  href="#carouselExampleControls"
                  role="button"
                  data-slide="next"
                >
                  <span
                    class="carousel-control-next-icon"
                    aria-hidden="true"
                  ></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </section>
        </td>
      </tr>
    </table>
  </body>
</html>