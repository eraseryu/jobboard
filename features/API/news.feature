Feature: News
  In order to get news
  As an API client
  I need to be able to create news

  Scenario: Create news
    Given I have the payload
      """
      {
        "title": "Great news everybody",
        "text" : "This is a great story.",
        "link": "www.jobboardspro.com",
        "rang": 1,
        "show_rec": 1
      }
      """
    When I request "POST /api/news"
    Then the response status code should be 201