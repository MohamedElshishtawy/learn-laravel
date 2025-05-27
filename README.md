## Make() Vs Create()

### Create
    - It makes the collection then <b>insert</b> into database
### Make
    - It makes the collection only


## Factories 
first you should add to the model  
```UserFactory``` trait

### Factory Overwrite

You have 2 ways to overwrite
- newFactory() method
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




