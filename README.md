
## Mapper
is the conncetion between class and table in the database

## Make() Vs Create()

### Create
    - It makes the collection then <b>insert</b> into database
### Make
    - It makes the collection only


## Factories 
first you should add to the model  
```UserFactory``` trait

### Factory Overwrite

You have 3 ways to overwrite
- newFactory() method
- use the factories with out models
- state

#### newFactory() method
first create a new factory for example you have ```UserFactory``` and the new factory will be ```AdminFactory```
<br>
in the ```AdminFactory``` don't forget to add change the model it calles
```protected $model = User::class;```
now how to use it ?
<br>
you should go to the ```UserFactory``` and add the following code

```php
protected static function newFactory()
{
    return AdminFactory::new();
}
```
now you are ready to seed the DB using the new factory



note what is descovery
it is the way the frame work uses to discover the class as 
UserSeeder so when we want to descover the seeder of the user or what is the model of the Userseeder is to get the first caple cases 

### use the factories with out models
as the prevous example you can use ```AdminFactory``` itself
exaple 
```php
AdminFactory::new()->count(3)->create();
```
- don't forget to add protected $model attribute to the AdminFactory class itself

## What is Discovery?
Discovery is how Laravel automatically finds classes. For example:
- When you have a `UserSeeder`, Laravel looks at the first part ("User")
- It uses this to know which model the seeder belongs to
- This naming convention helps Laravel connect related classes automatically
