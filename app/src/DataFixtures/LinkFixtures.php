<?php

namespace App\DataFixtures;

use App\Entity\Link;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LinkFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $links = [
            ['full' => 'https://www.google.com', 'short' => 'google'],
            ['full' => 'https://www.github.com', 'short' => 'github'],
            ['full' => 'https://www.symfony.com', 'short' => 'symfony'],
            ['full' => 'https://www.docker.com', 'short' => 'docker'],
            ['full' => 'https://www.php.net', 'short' => 'php'],
            ['full' => 'https://www.mysql.com', 'short' => 'mysql'],
            ['full' => 'https://www.youtube.com', 'short' => 'youtube'],
            ['full' => 'https://www.facebook.com', 'short' => 'facebook'],
            ['full' => 'https://www.twitter.com', 'short' => 'twitter'],
            ['full' => 'https://www.linkedin.com', 'short' => 'linkedin'],
            ['full' => 'https://www.amazon.com', 'short' => 'amazon'],
            ['full' => 'https://www.netflix.com', 'short' => 'netflix']
        ];

        foreach ($links as $linkData) {
            $link = new Link();
            $link->setFullLink($linkData['full']);
            $link->setShortLink($linkData['short']);
            $manager->persist($link);
        }

        $manager->flush();
    }
} 