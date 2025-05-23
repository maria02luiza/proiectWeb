<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inele - Elegance</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <div class="logo">Elegance</div>
      <p>Bijuterii de lux pentru momente speciale</p>
    </header>

    <nav>
      <ul>
        <li><a href="index.php">Acasă</a></li>
        <li class="dropdown">
          <a href="produse.php" class="active">Produse</a>
          <div class="dropdown-content">
            <a href="inele.php" class="active">Inele</a>
            <a href="bratari.php">Brățări</a>
            <a href="cercei.php">Cercei</a>
            <a href="lanturi.php">Lanțuri</a>
          </div>
        </li>
        <li><a href="cos.html">Coș Cumpărături</a></li>
        <li><a href="cont.html">Cont Client</a></li>
      </ul>
    </nav>

    <main class="container">
      <h2>Inele Elegante</h2>

      <div class="products">
        <?php
        include 'connect.php';
        $sql=" SELECT * FROM `produse` WHERE Id_Categorie=1 ";
        $rez=mysqli_query($link,$sql);
        while($row=mysqli_fetch_array($rez)){
          echo "<div class='product'>
            <img src='".$row['LinkPoza']."' alt='".$row['Nume']."' />
            <div class='product-info'>
              <h3 class='product-title'>".$row['Nume']."</h3>
              <p class='product-price'>".$row['Pret']." Lei</p>
              <button class='add-to-cart'>Adaugă în coș</button>
            </div>
          </div>";
        }
        ?>
       
      </div>
    </main>

    <footer>
      <div class="footer-content">
        <div class="footer-section">
          <h3>Despre Elegance</h3>
          <p>Bijuterii de lux create cu pasiune și meșteșug tradițional.</p>
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
          <p>Adresă: Str. Bijuteriilor nr. 10, București</p>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2025 Elegance - Toate drepturile rezervate</p>
      </div>
    </footer>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const addToCartButtons = document.querySelectorAll(".add-to-cart");

        addToCartButtons.forEach((button) => {
          button.addEventListener("click", function () {
            const product = this.closest(".product");
            const productTitle =
              product.querySelector(".product-title").textContent;

            alert(`Produsul "${productTitle}" a fost adăugat în coș!`);
          });
        });
      });
    </script>
  </body>
</html>
