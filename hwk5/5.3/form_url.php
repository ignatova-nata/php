<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Проверка url</title>
    <style>
        form div { margin-bottom: 20px; }
    </style>
</head>
<body>
<form action="formUrlHandler.php" method="post" name="url">
    <div>
        <input type="url" name="url">
    </div>
    <div>
        <input type="submit" name="submit" value="Добавить">
    </div>
</form>
<p id = 'errors'> </p>



<script src="js/formUrl.js"></script>
</body>
</html>
