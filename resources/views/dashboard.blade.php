<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Admin Dashboard</title>
      <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
      <style>
         .navbar-brand strong {
            color: #007bff;
         }
         .card-header {
            background-color: #007bff;
            color: white;
         }
         .nav-tabs .nav-link {
            display: flex;
            align-items: center;
            color: #007bff;
            justify-content: center;
         }
         .nav-tabs .nav-link.active {
            color: #495057;
            background-color: #e9ecef;
            border-color: #dee2e6 #dee2e6 #fff;
         }
         .nav-item:hover .nav-link {
            color: #0056b3;
         }
         .dropdown-menu a {
            color: #007bff;
         }
         .dropdown-menu a:hover {
            background-color: #e9ecef;
         }
         .card-body {
            padding-top: 20px;
         }
         .nav-item{
            display: flex;
            align-items: center;
            justify-content: center;
         }
      </style>
   </head>
   <body class="bg-light">
      <nav class="navbar navbar-expand-md bg-white shadow-lg">
         <div class="container">
            <a class="navbar-brand" href="/admin">
               <strong>Expense Manager</strong>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
               </svg>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
               <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
               </div>
               <div class="offcanvas-body">
                  <ul class="navbar-nav justify-content-end flex-grow-1">
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Hello, {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu border-0 shadow" aria-labelledby="accountDropdown">
                           <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </nav>
      <div class="container">
         <div class="card border-0 shadow my-5">
            <div class="card-header">
               <h1>Admin Dashboard</h1>
            </div>
            <div class="container mt-4" style="top: -15px; position: relative;">
               <ul class="nav nav-tabs">
                  <li class="nav-item">
                     <a class="nav-link" id="manageUsersTab" href="{{ route('admin.users.index') }}">Manage Users</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" id="manageExpenseCategoriesTab" href="{{ route('admin.expense_categories.index') }}">Manage Expense Categories</a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="card-body">
            @yield('content')
         </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   </body>
</html>
