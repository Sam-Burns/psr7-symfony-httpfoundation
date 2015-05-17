Feature: Getting basic data out of an HTTP Request
  In order to build any kind of web application really
  As a developer building a web app, REST API or something
  I want the library to be able to yield basic information about incoming HTTP Requests

  Scenario: Getting a locale
    Given the client's browser is sending out the user agent 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:38.0) Gecko/20100101 Firefox/38.0'
    When I check the user agent
    Then I should get 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:38.0) Gecko/20100101 Firefox/38.0'

  Scenario: Getting a locale
    Given the URI is requested is 'http://localhost:8080/what-was-the-uri/'
    When I check the URI
    Then I should get 'http://localhost:8080/what-was-the-uri/'
