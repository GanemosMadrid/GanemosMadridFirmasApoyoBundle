<?php

namespace GanemosMadridFirmasApoyoBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * @Annotation
 */
class DniNieValidator extends ConstraintValidator {

    public function validate($value, Constraint $constraint) {

        $documento = str_replace(array('_', ' ', '-', '.'), '', $value);
        
        $numero = substr($documento, 0, -1);
        $letra = strtoupper(substr($documento, -1));

        if ($letra != substr("TRWAGMYFPDXBNJZSQVHLCKE", strtr($numero, "XYZ", "012")%23, 1)) {
            $this->context->buildViolation($constraint->message)
                    ->setParameter('%string%', $value)
                    ->addViolation();
        }
    }

}
