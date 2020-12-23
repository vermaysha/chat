# Simple Web Chat

Aplikasi ini dibuat menggunakan PHP dan menggunakan framework Laravel Versi 6, untuk frontend digunakan VueJS V2. Serta menggunakan teknologi WebSocket sebagai protokol pengiriman data.

## System Requirement
1. PHP 7.3 Keatas
2. BCMath PHP Extension
3. Ctype PHP Extension
4. Fileinfo PHP Extension
5. JSON PHP Extension
6. Mbstring PHP Extension
7. OpenSSL PHP Extension
8. PDO PHP Extension
9. Tokenizer PHP Extension
10. XML PHP Extension
11. MySQL/MariaDB


## Installasi

1.	Clone repo ini, `git clone https://github.com/vermaysha/chat.git && cd chat`
2.	Buat file .env dengan `cp .env.example .env`
3.	Install package dari composer dengan, `composer install`
3.	Buat APP_KEY dengan, `php artisan key:generate`
3.	Ubah file .env sesuai kebutuhan **Pastikan konfigurasi database sudah benar**
4.	Jalankan migration, `php artisan migrate`
5.	Buat service untuk menjalankan websocket
6.	Jalankan `systemctl --user edit --force --full php_websocket.service` lalu isi dengan
```
[Unit]
Description=Runs and keeps alive the artisan websocket:init process
OnFailure=failure-notify@%n.service

[Service]
Restart=always
WorkingDirectory=Ubah sesuai dengan lokasi aplikasi
ExecStart=/usr/bin/php artisan websocket:init

[Install]
WantedBy=default.target
```

9. Pastikan path path script diatas sudah benar, lalu jalankan service, `systemctl --user start php_websocket.service`
10. Lalu Aktifkan service `systemctl --user enable php_websocket.service`
11. Selesai

## Contact

Perlu Bantuan ?, silahkan hubungi saya.

1. asharyver13@gmail.com
2. +62895346266988
