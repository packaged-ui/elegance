<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\Link;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Color\Color;
use PackagedUi\Fusion\Tiles\Enum\TileLayout;
use PackagedUi\Fusion\Tiles\Tile;
use PackagedUi\Fusion\Tiles\TileAction;
use PackagedUi\Fusion\Tiles\Tiles;
use PackagedUi\FusionDemo\DemoSection;

class TileDemo extends DemoSection
{
  protected function _content(): array
  {
    $return = [];
    $return[] = Tiles::create(
      Tile::create()->setTitle('Tile 1')
        ->addAction(TileAction::create()->setLink(Link::create('#', FaIcon::create(FaIcon::EDIT))))
        ->setColor(Color::COLOR_BLUE),
      Tile::create()->setTitle('Tile 2')->setColor(Color::COLOR_RED)
    );

    $i = 0;
    $return[] = $tiles = Tiles::create()->setLayout(TileLayout::LAYOUT_GRID);
    while(count($tiles->getTiles()) < 5)
    {
      $tile = Tile::create()->setTitle('Tile ' . ++$i)->setColor(Color::COLOR_INDIGO);
      if($i < 4)
      {
        $tile->addProperty('label', 'value');
      }
      $tiles->addTile($tile);
    }

    return $return;
  }
}
