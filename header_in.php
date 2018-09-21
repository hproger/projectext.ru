<link rel="stylesheet" type="text/css" href="/imports/css/bootstrap.min.css">
<script type="text/javascript" src="/imports/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" type="text/css" href="/components/pages/css/style.css">

<?
  $activeLink = end($requestStr);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand"><img src="/components/images/logo.jpg"></a>
  <a class="navbar-brand" href="/"><? 
    if (isset($_SESSION['user'])) {
      $uType = '';
      $listLi = '';
      if ($_SESSION['user']->type_user == 'stud') {
        $uType = 'Обучающийся';
      }
      else if ($_SESSION['user']->type_user == 'exp') {
        $uType = 'Эксперт';
      }
      else if ($_SESSION['user']->type_user == 'vol') {
        $uType = 'Волонтёр';
      }
    }
    echo $uType;
   ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <? if ($_SESSION['user']->type_user == 'stud'){ ?>
        <li class="nav-item <? if ($activeLink == '' || $activeLink == 'main'){echo 'active';} ?>">
          <a class="nav-link" href="/pages/student/main">Тесты</a>
        </li>
        <li class="nav-item <? if ($activeLink == 'user_data'){echo 'active';} ?>">
          <a class="nav-link" href="/pages/student/user_data">Мои данные</a>
        </li>
        <li class="nav-item <? if ($activeLink == 'competency_map'){echo 'active';} ?>">
          <a class="nav-link" href="/pages/student/competency_map">Карта компетенций</a>
        </li>
      <? } else { ?>
        <li class="nav-item <? if ($activeLink == '' || $activeLink == 'main'){echo 'active';} ?>">
          <a class="nav-link" href="/pages/expvol/main">Тесты</a>
        </li>
        <li class="nav-item <? if ($activeLink == 'user_data'){echo 'active';} ?>">
          <a class="nav-link" href="/pages/expvol/user_data">Мои данные</a>
        </li>
      <? } ?>
    </ul>
    <button type="button" class="btn btn-success btn-logout" data-type="user">Выход</button>
  </div>
</nav>
<div class="container-fluid"> <!-- начало container-fluid -->
	
