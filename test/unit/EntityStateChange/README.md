I'd implemented in symfony some entities that can change their status. We have choosed to set possible status as constant of class. Also, we have a method Entity::setStatus($status) that get status as parameter. This may cause a wrong status name.

This entityStateChangeTest, works with an interface and all methods can change status of entity in all its variations. This kind of pattern, permit to set a precise order of constants. Also, we have a fluent interface to make more readable the code.
