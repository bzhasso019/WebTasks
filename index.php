<!DOCTYPE html>
<html>
<head>
    <title>Регистрационная форма</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 700;
        }
        .form-group input[type="text"],
        .form-group input[type="tel"],
        .form-group input[type="email"],
        .form-group input[type="date"],
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group input[type="checkbox"] {
            margin-top: 5px;
        }
        .button-container {
            text-align: center;
        }
        .button-container button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Введите данные</h2>
        <form action="save_form.php" method="post">
        <div class="form-group">
                <label for="fio">ФИО:</label>
                <input type="text" id="fio" name="fio">
            </div>
            <div class="form-group">
                <label for="phone">Телефон:</label>
                <input type="tel" id="phone" name="phone" >
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="dob">Дата рождения:</label>
                <input type="date" id="dob" name="dob">
            </div>
            <div class="form-group">
                <label>Пол:</label>
                <div>
                    <label for="male">Мужской</label>
                    <input type="radio" id="male" name="gender" value="male">
                </div>
                <div>
                    <label for="female">Женский</label>
                    <input type="radio" id="female" name="gender" value="female">
                </div>
            </div>
            <div class="form-group">
                <label for="fav-language">Любимый язык программирования:</label>
                <select id="fav-language" name="fav-language" multiple>
                    <option value="pascal">Pascal</option>
                    <option value="c">C</option>
                    <option value="cpp">C++</option>
                    <option value="javascript">JavaScript</option>
                    <option value="php">PHP</option>
                    <option value="python">Python</option>
                    <option value="java">Java</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bio">Биография:</label>
                <textarea id="bio" name="bio"></textarea>
            </div>
            <div class="form-group">
                <input type="checkbox" id="contract" name="contract">
                <label for="contract">Я согласен(на) с условиями контракта</label>
            </div>
            <div class="button-container">
                <button type="submit">Сохранить</button>
            </div>
        </form>
    </div>
</body>
</html>