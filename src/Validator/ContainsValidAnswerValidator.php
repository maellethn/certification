<?php

namespace App\Validator;

use App\Entity\Answer;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class ContainsValidAnswerValidator extends ConstraintValidator
{

    /**
     * @inheritDoc
     */
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof ContainsValidAnswer) {
            throw new UnexpectedTypeException($constraint, ContainsValidAnswer::class);
        }

        foreach ($value->getValues() as $answer){
            if (!$answer instanceof Answer)
                throw new UnexpectedTypeException($constraint, Answer::class);
            if ($answer->isValid())
                return;
        }
        $this->context->buildViolation($constraint->message)
            ->addViolation();
    }
}