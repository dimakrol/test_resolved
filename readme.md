# Welcome to Neurony Test

In this test, you will have to fulfill several tasks, by fully respecting the requirements and restrictions.

# Description

The application consists of only one page accessible at `http://test.local/`.    
On that page a fully functional filtering of `App\Post` records is implemented by using the `App\Repositories\EloquentPostSearchRepository.php` repository class.

# Duration

3-5 hours 

# Installation

* Clone this repository   
* Copy the contents of `.env.example` into your `.env` file   
* Apply the other usual Laravel installation steps   
* Your application should be available at `http://neurony-test.local`   

# Tasks (you must follow all Restrictions for each task)

### Task 1

* Create a `PostFactory` class   
* Modify the `DatabaseSeeder` class to seed **3 users** and **50 posts**

### Task 2

As already, mentioned this application filters `App\Post` records by using the `App\Repositories\EloquentPostSearchRepository` class.  
You will have to change this filtering logic to work with **Elasticsearch**.

**Requirements**    

* In `App\Http\Controllers\IndexController`, replace `EloquentPostSearchRepository` with `SearchableContract` (https://www.screencast.com/t/GwQbtBCq)      
* Create a new repository class called `App\Repositories\ElasticearchPostSearchRepository` and in here write the code for filtering the records
* The `Elasticsearch index` should be called `test`

**Restrictions**

* Besides the change mentioned above, you are not allowed to alter the `App\Http\Controllers\IndexController` class in any other way.
   
This task is considered complete when the user is able to filter posts in exactly the same way as before, but using Elasticsearch.

### Task 3

Now that your filtering with Elasticsearch is complete, it's time to notify every seeded user ([Task 1](#task-1)) each time a search happens.

**Requirements**   
   
* Use Laravel's notifications system to send notifications only via `database`.
* Alter the `notifications` table and add a new column called `count`.
* Your `App\Repositories\ElasticearchPostSearchRepository` should use the `App\Traits\NotifiesPostSearches` trait.  
* Send a `App\Notifications\NewPostSearch` notification to all users every time a search happens.
* The `data` column in the `notifications` table should contain only **the subject of the notification** and **an array containing the ids of posts resulted from the respective search criteria**
* The `count` column in the `notifications` table should contain the **count of posts the respective search returned**

**Restrictions**   
   
* You are not allowed to modify the `App\Traits\NotifiesPostSearches` trait at all.   
* You are not allowed to modify the `App\Contracts\SearchableContract` interface at all.
* Your `App\Repositories\ElasticearchPostSearchRepository` class should directly implement ALL required methods.
* For sending notifications, you should use the `sendNewPostSearchNotifications` method from the `App\Traits\NotifiesPostSearches` trait and not the one from the interface (see `App\Providers\EventServiceProvider`).   
   
This task is considered complete when after a search is performed on the site, a new notification is inserted in the `notifications` database table for each user.   
The notification should respect the format with an extra column.

# Happy coding 