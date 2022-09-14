# Full Stack PHP Developer Assessment

## Tech Intro

- This application is fully dockerized.
- Dockerfile & Docker-compose setup with PHP8.1 and MySQL 8.
- After the image is started the app will run on port 8080 on localhost. You can try the using the following
  endpoint:
  - http://localhost:8080/api/
  
- The default database is called `database` and the username and password are `root` and `root` respectively.
- Makefile with some basic commands

## pre-requisite

- create `.env` file if not already exists and paste .env.example content in it.

## Installation

Step 1:

```
  make install
```

Step 2:

```
  make run
```

## Run commands for composer install

```
  make install
```

## Run commands inside the app container

```
  make enter
```

## Run command for stopping the docker

```
  make stop
```


## Description

This application is basically build on PHP 8.1 Slim Framework 4.0:

**Created RESTAPIs for user authentication and user crud operations.**

1. Transections API    
    **Get Transactions**

    **Description**
    It is basically used to get the transactions from the provided **start** and **end** date. Also, we can add the **no of records**  **limit** and **offest** from where it will start to get the data.

    **Mehtod**
   ```
    GET Request
   ```

    **URL**
    
      ```
         {{base_url}}/api/transactions?startdate=2022-08-10&enddate=2022-09-22&limit=5&offset=1
      ```
    
    **Headers**
    
      ```
        {
            Content-Type: application/json
            Authorization: Bearer <jwt-token> 
        }
      ```
    
    **response**
        
    ```
      {
            "success": true,
            "response": [
                {
                    "id": 2,
                    "name": "Ahsan",
                    "amount": 8056,
                    "type": "withdraw",
                    "datetime": "2022-09-16 00:09:26"
                },
                {
                    "id": 3,
                    "name": "Arslan",
                    "amount": 12975,
                    "type": "withdraw",
                    "datetime": "2022-09-18 00:09:26"
                },
                {
                    "id": 4,
                    "name": "Ahsan",
                    "amount": 19100,
                    "type": "deposit",
                    "datetime": "2022-09-14 00:09:26"
                },
                {
                    "id": 5,
                    "name": "Ahsan",
                    "amount": 18096,
                    "type": "withdraw",
                    "datetime": "2022-08-14 00:09:26"
                },
                {
                    "id": 6,
                    "name": "Ahsan",
                    "amount": 10466,
                    "type": "withdraw",
                    "datetime": "2022-09-17 00:09:26"
                }
            ]
        }
    }
    ```
2. Authentication
   **Login API**
    
    **Mehtod**
   ```
    POST Request
   ```

    **URL**
   ```
    {{base_url}}/api/auth/login
   ```

   **payload**

   ```
    {
        email:arslan@gmail.com
        password:123456
    }
   ```

      **response**
    
       ```
        {
            "success": true,
            "response": {
                "token": "jwt-token"
            }
        }
       ```
   **Register API**
    **Mehtod**
   ```
    POST Request
   ```

    **URL**
   ```
     {{base_url}}/api/auth/register
   ```

   **payload**

   ```
    {
        email:Asif@gmail.com
        password:123456
        name:Asif
        phone_number:+92 334445576
        address:DHA
    }
   ```

    **response**
    
     ```
        {
            "success": true,
            "response": "User Registered Successfully"
        }
     ```
3. User Operations API
    **Get User**

    **Mehtod**
   ```
    GET Request
   ```

    **URL**
    
      ```
         {{base_url}}/api/user/{id}
      ```
    
    **Headers**
    
      ```
        {
            Content-Type: application/json
            Authorization: Bearer <jwt-token> 
        }
      ```
    
    **response**
        
    ```
      {
        "success": true,
        "response": {
            "id": 1,
            "email": "ali@gmail.com",
            "password": "$2y$10$BFkvgXntK74giaEz42EAwefnYHnmFsnI3uGwtxQiN0ya6YxP/zMve",
            "name": "Ali",
            "type": "customer",
            "phone_number": "+92 3344455374",
            "address": "EME",
            "updated_at": "2022-09-14T06:02:17.000000Z",
            "created_at": "2022-09-14T06:02:17.000000Z"
        }
    }
    ```
    **Update User**
    
    **Mehtod**
   ```
    POST Request
   ```

    **URL**    
      ```
         {{base_url}}/api/user/{id}
      ```
    
    **Headers**
    
      ```
        {
            Content-Type: application/json
            Authorization: Bearer <jwt-token> 
        }
      ```
    **payload**

   ```
    {
        name:Asif Ahmad
        phone_number:+92 334445245
    }
   ```
    **response**
        
    ```
      {
        "success": true,
        "response": {
            "id": 2,
            "email": "asif@gmail.com",
            "password": "$2y$10$BFkvgXntK74giaEz42EAwefnYHnmFsnI3uGwtxQiN0ya6YxP/zMve",
            "name": "Asif Ahmad",
            "type": "customer",
            "phone_number": "+92 334445123",
            "address": "EME",
            "updated_at": "2022-09-14T06:02:17.000000Z",
            "created_at": "2022-09-14T06:02:17.000000Z"
        }
    }
    ```
    **Delete User**

    **Mehtod**
   ```
    DELETE Request
   ```

    **URL**
    
      ```
         {{base_url}}/api/user/{id}
      ```
    
    **Headers**
    
      ```
        {
            Content-Type: application/json
            Authorization: Bearer <jwt-token> 
        }
      ```
    
    **response**
        
    ```
        {
            "success": true,
            "response": "User deleted successfully"
        }
    }
    ```


