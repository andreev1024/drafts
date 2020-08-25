<?php

declare(strict_types=1);

namespace EHR\EmergentConsultRequest\DTO;

use EHR\AppBundle\Collection\Collection;

/**
 * @method EmergentConsultRequestDto[] getIterator()
 * @method EmergentConsultRequestDto[] toArray()
 *
 * @psalm-method \Traversable<int, EmergentConsultRequestDto> getIterator()
 * @psalm-method array<int, EmergentConsultRequestDto> toArray()
 * @template-extends Collection<EmergentConsultRequestDto>
 * @psalm-immutable
 */
class EmergentConsultRequestDtoCollection extends Collection
{
    /**
     * @return string[]
     */
    public function getAppointmentIds(): array
    {
        $appointmentIds = [];
        foreach ($this as $item) {
            if ($item->appointmentId !== null) {
                $appointmentIds[] = $item->appointmentId;
            }
        }

        return $appointmentIds;
    }

    protected function getType(): string
    {
        return EmergentConsultRequestDto::class;
    }
}
