<?php
/*
 * Simple contact form processor.
 * When the form is submitted via POST, the input data is sanitized and
 * a success message is displayed. You can extend this to send emails or
 * store submissions in a database as needed.
 */
$formSubmitted = false;
$errors = [];
$name = $email = $phone = $message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Sanitize and validate inputs
  $name = htmlspecialchars(trim($_POST['name'] ?? ''));
  $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
  $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
  $message = htmlspecialchars(trim($_POST['message'] ?? ''));

  // Basic validation
  if ($name === '') {
    $errors[] = 'Please enter your name.';
  }
  if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
  }
  if ($message === '') {
    $errors[] = 'Please enter your message.';
  }

  if (empty($errors)) {
    $formSubmitted = true;
    // Here you could send an email or store the data as needed.
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Contact Ramji Oxyved for inquiries about Hyperbaric Oxygen Therapy products, services, or support through our secure online form.">
  <title>Contact Us | Ramji Oxyved</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.html">
        <img src="images/logo.png" alt="Ramji Oxyved Logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="products.html">Products</a></li>
          <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="hbot.html">HBOT</a></li>
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="contact.php">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </nav>

    <!-- Page Header -->
    <section class="page-banner" style="background-image:url('images/header.jpg'); --banner-height:50vh; --banner-offset:0;">
      <div class="header-content">
        <h1 class="display-4">Contact Us</h1>
      </div>
    </section>

  <!-- Contact Form Section -->
  <section class="section">
    <div class="container">
      <h2 class="section-title text-center">Get in Touch</h2>
      <?php if ($formSubmitted && empty($errors)): ?>
        <div class="alert alert-success" role="alert">
          Thank you, <?php echo $name; ?>. Your message has been sent successfully! We will get back to you soon.
        </div>
      <?php else: ?>
        <?php if (!empty($errors)): ?>
          <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
              <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="contact-form-card">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            <div class="col-md-6">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
            </div>
            <div class="col-md-12">
              <label for="message" class="form-label">Message</label>
              <textarea class="form-control" id="message" name="message" rows="5" required><?php echo htmlspecialchars($message); ?></textarea>
            </div>
          </div>
          <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary px-4">Send Message</button>
          </div>
        </form>
      <?php endif; ?>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <p class="mb-2">&copy; 2025 Ramji Oxyved Pvt. Ltd. All rights reserved.</p>
      <p class="small">Designed with care to promote better health and healing.</p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Custom JS -->
  <script src="js/script.js"></script>
</body>
</html>