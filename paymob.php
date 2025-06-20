<?php
require_once 'vendor/autoload.php';
use Paymob\Library\Paymob;


   $paymobKeys = [
    'apiKey' => '',
    'pubKey' => '',
    'secKey' => ''
];
 

// بيانات اختبارية
$email = 'test@example.com';
$first_name = 'أحمد';
$last_name = 'محمد';
$phone = '';
$amount = 100.00;
$cents = 100;
$integration_id = ; 

// بيانات الفاتورة
$billing = [
    "email" => $email,
    "first_name" => $first_name,
    "last_name" => $last_name,
    "street" => "شارع اختبار",
    "phone_number" => $phone,
    "city" => "القاهرة",
    "country" => "Egypt",
    "state" => "القاهرة",
    "postal_code" => "12345"
];

try {
    $paymobReq = new Paymob();
    
    $authResult = $paymobReq->authToken($paymobKeys);
    
    // إنشاء معرف الطلب
    $merchant_intention_id = 'order_' . time() . '_' . rand(1000,9999);
    
    $data = [
        "amount" => $amount * $cents,
        "currency" => 'EGP',
        "payment_methods" => [$integration_id],
        "billing_data" => $billing,
        "extras" => ["merchant_intention_id" => $merchant_intention_id],
        "special_reference" => $merchant_intention_id
    ];
    
    $status = $paymobReq->createIntention($paymobKeys['secKey'], $data, $merchant_intention_id);
    
    if (!empty($status['success']) && $status['success']) {
        // إنشاء رابط الدفع
        $countryCode = $paymobReq->getCountryCode($paymobKeys['secKey']);
        $apiUrl = $paymobReq->getApiUrl($countryCode);
        $cs = $status['cs'];
        $payment_url = $apiUrl . "unifiedcheckout/?publicKey=" . urlencode($paymobKeys['pubKey']) . "&clientSecret=" . urlencode($cs);
        
        header("Location: $payment_url");
        exit;
    } else {
        echo "خطأ في إنشاء الطلب: ";
        print_r($status);
    }
    
} catch (Exception $e) {
    echo "خطأ: " . $e->getMessage();
}
?>
