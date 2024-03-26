<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BNPL API 範例</title>
</head>

<body>
    <div class="container">
        <h1>BNPL API 訂單分期試算 範例</h1>
        <!-- 信用卡紅利折抵 -->
        <form action="mpg_api.php" method="post">
            <fieldset>
                <legend>參數輸入</legend>
                <table border="1">
                    <tr>
                        <td>API網址：</td>
                        <td><input name="url" value="https://ccore.newebpay.com/MPG/mpg_gateway" size="60" required><span style="color:red;">※必填</span></td>
                    </tr>
                    <tr>
                        <td>商店代號:</td>
                        <td><input name="MerchantID" maxlength="15" required><span style="color:red;">※必填</span></td>
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
                        <td>串接程式版本:</td>
                        <td><input name="Version" value="2.0" maxlength="5"><span style="color:red;">※必填</span></td>
                    </tr>
                    <tr>
                        <td>加密模式(選填):</td>
                        <td><input name="EncryptType" type="number" max="9"></td>
                    </tr>
                    <tr>
                        <td>時間戮記:</td>
                        <td><input name="TimeStamp" value="<?= time(); ?>" maxlength="50" required readonly><span style="color:red;">※必填</span></td>
                    </tr>
                    <tr>
                        <td>回傳格式:</td>
                        <td><input name="RespondType" value="JSON" maxlength="5" required><span style="color:red;">※必填</span></td>
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
                        <td>付款人綁定資料</td>
                        <td><input type="text" name="TokenTerm"><span style="color:blue;">※記憶卡號必填</span></td>
                    </tr>
                    <tr>
                        <td>指定付款人信用卡快速結帳必填欄位</td>
                        <td><input type="number" name="TokenTermDemand" max="3" maxlength="30"></td>
                    </tr>
                    <tr>
                        <td>信用卡紅利啟用:</td>
                        <td><input name="CreditRed" type="number" value="1" max="9" required><span style="color:red;">※信用卡紅利折抵必填項目</span></td>
                    </tr>
                    <tr>
                        <td>支付完成返回商店網址:(選填)</td>
                        <td><input name="ReturnURL" maxlength="50"></td>
                    </tr>
                    <tr>
                        <td>支付通知網址:(選填)</td>
                        <td><input name="NotifyURL" maxlength="50"></td>
                    </tr>
                    <tr>
                        <td>商店取號網址:(選填)</td>
                        <td><input name="CustomerURL" maxlength="50"></td>
                    </tr>
                    <tr>
                        <td>返回商店網址:(選填)</td>
                        <td><input name="ClientBackURL" maxlength="50"></td>
                    </tr>
                    <tr>
                        <td>商品資訊:</td>
                        <td><input name="ItemDesc" value="商品一批" maxlength="50" required><span style="color:red;">※必填</span></td>
                    </tr>
                    <tr>
                        <td>付款人電子信箱:</td>
                        <td><input name="Email" maxlength="50" required><span style="color:red;">※必填</span></td>
                    </tr>
                    <tr>
                        <td>藍新金流會員:</td>
                        <td><input name="LoginType" type="number" value="0" max="9" required><span style="color:red;">※必填</span></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" value="參數轉換"></td>
                    </tr>
                </table>
            </fieldset>
        </form>
        <a href="../">回上一頁</a>
    </div>
</body>

</html>