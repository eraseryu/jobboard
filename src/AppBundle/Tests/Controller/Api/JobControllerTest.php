<?php

namespace AppBundle\Tests\Controller\Api;


use AppBundle\Entity\JobCategories;
use AppBundle\Entity\Jobs;
use AppBundle\Test\ApiTestCase;

class JobControllerTest extends ApiTestCase
{

    public function testPOST()
    {
        $testData = $this->getTestData();
        /** @var JobCategories $jobCategory */
        $jobCategory = $testData['jobCategory'];

        $data = [
            'title' => 'Great job title',
            'description' => 'This is job description',
            'job_category' => $jobCategory->getId(),
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
        $testData = $this->getTestData();
        /** @var JobCategories $jobCategory */
        $jobCategory = $testData['jobCategory'];

        /** @var Jobs $job **/
        $job = $this->creteDbData(
            'Jobs',
            [
                'title' => 'Great job title',
                'description' => 'This is job description',
                'job_category' => $jobCategory,
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
            'job_category' => $jobCategory->getId(),
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
        $testData = $this->getTestData();
        /** @var JobCategories $jobCategory */
        $jobCategory = $testData['jobCategory'];

        /** @var Jobs $job **/
        $job = $this->creteDbData(
            'Jobs',
            [
                'title' => 'Great job title',
                'description' => 'This is job description',
                'job_category' => $jobCategory,
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
        $this->asserter()->assertResponsePropertyExists($response, 'job_category');
        $this->asserter()->assertResponsePropertyEquals($response, 'salary', 500);
    }

    public function testDELETE()
    {
        $testData = $this->getTestData();
        /** @var JobCategories $jobCategory */
        $jobCategory = $testData['jobCategory'];

        /** @var Jobs $job **/
        $job = $this->creteDbData(
            'Jobs',
            [
                'title' => 'Great job title',
                'description' => 'This is job description',
                'job_category' => $jobCategory,
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
        $testData = $this->getTestData();
        /** @var JobCategories $jobCategory */
        $jobCategory = $testData['jobCategory'];

        /** @var Jobs $job **/
        $job = $this->creteDbData(
            'Jobs',
            [
                'title' => 'Great job title',
                'description' => 'This is job description',
                'job_category' => $jobCategory,
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

        $response = $this->client->get('/api/jobs/' . $id);

        $this->assertEquals(200, $response->getStatusCode());
        $this->asserter()->assertResponsePropertyEquals($response, 'title', 'Great job title');
        $this->asserter()->assertResponsePropertyEquals($response, 'salary', 500);
    }

    public function testGETJobsCollection()
    {
        $testData = $this->getTestData();
        /** @var JobCategories $jobCategory */
        $jobCategory = $testData['jobCategory'];

        /** @var Jobs $job1 **/
        $job1 = $this->creteDbData(
            'Jobs',
            [
                'title' => 'Great job title',
                'description' => 'This is job description',
                'job_category' => $jobCategory,
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

        /** @var Jobs $job2 **/
        $job2 = $this->creteDbData(
            'Jobs',
            [
                'title' => '2nd job in the list',
                'description' => 'Maybe you can look this job',
                'job_category' => $jobCategory,
                'employee_type' => 0,
                'position_type' => 0,
                'experience_level' => 0,
                'school_level' => 0,
                'salary' => 900,
                'country' => 0,
                'state' => 0,
                'city' => 0,
                'company_id' => 0,
                'contact_email' => 'mytest@test.de',
                'expires_after' => 14,
                'featured' => 1,
                'active' => 1,
                'date_created' => new \DateTime(),
                'date_posted' => new \DateTime('2017-12-21 18:00:00'),
                'date_expired' => new \DateTime('2018-01-05 18:00:00')
            ]
        );


        $response = $this->client->get('/api/jobs');
        $this->assertEquals(200, $response->getStatusCode());
        $this->asserter()->assertResponsePropertyIsArray($response, 'items');
        $this->asserter()->assertResponsePropertyCount($response, 'items', 2);
        $this->asserter()->assertResponsePropertyEquals($response, 'items[1].salary', 900);
    }


}