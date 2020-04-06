<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
function loadRegistrations($filename)
{
    //đọc nội dung văn bản trong file thành một chuỗi
    $jsondata = file_get_contents($filename);
    //chuyển chuỗi thành một mảng .
    $arr_data = json_decode($jsondata, true);
    return $arr_data;
}

function saveDataJson($filename, $name, $email, $phone)
{
    try {
        $contact = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        );
        $arr_data = loadRegistrations($filename);
        //đẩy dữ liệu người dùng vào mảng
        array_push($arr_data, $contact);
        //convert update array to JSON
        $jsonData = json_encode($arr_data, JSON_PRETTY_PRINT);
        file_put_contents($filename, $jsonData);
        echo "lưu trữ thành công ";
    } catch (Exception $e) {
        echo "error" . $e->getMessage();
    }
}

$name = '';
$nameERR = '';
$email = '';
$emailERR = '';
$phone = '';
$phoneERR = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $has_ERROR = false;
    if (empty($name)) {
        $nameERR = "ten dang nhap khong duoc de trong ";
        $has_ERROR = true;
    }
    if (empty($email)) {
        $emailERR = "email khong duoc de trong ";
        $has_ERROR = true;
    } else {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailERR = "dinh dang email sai ";
            $has_ERROR = true;
        }
    }
    if (empty($phone)) {
        $phoneERR = "dien thoai khong duoc de trong ";
        $has_ERROR = true;
    }
    if ($has_ERROR === false) {
        saveDataJson('data.json', $name, $email, $phone);
        $name = '';
        $email = '';
        $phone = '';
    }

}
?>
<h2>registration Form</h2>
<form action="" method="post" style="border: #1d4b8f">
    <fieldset>
        <legend>details</legend>
        name : <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error">*<?php echo $nameERR; ?> </span><br>
        email : <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error">*<?php echo $emailERR ?></span><br>
        phone : <input type="text" name="phone" value="<?php echo $phone ?>">
        <span class="error">*<?php echo $phoneERR ?></span><br>
        <input type="submit" value="registration" name="register">
        <span class="error">*required field</span>
    </fieldset>
</form>
<h2>registration list</h2>
<table>
    <?php
    $registrations = loadRegistrations('data.json')
    ?>
    <tr>
        <th>name</th>
        <th>email</th>
        <th>phone</th>
    </tr>
    <?php
    foreach ($registrations as $registration) {
        echo "<tr>";
        echo "<td>" . $registration['name'] . "</td>>";
        echo "<td>" . $registration['email'] . "</td>>";
        echo "<td>" . $registration['phone'] . "</td>>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>