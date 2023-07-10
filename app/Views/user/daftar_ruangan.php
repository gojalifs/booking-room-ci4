<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('layouts/head.php'); ?>
</head>

<body background="https://blusignalsystems.com/wp-content/uploads/2016/12/Savin-NY-Website-Background-Web1.jpg">
    <!-- Content Header -->
    <?php include('layouts/header.php'); ?>
    <!-- /.content-header -->

    <!-- Main Content -->
    </div>

    </div>
    <!-- /.content -->


    <script>
        // Get the current page URL
        var currentUrl = window.location.href;

        // Get the list of navbar links
        var navbarLinks = document.querySelectorAll('.navbar-nav .nav-link');

        // Loop through each link and check if the URL matches
        navbarLinks.forEach(function (link) {
            if (link.href === currentUrl) {
                link.classList.add('active'); // Add the 'active' class to the matching link
            }
        });
    </script>
</body>

</html>