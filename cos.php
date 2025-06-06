<?php
$id_produs = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if (!is_numeric($_POST['id_produs']))
  {
    return;
  }

  $id_produs = (int)$_POST['id_produs'] ;

	if(isset($_POST['submit'])) 
	{
	  include "connect.php";
    $sql = "INSERT into `cos_cumparaturi` (Id_Produs, Id_User) VALUES ($id_produs, 0)";
    if ($link->query($sql) === TRUE) 
    {
      //echo "New record created successfully";
    }
    mysqli_close($link);
	}
}
?>
<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Coș Cumpărături - Elegance</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="cos.css" />
  </head>
  <body>
    <header>
      <div class="logo">Elegance</div>
      <p>Bijuterii de lux pentru momente speciale</p>
    </header>

    <nav>
      <ul>
        <li><a href="index.html">Acasă</a></li>
        <li class="dropdown">
          <a href="produse.php">Produse</a>
          <div class="dropdown-content">
            <a href="inele.php">Inele</a>
            <a href="bratari.php">Brățări</a>
            <a href="cercei.php">Cercei</a>
            <a href="lanturi.php">Lanțuri</a>
          </div>
        </li>
        <li><a href="cos.php" class="active">Coș Cumpărături</a></li>
        <li><a href="cont.php">Cont Client</a></li>
      </ul>
    </nav>

    <main class="container">
      <div class="cart-header">
        <h1>Coșul meu de cumpărături</h1>
        <p>Verificați și finalizați comanda dumneavoastră</p>
      </div>

      <div class="cart-container">
        <div class="cart-items">
          <?php
          include 'connect.php';
          $sql = "SELECT produse.* FROM cos_cumparaturi INNER JOIN produse ON cos_cumparaturi.Id_Produs = produse.ID WHERE Id_User = 0";
          $rez = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_array($rez)) {
            echo"
            <img src='" . $row['LinkPoza'] . "' alt='" . $row['Nume'] . "' />
            <div class='item-details'>
              <h3>" . $row['Nume'] . "</h3>
            </div>
            <div class='item-price'>" . $row['Pret'] . " Lei</div>
            <div class='item-quantity'>
              <button class='quantity-btn decrease'>-</button>
              <input type='number' value='1' min='1' class='quantity-input' />
              <button class='quantity-btn increase'>+</button>
            </div>
            <div class='item-remove'>
              <button class='remove-btn'>×</button>
            </div>
            <div class=cart_empty style='display: none'>
              <p>Coșul dumneavoastră este gol</p>
              <a href='produse.php' class='btn'>Continuă cumpărăturile</a>
            </div>
            "
          ;

          }
          //mysqli_close($link);
          ?>


