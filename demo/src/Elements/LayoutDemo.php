<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Dispatch\ResourceManager;
use Packaged\Glimpse\Tags\Div;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Fusion;
use PackagedUi\FusionDemo\AbstractDemoPage;

class LayoutDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Layout';
  }

  protected function _getFaIcon()
  {
    return FaIcon::LAYER_GROUP;
  }

  public function __construct()
  {
    ResourceManager::inline()->requireCss(
      "
    .container{
      display:inline-block;
      background: #dcdcdc;
      overflow:auto;
      margin:0 20px 20px 0;
    }
    
    .cell{
      background: #989898e3;
    }
    
    .cell-inner{
      background: white;
      min-width: 10px;
      min-height: 10px;
    }
    "
    );
  }

  protected function _content(): array
  {

    $cells = [];
    $cells[] = Div::create()->addClass(Fusion::MARGIN_LARGE);
    $cells[] = Div::create()->addClass(Fusion::PADDING_LARGE);
    $cells[] = Div::create()->addClass(Fusion::MARGIN_LARGE, Fusion::PADDING_LARGE);
    $cells[] = Div::create()->addClass(
      Fusion::MARGIN_LARGE,
      Fusion::PADDING_LARGE,
      Fusion::MARGIN_RIGHT_SMALL
    );
    $cells[] = Div::create()->addClass(
      Fusion::MARGIN_LARGE,
      Fusion::PADDING_LARGE,
      Fusion::MARGIN_RIGHT_SMALL,
      Fusion::PADDING_LEFT_MEDIUM
    );

    return array_map(
      function (Div $cell) {
        $cell->addClass('cell');
        $cell->setContent(Div::create()->addClass('cell-inner'));
        return Div::create($cell)->addClass('container');
      },
      $cells
    );
  }
}
