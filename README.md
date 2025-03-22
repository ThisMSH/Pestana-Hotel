
# Pestana Hotel

This project is for booking rooms in a hotel where the user can book a room or several rooms and can also manage his reservations in the dashboard. And there is also the admin dashboard where the admin can manage all the reservations of the hotel, and can also add, update and delete rooms.



## Run Locally

First of all you need to host the project locally using [XAMPP](https://www.apachefriends.org/) or similar program.

After installing XAMPP, running it and launching both Apache and MySql, in the terminal access the `htdocs` folder, the path is usually the same, if not modify the path to your `htdocs`:

```bash
  cd C:\xampp\htdocs
```

Clone this project in `htdocs`:

```bash
  git clone https://github.com/ThisMSH/Pestana-Hotel.git
```

In `phpMyAdmin` create a new database called `pestana`. After that import one of the 2 files in database folder in your new database.

| File name | Description                       |
| :-------- | :-------------------------------- |
| `pestana-empty`      | It'll create new fresh tables with no data in them (just the rooms table will be filled). |
| `pestana`      | It'll create new tables that have some test data that I was using during the test of this project. |

> Note that the database name have to be `pestana`, else you'll need to modify the database name in `\Pestana-Hotel\app\config\Config.php`.

Now you should be able to run the project without any issue, this link may lead you to the project if you're using [Pestana Hotel](http://localhost/Pestana-Hotel/).

## Usage

First you'll have to be a user in the website in order to search or book a room, just go to [Sign up](http://localhost/Pestana-Hotel/signup/register) and create an account.

After creating your account and signing in, you can search and book some rooms, and access the dashboard and test all the functionalities.

> Note that in order to create an admin user, you have to manually modify the `Admin` column for the user that you want it to be the admin from phpMyAdmin dashboard or by using this query:

```sql
    UPDATE `users` SET `Admin` = '1' WHERE `users`.`ID` = ?;
```

> Replace `?` with the ID of the user that you want to set as admin.


## Tech Stack

**Frontend:** HTML, CSS, JavaScript, TailwindCSS.

**Backend:** PHP (OOP & MVC), MySQL.


## Screenshots

### Home page
![Home](https://cdn.discordapp.com/attachments/1093953286404575333/1093953391241203853/localhost_Pestana-Hotel_.png?ex=67df9ebd&is=67de4d3d&hm=51ccffe4cfb0048a63693ce0078c51d37c4427d460be4decb88cb4b83e0603bf&)

### Sign-Up page
![Sign-up](https://cdn.discordapp.com/attachments/1093953286404575333/1093953391627075614/localhost_Pestana-Hotel_signup_register.png?ex=67df9ebd&is=67de4d3d&hm=b37b250b656bd840fdb5519c96fae2ab10e9131b30abb808f5ad135a4b2af474&)

### Login page
![Login](https://cdn.discordapp.com/attachments/1093953286404575333/1093953392163950703/localhost_Pestana-Hotel_signin_login.png?ex=67df9ebd&is=67de4d3d&hm=1b6f51f7658ccf0f8c79564d2685ea3ca765d4c73e9b4310decb51a53b7d3a16&)

### Search
![Search](https://cdn.discordapp.com/attachments/1093953286404575333/1093953392583376947/localhost_Pestana-Hotel_home_index.png?ex=67df9ebd&is=67de4d3d&hm=131effe235953e120bb99b84ea54bb8f1335bebfd65b4ee6b0eaf94ef7c768a9&)

### Booking result
![Booking](https://cdn.discordapp.com/attachments/1093953286404575333/1093953392851828796/localhost_Pestana-Hotel_booking_search.png?ex=67df9ebd&is=67de4d3d&hm=eeba471d7e1f9753927e10f9514a09f9fe774aa9e6c29298a22fc89a8f475715&)

### Booking form
![Booking form](https://cdn.discordapp.com/attachments/1093953286404575333/1093953393204138146/localhost_Pestana-Hotel_booking_search_1.png?ex=67df9ebd&is=67de4d3d&hm=106a15cc59085df3e2cfd0643ff5dbd8cd2cf645955a4dcdd0da906e2173c145&)

### Profile dashboard page
![Profile dashboard](https://cdn.discordapp.com/attachments/1093953286404575333/1093953428583104553/localhost_Pestana-Hotel_dashboard_my_profile.png?ex=67df9ec6&is=67de4d46&hm=2774da9aa5992bc091bd40c51ed80c8614de729df6a06901d084ffa128cf82e6&)

### Reservations dashboard page
![Reservations dashboard](https://cdn.discordapp.com/attachments/1093953286404575333/1093953428805390357/localhost_Pestana-Hotel_dashboard_my_booking.png?ex=67df9ec6&is=67de4d46&hm=65864b168e5f235a7701db9c612637cf735a41facd6d585f01435efc50520c82&)

### Bookers display
![Bookers display](https://cdn.discordapp.com/attachments/1093953286404575333/1093953429052862464/localhost_Pestana-Hotel_dashboard_my_booking_1.png?ex=67df9ec6&is=67de4d46&hm=3e2c6c0a112c097b03e37df6b15d64f7b52fc2e67a0d327ad8778088dba1e019&)

### Rooms management dashboard page
![Rooms management dashboard](https://cdn.discordapp.com/attachments/1093953286404575333/1093953429283553290/localhost_Pestana-Hotel_dashboard_rooms_manage.png?ex=67df9ec6&is=67de4d46&hm=5309a6ef070a525790d363c0b25055b5276f6679ce224e88ef1ed0ae82d41fec&)

### Reservations management dashboard page
![Reservations management dashboard](https://cdn.discordapp.com/attachments/1093953286404575333/1093953429556170772/localhost_Pestana-Hotel_dashboard_actived.png?ex=67df9ec6&is=67de4d46&hm=aeb72a1e5fcdb4a0527d2ebffbf89a4366dcb9cfd06db7a04bfda58ef59d0c59&)
