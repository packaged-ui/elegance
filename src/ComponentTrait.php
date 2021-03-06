<?php
namespace PackagedUi\Fusion;

use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\Bem;
use PackagedUi\BemComponent\BemComponent;

trait ComponentTrait
{
  public static function bem(): Bem
  {
    return Bem::block((new static())->getBlockName());
  }

  protected function _construct() { }

  protected function _constructComponent()
  {
    if($this instanceof HtmlElement && $this instanceof BemComponent)
    {
      $this->addClass($this->getBlockName());
    }
  }

  /**
   * @param string $modifier
   * @param string ...$elements
   *
   * @return static
   */
  protected function addModifier(string $modifier, string ...$elements)
  {
    return $this->addClass($this->getModifier($modifier, ...$elements));
  }

  /**
   * @param string $modifier
   * @param string ...$elements
   *
   * @return static
   */
  protected function removeModifier(string $modifier, string ...$elements)
  {
    return $this->removeClass($this->getModifier($modifier, ...$elements));
  }
}
