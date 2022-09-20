<?php
require_once "vendor/autoload.php";
 
use Google\Cloud\Translate\V2\TranslateClient;
 
// try {
//     $translate = new TranslateClient([
//         'keyFilePath' => './pure-spring-362202-d9794abf4552.json'
//     ]);

//     $result = $translate->translate('Hello world!', [
//         'target' => 'fr' // 'fr' is a ISO-639-1 code
//     ]);
//     echo $result['text'];
//     echo "<br><br>";
//     $result = $translate->detectLanguage('Bonjour le monde!');
//     echo $result['languageCode']; // output is 'fr'
//     echo "<br><br>";

//     $languages = $translate->languages();
//     foreach ($languages as $language) {
//         echo $language . "\n";
//         echo "<br><br>";
//     }
// } catch(Exception $e) {
//     echo $e->getMessage();
// }

// function translateTo($text, $lang) {
//     try {
//         $translate = new TranslateClient([
//             'keyFilePath' => './pure-spring-362202-d9794abf4552.json'
//         ]);
    
//         $result = $translate->translate($text, [
//             'target' => $lang
//         ]);
//         return $result['text'];
//     } catch (Exception $e) {
//         echo $e->getMessage();
//     }
// }


try {
    $translate = new TranslateClient([
        'keyFilePath' => './pure-spring-362202-d9794abf4552.json'
    ]);

    $result = $translate->translate('Hi, how are you?', [
        'target' => 'fr' // 'fr' is a ISO-639-1 code
    ]);
    echo $result['text'];
    echo "<br><br>";

    $result = $translate->detectLanguage('안녕하세요. 잘 지내죠?');
    echo $result['languageCode']; // output is 'fr'
    echo "<br><br>";

    // $languages = $translate->languages();
    // foreach ($languages as $language) {
    //     echo $language . "\n";
    //     echo "<br><br>";
    // }

} catch(Exception $e) {
    echo $e->getMessage();
}


// use Google\Cloud\Translate\V2\TranslateClient;

// $translationServiceClient = new TranslationServiceClient();
// try {
//     $contents = [];
//     $targetLanguageCode = '';
//     $formattedParent = $translationServiceClient->locationName('[PROJECT]', '[LOCATION]');
//     $response = $translationServiceClient->translateText($contents, $targetLanguageCode, $formattedParent);
// } finally {
//     $translationServiceClient->close();
// }