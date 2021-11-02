# Streamlabs Assignment

## Application: Top StreamStats App
Once a user is logged-in display the following information to the user in two ways, once using MySQL queries and the second by doing the data aggregation yourself through code using a regular array:
- Total amount of streams per game
- Highest viewer count stream per game
- Median amount of viewers for all streams
- Streams with an odd number of viewers
- Streams with an even number of viewers
- List of top 100 streams that can be sorted asc & desc
- Streams with the same amount of viewers

## Stack
The technology you use is up to you, at Streamlabs we mainly make use of PHP, Laravel, Node.js, Vue, React, TypeScript, MySQL.

## Requirements
- Seed a database with the top 1000 streams on Twitch
- Shuffle this data before inserting it in your database
- Require users to login with their Twitch account
- Store the user in the database once they login
- Show the stats to the user upon login
(UI/UX is not super important, just need to be able to see the results)
- Update the top streams in your database every 15 minutes
- Expire a user’s session after 1 hour, requiring them to log back in

## Installation
- pull the repo and go to the project folder
```sh
cd streamlab_task
```

- create a new database streamlab_task and update the .env accordingly
```sh
cp .env.example .env
```

- update the twitch client_id, client_secret

- run composer to install PHP dependencies
```sh
composer update
```

- install the project
```sh
php artisan install
```

- command to update the data, this command is scheduled for every 15 mins
```sh
php artisan update-stream
```

I have uploaded the recording as well in this repo.