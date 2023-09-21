# O'Quiz - Back 

## API

### Routes 

https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/back

| Name     | Method | Route              | description|
|----------|--------|--------------------|------------|
| USER     | GET    |/api/user           |------------|
|          | GET    |/api/user/{id}      |------------|
|          | POST   |/api/user           |------------|
|          | PATCH  |/api/user           |------------|
|          | DELETE |/api/user           |------------|
|----------|--------|--------------------|------------|
| QUIZ     | GET    |/api/quiz           |------------|
|          | GET    |/api/quiz/{id}      |------------|
|          | GET    |/api/quiz/random    |------------|
|          | POST   |/api/quiz           |------------|
|----------|--------|--------------------|------------|
| CATEGORY | GET    |/api/category       |------------|
|          | GET    |/api/category/{id}  |------------|
|----------|--------|--------------------|------------|
| SCORE    | GET    |/api/score          |------------|
|          | GET    |/api/score/top10    |------------|
|          | GET    |/api/score/user/{id}|------------|
|          | GET    |/api/score/{id}     |------------|
|          | GET    |/api/score/category |------------|
|          | PATCH  |/api/score/{id}     |------------|
|----------|--------|--------------------|------------|
| LOGIN    | POST   |/api/login          |------------|
|          | POST   |/api/logout         |------------|
|----------|--------|--------------------|------------|



## BackOffice

### Routes 

| Controller       | Method | Route                  | Name                     |
|:-----------------|--------|------------------------|-------------------------:|
|HomeController    |        |/back	                 |app_back_home             | 
|------------------|--------|------------------------|--------------------------|
|CategoryController|        |/back/category	         |app_back_category_index   |  
|CategoryController|        |back/category/new	     |app_back_category_new     |
|CategoryController|        |/back/category/{id}	 |app_back_category_show    |
|CategoryController|        |/back/category/{id}/edit|app_back_category_edit    |
|CategoryController|        |/back/category/{id}	 |app_back_category_delete  |
|------------------|--------|------------------------|--------------------------|
|QuizController    |        |/back/quiz	             |app_back_quiz_index       |
|QuizController    |        |/back/quiz/new	         |app_back_quiz_new         |
|QuizController    |        |/back/quiz/{id}	     |app_back_quiz_show        |
|QuizController    |        |/back/quiz/{id}/edit	 |app_back_quiz_edit        |
|QuizController    |        |/back/quiz/{id}	     |app_back_quiz_delete      |
|------------------|--------|------------------------|--------------------------|
|QuestionController|        |/back/question	         |app_back_question_index   |
|QuestionController|        |/back/question/new	     |app_back_question_new     |
|QuestionController|        |/back/question/{id}	 |app_back_question_show    |
|QuestionController|        |/back/question/{id}/edit|app_back_question_edit    |
|QuestionController|        |/back/question/{id}	 |app_back_question_delete  |
|------------------|--------|---------------------   |--------------------------|
|UserController    |        |/back/user	             |app_back_user_index       |
|UserController    |        |/back/user/new	         |app_back_user_new         |
|UserController    |        |/back/user/{id}	     |app_back_user_show        |
|UserController    |        |/back/user/{id}/edit    |app_back_user_edit        |
|UserController    |        |/back/user/{id}	     |app_back_user_delete      |
|------------------|--------|------------------------|--------------------------|
|LoginController   |        |/back/login	         |app_back_login            |
|LoginController   |        |/back/logout	         |app_back_logout           |
|------------------|--------|------------------------|--------------------------|
