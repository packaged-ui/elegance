<?php
namespace PackagedUi\Fusion;

use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponent;

trait ComponentTrait
{
  public function __construct()
  {
    parent::__construct(...func_get_args());
    $this->_constructComponent();;
  }

  protected function _constructComponent()
  {
    if($this instanceof HtmlElement && $this instanceof BemComponent)
    {
      $this->addClass($this->getBlockName());
    }
  }
}
