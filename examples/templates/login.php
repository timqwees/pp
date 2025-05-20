<!DOCTYPE html>
<html lang="ru">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Вход - PHP Framework</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 <style>
  body {
   font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
   line-height: 1.6;
   color: #333;
   background-color: #f8f9fa;
   min-height: 100vh;
   display: flex;
   align-items: center;
  }

  .card {
   border: none;
   border-radius: 12px;
   box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  }

  .card-header {
   background: none;
   border-bottom: 1px solid #e9ecef;
   padding: 1.5rem;
  }

  .card-body {
   padding: 1.5rem;
  }

  .btn-primary {
   background: #0071e3;
   border: none;
   border-radius: 980px;
   padding: 0.75rem 1.5rem;
   transition: all 0.2s;
  }

  .btn-primary:hover {
   background: #0077ed;
   transform: translateY(-1px);
  }

  .form-control {
   border-radius: 8px;
   padding: 0.75rem 1rem;
   border: 1px solid #e9ecef;
  }

  .form-control:focus {
   border-color: #0071e3;
   box-shadow: 0 0 0 0.2rem rgba(0, 113, 227, 0.25);
  }

  .alert {
   border-radius: 8px;
   margin-bottom: 1rem;
  }

  .loading {
   display: flex;
   align-items: center;
   justify-content: center;
   min-height: 100px;
  }

  .loading::after {
   content: '';
   width: 2rem;
   height: 2rem;
   border: 3px solid #f3f3f3;
  }
 </style>
</head>

<body>
 <div class="container mt-5">
  <div class="row justify-content-center">
   <div class="col-md-6">
    <div class="card">
     <div class="card-header">
      <h3 class="text-center">Вход в систему</h3>
     </div>
     <div class="card-body">
      <form action="/login" method="POST">
       <div class="mb-3"><label for="email" class="form-label">Email</label><input type="email" class="form-control"
         id="email" name="email" required></div>
       <div class="mb-3"><label for="password" class="form-label">Пароль</label><input type="password"
         class="form-control" id="password" name="password" required></div>
       <div class="d-grid"><button type="submit" class="btn btn-primary">Войти</button></div>
      </form>
     </div>
    </div>
   </div>
  </div>
 </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>