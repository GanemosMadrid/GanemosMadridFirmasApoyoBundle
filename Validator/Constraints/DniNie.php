<?php

namespace GanemosMadridFirmasApoyoBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class DniNie extends Constraint
{
    public $message = 'El documento de identidad "%string%" no es válido.';
}