# Ligue1 Backend (Laravel)

Bienvenue dans le backend de l'application Ligue1 ! Cette partie du projet est construite avec Laravel pour fournir une API robuste et sécurisée.

## Configuration initiale

Assurez-vous d'avoir PHP, Composer, et MySQL installés sur votre machine.

# Installation des dépendances
```bash 
composer install
```

# Configuration de l'environnement
```bash 
cp .env.example .env
```

# Génération de la clé d'application
```bash 
php artisan key:generate
```

# Exécution des migrations pour créer la structure de la base de données
```bash
php artisan migrate
```
Scripts disponibles
Dans le répertoire du projet, vous pouvez exécuter les scripts suivants :

# Lancement du serveur de développement
```bash
php artisan serve
```

# Exécution des tests
```bash
php artisan test
```
Structure du projet

app/ : Contient les fichiers source de l'application Laravel.
database/migrations/ : Définit la structure des données de l'application en utilisant les migrations Laravel.
routes/ : Définit les points de terminaison de l'API en associant les routes aux contrôleurs correspondants.

Configuration de l'environnement
```bash 
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=db_ligue1
DB_USERNAME=louis
DB_PASSWORD=1fK1gb4k
```
Utilisation de l'API

Inscription d'un nouvel utilisateur :
```bash
curl -X POST -H "Content-Type: application/json" -d '{"name": "votre_nom", "email": "votre_email", "password": "votre_mot_de_passe"}' http://localhost:8000/register
```

Connexion d'un utilisateur :
```bash 
curl -X POST -H "Content-Type: application/json" -d '{"email": "votre_email", "password": "votre_mot_de_passe"}' http://localhost:8000/login
```

Récupérer le classement des équipes :
```bash
curl -X GET http://localhost:8000/classement
```

Récupérer les informations d'une équipe :
```bash
curl -X GET http://localhost:8000/equipe
```

Retourner les informations de l'utilisateur connecté :
```bash
curl -X GET -H "Authorization: Bearer VOTRE_TOKEN" http://localhost:8000/user
```

Créer un nouveau post :
```bash
curl -X POST -H "Authorization: Bearer VOTRE_TOKEN" -H "Content-Type: application/json" -d '{"title": "titre_du_post", "content": "contenu_du_post"}' http://localhost:8000/posts/create
```

