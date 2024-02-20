<?php

namespace App\DataFixtures;

use App\Entity\Answer;
use App\Entity\Question;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->loadQuestion($manager);
        $this->loadAnswer($manager);
    }

    private function loadQuestion(ObjectManager $manager)
    {
        foreach ($this->getQuestionData() as $key => $description) {
            $question = new Question();
            $question->setDescription($description);
            $manager->persist($question);
            $this->addReference('question_number_'.$key, $question);
        }

        $manager->flush();
    }

    private function loadAnswer(ObjectManager $manager)
    {
        foreach ($this->getAnswerData() as $key => $value) {
            foreach ($value as $description => $isRight) {
                $answer = new Answer();
                $answer->setDescription($description);
                $answer->setIsRight($isRight);
                $answer->setQuestion($this->getReference('question_number_'.$key));
                $manager->persist($answer);
            }
        }

        $manager->flush();
    }

    private function getQuestionData(): array
    {
        return [
            '1 + 1 =',
            '2 + 2 =',
            '3 + 3 =',
            '4 + 4 =',
            '5 + 5 =',
            '6 + 6 =',
            '7 + 7 =',
            '8 + 8 =',
            '9 + 9 =',
            '10 + 10 =',
        ];
    }

    private function getAnswerData(): array
    {
        return [
            ['3' => false, '2' => true, '0' => false],
            ['4' => true, '3 + 1' => true, '10' => false],
            ['1 + 5' => true, '1' => false, '6' => true, '2 + 4' => true],
            ['8' => true, '4' => false, '0' => false, '0 + 8' => true],
            ['6' => false, '18' => false, '10' => true, '9' => false, '0' => false],
            ['3' => false, '9' => false, '0' => false, '12' => true, '5 + 7' => true],
            ['5' => false, '14' => true],
            ['16' => true, '12' => false, '9' => false, '5' => false],
            ['18' => true, '9' => false, '17 + 1' => true, '2 + 16' => true],
            ['0' => false, '2' => false, '8' => false, '20' => true],
        ];
    }
}
