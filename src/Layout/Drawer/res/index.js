import {on} from '../../../Foundation/res';
import './drawer.scss';

on(
  document, 'click', '.drawer__toggle',
  function (e)
  {
    toggleDrawer(getDrawerContainer(e.target));
    e.stopPropagation();
    e.stopImmediatePropagation();
  },
);

on(
  document, 'click', 'a', function ()
  {
    // if drawer reveal is modal, close drawer
    document.querySelectorAll('.drawer').forEach(
      (drawer) =>
      {
        if(drawer.getAttribute('reveal') === 'modal' // if drawer is modal
          || document.body.clientWidth < 512) // or client width less than 512px
        {
          closeDrawer(drawer.parentNode);
        }
      }
    );
  }
);

on(
  document, 'click', '.drawer-container.drawer--open > .drawer-app-content',
  function (e)
  {
    if(e.target.matches('.drawer-app-content'))
    {
      let style = window.getComputedStyle(e.target, '::before');
      if(style.getPropertyValue('opacity') === '1')
      {
        let container = e.target.closest('.drawer-container');
        let drawer = container.querySelector('.drawer');
        let storageKey = 'drawer--open-' + drawer.getAttribute('position');

        container.classList.remove('drawer--open');
        localStorage.setItem(storageKey, '0');
      }
    }
  },
);

function getDrawerContainer(target)
{
  let container = target.closest('.drawer-container');
  if(!container)
  {
    // button not inside a drawer, get first drawer
    container = document.querySelector('.drawer-container');
  }
  return container;
}

function toggleDrawer(container)
{
  // find parent
  if(container)
  {
    if(container.classList.contains('drawer--open'))
    {
      closeDrawer(container);
    }
    else
    {
      openDrawer(container);
    }
  }
}

function openDrawer(container)
{
  let drawer = container.querySelector('.drawer');
  let storageKey = 'drawer--open-' + drawer.getAttribute('position');
  container.classList.add('drawer--open');
  localStorage.setItem(storageKey, '1');
}

function closeDrawer(container)
{
  let drawer = container.querySelector('.drawer');
  let storageKey = 'drawer--open-' + drawer.getAttribute('position');
  container.classList.remove('drawer--open');
  localStorage.setItem(storageKey, '0');
}
