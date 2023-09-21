<?php

namespace App\Command;

use App\Repository\QuizRepository;
use App\Service\MySlugger;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Cette commande servira à mettre à jour en prod les slugs des quiz déjà présents
 */
class QuizSlugifyCommand extends Command
{
    protected static $defaultName = 'oquiz:quiz:slugify';
    protected static $defaultDescription = 'Slugify quizzes names in the database';

    // Nos services
    private $quizRepository;
    private $mySlugger;
    private $entityManager;

    public function __construct(
        QuizRepository $quizRepository,
        MySlugger $mySlugger,
        ManagerRegistry $doctrine)
    {
        $this->quizRepository = $quizRepository;
        $this->mySlugger = $mySlugger;
        $this->entityManager = $doctrine->getManager();

        // On appelle le constructeur parent
        parent::__construct();
    }

    protected function configure(): void
    {

    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output): int
    {
        // Permet un affichage trop stylé dans le terminal
        $io = new SymfonyStyle($input, $output);

        $io->info('Mise à jour des slugs');

        // Récupérer tous les quiz (via QuizRepository)
        $quizzes = $this->quizRepository->findAll();
        // Pour chaque quiz
        foreach ($quizzes as $quiz) {
            // On slugifie le name avec notre service MySlugger
            $quiz->setSlug($this->mySlugger->slugify($quiz->getName()));
        }
        // On flush (via l'entityManager)
        $this->entityManager->flush();

        $io->success('Les slugs ont été mis à jour');

        return Command::SUCCESS;
    }
}