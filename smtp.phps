<?php
/**
 * This ornek shows making an SMTP connection with authentication.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require '../PHPMailerAutoload.php';

//PHPMailler clasından kopya üretmek
$mail = new PHPMailer;
//SMTP kullanılacağı belirtiliyor
$mail->isSMTP();

//SMTP Mail sunucu yazılır
$mail->Host = "mail.ornek.com";
//SMTP Port numarası - 25, 465 veya 587 olabilir
$mail->Port = 587;
//SMTP giriş onayı aktif
$mail->SMTPAuth = true;
//SMTP giriş onayı için kullanıcı adınız
$mail->Username = "isim@ornek.com";
//SMTP giriş onayı için şifreniz
$mail->Password = "sifreniz";
//Gönderen kişinin adı ve mail adresi
$mail->setFrom('from@ornek.com', 'Ad Soyad');
//Yanıt için farklı bir adres belirtilebilir
$mail->addReplyTo('replyto@ornek.com', 'Ad Soyad');
//Gömnderilecek kişinin adresi ve ismi
$mail->addAddress('whoto@ornek.com', 'Ad Soyad');
//Mail konusu
$mail->Subject = 'Deneme';
//Harici bir html dosyasını göndermek istersek alttaki kodu yazabiliriz 
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Yada aşağıdaki gibi kendimiz oluşturabiliriz.
$mail->AltBody = 'Mail içeriği buraya yazılabilir.';
//Resim dosyası ekleme
$mail->addAttachment('images/phpmailer_mini.png');

//Maili gönderme ve hata kontrolü
if (!$mail->send()) {
    echo "Gönderme Hatası: " . $mail->ErrorInfo;
} else {
    echo "Mail gönderilmiştir.!";
}
