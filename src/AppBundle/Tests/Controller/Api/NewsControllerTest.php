<?php

namespace AppBundle\Tests\Controller\Api;

use AppBundle\Entity\News;
use AppBundle\Test\ApiTestCase;

class NewsControllerTest extends ApiTestCase
{
    protected function setUp()
    {
        parent::setUp();

    }

    public function testPOST()
    {
        $data = [
            'title' => 'Great news everybody',
            'text' => 'This is a great story.',
            'link' => 'www.jobboardspro.com',
            'rang' => 1,
            'show_rec' => 1
        ];

        $response = $this->client->post('/api/news', [
            'body' => json_encode($data)
        ]);

        $finishedData = json_decode($response->getBody(true), true);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertTrue($response->hasHeader('Location'));
        $this->assertArrayHasKey('title', $finishedData);
        $this->assertEquals('Great news everybody', $finishedData['title']);
    }

    public function testGET()
    {
        $data = [
            'title' => 'Great news everybody',
            'text' => 'This is a great story.',
            'link' => 'www.jobboardspro.com',
            'rang' => 1,
            'show_rec' => 1,
            'date_posted' => new \DateTime()
        ];

        /** @var News $news */
        $news = $this->creteDbData('News', $data);
        $id = $news->getId();

        $response = $this->client->get('/api/news/' . $id);

        $this->assertEquals(200, $response->getStatusCode());
        $this->asserter()->assertResponsePropertiesExist($response, array(
            'title',
            'text',
            'link',
            'rang',
            'show_rec'
        ));
        $this->asserter()->assertResponsePropertyEquals($response, 'title', 'Great news everybody');
    }

    public function testGETNewsCollection()
    {
        $this->creteDbData(
            'News',
            [
                'title' => 'Great news everybody',
                'text' => 'This is a great story.',
                'link' => 'www.jobboardspro.com',
                'rang' => 1,
                'show_rec' => 1,
                'date_posted' => new \DateTime()
            ]
        );

        $this->creteDbData(
            'News',
            [
                'title' => 'This is cool title',
                'text' => 'Text should be long',
                'link' => 'www.yahoo.com',
                'rang' => 2,
                'show_rec' => 1,
                'date_posted' => new \DateTime()
            ]
        );

        $response = $this->client->get('/api/news');

        $this->assertEquals(200, $response->getStatusCode());
        $this->asserter()->assertResponsePropertyIsArray($response, 'news');
        $this->asserter()->assertResponsePropertyCount($response, 'news', 2);
        $this->asserter()->assertResponsePropertyEquals($response, 'news[1].title', 'This is cool title');
    }

    public function testPUT()
    {
        /** @var News $news */
        $news = $this->creteDbData(
            'News',
            [
                'title' => 'Great news everybody',
                'text' => 'This is a great story.',
                'link' => 'www.jobboardspro.com',
                'rang' => 1,
                'show_rec' => 1,
                'date_posted' => new \DateTime()
            ]
        );
        $id = $news->getId();

        $data = [
            'title' => 'New Title for this news',
            'text' => 'This is a great story.',
            'link' => 'www.jobboardspro.com',
            'rang' => 1,
            'show_rec' => 1
        ];

        $response = $this->client->put('/api/news/' . $id, [
            'body' => json_encode($data)
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->asserter()->assertResponsePropertyEquals($response, 'rang', 1);
    }

    public function testPATCH()
    {
        /** @var News $news */
        $news = $this->creteDbData(
            'News',
            [
                'title' => 'Great news everybody',
                'text' => 'This is a great story.',
                'link' => 'www.jobboardspro.com',
                'rang' => 1,
                'show_rec' => 1,
                'date_posted' => new \DateTime()
            ]
        );
        $id = $news->getId();

        $data = [
            'rang' => 2
        ];

        $response = $this->client->patch('/api/news/' . $id, [
            'body' => json_encode($data)
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->asserter()->assertResponsePropertyEquals($response, 'rang', 2);
        $this->asserter()->assertResponsePropertyEquals($response, 'title', 'Great news everybody');
    }

    public function testDELETE()
    {
        /** @var News $news */
        $news = $this->creteDbData(
            'News',
            [
                'title' => 'Great news everybody',
                'text' => 'This is a great story.',
                'link' => 'www.jobboardspro.com',
                'rang' => 1,
                'show_rec' => 1,
                'date_posted' => new \DateTime()
            ]
        );
        $id = $news->getId();
        $response = $this->client->delete('/api/news/' . $id);
        $this->assertEquals(204, $response->getStatusCode());
    }

    public function testValidationErrors()
    {
        //title is missing
        $data = [
            'text' => 'This is a great story.',
            'link' => 'www.jobboardspro.com',
            'rang' => 1,
            'show_rec' => 1
        ];

        $response = $this->client->post('/api/news', [
            'body' => json_encode($data)
        ]);

        $this->assertEquals(400, $response->getStatusCode());
        $this->asserter()->assertResponsePropertiesExist($response, array(
            'type',
            'title',
            'errors',
        ));
        $this->asserter()->assertResponsePropertyExists($response, 'errors.title');
        $this->asserter()->assertResponsePropertyEquals($response, 'errors.title[0]', 'Please enter a title');
        $this->asserter()->assertResponsePropertyDoesNotExist($response, 'errors.text');
        $this->assertEquals('application/problem+json', $response->getHeader('Content-Type')[0]);
    }

    public function testInvalidJson()
    {
        $invalidBody = <<<EOF

    "rang" : 1
}
EOF;
        $response = $this->client->post('/api/news', [
            'body' => $invalidBody
        ]);

        $this->assertEquals(400, $response->getStatusCode());
        $this->asserter()->assertResponsePropertyEquals($response, 'type', 'invalid_body_format');
    }

    public function test404Exception()
    {
        $response = $this->client->get('/api/news/tralala');
        $this->assertEquals(404, $response->getStatusCode());
        $this->assertEquals('application/problem+json', $response->getHeader('Content-Type')[0]);
        $this->asserter()->assertResponsePropertyEquals($response, 'type', 'about:blank');
        $this->asserter()->assertResponsePropertyEquals($response, 'title', 'Not Found');
        $this->asserter()->assertResponsePropertyEquals($response, 'detail', 'No news with id: tralala');
    }

}