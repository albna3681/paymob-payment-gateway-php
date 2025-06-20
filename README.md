# نظام الدفع الإلكتروني باستخدام Paymob 💳

نظام دفع بسيط وفعال باستخدام Paymob Payment Gateway مع PHP. يدعم جميع طرق الدفع المتاحة في مصر 

## 📸 معاينة الصفحة عند فتحها سيتم توجيهك ل صفحة الدفع تلقائيا ، هذه مجرد صفحة تجربة لكيفية ربط وعمل integration  مع paymob 
![]()

## 📋 متطلبات التشغيل

- PHP 7.4 أو أحدث
- Composer
- حساب Paymob 

## 🛠️ التثبيت 

### الخطوة الأولى: تحميل المشروع والكود
composer install



إذا لم يكن لديك Composer مثبت، يمكنك تحميله من [هنا](https://getcomposer.org/download/)

### الخطوة الثالثة: إضافة مكتبة Paymob
افتح Terminal
1. اعرف فين المجلد بتاعك :



pwd
2. روح لمجلد مشروعك:



cd /path/to/your/project
3.  ثبت المكتبة باستخدام :



composer require paymob/php-library
خلاص كده! المكتبة هتتثبت تلقائياً ومجلد vendor/ هيتعمل لوحده.

## ⚙️ الإعداد والتكوين

### الحصول على بيانات Paymob

سجل دخول إلى [لوحة تحكم Paymob](https://accept.paymob.com/) واحصل على:

- **API Key** - من قسم Developers
- **Public Key** - من قسم Developers  
- **Secret Key** - من قسم Developers
- **Integration ID** - من قسم Payment Integrations

### تعديل البيانات في الكود

افتح ملف `payment.php` وعدل البيانات التالية:

// 🔑 بيانات Paymob - عدلها بالبيانات الخاصة بك
$paymobKeys = [
'apiKey' => 'ضع هنا API Key الخاص بك',
'pubKey' => 'ضع هنا Public Key الخاص بك',
'secKey' => 'ضع هنا Secret Key الخاص بك'
];

// 🎯 معرف التكامل - عدله بالرقم الخاص بك
$integration_id = 123456; // ضع هنا Integration ID الخاص بك

// 💰 بيانات العملية (يمكنك تعديلها حسب احتياجك)
$email = 'test@example.com'; // إيميل العميل
$first_name = 'أحمد'; // الاسم الأول
$last_name = 'محمد'; // الاسم الأخير
$phone = '01234567890'; // رقم الهاتف
$amount = 100.00; // المبلغ بالجنيه



### تخصيص بيانات الفاتورة

// 📋 بيانات الفاتورة - عدلها حسب احتياجك
$billing = [
"email" => $email,
"first_name" => $first_name,
"last_name" => $last_name,
"street" => "شارع اختبار", // عنوان الشارع
"phone_number" => $phone,
"city" => "القاهرة", // المدينة
"country" => "Egypt", // الدولة
"state" => "القاهرة", // المحافظة
"postal_code" => "12345" // الرمز البريدي
];

وتقدر انك تعدل القيم دي حسب اختياجاتك عادي جدا 

## 🚀 طريقة الاستخدام

1. ارفع الملفات على السيرفر الخاص بك
2. تأكد من تثبيت جميع المكتبات المطلوبة
3. عدل البيانات في ملف `paymob.php`
4. افتح الملف في المتصفح: `http://yoursite.com/paymob.php`
5. سيتم توجيهك تلقائياً لصفحة الدفع

## 🔧 البيانات القابلة للتعديل

| البيان | الوصف | مثال |
|--------|--------|-------|
| `apiKey` | مفتاح API من Paymob | `ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5` |
| `pubKey` | المفتاح العام | `pk_test_1234567890` |
| `secKey` | المفتاح السري | `sk_test_1234567890` |
| `integration_id` | معرف التكامل | `123456` |
| `amount` | المبلغ | `100.00` |
| `email` | إيميل العميل | `customer@example.com` |
| `phone` | رقم الهاتف | `01234567890` |
| `first_name` | الاسم الأول | `أحمد` |
| `last_name` | الاسم الأخير | `محمد` |
| `street` | عنوان الشارع | `شارع النيل` |
| `city` | المدينة | `القاهرة` |
| `state` | المحافظة | `القاهرة` |
| `postal_code` | الرمز البريدي | `12345` |


