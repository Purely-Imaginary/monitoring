# Task
The purpose of the task is to create an application that allows for simple monitoring of Internet services.

## During the meeting of the whole team the following requirements were written down.
* The application allows you to define multiple services that are subject to monitoring.
* Configuration of monitored services is done by adding appropriate entries in the configuration file.
* Configuration will consist of defining data such as.
  * name of the service
  * url of the service
  * a list of validation tests such as response status, Content-Type header and may look as follows:

```
service1:
  name: Service one
  url: https://example.com/test.html
  tests:
    - assert.http-status-200
    - assert.http-header-html
```
* If any test returns an error, the application assumes that the service is not working.
* The result of the test is saved to the database along with the date of its execution and the information which test generated the error.
* The database stores the full history of the performed tests.
* The application does not have a graphical interface, and the control is done through the console.
* Running the check is done by command. And run by cron. The command allows you to select the tested service or all of them at once.
* Checking the results is done by running the corresponding command, which generates in the form of a table the last test result for each service. The table contains the following columns
  * name of the service
  * test date
  * test result
  * the test that generated the error

## The team has defined the following development directions
* The list of possible tests as well as services will grow.
* The application will be able to monitor services other that WWW e.g. FTP in the future.
* Execution of some tests is very time consuming due to response time. It is necessary to prepare the application to perform tests in an asychronous manner.
* Over time, there will be more and more services which will cause the need to scale the application to several servers.
* The application will be expanded in the future, with the ability to send email notifications when a non-functioning service is detected, and to log more detailed information about the test to an external log collection system.
* In the future there will be an administration panel where tests can be configured. This will allow you to dispense with the configuration file.

## Comment
* You can perform the task using any tools, although the Symfony framework is preferred.
* Your task is to make an application that performs only basic tasks (MVP).
* Choose an architecture that allows you to easily introduce further planned functionality.
* Stick to the principles of clean code.
* If you write simplified code that can be written better but for the purpose of MVP in your opinion does not make sense then describe it in the comments.
* If you have your thoughts, what solutions could be introduced in the future, or other comments then write them in the README.

## Note
* The runtime environment was created based on the project https://github.com/dunglas/symfony-docker, https://symfony.com/doc/current/setup/docker.html.
* If you want to use a different runtime environment then you can do so.


## AO comments
* TODO: Tests
* ExecutableTestInterface is not enforced
* Cleaner retrieving of data in GetResultsCommand
* Tests in services are its own entities instead of being grouped
* Logging of every test in service is probably not necessary
* Grouping tests to same url to not request same page everytime its tested
