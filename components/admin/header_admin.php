<link rel="stylesheet" type="text/css" href="/imports/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/components/admin/css/style.css">
<script type="text/javascript" src="/imports/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="/imports/js/mixitup.min.js"></script>
<script type="text/javascript" src="/components/admin/js/script.js"></script>
<?
  // $linkUrl = explode('/', substr($_SERVER['REQUEST_URI'], 1));
  $activeLink = end($requestStr);
?>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand"><img src="components/images/logo.jpg"></a>
  <a class="navbar-brand" href="/admin">Администратор</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <? if ($activeLink == 'admin'){echo 'active';} ?>">
        <a class="nav-link" href="/admin">Тесты</a>
      </li>
      <li class="nav-item <? if ($activeLink == 'all_user'){echo 'active';} ?>">
        <a class="nav-link" href="/admin/all_user">Все пользователи</a>
      </li>
      <li class="nav-item <? if ($activeLink == 'generate_links'){echo 'active';} ?>">
        <a class="nav-link" href="/admin/generate_links">Генерация ссылок</a>
      </li>
    </ul>
    <button type="button" class="btn btn-success btn-logout" data-type="admin">Выход</button>
  </div>
</nav>
<!-- начало container-fluid -->
<div class="container-fluid"> 
	