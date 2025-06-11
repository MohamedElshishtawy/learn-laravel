
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
- use the factories without models
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

### state
the state i think it is the best way <br>
as you add state that can only change some attributes 
```php
/* in the UserFactory */
// state 1
public function admin(): Factory
{
    return $this->state(function (array $attributes) {
        return [
            'is_admin' => true,
        ];
    });
}
// state 2
public function verified(): Factory
{
    return $this->state(fn (array $attributes) => ['verified' => 'suspended']);
}

/* use it in the seeder */
User::factory(2)->admin()->verified()->create();
User::factory(10)->verified()->create();
```


## What is Discovery?
Discovery is how Laravel automatically finds classes. For example:
- When you have a `UserSeeder`, Laravel looks at the first part ("User")
- It uses this to know which model the seeder belongs to
- This naming convention helps Laravel connect related classes automatically


## UUID & ULID
They Provide a unique identifier for each record. <br>
Solving errors in data intergrity, duplication and security improvemnt. <br>
UUID stands for Universally Unique Identifier. <br>
ULID stands for Universally Unique Lexicographically Sortable Identifier. <br>
UUID => 36 characters | 32 digit and 4 hyphens (-) <br>
ULID => 26 characters | 22 digit and 4 hyphens (-) <br>
### UUID Versions
- V1, V2, V3, V4 
<br>
V1 => is based on time and MAC address <br>
V2 => is based on who created the record and when | Note: you can make only 64 id per 7min <br>
V3 => is based on MD5 hash of a namespace and name <br>
V4 => is based on random numbers | most used in game development <br>

### How to use UUID & ULID in Laravel
first in the migration 
```php
$table->uuid('id')->primary();
$table->ulid('id')->primary();
```

then in the model
```php
// in the class use this trait
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use HasUuids;
use HasUlids;
```
To choice specific version:
```php
// override the newUniqueId method in the model
public function newUniqueId(): string
{
    return (string) Uuid::uuid4();
}
```
To use UUID in another filed
```php
public function uniqueIds(): array // for uuid and ulid
{
    return ['id', 'discount_code'];
}
// in the migration
$table->string('discount_code', 36)->unique();
```
