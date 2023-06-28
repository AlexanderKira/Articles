<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Статья</title>
</head>
<body>
    <h1>Статья</h1>

    <?php
    $mysql = new mysqli("localhost", "root", "", "articles3");

    if($mysql === false){
        die("Error: " . $mysql->connect_error);
    }

    $sql = "CREATE TABLE IF NOT EXISTS articles (
        `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `header` VARCHAR (250) NOT NULL,
        `discription` VARCHAR (2000) NOT NULL,
        `author` VARCHAR (250) NOT NULL,
        `date_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if($mysql->query($sql) === true){
        echo "работает";
    }else{
        echo "не работает";
    }

    $sql = "INSERT INTO articles (header, discription, author) VALUES 
    ('Заголовок','текст очень много текста ведь это статья','александр'),
    ('Заголовок2', 'снова что-то не работает', 'Александр')";

    if($mysql->query($sql) === true){
        echo "работает";
    }else{
        echo "не работает";
    }

    $sql = "SELECT * FROM articles";

    $articles = $mysql->query($sql);

    foreach($articles as $article):
    ?>

        <div>
            <h2><?php echo $article['header'];?></h2>
            <h3><?php echo $article['discription'];?></h3>
            <h4><?php echo $article['author'];?></h4>
            <h4><?php echo $article['date_at'];?></h4>
        </div>

    <?php
    endforeach;
    $mysql->close();
    ?>
</body>
</html>