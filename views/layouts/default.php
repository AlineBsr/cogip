    <head>
    <link rel=”stylesheet” href=”https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css”rel=”nofollow” integrity=”sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I” crossorigin=”anonymous”>
        <link rel="stylesheet" href="../global/style/default.css">
        <link rel="stylesheet" href="../../global/style/default.css">
        
    </head>
    <body>
        <header>
            <div class="navbar">
                <a class="logo" href="#"> COGIP</a>
                <ul class="nav">
                    <li><a href="../AdminController/welcome">Accueil</a></li>
                    <li><a href="../InvoiceController/allinvoices">Factures</a></li>
                    <li><a href="../CompanyController/listAll">Sociétés</a></li>
                    <li><a href="../PeopleController/getPeople">Contacts</a></li>
                    <li><a href="../AdminController/welcome">Admin</a></li>
                </ul>
            </div>
        </header>
        <section class="banner-area" id="home">
        </section>
        <main class="content">
            <?php
                echo $content;
            ?>
        </main>
        <footer>
            <h3>Vive la cogip!</h3>
        </footer>
    </body>