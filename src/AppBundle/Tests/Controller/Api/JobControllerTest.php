<?php

namespace AppBundle\Tests\Controller\Api;


use AppBundle\Entity\Jobs;
use AppBundle\Test\ApiTestCase;

class JobControllerTest extends ApiTestCase
{

    public function testPOST()
    {
        $data = [
            'title' => 'Great job title',
            'description' => 'This is job description',
            'job_category' => 0,
            'employee_type' => 0,
            'position_type' => 0,
            'experience_level' => 0,
            'school_level' => 0,
            'salary' => 500,
            'country' => 0,
            'state' => 0,
            'city' => 0,
            'company_id' => 0,
            'contact_email' => 'test@test.de',
            'expires_after' => 10,
            'featured' => 1,
            'active' => 1,
            'date_posted' => '2017-12-25 18:00:00',
            'date_expired' => '2018-01-04 18:00:00'
        ];

        $response = $this->client->post('/api/jobs', [
            'body' => json_encode($data)
        ]);

        $finishedData = json_decode($response->getBody(true), true);

        //$this->debugResponse($response);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertTrue($response->hasHeader('Location'));
        $this->assertArrayHasKey('title', $finishedData);
        $this->assertEquals('Great job title', $finishedData['title']);
    }

    public function testPUT()
    {
        /** @var Jobs $job **/
        $job = $this->creteDbData(
            'Jobs',
            [
                'title' => 'Great job title',
                'description' => 'This is job description',
                'job_category' => 0,
                'employee_type' => 0,
                'position_type' => 0,
                'experience_level' => 0,
                'school_level' => 0,
                'salary' => 500,
                'country' => 0,
                'state' => 0,
                'city' => 0,
                'company_id' => 0,
                'contact_email' => 'test@test.de',
                'expires_after' => 10,
                'featured' => 1,
                'active' => 1,
                'date_created' => new \DateTime(),
                'date_posted' => new \DateTime('2017-12-25 18:00:00'),
                'date_expired' => new \DateTime('2018-01-04 18:00:00')
            ]
        );

        $id = $job->getId();

        $updateData = [
            'title' => 'New job title',
            'description' => 'This is job description',
            'job_category' => 0,
            'employee_type' => 0,
            'position_type' => 0,
            'experience_level' => 0,
            'school_level' => 0,
            'salary' => 500,
            'country' => 0,
            'state' => 0,
            'city' => 0,
            'company_id' => 0,
            'contact_email' => 'test@test.de',
            'expires_after' => 10,
            'featured' => 1,
            'active' => 1,
            'views' => 0,
            'new_record' => 1,
            'date_posted' => '2017-12-25 18:00:00',
            'date_expired' => '2018-01-04 18:00:00'
        ];

        $response = $this->client->put('/api/jobs/' . $id, [
            'body' => json_encode($updateData)
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->asserter()->assertResponsePropertyEquals($response, 'title', 'New job title');
    }

    public function testPATCH()
    {
        /** @var Jobs $job **/
        $job = $this->creteDbData(
            'Jobs',
            [
                'title' => 'Great job title',
                'description' => 'This is job description',
                'job_category' => 0,
                'employee_type' => 0,
                'position_type' => 0,
                'experience_level' => 0,
                'school_level' => 0,
                'salary' => 500,
                'country' => 0,
                'state' => 0,
                'city' => 0,
                'company_id' => 0,
                'contact_email' => 'test@test.de',
                'expires_after' => 10,
                'featured' => 1,
                'active' => 1,
                'date_created' => new \DateTime(),
                'date_posted' => new \DateTime('2017-12-25 18:00:00'),
                'date_expired' => new \DateTime('2018-01-04 18:00:00')
            ]
        );

        $id = $job->getId();

        $updateData = [
            'title' => 'New job title',
            'active' => 0,
            'views' => 54
        ];

        $response = $this->client->patch('/api/jobs/' . $id, [
            'body' => json_encode($updateData)
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->asserter()->assertResponsePropertyEquals($response, 'title', 'New job title');
        $this->asserter()->assertResponsePropertyEquals($response, 'active', 0);
        $this->asserter()->assertResponsePropertyEquals($response, 'views', 54);
    }

    public function testDELETE()
    {
        /** @var Jobs $job **/
        $job = $this->creteDbData(
            'Jobs',
            [
                'title' => 'Great job title',
                'description' => 'This is job description',
                'job_category' => 0,
                'employee_type' => 0,
                'position_type' => 0,
                'experience_level' => 0,
                'school_level' => 0,
                'salary' => 500,
                'country' => 0,
                'state' => 0,
                'city' => 0,
                'company_id' => 0,
                'contact_email' => 'test@test.de',
                'expires_after' => 10,
                'featured' => 1,
                'active' => 1,
                'date_created' => new \DateTime(),
                'date_posted' => new \DateTime('2017-12-25 18:00:00'),
                'date_expired' => new \DateTime('2018-01-04 18:00:00')
            ]
        );

        $id = $job->getId();

        $response = $this->client->delete('/api/jobs/' . $id);
        $this->assertEquals(204, $response->getStatusCode());
    }

    public function testGET()
    {

    }

    public function testGETJobsCollection() {

    }

}