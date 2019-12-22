<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Загрузка файлов</title>
    <style>
        form div { margin-bottom: 20px; }
    </style>
</head>
<body>
<form action="form_handler.php" method="post" enctype="multipart/form-data">
    <div>
        <input type="file" accept="image/*" name="picture[]" multiple>
    </div>
    <div>
        <input type="submit" name="submit" value="Загрузить">
    </div>
</form>

</body>
</html>
