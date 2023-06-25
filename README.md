## TODO APP

This application of todo app runs on php8.1 and nodejs v18.
Dashboard was created using filamentphp and customized using tailwindcss
User screen was created using Laravel Breeze

- Git repository: https://github.com/anesupaul-developer/todo-app

## TO RUN THE APPLICATION
- Unzip the file and place it in a folder of your choice say src so that you src/app/Http/Controllers/....

On your terminal navigate to the root folder of the project and run 
    ** composer install and run php artisan serve --port=8000 

and open 
    - http://localhost:8000 

You can create an account by clicking ## Dont have an account? ## 
Once logged in you can create a new todo by clicking Create Todo button.

You can also view, edit or delete the todo.
### Please note that once the todo has been marked as complete it can no-longer be edited

in your browser and open another browser or chrome incognito mode and open 
    - http://localhost:8000/admin

Open another terminal and run this command
    **npm install && npm run dev

Open another terminal and run 
    **php artisan create:user
so you can create your user either admin or not. 
### Please note that password field is secret and you wont see any text on the console

after, login on the admin panel with the credentials you just created.

You can manage users and todos and also view stats on the dashboard.


