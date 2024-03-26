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
        <!-- 訂單分期試算 -->
        <form action="tradeEstimate_api.php" method="post">
            <fieldset>
                <legend>參數輸入</legend>
                <table border="1">
                    <tr>
                        <td>API網址：</td>
                        <td><input name="url" value="https://ccore.newebpay.com/API/BnplWallet/tradeEstimate" size="60" required><span style="color:red;">※必填</span></td>
                    </tr>
                    <tr>
                        <td>商店代號:</td>
                        <td><input name="UID_" maxlength="15" required><span style="color:red;">※必填</span></td>
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
                        <td><input name="Version_" value="1.0" maxlength="5"><span style="color:red;">※必填</span></td>
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
                        <td>分期數:</td>
                        <td><input type="number" name="installments" max="36"><span style="color:red;">※必填</span></td>
                    </tr>
                    <tr>
                        <td>交易金額:</td>
                        <td><input type="number" name="Amt" max="9999999999"><span style="color:red;">※必填</span></td>
                    </tr>
                    <tr>
                        <td>付款方式:</td>
                        <td><input name="PaymentType" value="FULA" maxlength="10" required><span style="color:red;">※必填</span></td>
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
<script>
    document.addEventListener('click', function(e) {
        if (e.target.className == 'payment') {
            e.target.nextElementSibling.hidden = !e.target.nextElementSibling.hidden
        }
    });
</script>

</html>