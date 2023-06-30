<!doctype html>
<html lang="<?php echo Yii::app()->language; ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>  

        <!-- Custom fonts for this template-->  
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin-main.min.css" >    
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin.css">   
        <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <?php $this->renderPartial('/parts/menu'); ?>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">                   

                    <!-- Begin Page Content -->
                    <div class="container">
                        <!-- Topbar -->
                        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                            <!-- Sidebar Toggle (Topbar) -->
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>

                            <div class="navbar-nav mr-auto top_menu"> 
                                <?php if (!empty($this->menu)) { ?>
                                    <?php
                                    $this->widget('ext.AdminTopMenu', array(
                                        'items' => $this->menu
                                    ));
                                    ?>                           
                                <?php } ?>
                            </div>

                            <!-- Topbar Navbar -->
                            <ul class="navbar-nav ml-auto">

                                <?php
                                switch (Yii::app()->language) {
                                    case 'uz':
                                        echo '<li class="nav-item no-arrow mx-1 font-weight-bolder">' . CHtml::link('UZ', '/uz', ['class' => 'nav-link text-primary']) . '</li>';
                                        echo '<li class="nav-item no-arrow mx-1">' . CHtml::link('УЗ', '/oz', ['class' => 'nav-link']) . '</li>';
                                        echo '<li class="nav-item no-arrow mx-1">' . CHtml::link('RU', '/ru', ['class' => 'nav-link']) . '</li>';
                                        break;
                                    case 'oz':
                                        echo '<li class="nav-item no-arrow mx-1">' . CHtml::link('UZ', '/uz', ['class' => 'nav-link']) . '</li>';
                                        echo '<li class="nav-item no-arrow mx-1 font-weight-bolder">' . CHtml::link('УЗ', '/oz', ['class' => 'nav-link text-primary']) . '</li>';
                                        echo '<li class="nav-item no-arrow mx-1">' . CHtml::link('RU', '/ru', ['class' => 'nav-link']) . '</li>';
                                        break;
                                    case 'ru':
                                        echo '<li class="nav-item no-arrow mx-1">' . CHtml::link('UZ', '/uz', ['class' => 'nav-link']) . '</li>';
                                        echo '<li class="nav-item no-arrow mx-1">' . CHtml::link('УЗ', '/oz', ['class' => 'nav-link']) . '</li>';
                                        echo '<li class="nav-item no-arrow mx-1 font-weight-bolder">' . CHtml::link('RU', '/ru', ['class' => 'nav-link text-primary']) . '</li>';
                                        break;
                                    default:
                                        break;
                                }
                                ?>

                                <div class="topbar-divider d-none d-sm-block"></div>

                                <!-- Nav Item - User Information -->
                                <li class="nav-item">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo Yii::app()->user->name; ?></span>                                  
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="<?php echo CHtml::normalizeUrl(array('/profile/index')); ?>">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            <?php echo Yii::t("translation", "profile"); ?>
                                        </a>
                                        <a class="dropdown-item" href="<?php echo CHtml::normalizeUrl(array('/profile/update')); ?>">
                                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                            <?php echo Yii::t("translation", "settings"); ?>
                                        </a>                                 
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo CHtml::normalizeUrl(array('/logout/index')); ?>">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            <?php echo Yii::t("translation", "logout"); ?>
                                        </a>                               
                                    </div>
                                </li>

                            </ul>

                        </nav>
                        <!-- End of Topbar -->

                        <?php $this->renderPartial('/parts/breadcrumbs'); ?>
                        <?php if (Yii::app()->user->hasFlash('success')): ?>
                            <div class="alert alert-success">
                                <?php echo Yii::app()->user->getFlash('success'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (Yii::app()->user->hasFlash('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo Yii::app()->user->getFlash('error'); ?>
                            </div>
                        <?php endif; ?>
                        <?php echo $content; ?>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white mt-5">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>     

        <!-- Bootstrap core JavaScript-->      
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.bundle.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin-main.min.js"></script>

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/ckeditor/ckeditor.js"></script> 
        <script type="text/javascript">
            var elementExists = document.getElementById("editor");
            if (elementExists != null) {
                var editor = CKEDITOR.replace('editor');
            }
            var elementExistsUz = document.getElementById("editor_footer");
            if (elementExistsUz != null) {
                var editor_footer = CKEDITOR.replace('editor_footer');
            }
        </script>

        <script>
            var module = {};

            function init(cyrillicToTranslit) {
                var elementExistsTitle = document.getElementById("title_text");
                if (elementExistsTitle != null) {
                    var $source = document.querySelector('#title_text');
                    var $result = document.querySelector('#url_text');

                    var value;
                    var spaceRep = "-";

                    $source.addEventListener('input', function (e) {
                        update(value = e.target.value, spaceRep);
                    });

                    function update(value, spaceRep) {
                        var value = cyrillicToTranslit.transform(value.toLowerCase(), spaceRep);
                        value = value.replace(/[^a-zA-Z0-9-_]/g, '').substr(0, 45);
                        $result.value = value;
                    }
                }

            }
        </script>

        <script>
            window.onload = function () {
                $(document).ready(function () {
                    $("body").tooltip({selector: '[data-toggle=tooltip]'});

                    $('img').each(function () {
                        if (!this.complete || typeof this.naturalWidth == "undefined" || this.naturalWidth == 0) {
                            // image was broken, replace with your new image
                            this.src = '/img/missing.png';
                        }
                    });
                });
            };
        </script>

        <script onload="init(module.exports())" src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/CyrillicToTranslit.js"></script> 
    </body>
</html>