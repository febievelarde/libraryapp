<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="<?= base_url().'libraryapp/public/vendor/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">
  <link href="<?= base_url().'libraryapp/public/css/heroic-features.css' ?>" rel="stylesheet">
  <title><?= $title ?></title>
</head>
<body style="background-color: #eee;">

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <a class="navbar-brand " href="<?= base_url().'libraryapp/public/'; ?>">
      <strong>LibraryApp</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php if(!session()->has('logged_in')): ?>
            <li class="nav-item <?= ($controller == 'admins' && $page == 'login') ? 'active' : '' ?> " >
              <a class="nav-link" href="<?= base_url().'libraryapp/public/admin/login'; ?>">LIBRARIAN LOGIN</a>
            </li>
          <?php else: ?>
            <li class="nav-item <?= ($controller == 'borrowed_books') ? 'active' : '' ?>">
              <a class="nav-link" href="<?= base_url().'libraryapp/public/admin/borrowed_books'; ?>">BORROWED BOOKS</a>
            </li>
            <li class="nav-item <?= ($controller == 'fines') ? 'active' : '' ?>">
              <a class="nav-link" href="<?= base_url().'libraryapp/public/admin/fines'; ?>">FINES</a>
            </li>
            <li class="nav-item <?= ($controller == 'books') ? 'active' : '' ?>">
              <a class="nav-link" href="<?= base_url().'libraryapp/public/admin/books'; ?>">BOOKS</a>
            </li>
            <li class="nav-item <?= ($controller == 'students') ? 'active' : '' ?>">
              <a class="nav-link" href="<?= base_url().'libraryapp/public/admin/students'; ?>">STUDENTS</a>
            </li>
            <li class="nav-item <?= ($controller == 'course_years') ? 'active' : '' ?>">
              <a class="nav-link" href="<?= base_url().'libraryapp/public/admin/course_years'; ?>">COURSE YEARS</a>
            </li>
            <li class="nav-item <?= ($controller == 'courses') ? 'active' : '' ?>">
              <a class="nav-link" href="<?= base_url().'libraryapp/public/admin/courses'; ?>">COURSES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url().'libraryapp/public/admin/logout'; ?>">LOGOUT</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
  </nav>
  

     