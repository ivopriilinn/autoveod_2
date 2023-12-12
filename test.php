<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
    <style>
        form {
            margin: auto;
            width: 200px;
            height: auto;
            background-color: red;
            color: white;
        }
        select{
            margin: auto;
            width: 180px;
        }
    </style>
</head>
<body>
<div>
                    <form action="db_connection.php" method="post">
                        <label for="tellimus">Tellimus</label><br>
                        <select name="Tellimus" required>
                           <option></option>
                        </select><br>
                        <label for="autojuht">Autojuht</label><br>
                        <select id="autojuht" name="Autojuht" required></select><br>
                        <label for="auto">Auto</label><br>
                        <select id="auto" name="Auto" required></select><br>
                        <label for="staatus">Staatus</label><br>
                        <select id="staatus" name="Staatus"></select><br>
                        <button type="submit">Kinnita</button>
                    </form>
                    </div> 
</body>
</html>