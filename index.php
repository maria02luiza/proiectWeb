<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Elegance - Bijuterii de Lux</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <header>
      <div class="logo">Elegance</div>
      <p>Bijuterii de lux pentru momente speciale</p>
    </header>

    <nav>
      <ul>
        <li><a href="index.php" class="active">Acasă</a></li>
        <li class="dropdown">
          <a href="produse.php">Produse</a>
          <div class="dropdown-content">
            <a href="inele.php">Inele</a>
            <a href="bratari.php">Brățări</a>
            <a href="cercei.php">Cercei</a>
            <a href="lanturi.php">Lanțuri</a>
          </div>
        </li>
        <li><a href="cos.html">Coș Cumpărături</a></li>
        <li><a href="cont.html">Cont Client</a></li>
      </ul>
    </nav>

    <section class="hero">
      <div class="hero-content">
        <h1>Strălucește cu Elegance</h1>
        <p>
          Bijuterii de lux, create pentru a fi purtate cu stil și rafinament.
        </p>
        <a href="produse.php" class="btn">Descoperă Colecția</a>
      </div>
    </section>

    <main class="container">
      <section class="categories">
        <h2>Categorii Populare</h2>
        <div class="category-grid">
            <!-- php -->
          <?php
          include 'connect.php';
          $sql=" SELECT * FROM `categorii`";
          $rez=mysqli_query($link,$sql);
          while($row=mysqli_fetch_array($rez)){
            echo "<div class='category-card'>
              <a href='".$row['LinkPagina']."'>
              <img src='".$row['LinkPoza']."' alt='".$row['Nume']."' />
              <h3>".$row['Nume']."</h3>";
            echo "</a>
            </div>";
          }
?>
        </div>
      </section>

      
      <section class="advantages">
        <h2>De ce Elegance?</h2>
        <div class="advantages-grid">
          <div class="advantage-item">
            <h3>Calitate Premium</h3>
            <p>
              Bijuterii realizate manual din aur, argint și pietre prețioase
              autentice.
            </p>
          </div>
          <div class="advantage-item">
            <h3>Livrare Rapidă</h3>
            <p>Expediere în 24-48h oriunde în România.</p>
          </div>
          <div class="advantage-item">
            <h3>Retur Gratuit</h3>
            <p>Ai 14 zile să te răzgândești fără costuri suplimentare.</p>
          </div>
        </div>
      </section>

      <!-- Testimoniale -->
      <section class="testimonials">
        <h2>Părerea Clienților</h2>
        <div class="testimonials-grid">
          <div class="testimonial">
            <p>"Un inel absolut superb, exact ca în poze! Recomand cu drag."</p>
            <span>— Andreea M.</span>
          </div>
          <div class="testimonial">
            <p>"Livrare rapidă și ambalaj elegant. M-au câștigat definitiv."</p>
            <span>— Vlad C.</span>
          </div>
        </div>
      </section>
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
  </body>
</html>
