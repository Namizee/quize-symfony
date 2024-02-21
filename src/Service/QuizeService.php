<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\AnswerRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class QuizeService
{
    public function __construct(
        private AnswerRepository $answerRepository,
        private EntityManagerInterface $entityManager,
        private UserRepository $userRepository,
    ) {
    }

    public function setUserAnswers(array $answers): int
    {
        $userId = $this->userRepository->getNextUserId();

        foreach ($answers as $questionId => $answer) {
            $user = (new User())
                ->setUserId($userId)
                ->setQuestion($questionId)
                ->setResponse($answer)
                ->setIsRight($this->isRight($questionId, $answer));

            $this->entityManager->persist($user);
        }

        $this->entityManager->flush();

        return $userId;
    }

    private function isRight(int $questionId, array $answer): bool
    {
        $rightAnswers = $this->answerRepository->findRightAnswersByQuestion($questionId);
        return !array_diff($answer, $rightAnswers);
    }
}
