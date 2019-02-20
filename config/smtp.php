<?php

return [
    'host'=> getenv('SMTP_HOST'),
    'port' => getenv('SMTP_PORT'),
    'protocol'=>getenv('SMTP_PROTOCOL'),
    'login'=> getenv('SMTP_LOGIN'),
    'password' => getenv('SMTP_PASSWORD'),
    'admin' => getenv('ADMIN_EMAIL')
];