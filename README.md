# Безопасность
##Теория
- Использование пакета SecurityBundle для защиты приложения.
- Использование LexikJWTAuthenticationBundle для аутентификации на основе JWT.

## Практика
- Создание контроллера регистрации пользователя. 
- Построение компонента регистрации пользователя. 



curl -X POST -H "Content-Type: application/json" http://localhost/api/login_check -d '{"username":"test@my.com","password":"test"}'