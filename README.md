# Requirements
- Docker
- docker-compose

## Installation
- On the project root, run ```docker-compose up --build -d```

## How to use
- Send HTTP requests to:

| Host   |      Port      |
|----------|-------------|
| localhost |  50000 |

- Available requests:

|Method|Headers|Endpoint|Fields|Description|
|-----|-----|-----|-----|-----|
|/GET|Accept: application/json|/users|-|List all users|
|/GET|Accept: application/json|/users/{userId}|<ul><li>URL <ul><li>userId (int, required)</li></ul></li></ul>|Show user info|
|/POST|Accept: application/json|/users|<ul><li>Body <ul><li>name (string, filled, required)</li><li>email (email, filled, unique, required)</li><li>name (string, filled, required)</li></ul></li></ul>|Create user|
|/PUT|Accept: application/json|/users/{userId}|<ul><li>URL <ul><li>userId (int, required)</li></ul></li></ul><ul><li>Body <ul><li>name (string, filled, optional)</li><li>email (email, filled, unique, optional)</li><li>name (string, filled, optional)</li></ul></li></ul>|Update user info|
|/DELETE |Accept: application/json|/users/{userId}|<ul><li>URL <ul><li>userId (int, required)</li></ul></li></ul>|Remove user|