<!--
          <div class="cart-item">
            <div class="item-image">
              <img src="/api/placeholder/100/100" alt="Inel de logodnă" />
            </div>
            <div class="item-details">
              <h3>Inel de Logodnă Aurora</h3>
              <p class="item-description">
                Aur alb 18K, diamant central 0.5 carate
              </p>
            </div>
            <div class="item-price">1.999 Lei</div>
            <div class="item-quantity">
              <button class="quantity-btn decrease">-</button>
              <input type="number" value="1" min="1" class="quantity-input" />
              <button class="quantity-btn increase">+</button>
            </div>
            <div class="item-total">1.999 Lei</div>
            <div class="item-remove">
              <button class="remove-btn">×</button>
            </div>
          </div>
            

          <div class="cart-item">
            <div class="item-image">
              <img src="/api/placeholder/100/100" alt="Brățară argint" />
            </div>
            <div class="item-details">
              <h3>Brățară Tennis Argint</h3>
              <p class="item-description">
                Argint 925, zirconii, lungime ajustabilă
              </p>
            </div>
            <div class="item-price">799 Lei</div>
            <div class="item-quantity">
              <button class="quantity-btn decrease">-</button>
              <input type="number" value="1" min="1" class="quantity-input" />
              <button class="quantity-btn increase">+</button>
            </div>
            <div class="item-total">799 Lei</div>
            <div class="item-remove">
              <button class="remove-btn">×</button>
            </div>
          </div>
        
          <div class="cart-empty" style="display: none">
            <p>Coșul dumneavoastră este gol</p>
            <a href="produse.php" class="btn">Continuă cumpărăturile</a>
          </div>
        </div>
         -->

        <div class="cart-summary">

        <?php
          $sql = "SELECT SUM(produse.Pret) AS Subtotal FROM cos_cumparaturi INNER JOIN produse ON cos_cumparaturi.Id_Produs = produse.ID WHERE Id_User = 0";
          $rez = mysqli_query($link, $sql);
          $row = mysqli_fetch_array($rez);
          $subtotal = $row['Subtotal'];
          $transport = 20; // cost transport
          $tva = $subtotal * 0.19; // TVA 19%
          $total = $subtotal + $transport + $tva;
          mysqli_close($link);
          
        ?>
          <!-- <h2>Sumar comandă</h2>
          <div class="summary-row">
            <span>Subtotal:</span>
            <span>2.798 Lei</span>
          </div>
          <div class="summary-row">
            <span>Transport:</span>
            <span>20 Lei</span>
          </div>
          <div class="summary-row">
            <span>TVA (19%):</span>
            <span>532 Lei</span>
          </div>
          <div class="summary-row total">
            <span>Total:</span>
            <span>3.350 Lei</span>
          </div>

          <div class="coupon-code">
            <input type="text" placeholder="Cod promoțional" />
            <button class="apply-coupon">Aplică</button>
          </div>

          <button class="checkout-btn">Finalizează comanda</button>
          <a href="produse.php" class="continue-shopping"
            >Continuă cumpărăturile</a
          > -->
        </div>
      </div>

      <div class="recommended-products">
        <h2>S-ar putea să vă placă și</h2>
        <div class="products">
          <div class="product">
            <img src="/api/placeholder/150/150" alt="Cercei lungi" />
            <div class="product-info">
              <h3 class="product-title">Cercei Cascade Aur</h3>
              <p class="product-price">1.450 Lei</p>
              <button class="add-to-cart">Adaugă în coș</button>
            </div>
          </div>

          <div class="product">
            <img src="/api/placeholder/150/150" alt="Lanț aur" />
            <div class="product-info">
              <h3 class="product-title">Lanț Venețian Aur</h3>
              <p class="product-price">2.250 Lei</p>
              <button class="add-to-cart">Adaugă în coș</button>
            </div>
          </div>
        </div>
      </div>
    </main>

    <footer>
      <div class="footer-content">
        <div class="footer-section">
          <h3>Despre Elegance</h3>
          <p>
            Bijuterii de lux create cu pasiune și meșteșug tradițional din cele
            mai fine materiale.
          </p>
        </div>

        <div class="footer-section">
          <h3>Informații Utile</h3>
          <a href="#">Termeni și Condiții</a>
          <a href="#">Politica de Confidențialitate</a>
          <a href="#">Politica de Retur</a>
        </div>

        <div class="footer-section">
          <h3>Contact</h3>
          <p>Email: contact@elegance.ro</p>
          <p>Telefon: 0745 123 456</p>
          <p>Adresă: Strada Bijuteriilor nr. 10, București</p>
        </div>
      </div>

      <div class="footer-bottom">
        <p>&copy; 2025 Elegance - Toate drepturile rezervate</p>
      </div>
    </footer>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Mobile dropdown menu toggle
        const dropdowns = document.querySelectorAll(".dropdown");
        dropdowns.forEach((dropdown) => {
          dropdown.addEventListener("click", function (e) {
            if (window.innerWidth <= 768) {
              this.classList.toggle("active");
              e.preventDefault();
            }
          });
        });

        // Quantity buttons functionality
        const decreaseButtons = document.querySelectorAll(".decrease");
        const increaseButtons = document.querySelectorAll(".increase");
        const quantityInputs = document.querySelectorAll(".quantity-input");
        const removeButtons = document.querySelectorAll(".remove-btn");
        const cartItems = document.querySelectorAll(".cart-item");
        const cartEmpty = document.querySelector(".cart-empty");

        // Increase quantity
        increaseButtons.forEach((button, index) => {
          button.addEventListener("click", function () {
            let currentValue = parseInt(quantityInputs[index].value);
            quantityInputs[index].value = currentValue + 1;
            updateTotals();
          });
        });

        // Decrease quantity
        decreaseButtons.forEach((button, index) => {
          button.addEventListener("click", function () {
            let currentValue = parseInt(quantityInputs[index].value);
            if (currentValue > 1) {
              quantityInputs[index].value = currentValue - 1;
              updateTotals();
            }
          });
        });

        // Update totals when quantity changes
        quantityInputs.forEach((input) => {
          input.addEventListener("change", function () {
            if (parseInt(this.value) < 1) {
              this.value = 1;
            }
            updateTotals();
          });
        });

        // Remove item from cart
        removeButtons.forEach((button, index) => {
          button.addEventListener("click", function () {
            cartItems[index].remove();
            if (document.querySelectorAll(".cart-item").length === 0) {
              cartEmpty.style.display = "flex";
            }
            updateTotals();
          });
        });

        // Apply coupon code
        const applyCouponBtn = document.querySelector(".apply-coupon");
        const couponInput = document.querySelector(".coupon-code input");

        applyCouponBtn.addEventListener("click", function () {
          if (couponInput.value.trim() !== "") {
            alert("Codul promoțional a fost aplicat!");
            // Here you would implement the actual discount logic
          } else {
            alert("Vă rugăm să introduceți un cod promoțional valid.");
          }
        });

        // Checkout button
        const checkoutBtn = document.querySelector(".checkout-btn");

        checkoutBtn.addEventListener("click", function () {
          alert("Veți fi redirecționat către pagina de finalizare a comenzii!");
          // Here you would redirect to checkout page
        });

        // Function to update totals
        function updateTotals() {
          let subtotal = 0;
          const items = document.querySelectorAll(".cart-item");

          items.forEach((item) => {
            const price = parseFloat(
              item
                .querySelector(".item-price")
                .textContent.replace("Lei", "")
                .trim()
            );
            const quantity = parseInt(
              item.querySelector(".quantity-input").value
            );
            const total = price * quantity;

            item.querySelector(".item-total").textContent =
              total.toFixed(0) + " Lei";
            subtotal += total;
          });

          const transport = 20;
          const tva = subtotal * 0.19;
          const total = subtotal + transport + tva;

          document.querySelector(
            ".summary-row:nth-child(1) span:last-child"
          ).textContent = subtotal.toFixed(0) + " Lei";
          document.querySelector(
            ".summary-row:nth-child(3) span:last-child"
          ).textContent = tva.toFixed(0) + " Lei";
          document.querySelector(".total span:last-child").textContent =
            total.toFixed(0) + " Lei";
        }
      });
    </script>
  </body>
</html>
