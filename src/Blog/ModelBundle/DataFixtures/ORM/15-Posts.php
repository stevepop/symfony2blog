<?php

namespace Blog\ModelBundle\DataFixtures\ORM;

use Blog\ModelBundle\Entity\Author;
use Blog\ModelBundle\Entity\Post;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Fixtures for the Post Entity
 */
class Posts extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 15;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $p1 = new Post();
        $p1->setTitle('Lorem ipsum dolor sit amet');
        $p1->setBody('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lobortis nisi non sapien elementum,
        id placerat urna pulvinar. Nam ut varius erat. Ut malesuada rhoncus euismod. Nam sed suscipit justo. In bibendum
        eleifend est id ultrices. Phasellus at lectus quis lectus tristique faucibus eu in lacus. Nullam convallis sapien
        sed nulla euismod lacinia. Aliquam scelerisque mi a porta tincidunt. Donec sed porta nibh. Mauris arcu risus,
        tempor ut turpis eget, aliquam vulputate nisi. Aenean quis erat luctus turpis auctor placerat sed quis tortor.
        Aliquam erat volutpat.

Suspendisse potenti. Morbi rutrum dictum nunc, in tincidunt quam porttitor id. Morbi sit amet nisi quis nulla egestas
sodales. Nullam iaculis, sem non pharetra commodo, metus felis tristique tellus, consectetur condimentum augue metus ut
orci. Nunc non purus vel enim bibendum facilisis. Nam porta nisi sed porta feugiat. Morbi vestibulum enim et dapibus molestie.
Nam ac sapien sed libero condimentum placerat a eget nulla. Aenean scelerisque magna tortor, at molestie lorem gravida at.');
        $p1->setAuthor($this->getAuthor($manager, 'David'));

        $p2 = new Post();
        $p2->setTitle('Pellentesque ac imperdiet dolor');
        $p2->setBody('Pellentesque ac imperdiet dolor. Phasellus scelerisque mattis orci a feugiat. Proin vitae libero
        tortor. Vestibulum nec elit ac erat mattis aliquet. Sed pellentesque, justo nec lobortis iaculis, diam massa varius
        ante, in sagittis odio diam nec elit. Maecenas gravida euismod justo, ac pulvinar quam vulputate eget. In hac
        habitasse platea dictumst. Integer id molestie lectus. Etiam vel ante semper, ultricies justo eget, accumsan lacus.
        Vestibulum sed lacinia sapien. Donec iaculis quis turpis sed tristique. Integer a nibh congue, placerat est
        tincidunt, ullamcorper nulla. Donec pharetra pharetra ligula, gravida pellentesque lorem facilisis a. Donec
        sollicitudin fringilla elit, et pharetra mauris laoreet vel.

Sed ut pharetra ante. Phasellus nec blandit dui. Phasellus a lacinia tellus. Donec sagittis elit ante, sit amet elementum
justo condimentum sed. Quisque id sapien justo. Duis vel erat nisl. Donec at tempor arcu. Vivamus congue malesuada augue
vitae iaculis. Cras bibendum, diam tincidunt sagittis scelerisque, nisi quam sagittis leo, eget mollis massa sapien ac
massa. Praesent sagittis suscipit tincidunt. Nullam ultrices diam sit amet sollicitudin molestie. Interdum et malesuada
fames ac ante ipsum primis in faucibus.');
        $p2->setAuthor($this->getAuthor($manager, 'Eddie'));

        $p3 = new Post();
        $p3->setTitle('Duis in feugiat ligula');
        $p3->setBody('Nunc euismod quam nulla, et facilisis est consectetur nec. Aenean sed tortor odio. Ut nisl massa,
        condimentum vitae risus nec, aliquam sagittis lorem. Donec dignissim accumsan metus. Vivamus congue a purus eget
        faucibus. Cras elit neque, consectetur ac interdum in, fringilla vitae justo. Suspendisse eget commodo felis.
        Morbi in augue et elit vehicula rhoncus. Aliquam gravida dapibus sollicitudin. Sed varius porttitor sapien, sit
        amet posuere erat egestas nec. Cras fermentum tortor in nisi varius aliquam. Maecenas ac elit lectus. Duis in
        feugiat ligula. Donec congue mollis libero, ut sollicitudin nisi aliquam non.');
        $p3->setAuthor($this->getAuthor($manager, 'Eddie'));

        $manager->persist($p1);
        $manager->persist($p2);
        $manager->persist($p3);

        $manager->flush();
    }

    /**
     * Get an author
     *
     * @param ObjectManager $manager
     * @param string        $name
     *
     * @return Author
     */
    private function getAuthor(ObjectManager $manager, $name)
    {
        return $manager->getRepository('ModelBundle:Author')->findOneBy(
            array(
                'name' => $name
            )
        );
    }
}