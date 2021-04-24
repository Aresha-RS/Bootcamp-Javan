<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title><?= $title ?></title>
    <link rel="icon" href="https://getbootstrap.com/docs/4.5/assets/img/favicons/favicon.ico">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/font-awesome/css/all.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatable/dataTables.bootstrap4.min.css') ?>">
    <style>
        .form-control,
        .btn-square {
            border-radius: 0;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">Bootcamp Javan</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <?php
                $request = \Config\Services::request();
                $segment = ($request->uri->getTotalSegments() == 0 ? "" : $request->uri->getSegment(2));
                ?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?= $segment == "dashboard" || $segment == ""  ? "active" : ""; ?>">
                        <a class="nav-link" href="/account/dashboard">Dashboard <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item <?= $segment == "vacations" ? "active" : ""; ?>">
                        <a class="nav-link" href="/school/vacations"><i class="fas fa-file-signature"></i> Vacations</a>
                    </li>
                    <li class="nav-item <?= $segment == "students" ? "active" : ""; ?>">
                        <a class="nav-link" href="/account/students"><i class="fas fa-user-tie"></i> Students</a>
                    </li>
                </ul>
                <a class="nav-link" style="color: rgba(255,255,255,.5);" href="<?= (logged_in() ? '/logout' : '/login') ?>"> <?= (logged_in() ? "Logout" : "Login") ?></a>

            </div>
        </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0">
        <div class="container" style="margin-top:8.5%">
            <?= $this->renderSection('content') ?>
        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-dark">
        <div class="container">
            <span class="text-muted">Bootcamp Javan @2021 || Recha Abriana Anggraini</span>
        </div>
    </footer>
    <script type="text/javascript">
        App.baseUrl = "<?= site_url() ?>";
        App.init();
    </script>
</body>

</html>