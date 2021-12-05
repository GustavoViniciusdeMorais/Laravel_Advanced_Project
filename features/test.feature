Feature: Posts

Scenario: Finding a specific post
    When I request a post "Get /posts/1"
    Then I get a "200" response
    And scope into the "data" property
        And the properties exist
            """
            id
            name
            """
        And the id "id" property is an integer