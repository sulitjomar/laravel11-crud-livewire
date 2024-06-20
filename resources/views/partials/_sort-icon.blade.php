@if ($sortBy !== $field)
    <i class="text-secondary bi bi-arrow-down-up"></i>
@elseif ($sortDirection == 'asc')
    <i class="text-dark bi bi-arrow-up"></i>
    <i class="text-secondary bi bi-arrow-down" style="margin-left: -12px;"></i>
@else
    <i class="text-dark bi bi-arrow-down"></i>
    <i class="text-secondary bi bi-arrow-up" style="margin-left: -12px;"></i>
@endif