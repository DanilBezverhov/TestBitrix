<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мебельная компания");


require_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/autoload.php';  ?>
<!DOCTYPE html>
<body>
<div class="container">
<?php



use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverWait;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

if (!isset($_GET['url'])) {
    die("Ошибка: не передан URL новости.");
}

$baseUrl = "https://lenta.ru"; 
$newsUrl = $_GET['url'];
if (strpos($newsUrl, 'http') !== 0) {
    $newsUrl = $baseUrl . $newsUrl;
}

$host = 'http://localhost:4444/wd/hub';
$capabilities = DesiredCapabilities::chrome();
$options = new ChromeOptions();
$options->addArguments(["--headless", "--disable-gpu", "--window-size=1920x1080"]);
$options->addArguments(["--user-agent=Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36"]);
$capabilities->setCapability(ChromeOptions::CAPABILITY, $options);
$driver = RemoteWebDriver::create($host, $capabilities);

try {
    $driver->get($newsUrl);
    $wait = new WebDriverWait($driver, 20);
    $wait->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::cssSelector('.topic-body__content')));
    
    $title = $driver->findElement(WebDriverBy::cssSelector('.topic-body__title'))->getText();
    
    $image = $driver->findElement(WebDriverBy::cssSelector('.topic-body__title-image img'))->getAttribute('src');
    
    $articleBody = ''; 
    $paragraphs = $driver->findElements(WebDriverBy::cssSelector('.topic-body__content p'));
    foreach ($paragraphs as $p) {
        $articleBody .= "<p>" . $p->getText() . "</p>";
    }
    
    $driver->quit();

    echo "<h1>$title</h1>";
    
    if ($image) {
        echo "<img src='$image' alt='Новость' style='max-width:100%; height:auto;'>";
    }
    echo "<div>$articleBody</div>";
} catch (Exception $e) {
    $driver->quit();
    echo "<p class='text-muted'>Ошибка: " . $e->getMessage() . "</p>";
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>
</div>
</body>
</html>