[Uploadi{"_type":"export","__export_format":4,"__export_date":"2024-01-08T14:32:55.880Z","__export_source":"insomnia.desktop.app:v8.5.1","resources":[{"_id":"req_c383647249764a1d97258d876e75cc6a","parentId":"fld_bf78862980734b28be6d407d6fd45ff7","modified":1704721591738,"created":1703066672371,"url":"http://164.90.163.120:8000/api/equipe","name":"Equipe","description":"","method":"GET","body":{"mimeType":"application/json","text":"{\n\n\t\"id_saison\": \"269\",\n\t\"id_equipe\": \"59\"\n}"},"parameters":[],"headers":[{"name":"Content-Type","value":"application/json","id":"pair_fefc59a9df244e48b8f0979c33e56770"},{"name":"User-Agent","value":"insomnia/8.4.5","id":"pair_8fbaa73848e3447c95a6de3f067286fe"}],"authentication":{"type":"bearer","token":"2|HFLVn1uEpOXttnRVwSwOKXgc9GKhsKkZPbo0KT5w2fde1872","prefix":"Bearer"},"metaSortKey":-1704721590167,"isPrivate":false,"settingStoreCookies":true,"settingSendCookies":true,"settingDisableRenderRequestBody":false,"settingEncodeUrl":true,"settingRebuildPath":true,"settingFollowRedirects":"global","_type":"request"},{"_id":"fld_bf78862980734b28be6d407d6fd45ff7","parentId":"wrk_d5619dcf09b94374892ac71451553672","modified":1704721576129,"created":1704721576129,"name":"Ligue1","description":"","environment":{},"environmentPropertyOrder":null,"metaSortKey":-1704721576129,"_type":"request_group"},{"_id":"wrk_d5619dcf09b94374892ac71451553672","parentId":null,"modified":1704721639361,"created":1703066641041,"name":"API_Ligue1","description":"","scope":"collection","_type":"workspace"},{"_id":"req_0d5dfae94bf44102b035b93b4aeb2150","parentId":"fld_bf78862980734b28be6d407d6fd45ff7","modified":1704721590101,"created":1704719888197,"url":"http://164.90.163.120:8000/api/classement","name":"Classement","description":"","method":"GET","body":{"mimeType":"application/json","text":"{\n\n\t\"id_saison\": \"269\"\n}"},"parameters":[],"headers":[{"name":"Content-Type","value":"application/json","id":"pair_fefc59a9df244e48b8f0979c33e56770"},{"name":"User-Agent","value":"insomnia/8.4.5","id":"pair_8fbaa73848e3447c95a6de3f067286fe"}],"authentication":{"type":"bearer","token":"2|HFLVn1uEpOXttnRVwSwOKXgc9GKhsKkZPbo0KT5w2fde1872","prefix":"Bearer"},"metaSortKey":-1704721590067,"isPrivate":false,"settingStoreCookies":true,"settingSendCookies":true,"settingDisableRenderRequestBody":false,"settingEncodeUrl":true,"settingRebuildPath":true,"settingFollowRedirects":"global","_type":"request"},{"_id":"req_03e4e48b040845fc8147a894638c01f1","parentId":"fld_02db1d40207a47388b1251bf68aaa936","modified":1704724110924,"created":1704721382870,"url":"http://164.90.163.120:8000/api/posts/4","name":"SupprimerPost","description":"","method":"DELETE","body":{"mimeType":"application/json","text":"{\n\n}"},"parameters":[],"headers":[{"name":"Content-Type","value":"application/json","id":"pair_b250b6f8c79b4812a2cb3f90fa09963b"},{"name":"User-Agent","value":"insomnia/8.5.0","id":"pair_02fb10a475e14c089151c8229f1d91ca"},{"id":"pair_b3f77babc32e47629802dce012bc3d44","name":"Authorization","value":"Bearer 8|cNB0vYqexkw5YiniqGwbHswWztnfj6Ojx4V0DRXhbd087e19","description":""}],"authentication":{},"metaSortKey":-1704721524434,"isPrivate":false,"settingStoreCookies":true,"settingSendCookies":true,"settingDisableRenderRequestBody":false,"settingEncodeUrl":true,"settingRebuildPath":true,"settingFollowRedirects":"global","_type":"request"},{"_id":"fld_02db1d40207a47388b1251bf68aaa936","parentId":"wrk_d5619dcf09b94374892ac71451553672","modified":1704721528078,"created":1704721487856,"name":"Posts","description":"","environment":{},"environmentPropertyOrder":null,"metaSortKey":-1704721488256,"_type":"request_group"},{"_id":"req_3896528bbf2b4198945adbe0e4033995","parentId":"fld_02db1d40207a47388b1251bf68aaa936","modified":1704723255909,"created":1704720952879,"url":"http://164.90.163.120:8000/api/posts/{post}","name":"ModifierPost","description":"","method":"PUT","body":{"mimeType":"application/json","text":"{\n  \"titre\": \"ligue1\",\n\t\"description\": \"desc de ligue1 post 1\"\n}"},"parameters":[],"headers":[{"name":"Content-Type","value":"application/json","id":"pair_b250b6f8c79b4812a2cb3f90fa09963b"},{"name":"User-Agent","value":"insomnia/8.5.0","id":"pair_02fb10a475e14c089151c8229f1d91ca"},{"id":"pair_b3f77babc32e47629802dce012bc3d44","name":"Authorization","value":"Bearer 7|PI7NMk9WFDS4rMHekj5MUgRP5DYZXSnc60zMTvtl9bf9a329","description":""}],"authentication":{},"metaSortKey":-1704721524334,"isPrivate":false,"settingStoreCookies":true,"settingSendCookies":true,"settingDisableRenderRequestBody":false,"settingEncodeUrl":true,"settingRebuildPath":true,"settingFollowRedirects":"global","_type":"request"},{"_id":"req_1a13e18126a64e79a2af06f70f85c6a0","parentId":"fld_02db1d40207a47388b1251bf68aaa936","modified":1704723557877,"created":1704720598544,"url":"http://164.90.163.120:8000/api/posts/create","name":"CreatePost","description":"","method":"POST","body":{"mimeType":"application/json","text":"{\n  \"titre\": \"testdel\",\n\t\"description\": \"desc de ligue1\"\n}"},"parameters":[],"headers":[{"name":"Content-Type","value":"application/json","id":"pair_b250b6f8c79b4812a2cb3f90fa09963b"},{"name":"User-Agent","value":"insomnia/8.5.0","id":"pair_02fb10a475e14c089151c8229f1d91ca"},{"id":"pair_b3f77babc32e47629802dce012bc3d44","name":"Authorization","value":"Bearer 8|cNB0vYqexkw5YiniqGwbHswWztnfj6Ojx4V0DRXhbd087e19","description":""}],"authentication":{},"metaSortKey":-1704721524234,"isPrivate":false,"settingStoreCookies":true,"settingSendCookies":true,"settingDisableRenderRequestBody":false,"settingEncodeUrl":true,"settingRebuildPath":true,"settingFollowRedirects":"global","_type":"request"},{"_id":"req_3ec9dac8d0cf4840ae47f35f4b823ca2","parentId":"fld_02db1d40207a47388b1251bf68aaa936","modified":1704721559284,"created":1704720130662,"url":"http://164.90.163.120:8000/api/posts/","name":"ListePosts","description":"","method":"GET","body":{"mimeType":"application/json","text":"{\n  \"titre\": \"ligue1\",\n\t\"description\": \"desc de ligue1\"\n}"},"parameters":[],"headers":[{"name":"Content-Type","value":"application/json"},{"name":"User-Agent","value":"insomnia/8.5.0"}],"authentication":{},"metaSortKey":-1704721524134,"isPrivate":false,"settingStoreCookies":true,"settingSendCookies":true,"settingDisableRenderRequestBody":false,"settingEncodeUrl":true,"settingRebuildPath":true,"settingFollowRedirects":"global","_type":"request"},{"_id":"req_f549b26381ac42c387500d15db88009f","parentId":"fld_ad3fd643799d456d99f4c046c1dcd116","modified":1704723534286,"created":1703079569529,"url":"http://164.90.163.120:8000/api/login","name":"Login","description":"","method":"GET","body":{"mimeType":"application/json","text":"{\n\t\"email\": \"test@gmail.com\",\n\t\"password\": \"1234\"\n}"},"parameters":[],"headers":[{"name":"Content-Type","value":"application/json","id":"pair_158278f912aa439ea084706a3e702d48"},{"name":"User-Agent","value":"insomnia/8.5.0","id":"pair_82ff57afdeb34cfe932a6ee746bcddba"}],"authentication":{},"metaSortKey":-1704721467727,"isPrivate":false,"settingStoreCookies":true,"settingSendCookies":true,"settingDisableRenderRequestBody":false,"settingEncodeUrl":true,"settingRebuildPath":true,"settingFollowRedirects":"global","_type":"request"},{"_id":"fld_ad3fd643799d456d99f4c046c1dcd116","parentId":"wrk_d5619dcf09b94374892ac71451553672","modified":1704721462016,"created":1704721462016,"name":"User","description":"","environment":{},"environmentPropertyOrder":null,"metaSortKey":-1704721462016,"_type":"request_group"},{"_id":"req_40cfb8d418fc431faeab2c40ef2ed32f","parentId":"fld_ad3fd643799d456d99f4c046c1dcd116","modified":1704723524412,"created":1703080862986,"url":"http://164.90.163.120:8000/api/register","name":"Register","description":"","method":"POST","body":{"mimeType":"application/json","text":"{\n\t\"name\": \"test\",\n\t\"email\": \"test@gmail.com\",\n\t\"password\": \"1234\"\n}"},"parameters":[],"headers":[{"name":"Content-Type","value":"application/json"},{"name":"User-Agent","value":"insomnia/8.5.0"},{"id":"pair_367337abd0324dcdb0dc59268323e8e9","name":"","value":"","description":""}],"authentication":{},"metaSortKey":-1704721467627,"isPrivate":false,"settingStoreCookies":true,"settingSendCookies":true,"settingDisableRenderRequestBody":false,"settingEncodeUrl":true,"settingRebuildPath":true,"settingFollowRedirects":"global","_type":"request"},{"_id":"env_32e38ab812f1acf4292cc3a7b944596f411d089a","parentId":"wrk_d5619dcf09b94374892ac71451553672","modified":1703066641044,"created":1703066641044,"name":"Base Environment","data":{},"dataPropertyOrder":null,"color":null,"isPrivate":false,"metaSortKey":1703066641044,"_type":"environment"},{"_id":"jar_32e38ab812f1acf4292cc3a7b944596f411d089a","parentId":"wrk_d5619dcf09b94374892ac71451553672","modified":1703067191259,"created":1703066641046,"name":"Default Jar","cookies":[{"key":"XSRF-TOKEN","value":"eyJpdiI6IlFaRHlJOVZURVhmZ25IM2NvTWIwZ3c9PSIsInZhbHVlIjoiMkpvYnlTMnFLWFZJNXFTRTVUV3hab0pPZHRpNXJUQ0JmK0ZOMHc1dERnTVBvdnlabXI3cVVPZ3hnN0EvalNodWphbzA1ZndMS1RaK1pKK21BS0wvdjFwMU5ibkFKSTVTbklacTczbEVmRHZiazJIM0dsU3Fsa1Y4T3BMRXRFd1YiLCJtYWMiOiJmYmQ1ZmZhNDNhZDE3NjA5ODE1YzgyZmYxYjBlYjE1Y2Y1ZjNhODc2ZTMzY2VkZDQyYjYxZTRhZjNmM2MxM2FhIiwidGFnIjoiIn0%3D","expires":"2023-12-20T12:13:11.000Z","maxAge":7200,"domain":"localhost","path":"/","hostOnly":true,"creation":"2023-12-20T10:13:11.257Z","lastAccessed":"2023-12-20T10:13:11.257Z","sameSite":"lax","id":"eada34b7-3064-4444-b0bd-3cd7f9be7710"},{"key":"ligue1_session","value":"eyJpdiI6IlA0NGllbUdpY2N3T1VNaVNwQjdsb0E9PSIsInZhbHVlIjoiNlRMT2Z5bjRHcmY0WFRpWFU3MS9VOVlJbGNtYUlmbGdYZVNtS09kVW1tcXBrVXlJbkFLZ3VlMTZlUkM2MjB0YTdUN2RjOWpibmo2aGtLNDBCdGtVRnh3cGcxQzc4VXVXRUtpMW5JOEE2S0tteERaSjdRME5HcTZtN05zYXc2Z3IiLCJtYWMiOiIzYjFlNjI3ZWU3ZWZhMmJlNDE0YjE3YmM2NTcxZjEyMWMyODIzYjk3MGJmZmFlNTdhOTJkNmM5ZmZhOWY4YTNkIiwidGFnIjoiIn0%3D","expires":"2023-12-20T12:13:11.000Z","maxAge":7200,"domain":"localhost","path":"/","httpOnly":true,"hostOnly":true,"creation":"2023-12-20T10:13:11.259Z","lastAccessed":"2023-12-20T10:13:11.259Z","sameSite":"lax","id":"172a86ff-1160-4ddb-b1db-8e6c4ef1d16f"}],"_type":"cookie_jar"}]}ng Api_Route_Insomina…]()


Auteur
Louis

Licence
Ce projet est sous licence MIT
