<?php
// Подключение к базе данных
$servername = "localhost";
$username = "u67411";
$password = "9275980";
$dbname = "u67411";
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Получение данных из формы
$fio = $_POST['fio'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$favLanguage = $_POST['fav-language'];
$bio = $_POST['bio'];
$contract = isset($_POST['contract']);

// Валидация данных формы 
$errors = array();

// Пример валидации ФИО (только буквы и пробелы, не более 150 символов)
if (!preg_match("/^[a-zA-Z ]{1,150}$/", $fio)) {
    $errors[] = "Поле ФИО должно содержать только буквы и пробелы и быть не длиннее 150 символов.";
}

// Пример валидации пола (должен быть выбран мужской или женский)
if ($gender !== "male" && $gender !== "female") {
    $errors[] = "Поле Пол должно содержать допустимый для выбора пользователем пол.";
}

// Пример валидации выбранного языка программирования
$validLanguages = array("pascal", "c", "cpp", "javascript", "php", "python", "java");
foreach ($favLanguage as $language) {
    if (!in_array($language, $validLanguages)) {
        $errors[] = "Поле Любимый ЯП должно содержать один или более язык из списка допустимых.";
        break;
    }
}

// Если есть ошибки, выводим их и прекращаем обработку формы
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
    $conn->close();
    die();
}

// Создание записи в таблице с формой
$stmt = $conn->prepare("INSERT INTO forms (fio, phone, email, dob, gender, bio, contract) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $fio, $phone, $email, $dob, $gender, $bio, $contract);
$stmt->execute();
$stmt->close();

// Получение ID новой записи
$formId = $conn->insert_id;

// Создание записей в таблице с выбранными языками программирования
$stmtLanguage = $conn->prepare("INSERT INTO favorite_languages (form_id, language) VALUES (?, ?)");
foreach ($favLanguage as $language) {
    $stmtLanguage->bind_param("is", $formId, $language);
    $stmtLanguage->execute();
}
$stmtLanguage->close();

// Закрытие соединения с базой данных
$conn->close();

// Вывод сообщения об успешной сохранении данных
echo "Данные успешно сохранены.";
?>