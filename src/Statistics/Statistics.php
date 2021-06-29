<?php
namespace PackagedUi\Fusion\Statistics;

use Packaged\Glimpse\Tags\Div;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Color\Color;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class Statistics extends Div implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  protected $_icon;
  /** @var null|Color */
  protected $_iconColor;

  protected $_value;
  protected $_title;

  protected $_secondary;
  /** @var null|Color */
  protected $_secondaryColor;

  protected $_isWhite;
  /** @var null|Color */
  protected $_backgroundColor;
  /** @var null|Color */
  protected $_foregroundColor;

  public function __construct(...$content)
  {
    parent::__construct(...$content);
    $this->_constructComponent();
  }

  /**
   * This is the root BEM class that all the other elements
   * and modifiers will use as a base
   *
   * @return string
   */
  public function getBlockName(): string
  {
    return 'statistics';
  }

  /**
   * @param mixed $icon
   *
   * @return Statistics
   */
  public function setIcon($icon)
  {
    $this->_icon = $icon;
    return $this;
  }

  /**
   * @param mixed $value
   *
   * @return Statistics
   */
  public function setValue($value)
  {
    $this->_value = $value;
    return $this;
  }

  /**
   * @param mixed $title
   *
   * @return Statistics
   */
  public function setTitle($title)
  {
    $this->_title = $title;
    return $this;
  }

  /**
   * @param mixed $secondary
   *
   * @return Statistics
   */
  public function setSecondary(...$secondary)
  {
    $this->_secondary = Div::create(...$secondary);
    return $this;
  }

  /**
   * @param mixed $iconColor
   *
   * @return Statistics
   */
  public function setIconColor(Color $iconColor)
  {
    $this->_iconColor = $iconColor->foreground();
    return $this;
  }

  /**
   * @param mixed $secondaryColor
   *
   * @return Statistics
   */
  public function setSecondaryColor(Color $secondaryColor)
  {
    $this->_secondaryColor = $secondaryColor->foreground();
    return $this;
  }

  /**
   * @param \PackagedUi\Fusion\Color\Color $backgroundColor
   *
   * @return Statistics
   */
  public function setBackgroundColor(Color $backgroundColor): Statistics
  {
    $this->_backgroundColor = $backgroundColor->background();
    return $this;
  }

  /**
   * @param \PackagedUi\Fusion\Color\Color $foregroundColor
   *
   * @return Statistics
   */
  public function setForegroundColor(Color $foregroundColor): Statistics
  {
    $this->_foregroundColor = $foregroundColor->foreground();
    return $this;
  }

  protected function _prepareForProduce(): HtmlElement
  {
    if($this->_backgroundColor)
    {
      $this->addClass($this->_backgroundColor);
    }
    else
    {
      $this->addClass(Color::WHITE()->background());
    }

    if($this->_foregroundColor)
    {
      $this->addClass($this->_foregroundColor);
    }
    else
    {
      $this->addClass(Color::BLACK()->background());
    }
    return parent::_prepareForProduce();
  }

  protected function _getContentForRender()
  {
    $icon = null;

    if($this->_icon)
    {
      $icon = Div::create($this->_icon)
        ->addClass($this->getElementName('icon'), $this->_iconColor ?: null);
    }

    $wrapper = Div::create(
      $this->_value ? Div::create($this->_value)->addClass($this->getElementName('stat')) : null,
      $this->_title ? Div::create($this->_title)->addClass($this->getElementName('sub')) : null
    );

    $secondary = null;

    if(!empty($this->_secondary))
    {
      $secondary = Div::create($this->_secondary)
        ->addClass($this->getElementName('secondary'), $this->_secondaryColor ?: null);
    }

    return [$icon, $wrapper, $secondary];
  }
}
