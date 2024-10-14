<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Snack Town</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/styles5.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="images/logo.webp">
</head>
    </head>
    
    <body>
        <div class="container site">   
        <div class="logo-container">
            <a href="index.php">
                <img src="images/logo.webp" alt="Logo Burger Town" class="logo">
            </a>
        </div>
            
            <h1 class="text-logo"> <i class="fas fa-city"></i> Snack Town </h1>
            <?php
                require 'admin/database.php';
             
                echo '<nav aria-label="Catégories de fast food">';  
                echo '<ul class="nav nav-pills">';

                $db = Database::connect();
                $statement = $db->query('SELECT * FROM categories');
                $categories = $statement->fetchAll();
                foreach ($categories as $category) 
                {
                    
                    if($category['id'] == '1')
                        echo '<li class="active"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
                    else
                        echo '<li><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
                }

                echo '</ul></nav>'; 

                echo '<div class="tab-content">';

                foreach ($categories as $category) 
                {
                    if($category['id'] == '1')
                        echo '<div class="tab-pane active" id="' . $category['id'] .'">';
                    else
                        echo '<div class="tab-pane" id="' . $category['id'] .'">';
                    
                    echo '<div class="row">';
                    
                    $statement = $db->prepare('SELECT * FROM items WHERE items.category = ?');
                    $statement->execute(array($category['id']));
                    while ($item = $statement->fetch()) 
                    {
                        echo '<div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="images/' . $item['image'] . '" alt="' . htmlspecialchars($item['name']) . '">
                                    <div class="price">' . number_format($item['price'], 2, '.', '') . ' €</div>
                                    <div class="caption">
                                        <h2>' . htmlspecialchars($item['name']) . '</h2>
                                        <p>' . htmlspecialchars($item['description']) . '</p>
                                        <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                    </div>
                                </div>
                            </div>';
                    }
                   
                   echo '</div></div>';
                }
                Database::disconnect();
                echo '</div>';
            ?>
        </div>
    </body>
</html>
