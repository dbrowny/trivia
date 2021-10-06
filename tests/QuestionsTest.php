<?php

use PHPUnit\Framework\TestCase;

class QuestionsTest extends TestCase
{
    public function testCreateQuestions(): void
    {
        $q = new Questions();
        $this->assertInstanceOf("Questions", $q);
    }

    public function testAppendQuestions(): void
    {
        $q = new Questions();
        $q->addQuestion(Questions::SPORTS, "OK");

        $this->assertEquals("OK", $q->next(Questions::SPORTS));
    }

    public function testAppendMultipleQuestions(): void
    {
        $q = new Questions();
        $q->addQuestion(Questions::SPORTS, "OK");
        $q->addQuestion(Questions::SPORTS, "KO");

        $this->assertEquals("OK", $q->next(Questions::SPORTS));
        $this->assertEquals("KO", $q->next(Questions::SPORTS));
    }

    public function testKeepMultipleIterators(): void
    {
        $q = new Questions();
        $q->addQuestion(Questions::SPORTS, "OK");
        $q->addQuestion(Questions::SPORTS, "KO");
        $q->addQuestion(Questions::SCIENCE, "S1");
        $q->addQuestion(Questions::SCIENCE, "S2");

        $this->assertEquals("OK", $q->next(Questions::SPORTS));
        $this->assertEquals("S1", $q->next(Questions::SCIENCE));
        $this->assertEquals("S2", $q->next(Questions::SCIENCE));
        $this->assertEquals("KO", $q->next(Questions::SPORTS));
    }
}
