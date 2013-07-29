<?php

class InstagramTest extends PHPUnit_Framework_TestCase
{
    public function testInstagram()
    {
        $medias = Instagram::get_feed('157954', 1); // @egermano userid

        $this->assertCount(1, $medias);
    }

}