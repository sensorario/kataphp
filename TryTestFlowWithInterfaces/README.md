Before start to test a behavior, I can create an interface implemented by the class that we want to test.

TDD is

 - Test red
 - Implementation
 - Test Green
 - Refactoring

Because of classes and methods not exists before we write a test, and tests test implementation and not interfaces:

 - If not exists, create an interface
 - If not exists, create a class that implement that interface

 - Write a failing test
 - Implement class
 - See green test
 - Refactoring

