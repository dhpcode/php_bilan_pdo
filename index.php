<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma'lumotlar omboriga ma'lumot jo'natish va o'zgartirish</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container">
        <div class="form-box">
            <form>
                <fieldset>
                    <legend>FISH</legend>
                    <div class="main-input"><b>Familiyangiz: *</b> <input type="text"
                            placeholder="Familiyangizni kiriting" name="familyName"></div>
                    <div class="main-input"><b>Ismingiz: *</b> <input type="text" placeholder="Ismingizni kiriting"
                            name="givenName"></div>
                    <div class="main-input"><b>Sharifingiz: *</b> <input type="text"
                            placeholder="Sharifingizni kiriting" name="middleName"></div>
                </fieldset>
                <!-- <hr> -->
                <fieldset>
                    <legend>Qo'shimcha ma'lumotlar</legend>
                    <div class="extra-inputs"><b>Tug'ilgan kuningiz: *</b> <input type="date" name="dob"
                            placeholder="Tug'ilgan sanangizni kiriting"></div>

                    <div class="extra-inputs"><b>Telefon raqamingiz:</b> <input type="tel"
                            placeholder="Telefon raqamingizni kiriting" name="phone"></div>

                    <div class="extra-inputs"><b>Elektron pochtangiz: * </b><input type="email"
                            placeholder="Elektron pochtangizni kiriting" name="email"></div>

                    <div class="city-input">
                        <b>Qaysi shahardansiz: *</b>
                        <select name="city" size="">
                            <optgroup label="Shaharlar">
                                <option value="andijan">Andijon</option>
                                <option value="namangan">Namangan</option>
                                <option value="fergana" selected>Farg'ona</option>
                                <option value="tashkent">Toshkent</option>
                                <option value="samarkand">Samarqand</option>
                                <option value="bukhara">Buxoro</option>
                                <option value="jizzakh">Jizzax</option>
                                <option value="karshi">Qarshi</option>
                                <option value="rishtan">Rishton</option>
                                <option value="khiva">Xiva</option>
                                <option value="gulistan">Guliston</option>
                                <option value="margilan">Margilon</option>
                            </optgroup>
                        </select>
                    </div>
                    <b>Turmush qurganmisiz: *</b> <br>
                    <input type="radio" name="isMarried" value="yes"> Ha <br>
                    <input type="radio" name="isMarried" value="no"> Yo'q <br>

                    <b>Quyidagi qaysi sport turlariga qiziqasiz:</b> <br>
                    <input type="checkbox" name="football" checked> Futbol <br>
                    <input type="checkbox" name="basketball"> Basketbol <br>
                    <input type="checkbox" name="boxing"> Boks <br>
                    <input type="checkbox" name="taekwondo"> Taykvondo <br>
                    <input type="checkbox" name="tennis" checked> Tennis <br>

                    <label for="tour_input"><b>Quyidagi qaysi shaharlar gasayohat qilgansiz?:</b></label>
                    <input type="text" id="tour_input" list="tour_cities" name="visited_cities"
                        placeholder="Shaharni kiriting yoki ro'yxatdan tanlang">
                    <datalist id="tour_cities">
                        <!-- <optgroup label="Shaharlar"> -->
                        <option selected>New York</option>
                        <option>Miami</option>
                        <option>Tokyo</option>
                        <option>London</option>
                        <option>Kuala Lumpur</option>
                        <option>Rome</option>
                        <option>Toronto</option>
                        <option>Ottawa</option>
                        <option>Los Angeles</option>
                        <!-- </optgroup> -->
                    </datalist>
                </fieldset>
                <fieldset>
                    <legend>Siz haqinqizda</legend>
                    <div class="additional-input">
                        <b>O'zingiz haqinqizda qisqacha so'zlab bering:</b>
                        <textarea cols="30" rows="5" name="aboutMe"></textarea>
                    </div>
                </fieldset>

                <div class="actions">
                    <button class='danger' type="submit">Jo'natish</button> <button
                        type="reset">Tozalash</button><button type="button">Oddiy
                        tugmacha</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>

<?php

$dsn = "mysql:dbname=college;host=localhost";
$user = "root";
$password = "";
$pdo = new PDO($dsn, $user, $password);

//Input ma'lumotlar
$familiyasi = $_GET['familyName'];
$ismi = $_GET['givenName'];
$sharifi = $_GET['middleName'];
$tkun = $_GET['dob'];
$telefon = $_GET['phone'];
$pochta = $_GET['email'];
$shahri = $_GET['city'];


$pdoStatement = $pdo->prepare("
    INSERT INTO `students`
    (`last_name`, `first_name`, `middle_name`, `birth_date`, `phone_number`, `email`, `city`)
    VALUES
    (:familiyasi, :ismi, :sharifi, :tkun, :telefoni, :pochtasi, :shahri)
");

$pdoStatement->bindParam(':familiyasi', $familiyasi);
$pdoStatement->bindParam(':ismi', $ismi);
$pdoStatement->bindParam(':sharifi', $sharifi);
$pdoStatement->bindParam(':tkun', $tkun);
$pdoStatement->bindParam(':telefoni', $telefon);
$pdoStatement->bindParam(':pochtasi', $pochta);
$pdoStatement->bindParam(':shahri', $shahri);


if ($pdoStatement->execute()) {
    print "Ma'lumot qo'shildi";
} else {
    print "Xatolik yuz berdi";
}

?>