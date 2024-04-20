<?php
require 'vendor/autoload.php';
//ENCAPSULATION
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user agent string from form input
    $user_agent = $_POST['user_agent'];
    // Check if user typed "google" or "firefox" and set the user agent string accordingly
    if ($user_agent === "google") {
        // Predefined user agent string for Google Chrome
        $user_agent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36";
    } elseif ($user_agent === "firefox") {
        // Predefined user agent string for Mozilla Firefox
        $user_agent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0";
    }
    elseif ($user_agent === "googleandroid") {
        // Predefined user agent string for Mozilla Firefox
        $user_agent = "Mozilla/5.0 (Linux; Android 11; Pixel 5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.101 Mobile Safari/537.36
        ";
    }
    elseif ($user_agent === "opera") {
        // Predefined user agent string for Mozilla Firefox
        $user_agent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 OPR/67.0.3575.109
        ";
    }
    elseif ($user_agent === "safari") {
        // Predefined user agent string for Mozilla Firefox
        $user_agent = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.0 Safari/605.1.15";
    }
    // Parse the user agent string
    $classifier = new \Woothee\Classifier;
    $r = $classifier->parse($user_agent);
}

?>
<!-- ABSTRACTION -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Web Browser Identifier</title>
</head>
<body>
<div class="container">
<div class="box">
<h1>Web Browser Identifier</h1>

<!-- HTML form for user input -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="user_agent">Enter Web Browser:</label><br>
    <input type="text" id="user_agent" name="user_agent"><br><br>
    <button type="submit">Submit</button>
</form>

<!-- Display parsed user agent information -->
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
    <!-- Display parsed user agent information if form is submitted -->
    <p><strong>Name of Browser:</strong> <?php echo $r['name']; ?></p>
    <p><strong>Category:</strong> <?php echo $r['category']; ?></p>
    <p><strong>Operating System:</strong> <?php echo $r['os']; ?></p>
    <p><strong>Version:</strong> <?php echo $r['version']; ?></p>
    <p><strong>OS Version:</strong> <?php echo $r['os_version']; ?></p>
<?php } ?>
</div>
</div>

</body>
</html>
