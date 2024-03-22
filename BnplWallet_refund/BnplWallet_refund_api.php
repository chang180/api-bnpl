<?php
//商店代號
$mid = $_POST['UID_'];
$key = $_POST['key'];
$iv = $_POST['iv'];
$url = $_POST['url'];
unset($_POST['key'], $_POST['iv'], $_POST['url']);
$data1 = json_encode($_POST);

$edata1 = bin2hex(openssl_encrypt($data1, "AES-256-CBC", $key, OPENSSL_RAW_DATA, $iv));

//壓碼
$hashs = "HashKey=" . $key . "&" . $edata1 . "&HashIV=" . $iv;
$hash = strtoupper(hash("sha256", $hashs));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API 參數轉換</title>
</head>

<body>
    <fieldset>
        <legend>程式範例：</legend>
        <pre>
//商店資訊
$mid = $_POST['UID_'];
$key = $_POST['key'];
$iv = $_POST['iv'];

//生成請求字串
unset($_POST['key'], $_POST['iv'],$_POST['Pos'],$_POST['url']);
$data1 = json_encode($_POST);

//將請求字串加密
$edata1=bin2hex(openssl_encrypt($data1, "AES-256-CBC", $key, OPENSSL_RAW_DATA, $iv));

//壓碼
$hashs = "HashKey=" . $key . "&" . $edata1 . "&HashIV=" . $iv;
$hash=strtoupper(hash("sha256",$hashs));

    </pre>
    </fieldset>
    <form action="BnplWallet_refund.php" method="post">
        <fieldset>
            <legend>表格範例</legend>
            <table>
                <tr>
                    <td>API網址：</td>
                    <td><input name="url" value="<?= $url; ?>" size="60" required></td>
                </tr>
                <tr>
                    <td>商店代號: </td>
                    <td><input name="UID_" value="<?= $mid; ?>" readonly></td>
                </tr>
                <tr>
                    <td>串接程式版本: </td>
                    <td><input name="Version_" value="1.0" readonly></td>
                </tr>
                <tr>
                    <td>回傳格式: </td>
                    <td><input name="RespondType_" value="JSON" readonly></td>
                </tr>
                <tr>
                    <td colspan="2">加密資料:</td>
                </tr>
                <tr>
                    <td colspan="2"><textarea name="EncryptData_" cols="100" rows="3"><?= $edata1; ?></textarea></td>
                </tr>
                <tr>
                    <td>雜湊資料: </td>
                </tr>
                <tr>
                    <td colspan="2"><textarea name="HashData_" cols="100" rows="2"><?= $hash; ?></textarea></td>
                </tr>
                <tr>
                    <td colspan="2"><input type=submit value="交易測試"></td>
                </tr>
            </table>
        </fieldset>
    </form>
    <a href="BnplWallet_refund_example.php">回本頁</a>

</body>

</html>