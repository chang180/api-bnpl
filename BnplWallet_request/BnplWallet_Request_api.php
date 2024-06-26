<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BNPL 參數轉換</title>
    
    
</head>

<body>
    <?php
    //商店代號
    $mid = $_POST['MerchantID'];
    $key = $_POST['key'];
    $iv = $_POST['iv'];
    $url = $_POST['url'];
    $encrypt = $_POST['EncryptType'];
    unset($_POST['key'], $_POST['iv'], $_POST['url'], $_POST['EncryptType']);
    $data1 = json_encode($_POST);

    //設定加密模式
    if ($encrypt == '1') {
        // AES/GCM加密模式
        $cipher_iv = bin2hex(openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-gcm')));
        $tag = '';
        $edata1 =  $cipher_iv . '.' . bin2hex(openssl_encrypt($data1, 'aes-256-gcm', $key, OPENSSL_RAW_DATA, $cipher_iv, $tag, '', 16)) . '.' . bin2hex($tag);;
    }else{
        // AES/CBC加密模式
        $edata1 = bin2hex(openssl_encrypt($data1, "AES-256-CBC", $key, OPENSSL_RAW_DATA, $iv));
    }
    //壓碼
    $hashs = "HashKey=" . $key . "&" . $edata1 . "&HashIV=" . $iv;
    $hash = strtoupper(hash("sha256", $hashs));

    ?>
    <fieldset>
        <legend>程式範例：</legend>
        <pre>
//商店資訊
$mid = $_POST['MerchantID'];
$key = $_POST['key'];
$iv = $_POST['iv'];
$url = $_POST['url'];
$encrypt = $_POST['EncryptType'];

//生成請求字串
unset($_POST['key'], $_POST['iv'], $_POST['url'], $_POST['EncryptType']);
$data1 = json_encode($_POST);

//設定加密模式
if ($encrypt == '1') {
    // AES/GCM加密模式
    $cipher_iv = bin2hex(openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-gcm')));
    $tag = '';
    $edata1 =  $cipher_iv . '.' . bin2hex(openssl_encrypt($data1, 'aes-256-gcm', $key, OPENSSL_RAW_DATA, $cipher_iv, $tag, '', 16)) . '.' . bin2hex($tag);;
}else{
    // AES/CBC加密模式
    $edata1 = bin2hex(openssl_encrypt($data1, "AES-256-CBC", $key, OPENSSL_RAW_DATA, $iv));
}

//壓碼
$hashs = "HashKey=" . $key . "&" . $edata1 . "&HashIV=" . $iv;
$hash=strtoupper(hash("sha256",$hashs));
    </pre>
    </fieldset>

    <form action="BnplWalletRequest.php" method="post">
        <fieldset>
            <legend>表格範例</legend>
            <table>
                <tr>
                    <td>商店代號: </td>
                    <td><input name="UID_" value="<?= $mid; ?>" readonly></td>
                </tr>
                <tr>
                    <td>API網址：</td>
                    <td><input name="url" value="<?= $url; ?>" size="60" required></td>
                </tr>
                <tr>
                    <td>版本號:</td>
                    <td><input name="Version_" value="<?= $_POST['Version']; ?>"></td>
                </tr>
                <tr>
                    <td>回傳格式:</td>
                    <td><input name="RespondType_" value="JSON"></td>
                </tr>
                <tr>
                    <td colspan="2">加密交易內容:</td>

                </tr>
                <tr>
                    <td colspan="2"><textarea name="EncryptData_" cols="100" rows="7"><?= $edata1; ?></textarea></td>

                </tr>
                <tr>
                    <td colspan="2">加密壓碼內容:</td>

                </tr>
                <tr>
                    <td colspan="2"><textarea name="HashData_" id="" cols="100" rows="2"><?= $hash; ?></textarea></td>

                </tr>
                <tr>
                    <td colspan="2"><input type=submit value="交易測試"></td>

                </tr>
            </table>
        </fieldset>
    </form>
    <a href="Bnpl_example.php">回本頁</a>

</body>

</html>