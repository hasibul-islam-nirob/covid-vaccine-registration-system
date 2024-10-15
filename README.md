# COVID vaccine registration system



```
git clone https://github.com/hasibul-islam-nirob/covid-vaccine-registration-system
cd covid-vaccine-registration
cp .env.example .env

'Added database into .env' example DB_DATABASE=covid_vaccine_registration_system

composer install
npm install
php artisan migrate --seed
php artisan serve
```



### Performance Optimization

- **Indexes**: Added indexes to frequently searched columns like `nid` in the `users` table and `scheduled_date` in the `vaccination_schedules` table to improve query performance.
- **Eager Loading**: Used eager loading in relationships to reduce the number of database queries.

### Future SMS Notification Feature

- **Notification System**: The application uses Laravel's Mailable class for email notifications. To add SMS notifications, we can utilize Laravel's Notification system, which supports multiple channels like SMS via Nexmo or Twilio.
- **Code Changes**:
  - Create a new Notification class using `php artisan make:notification VaccinationReminderNotification`.
  - Implement the `toMail` and `toSms` methods within the Notification class.
  - Update the `SendVaccinationReminders` command to send notifications instead of emails.
  - Ensure that the User model implements the `Notifiable` trait.