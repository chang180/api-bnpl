<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM 轉帳-幕後取號 API 範例程式</title>
</head>

<body>
    <h1>ATM 轉帳-幕後取號 API 範例</h1>
    <form action="vacc_api.php" method="post">
        <fieldset>
            <legend>參數輸入</legend>
            <table border="1">
                <tr>
                    <td>API網址：</td>
                    <td><input name="url" value="https://ccore.newebpay.com/API/gateway/vacc" size="60" required><span style="color:red;">※必填</span></td>
                </tr>
                <tr>
                    <td>商店代號:</td>
                    <td><input name="MerchantID_" maxlength="15" required><span style="color:red;">※必填</span></td>
                </tr>
                <tr>
                    <td>key:</td>
                    <td><input name="key" size="32" required><span style="color:red;">※必填</span></td>
                </tr>
                <tr>
                    <td>iv:</td>
                    <td><input name="iv" minlength="16" maxlength="16" required><span style="color:red;">※必填</span></td>
                </tr>
                <tr>
                    <td>回傳格式:</td>
                    <td><input name="RespondType" value="JSON" maxlength="5" required><span style="color:red;">※必填</span></td>
                </tr>
                <tr>
                    <td>版本號:</td>
                    <td><input name="Version" value="1.0" maxlength="3"><span style="color:red;">※必填</span></td>
                </tr>
                <tr>
                    <td>TimeStamp:</td>
                    <td><input name="TimeStamp" value="<?= time(); ?>" maxlength="50" required readonly><span style="color:red;">※必填</span></td>
                </tr>
                <tr>
                    <td>金融機構(選填):</td>
                    <td><input name="BankType" maxlength="10"></td>
                </tr>
                <tr>
                    <td>交易完成回傳網址(選填):</td>
                    <td><input name="NotifyURL" placeholder="您的網址/notify_url.php" maxlength="50"></td>
                </tr>
                
                <tr>
                    <td>商店訂單編號:</td>
                    <td><input name="MerchantOrderNo" value="example<?= time(); ?>" maxlength="30" required><span style="color:red;">※必填</span></td>
                </tr>
                <tr>
                    <td>訂單金額:</td>
                    <td><input type="number" name="Amt" value="88" max="9999999999"><span style="color:red;">※必填</span></td>
                </tr>
                <tr>
                    <td>商品描述 :</td>
                    <td><input name="ProdDesc" value="商品一批" maxlength="50"><span style="color:red;">※必填</span></td>
                </tr>
                <tr>
                    <td>付款人電子信箱:</td>
                    <td><input name="PayerEmail" type="email" maxlength="50" required><span style="color:red;">※必填</span></td>
                </tr>
                <tr>
                    <td>繳費截止日期(選填)</td>
                    <td><input name="ExpireDate" type="date"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="參數轉換"></td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>

</html>