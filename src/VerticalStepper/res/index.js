import './step-wrapper.scss';
import './step.scss';
import {Pagelets} from '@packaged-ui/pagelets';
import {onReadyState} from '@packaged-ui/ready-promise';

onReadyState().then(setLastStep);
document.addEventListener(Pagelets.events.COMPLETE, setLastStep);

function setLastStep()
{
  document.querySelectorAll('.step-wrapper').forEach(
    (stepWrapper) =>
    {
      const steps = stepWrapper.querySelectorAll('.step');
      steps.forEach(
        (step, i) =>
        {
          step.classList.toggle('step--last', i === steps.length - 1);
        }
      );
    }
  );
}
