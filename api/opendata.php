<?php
$curl =  curl_init();

// 設定發出請求的瀏覽器
curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36");

// 設定接受所有 https 憑證 (不驗證)
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

// 設定跟隨重新導向
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

// 重新導向時，自動設定訪客來源 referer
curl_setopt($curl, CURLOPT_AUTOREFERER, true);

// 將回傳資料寫入變數，而不是直接輸出
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_URL, "https://quality.data.gov.tw/dq_download_json.php?nid=11339&md5_url=f2fdbc21603c55b11aead08c84184b8f");

$data = curl_exec($curl);

curl_close($curl);

// true 轉陣列，false 轉物件
$json = json_decode($data, true);

?>
<style>
table tr td, table tr th {
    border: 1px solid #ccc;
}
</style>
<table>
    <tr>
        <th>日期</th>
        <th>美元／新台幣</th>
        <th>人民幣／新台幣</th>
        <th>歐元／美元</th>
        <th>美元／日幣</th>
        <th>英鎊／美元</th>
        <th>澳幣／美元</th>
        <th>美元／港幣</th>
        <th>美元／人民幣</th>
        <th>美元／南非幣</th>
        <th>紐幣／美元</th>
    </tr>
<?php
foreach($json as $result) {
?>

    <tr>
        <td><?=$result['日期'];?></td>
        <td><?=$result['美元／新台幣'];?></td>
        <td><?=$result['人民幣／新台幣'];?></td>
        <td><?=$result['歐元／美元'];?></td>
        <td><?=$result['美元／日幣'];?></td>
        <td><?=$result['英鎊／美元'];?></td>
        <td><?=$result['澳幣／美元'];?></td>
        <td><?=$result['美元／港幣'];?></td>
        <td><?=$result['美元／人民幣'];?></td>
        <td><?=$result['美元／南非幣'];?></td>
        <td><?=$result['紐幣／美元'];?></td>
    </tr>
<?php
}
?>
</table>