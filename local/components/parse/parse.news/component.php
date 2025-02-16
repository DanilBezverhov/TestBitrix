<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverWait;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Bitrix\Main\Loader;

require_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/autoload.php';  

$host = 'http://localhost:4444/wd/hub';
$capabilities = DesiredCapabilities::chrome();
$options = new ChromeOptions();
$options->addArguments(["--headless", "--disable-gpu", "--window-size=1920x1080"]);
$capabilities->setCapability(ChromeOptions::CAPABILITY, $options);
$driver = RemoteWebDriver::create($host, $capabilities);

try {
    $driver->get('https://lenta.ru/search?query=McDonalds');
    $wait = new WebDriverWait($driver, 5);
    $wait->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::cssSelector('.search-results__list')));

    $newsItems = $driver->findElements(WebDriverBy::cssSelector('.search-results__item._news'));

    $newsData = [];
    foreach ($newsItems as $newsItem) {
        $title = $newsItem->findElement(WebDriverBy::cssSelector('.card-full-news__title'))->getText();
        $descrip = $newsItem->findElement(WebDriverBy::cssSelector('.card-full-news__announce'))->getText();
        $link = $newsItem->findElement(WebDriverBy::cssSelector('a'))->getAttribute('href');
        
       
        $newsData[] = [
            'title' => $title,
            'descrip' => $descrip,
            'link' => $link,
        ];
    }

    Loader::includeModule("iblock");
    $iblockId = 1; 

    foreach ($newsData as $news) {
        
        $res = CIBlockElement::GetList(
            array(),
            array(
                "IBLOCK_ID" => $iblockId,
                "NAME" => $news['title']
            ),
            false,
            false,
            array("ID")
        );

       
        if ($res->SelectedRowsCount() > 0) {
            continue;
        }

       
        $el = new CIBlockElement;
        $fields = [
            "IBLOCK_ID"       => $iblockId,
            "NAME"            => $news['title'],
            "ACTIVE"          => "Y", 
            "PREVIEW_TEXT"    => $news['descrip'],  
            "DETAIL_TEXT"     => $news['link'],  
            "PREVIEW_PICTURE" => CFile::MakeFileArray($imagePath),  
            "DETAIL_PICTURE"  => CFile::MakeFileArray($detailImagePath),  
        ];

        
        $elID = $el->Add($fields);
    }

    $driver->quit();

} catch (Exception $e) {
    $driver->quit();
    echo '<p class="text-muted">Ошибка: ' . $e->getMessage() . '</p>';
}

$arResult = [];
$res = CIBlockElement::GetList(
    ["ID" => "DESC"],
    ["IBLOCK_ID" => $iblockId, "ACTIVE" => "Y"],
    false,
    ["nTopCount" => 10],
    ["ID", "NAME", "PREVIEW_TEXT", "DETAIL_TEXT"]
);

while ($news = $res->Fetch()) {
    $arResult[] = [
        "TITLE"   => $news["NAME"],
        "DESCRIP" => $news["DETAIL_TEXT"],
        "LINK"    => $news["PREVIEW_TEXT"], 
    ];
}



$this->IncludeComponentTemplate();
?>
