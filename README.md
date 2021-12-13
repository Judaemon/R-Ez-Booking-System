# R-Ez-Booking-System

### Software that you need to run
    XAMPP v3.3.0 and up
    VS CODE


### How To run
## Lunch your XAMPP
    Start Apeche and MySQL

## Create a database 
    Name it "rez-booking-system"

## Configure .env file
    copy the .env.example then rename the copy .env

## Running the system
    Open the project in VS Code
    Start a new terminal
    Run this commands
        npm install
        npm run dev 
        php composer.phar install

    if the commands are not working search the error in google
    
    Run the seeder to populate the database
        php artisan migrate:fresh --seed
        
    Serve the system
        php artisan serve
        access the system by clicking the link after running the command

    Default user accounts
        email: admin@gmail.com
        password: admin 
        
        email: user@gmail.com
        password: user
        
