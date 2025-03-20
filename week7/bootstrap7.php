<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Travel Site</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<!-- Nav Bar -->
<body>
  <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid w-100">
      <a class="navbar-brand" href="#">Travel Site</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#gallery-section">Gallery</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              Destinations
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#destination1">Destination 1</a></li>
              <li><a class="dropdown-item" href="#destination2">Destination 2</a></li>
              <li><a class="dropdown-item" href="#destination3">Destination 3</a></li>
              <li><a class="dropdown-item" href="#destination4">Destination 4</a></li>
              <li><a class="dropdown-item" href="#destination5">Destination 5</a></li>
              <li><a class="dropdown-item" href="#destination6">Destination 6</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact-section">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Carousel -->
  <div id="carouselExample" class="carousel slide mt-3" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://placehold.co/1200x400?text=Mountain+Adventures" class="d-block w-100"
          alt="Mountain Adventures">
      </div>
      <div class="carousel-item">
        <img src="https://placehold.co/1200x400?text=City+Lights" class="d-block w-100" alt="City Lights">
      </div>
      <div class="carousel-item">
        <img src="https://placehold.co/1200x400?text=Beautiful+Beaches" class="d-block w-100" alt="Beautiful Beaches">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>

  <!-- Gallery Section -->
  <div class="container mt-5 mb-5" id="gallery-section">
    <h2 class="text-center mb-4">Gallery</h2>
    <div class="row g-2">
      <div class="col-md-6 col-lg-4 p-3" id="destination1">
        <img src="https://placehold.co/400x250?text=Destination+1" class="img-fluid rounded" alt="Destination 1">
      </div>
      <div class="col-md-6 col-lg-4 p-3" id="destination2">
        <img src="https://placehold.co/400x250?text=Destination+2" class="img-fluid rounded" alt="Destination 2">
      </div>
      <div class="col-md-6 col-lg-4 p-3" id="destination3">
        <img src="https://placehold.co/400x250?text=Destination+3" class="img-fluid rounded" alt="Destination 3">
      </div>
      <div class="col-md-6 col-lg-4 p-3" id="destination4">
        <img src="https://placehold.co/400x250?text=Destination+4" class="img-fluid rounded" alt="Destination 4">
      </div>
      <div class="col-md-6 col-lg-4 p-3" id="destination5">
        <img src="https://placehold.co/400x250?text=Destination+5" class="img-fluid rounded" alt="Destination 5">
      </div>
      <div class="col-md-6 col-lg-4 p-3" id="destination6">
        <img src="https://placehold.co/400x250?text=Destination+6" class="img-fluid rounded" alt="Destination 6">
      </div>
    </div>
  </div>

  <!-- Contact Us Section -->
  <div class="container mt-5 mb-5" id="contact-section">
    <h2 class="text-center mb-4">Contact Us</h2>
    <div class="text-center">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookingModal">
        Book Now
      </button>
    </div>
  </div>

  <!-- Booking Form Modal -->
  <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bookingModalLabel">Booking Form</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
              <label for="destination" class="form-label">Select Destination</label>
              <select class="form-select" id="destination" required>
                <option value="" disabled selected>Select your destination</option>
                <option value="destination1">Destination 1</option>
                <option value="destination2">Destination 2</option>
                <option value="destination3">Destination 3</option>
                <option value="destination4">Destination 4</option>
                <option value="destination5">Destination 5</option>
                <option value="destination6">Destination 6</option>
              </select>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-success">Confirm Booking</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>