<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\Link;
use Packaged\Glimpse\Tags\Text\HeadingSix;
use Packaged\Glimpse\Tags\Text\HeadingThree;
use PackagedUi\Fusion\Fusion;
use PackagedUi\Fusion\Layout\Drawer\Drawer;
use PackagedUi\Fusion\Menu\Menu;
use PackagedUi\Fusion\Menu\MenuItem;
use PackagedUi\FusionDemo\DemoPage;

class DrawerDemo extends DemoPage
{
  protected function _content(): array
  {
    $return = [];
    $return[] =
      Drawer::create(
        HeadingThree::create('> Toggle Drawer')->addClass(Fusion::DRAWER_TOGGLE),
        Menu::create(
          Menu::create(
            MenuItem::create("My Account")->setHref('#')->setLeading('ICN'),
            MenuItem::create("Transfer")->setHref('#')->setLeading('ICN'),
            MenuItem::create("Billing")->setHref('#')->setLeading('ICN')
          ),
          Menu::create(
            MenuItem::create("Send Feedback")->setHref('#')->setLeading('ICN'),
            MenuItem::create("Integrations")->setHref('#')->setLeading('ICN'),
            MenuItem::create("Help")->setHref('#')->setLeading('ICN')
          )
        )
      )
        ->setHeader(HeadingThree::create("My App"), HeadingSix::create("Sub Title"))
        ->setFooter(Link::create("#", 'Terms & Conditions'))
        ->setState(Drawer::STATE_NARROW)
        ->setReveal(Drawer::REVEAL_PEEK)
        ->setAppContent(
          Drawer::create(Menu::create(MenuItem::create('A Link')->setHref('#link')))
            ->setHeader(HeadingThree::create('< Toggle Drawer')->addClass(Fusion::DRAWER_TOGGLE))
            ->setAppContent(new TypographyDemo())
            ->setReveal(Drawer::REVEAL_MODAL)
            ->setState(Drawer::STATE_NARROW)
            ->setPosition(Drawer::POSITION_RIGHT)
        );

    return $return;
  }
}
