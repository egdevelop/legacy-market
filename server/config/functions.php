<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/config/db.php';

function censoredEmail($email)
{
    $count = strlen($email) - 12;
    $output = substr_replace($email, str_repeat('*', $count), 2, $count);
    return $output;
}

function discountedPrice($price, $discount)
{
    $discounted = $price * $discount;
    $price = $price - $discounted;
    return $price;
}

function rupiahFormat($angka)
{
    $hasil_rupiah = "Rp. " . number_format($angka, 2, ',', '.');
    $hasil_rupiah = explode(",", $hasil_rupiah);
    $hasil = $hasil_rupiah[0];
    return $hasil;
}

function limitChar($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}

function updatePassword($datas, $email) {
    global $conn;

    if($datas['sandi1']) {
        $oldPassword = mysqli_fetch_assoc(mysqli_query($conn, "SELECT password FROM users WHERE email = '$email'"));
        if(password_verify($datas['sandi1'], $oldPassword['password'])) {
            if($datas['sandi2'] == $datas['sandi3']) {
                $password = password_hash($datas['sandi2'], PASSWORD_DEFAULT);
                mysqli_query($conn, "UPDATE users SET password = '$password' WHERE email = '$email'");
                if (mysqli_affected_rows($conn) > 0) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }else {
        if ($datas['sandi2'] == $datas['sandi3']) {
            $password = password_hash($datas['sandi2'], PASSWORD_DEFAULT);
            mysqli_query($conn, "UPDATE users SET password = '$password' WHERE email = '$email'");
            if (mysqli_affected_rows($conn) > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

// Functions Products
function flashSaleProducts() {
    global $conn;

    $query = mysqli_query($conn, "SELECT * FROM products WHERE flashsale = '1'");
    while($row = mysqli_fetch_assoc($query)) {
        $variant = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM variants WHERE id_product = '$row[id]'"));
        $data['id'] = $row['id'];
        $data['sold'] = $row['sold'];
        $data['retail_price'] = $variant['retail_price'];
        $data['photos'] = $variant['photo'];
        $output[] = $data;
    }
    return $output;
}

function getProduct($id) {
    global $conn;

    $query = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'");
    $row = mysqli_fetch_assoc($query);
    $variant = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM variants WHERE id_product = '$id'"));
    $data['id'] = $row['id'];
    $data['name'] = $row['name'];
    $data['sold'] = $row['sold'];
    $data['retail_price'] = $variant['retail_price'];
    $data['photos'] = $variant['photo'];
    return $data;
}

function getProductDetails($id) {
    global $conn;

    $query = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'"));
    $query2 = mysqli_query($conn, "SELECT * FROM variants WHERE id_product = '$id'");
    
    $data = $query;
    $i = 1;
    while($row = mysqli_fetch_assoc($query2)) {
        $data['variants'][$i] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'retail_price' => $row['retail_price'],
            'wholesaler_price_1' => $row['wholesaler_price_1'],
            'wholesaler_price_2' => $row['wholesaler_price_2'],
            'wholesaler_price_3' => $row['wholesaler_price_3'],
            'stock' => $row['stock'],
            'photo' => $row['photo']
        );
        $i++;
    }

    return $data;
}

function getProductByVariant($id) {
    global $conn;

    $data1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM variants WHERE id = '$id'"));
    $data2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id = '$data1[id_product]'"));
    $output = array(
        'id_variant' => $data1['id'],
        'id_product' => $data2['id'],
        'name' => $data2['name'],
        'variant' => $data1['name'],
        'price' => $data1['retail_price'],
        'photo' => $data1['photo'],
    );

    return $output;
}

function getAllProducts() {
    global $conn;

    $query = mysqli_query($conn, "SELECT * FROM products");
    $output = mysqli_fetch_all($query, MYSQLI_ASSOC);

    return $output;
}

function relatedProducts($id, $category) {
    global $conn;

    $query = mysqli_query($conn, "SELECT * FROM products WHERE id != '$id' && category = '$category' ORDER BY RAND() LIMIT 4");
    while($row = mysqli_fetch_assoc($query)) {
        $product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM variants WHERE id = '$row[id]'"));
        $data = $row;
        $data['retail_price'] = $row['retail_price'];
        $data['wholesaler_price_1'] = $row['wholesaler_price_1'];
        $data['wholesaler_price_2'] = $row['wholesaler_price_2'];
        $data['wholesaler_price_3'] = $row['wholesaler_price_3'];
        $data['photos'] = $row['photo'];
        $output[] = $data;
    }

    return $output;
}

function filteredProducts($category = "all", $minPrice = 0, $maxPrice = 1) {
    global $conn;

    if($category == "all") {
        $query1 = mysqli_query($conn, "SELECT id FROM products");
    } else {
        $query1 = mysqli_query($conn, "SELECT id FROM products WHERE category = '$category'");
    }
    while($row = mysqli_fetch_assoc($query1)) {
        $filteredByCategory['id'] = $row;
    }

    if($minPrice == 0 && $maxPrice == 1) {
        $query2 = mysqli_query($conn, "SELECT id_product FROM variants");
    } elseif ($minPrice != 0 && $maxPrice == 1) {
        $query2 = mysqli_query($conn, "SELECT id_product FROM variants WHERE retail_price >= '$minPrice'");
    } elseif ($minPrice == 0 && $maxPrice != 1) {
        $query2 = mysqli_query($conn, "SELECT id_product FROM variants WHERE retail_price <= '$maxPrice'");
    } else {
        $query2 = mysqli_query($conn, "SELECT id_product FROM variants WHERE retail_price >= '$minPrice' && retail_price <= '$maxPrice'");
    }
    while($row = mysqli_fetch_assoc($query2)) {
        $filteredByPrice['id'] = $row;
    }
    
    // hijikeun 2 array
    $filteredIds = array_intersect($filteredByCategory, $filteredByPrice);
    foreach($filteredIds as $id => $value) {
        $query3 = mysqli_query($conn, "SELECT * FROM products WHERE id = '$value'");
        while($row = mysqli_fetch_assoc($query3)) {
            $product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM variants WHERE id = '$row[id]'"));
            $data = $row;
            $data['retail_price'] = $row['retail_price'];
            $data['wholesaler_price_1'] = $row['wholesaler_price_1'];
            $data['wholesaler_price_2'] = $row['wholesaler_price_2'];
            $data['wholesaler_price_3'] = $row['wholesaler_price_3'];
            $data['photos'] = $row['photo'];
            $output[] = $data;
        }
    }
    
    return $output;
}

function regisSubs($datas){
    global $conn;

   $whatsapp = $datas['no'];
   $instagram = $datas['ig'];
   $pakage = $datas['paket'];
   $amount = $datas['harga'];
   $id_user = $datas['userid'];
   $reference = "JS".rand("00000", "99999");

    $query = mysqli_query($conn, "INSERT INTO subscription_orders (whatsapp, instagram, pakage, amount, id_user, reference,'status') VALUES ('$whatsapp', '$instagram', '$pakage', '$amount', '$id_user','$reference','0')");
    if($query) {
        $output = array(
            'status' => 'success',
            'message' => 'Berhasil melakukan pemesanan'
        );
        echo json_encode($output);
    } else {
        echo mysqli_error($conn);
    }

}

function paySubs($datas){
    global $conn;
    $apiKey       = 'DEV-heCBMFfj5YYsMUNYnRi5r92iDmKt8ICV9YGT5GIu';
    $privateKey   = 'zQkTv-92qdZ-xahco-hFuNu-56SgR';
    $merchantCode = 'T8782';

    $reference = $datas['reference'];
    $payment = $datas['payment'];
    $nama = $_SESSION['name'];

    $subsData = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM subscription_orders WHERE reference = '$reference'"));

    $data = [
        'method'         => $payment,
        'merchant_ref'   => $reference,
        'amount'         => $subsData['amount'],
        'customer_name'  => $nama,
        'customer_email' => 'bryandharmawan75@gmail.com',
        'customer_phone' => '081535272063',
        'order_items'    => [
            [
                'sku'         => $subsData['pakage'],
                'name'        => $subsData['pakage'],
                'price'       => $subsData['amount'],
                'quantity'    => 1,
            ]
        ],
        'return_url'   => 'https://legacy.egdev.co/server/finish.php',
        'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
        'signature'    => hash_hmac('sha256', $merchantCode.$reference.$subsData['amount'], $privateKey)
    ];

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_FRESH_CONNECT  => true,
        CURLOPT_URL            => "https://tripay.co.id/api-sandbox/transaction/create",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$apiKey],
        CURLOPT_FAILONERROR    => false,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => http_build_query($data)
    ]);

    $response = curl_exec($curl);
    $error = curl_error($curl);
    $datas = json_decode($response, true);

    curl_close($curl);

    $third_ref = $datas['data']['reference'];
    
    if($error){
        echo $error;
    }else{
        $update = mysqli_query($conn, "UPDATE subscription_orders SET third_ref = '$third_ref', method = '$payment' WHERE reference = '$reference'");
        echo $response;
    }

}

function getDetailProduct($id){
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'");
    $row = mysqli_fetch_assoc($query);
    return $row;
}

function getDetailTripay($ref){
    $payload = ['reference'	=> $ref];
    $apiKey       = 'DEV-heCBMFfj5YYsMUNYnRi5r92iDmKt8ICV9YGT5GIu';

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_FRESH_CONNECT  => true,
        CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/transaction/detail?'.http_build_query($payload),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$apiKey],
        CURLOPT_FAILONERROR    => false,
        CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
    ]);

    $response = curl_exec($curl);
    $error = curl_error($curl);

    curl_close($curl);
    return $response;
}

