<?php

namespace App\Command;

use App\Repository\CategoryRepository;
use App\Service\MySlugger;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Cette commande servira à mettre à jour en prod les slugs des catégories déjà présentes
 */
class CategorySlugifyCommand extends Command
{
    protected static $defaultName = 'oquiz:category:slugify';
    protected static $defaultDescription = 'Slugify categories names in the database';

    // Nos services
    private $categoryRepository;
    private $mySlugger;
    private $entityManager;

    public function __construct(
        CategoryRepository $categoryRepository,
        MySlugger $mySlugger,
        ManagerRegistry $doctrine)
    {
        $this->categoryRepository = $categoryRepository;
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

        // Récupérer toutes les catégories (via CategoryRepository)
        $categories = $this->categoryRepository->findAll();
        // Pour chaque catégorie
        foreach ($categories as $category) {
            // On slugifie le name avec notre service MySlugger
            $category->setSlug($this->mySlugger->slugify($category->getName()));
        }
        // On flush (via l'entityManager)
        $this->entityManager->flush();

        $io->success('Les slugs ont été mis à jour');

        return Command::SUCCESS;
    }
}