### Развертывание

    composer install
    
    cp .env.example .env
    
    # настроить в файле .env подключение к локальной базе данных
    
    php artisan key:generate
    php artisan jwt:secret
    php artisan migrate
    php artisan db:seed
    

### API

##### Авторизация
Запрос:

    POST http://<server>/api/auth/login

Параметры:

    login: required
    passwoed: required
    
Ответ

    {
        status: "OK",
        result: {
            api_token: {<token>}        
        }
    }
#
##### Регистрация
Запрос:

    POST http://<server>/api/auth/register

Параметры:

    'full_name' => обязателен,
    'email' => обязателен|должен соответствовать формату email,
    'phone' => обязателен|формат(+7XXXXXXXXXX),
    'password' => обязателен|должен быть не менее 6 символов, только латиница, минимум 1 символ верхнего регистра, минимум 1 символ нижнего регистра, минимум 1 спец символ $%&!:
    'confirm_password' => обязателен, должен совпадать с полем password

Ответ:    

    {
        status: "OK"
    }
#
##### Выход    
Запрос:
        
    POST http://<server>/api/auth/logout

Параметры:

    header: {
        Accept: application/json
        Authorization: Bearer <token>
    }

Ответ:

    {
        status: "OK"
    }

#    
##### Получение продуктов
Запрос:
    
    GET http://<server>/api/products

Параметры:
    
    filterData => не обязателен(пример: {"id свойства": ["id значения свойства", "id значения свойства"]}

    header: {
        Accept: application/json
        Authorization: Bearer <token>
    }
    
#    
##### Получение свойств
Запрос:
    
    GET http://<server>/api/properties

Параметры:
    
    header: {
        Accept: application/json
        Authorization: Bearer <token>
    }