function getMainPic($id){
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'");
    $row = mysqli_fetch_assoc($query);
    $img = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM variants WHERE id_product = '$id'"))['photo'];
    return $img;
}

function getCost($asal, $tujuan, $berat) {
  $data   = new rajaongkir(); // Inisiasi objek dari class rajaongkir.
  $kota_asal    = isset($asal) ? $asal : ''; // kota asal
  $kota_tujuan  = isset($tujuan) ? $tujuan : ''; // kota tujuan
  $berat        = isset($berat) ? $berat : ''; // berat
  $list_courir = ['jne', 'pos', 'tiki']; // Untuk tipe akun starter ada 3 pilhan kurir
  $cost_per_courir = [];
  for ($i = 0; $i < 3; $i++) :
    $result = json_decode($data->get_cost($kota_asal, $kota_tujuan, $berat, $list_courir[$i]), true);
    $cost_per_courir[] = $result['rajaongkir']['results'][0];
  endfor;
  $data->array_sort_by_column($cost_per_courir, 'costs'); // Sort berdasarkan costs
  $row  = [];
  $no = 0;
  foreach ($cost_per_courir as $key => $value) :
    $no++;
    $row[$no]['no']  = $no;
    $row[$no]['name']  = $value['name'];
    $row[$no]['desc']  = $value['costs'][0]['description'];
    $row[$no]['harga']  = $value['costs'][0]['cost'][0]['value'];
  endforeach;

  return $row;
}

class rajaongkir
{

  private $key      = '9efb1f7bde5c9e6fe985741557f90117';
  private $city_url = 'https://api.rajaongkir.com/starter/city';
  private $cost_url = 'https://api.rajaongkir.com/starter/cost';

  function array_sort_by_column(&$arr, $col, $dir = SORT_DESC)
  {
    $sort_col = array();
    foreach ($arr as $key => $row) {
      $sort_col[$key] = $row[$col];
    }

    array_multisort($sort_col, $dir, $arr);
  }

  function get_city()
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->city_url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "key: {$this->key}"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }

  function get_cost($id_kota_asal, $id_kota_tujuan, $berat, $courir)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->cost_url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "origin={$id_kota_asal}&destination={$id_kota_tujuan}&weight={$berat}&courier=$courir",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: {$this->key}"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }
}

?>